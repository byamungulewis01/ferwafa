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
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
            
                <div class="row">
                    <!-- Column -->
                        <div class="col-lg-6 col-md-12">
                            <div class="card card-body mailbox">
                                <h5 class="card-title">All Teams</h5>
                                <div class="message-center" style="height: 420px !important;">  
                                   <?php
                                   $sql = 'SELECT * FROM `team`';
                                   $statement = $connection->prepare($sql);
                                   $statement->execute();
                                   $Teams = $statement->fetchAll(PDO::FETCH_OBJ);
                                   foreach($Teams as $team):
                                   ?>
                                    <a href="?team=<?=  $team->team_id; ?>">
                                    <span class="round" style="background:white;"><img src="../Logo/<?= $team->logon; ?>"
                                            alt="user" width="50" height="50"></span>
                                        <div class="mail-contnet">
                                            <h6 class="text-dark font-medium mb-0"><?= $team->name; ?></h6> 
                                            <span class="mail-desc"><?= $team->stadium; ?></span>
                                        </div>
                                    </a>
                                    <?php endforeach; ?>
                             
                                </div>
                            </div>
                        </div>
                    
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-6 col-md-12">
                        <div class="card card-body mailbox">
                            <h5 class="card-title mb-5">Add New </h5>
                            <?php if (isset($_GET['team'])) {  
                                 $team_id = $_GET['team'];
                                 $sql = 'SELECT * FROM `team` WHERE team_id =:team_id';
                                 $statement = $connection->prepare($sql);
                                 $statement->execute([':team_id' => $team_id]);
                                 $Teams = $statement->fetchAll(PDO::FETCH_OBJ);
                                 foreach($Teams as $team):
                            ?>
                            <center class="mt-4"> 
                                    <img src="../Logo/<?= $team->logon; ?>" class="img-circle"
                                        width="150" />
                                    <h4 class="card-title mt-2"><?= $team->name; ?></h4>
                                    <h6 class="card-subtitle"><?= $team->stadium; ?></h6>
                                    <div class="row text-center justify-content-md-center">
                                        <div class="col-2"><a href="?edit=<?=$team_id?>">Edit</a></div>
                                        <div class="col-2"><a href="?delete=<?=$team_id?>">Delete</a></div>
                                      
                                    </div>
                                </center>
                                <?php endforeach; ?>
                                <?php  
                            }
                               else if (isset($_GET['edit'])){
                                $team_id = $_GET['edit'];
                                $sql = 'SELECT * FROM `team` WHERE team_id =:team_id';
                                $statement = $connection->prepare($sql);
                                $statement->execute([':team_id' => $team_id]);
                                $Teams = $statement->fetchAll(PDO::FETCH_OBJ);
                                foreach($Teams as $team):
                                ?>
                            <form class="form-horizontal form-material mx-2" method="post" action="controls/EditTeam.php" enctype="multipart/form-data">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <input type="hidden" name="team_id" value="<?= $team_id; ?>">
                                        <input type="text" value="<?= $team->name; ?>"
                                            class="form-control form-control-line" name="team_name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <input type="text" value="<?= $team->stadium; ?>" name="stadium"
                                            class="form-control form-control-line">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <input type="file" name="logon"
                                            class="form-control form-control-line">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="text" value="<?= $team->username; ?>" name="username"
                                                class="form-control form-control-line">
                                        </div>
                                        <div class="col-md-6">
                                            <input type="password" value="<?= $team->password; ?>" name="password"
                                                class="form-control form-control-line">
                                        </div>
                                    </div>
                                   
                                </div>
                            
                               
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <button name="submit" class="btn btn-success">Edit Team</button>
                                    </div>
                                </div>
                            </form>
                            <?php endforeach; ?>
                            <?php }
                            else {
                                ?>
                                <form class="form-horizontal form-material mx-2" method="post" action="controls/addTeam.php" enctype="multipart/form-data">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <input type="text" placeholder="Team name"
                                            class="form-control form-control-line" name="team_name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <input type="text" placeholder="stadium" name="stadium"
                                            class="form-control form-control-line">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <input type="file" placeholder="Johnathan Doe" name="logon"
                                            class="form-control form-control-line">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="text" placeholder="Username" name="username"
                                                class="form-control form-control-line">
                                        </div>
                                        <div class="col-md-6">
                                            <input type="password" placeholder="password" name="password"
                                                class="form-control form-control-line">
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