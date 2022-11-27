<?php require_once 'header.php'; ?>
<?php
 if (isset($_GET['delete'])) {
    $team_id = $_GET['delete'];
  
    try {
      $sql = 'DELETE FROM `team` WHERE team_id=:team_id';
      $stmt = $connection->prepare($sql);
      if($stmt->execute([':team_id' => $team_id]))
      {      
          header("Location: teams.php?Deleted");
    } 
  }
  catch (PDOException $e) {
       echo $e->getMessage();
      header("Location: teams.php?error");
    }
     
   }
 ?>
<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">

        <div class="row">
            <!-- Column -->
            <div class="col-lg-4 col-md-12">
                <div class="card card-body mailbox">
                    <div class="d-flex">
                        <div>
                            <h5 class="card-title">All Players</h5>
                        </div>
                        <div class="ms-auto">
                            <a href="?player">Add Players</a>
                        </div>
                    </div>
                    <div class="message-center" style="height: 420px !important;">
                        <?php
                                   $sql = 'SELECT * FROM `team_member` WHERE role_in_team="player" AND team=?';
                                   $statement = $connection->prepare($sql);
                                   $statement->execute([$_SESSION['Team_id']]);
                                   $Teams = $statement->fetchAll(PDO::FETCH_OBJ);
                                   foreach($Teams as $team):
                                   ?>
                        <a href="?team=<?=  $team->team_id; ?>">
                            <span class="round round-success"><?= $team->number; ?></span>
                            <div class="mail-contnet">
                                <h6 class="text-dark font-medium mb-0"><?= $team->fname; ?> <?= $team->lname; ?></h6>
                                <span class="mail-desc"><?= $team->position; ?></span>
                            </div>
                        </a>
                        <?php endforeach; ?>

                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="card card-body mailbox">
                    <div class="d-flex">
                        <div>
                            <h5 class="card-title">All Staff</h5>
                        </div>
                        <div class="ms-auto">
                            <a href="?staff">Add Staff</a>
                        </div>
                    </div>
                    <div class="message-center" style="height: 420px !important;">
                        <?php
                                   $sql = 'SELECT * FROM `team_member` WHERE role_in_team="staff" AND team=?';
                                   $statement = $connection->prepare($sql);
                                   $statement->execute([$_SESSION['Team_id']]);
                                   $Teams = $statement->fetchAll(PDO::FETCH_OBJ);
                                   foreach($Teams as $team):
                                    if ($team->post == 'HC') {
                                        $post = 'Head Coach';
                                    }
                                    elseif ($team->post == 'AC') {
                                        # code...
                                        $post = 'Assistant Coach';
                                    }
                                    elseif ($team->post == 'GC') {
                                        # code...
                                        $post = 'GoalKeeper Coach';
                                    }
                                    elseif ($team->post == 'Do') {
                                        # code...
                                        $post = 'Doctor Coach';
                                    }
                                    elseif ($team->post == 'Ph') {
                                        # code...
                                        $post = 'Physiotherapist';
                                    }
                                   ?>
                        <a href="?team=<?=  $team->member_id; ?>">
                            <span class="round round-info"><?= $team->post; ?></span>
                            <div class="mail-contnet">
                                <h6 class="text-dark font-medium mb-0"><?= $team->fname; ?> <?= $team->lname; ?></h6>
                                <span class="mail-desc"><?= $post; ?></span>
                            </div>
                        </a>
                        <?php endforeach; ?>

                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-12">
                <div class="card card-body mailbox">
                    <h5 class="card-title mb-3">Add Members</h5>
                    <?php
                if(isset($_GET['player'])) {
                                ?>
                    <form class="form-horizontal form-material mx-2" method="post" action="controls/addPlayer.php">
                        <input type="hidden" name="team_id" value="<?= $_SESSION['Team_id']; ?>">

                        <div class="form-group">
                            <div class="col-md-12">
                                <input type="text" placeholder="First name" class="form-control form-control-line"
                                    name="fname">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <input type="text" placeholder="Last Name" name="lname"
                                    class="form-control form-control-line">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row" id="select2">
                                <div class="col-md-6">
                                    <input type="text" placeholder="Number" name="number" require
                                        class="form-control form-control-line">
                                </div>
                                <div class="col-md-6">
                                    <select name="position" class="form-control form-control-line">
                                        <option value="" disabled selected>Choose player position</option>
                                        <option value="Goal Keeper">Goal Keeper</option>
                                        <option value="Deffence">Deffence</option>
                                        <option value="Midfielder">Midfielder</option>
                                        <option value="Attacker">Attacker</option>
                                    </select>
                                </div>
                            </div>

                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <button name="submit" class="btn btn-success">Add Team</button>
                            </div>
                        </div>
                    </form>
                    <?php 
                                 }
                            elseif(isset($_GET['staff'])) {
                                        ?>
                    <form class="form-horizontal form-material mx-2" method="post" action="controls/addStaff.php"
                        enctype="multipart/form-data">
                        <input type="hidden" name="team_id" value="<?= $_SESSION['Team_id']; ?>">

                        <div class="form-group">
                            <div class="col-md-12">
                                <input type="text" placeholder="First name" class="form-control form-control-line"
                                    name="fname">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <input type="text" placeholder="Last Name" name="lname"
                                    class="form-control form-control-line">
                            </div>
                        </div>
                        <div class="form-group" id="select2">
                            <div class="row">
                                <div class="col-md-12">
                                    <select name="post" class="form-control form-control-line">
                                        <option value="none" selected="" disabled="">Select Position</option>
                                        <option value="HC">Head coach</option>
                                        <option value="AC">Assistant Coach</option>
                                        <option value="GC">Gk Coach</option>
                                        <option value="Do">Doctor</option>
                                        <option value="Ph">Physio</option>
                                    </select>
                                </div>

                            </div>

                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <button name="submit" class="btn btn-success">Add Staff</button>
                            </div>
                        </div>
                    </form>
                    <?php   }
                            else {                   
                ?>
                    <center class="mt-4">
                        <img src="../Logo/<?= $_SESSION['logo']; ?>" class="img-circle" width="150" />
                        <h4 class="card-title mt-2"><?= $_SESSION['Team_Name']; ?></h4>
                        <h6 class="card-subtitle">You Are here</h6>

                    </center>
                    <?php

                            } ?>
                </div>
            </div>
        </div>

        <!-- ============================================================== -->
        <!-- End Notification And Feeds -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- End Page Content -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <?php require 'footer.php'; ?>