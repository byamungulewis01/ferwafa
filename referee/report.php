<?php require_once 'header.php'; ?>

    <!-- ============================================================== -->
    <div class="container-fluid">

        <?php
        $sql1 = 'SELECT name,team_id FROM team WHERE name=?';
        $stmt = $connection->prepare($sql1);
        $stmt->execute([$_GET['team']]);
        while($data=$stmt->fetch(PDO::FETCH_ASSOC))
        $team_id = $data['team_id'];
        ?>
        <div class="row">
            <div class="col-lg-4 col-md-12">
                <div class="card card-body mailbox">
                    <h5 class="card-title">team Squard</h5>
                    <div class="message-center" style="height: 420px !important;">
                        <?php
                    $sql = 'SELECT * FROM team_member INNER JOIN match_day_reports ON 
                    team_member.member_id = match_day_reports.team_member AND match_day_reports.week=? 
                    AND match_day_reports.team=? AND team_member.role_in_team="player"';
                    $statement = $connection->prepare($sql);
                    $statement->execute([$_GET['week'],$team_id]);
                    $Teams = $statement->fetchAll(PDO::FETCH_OBJ);
                    foreach($Teams as $team):
                    ?>
                        <a
                            href="?player=<?= $team->member_id; ?>&team=<?= $_GET['team']; ?>&week=<?= $_GET['week']; ?>">
                            <span class="round"><?= $team->number; ?></span>
                            <div class="mail-contnet">
                                <h6 class="text-dark font-medium mb-0"><?= $team->fname; ?> <?= $team->lname; ?></h6>
                                <span class="mail-desc">Cards:
                                    <?php 
                                    if ($team->card == 'Yellow') {
                                    echo ' <span class="badge badge-warning">1</span>';
                                    }
                                    elseif ($team->card == 'Double') {
                                    echo ' <span class="badge badge-warning">2</span>';
                                    }
                                    elseif ($team->card == 'Red') {
                                    echo '<span class="badge badge-danger">1</span>';
                                    }
                                    else
                                    {
                                        echo '';
                                    }
                            
                                ?>
                                </span>
                                <span class="mail-desc">Goals:
                                    <span class="badge badge-info"><?= $team->goal; ?></span>
                                </span>

                            </div>
                        </a>
                        <?php endforeach; ?>

                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="card card-body mailbox">
                    <h5 class="card-title">Team technical staff</h5>
                    <div class="message-center" style="height: 420px !important;">
                        <?php
                    $sql = 'SELECT * FROM team_member INNER JOIN match_day_reports ON 
                    team_member.member_id = match_day_reports.team_member AND match_day_reports.week=? 
                    AND match_day_reports.team=? AND team_member.role_in_team="staff"';
                    $statement = $connection->prepare($sql);
                    $statement->execute([$_GET['week'],$team_id]);
                    $Teams = $statement->fetchAll(PDO::FETCH_OBJ);
                    foreach($Teams as $team):
                    ?>
                        <a href="?staff=<?= $team->member_id; ?>&team=<?= $_GET['team']; ?>&week=<?= $_GET['week']; ?>">
                            <span class="round"><?= $team->post; ?></span>
                            <div class="mail-contnet">
                                <h6 class="text-dark font-medium mb-0"><?= $team->fname; ?> <?= $team->lname; ?></h6>
                                <span class="mail-desc">Cards:
                                    <?php 
                                    if ($team->card == 'Yellow') {
                                    echo ' <span class="badge badge-warning">1</span>';
                                    }
                                    elseif ($team->card == 'Double') {
                                    echo ' <span class="badge badge-warning">2</span>';
                                    }
                                    elseif ($team->card == 'Red') {
                                    echo '<span class="badge badge-danger">1</span>';
                                    }
                                    else
                                    {
                                        echo '';
                                    }
                            
                                ?>
                                </span>
                            </div>
                        </a>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="card card-body mailbox">
                    <div class="table-responsive mt-3 no-wrap">
                        <table class="table vm no-th-brd pro-of-month">
                            <tbody>
                                <?php
                                       if (isset($_GET['home'])) {
                                        $sql = 'SELECT * FROM `calender` WHERE home=? AND week=?';
                                       }
                                       if(isset($_GET['away'])) {
                                        $sql = 'SELECT * FROM `calender` WHERE away=? AND week=?';
                                       }
                                        $statement = $connection->prepare($sql);
                                        $statement->execute([$_GET['team'],$_GET['week']]);
                                        $Teams = $statement->fetchAll(PDO::FETCH_OBJ);
                                        foreach($Teams as $team):
                                        ?>
                                <tr class="active">
                                <tr>
                                    <td><span class="text-muted">Week <?= $team->week; ?></span></td>
                                </tr>
                                <td style="text-align: left;">
                                    <?php
                                            $sql1 = 'SELECT name,logon FROM team WHERE name=:name';
                                            $stmt = $connection->prepare($sql1);
                                            $stmt->execute([':name' => $_GET['team']]);
                                            while($data=$stmt->fetch(PDO::FETCH_ASSOC))
                                            $logo = $data['logon'];
                                            ?>
                                    <span class="round"><img src="../Logo/<?= $logo; ?>" alt="user" width="50"
                                            height="50">
                                    </span>
                                    <h4 class="mt-2"><?= $_GET['team']; ?></h4>
                                </td>


                                <td style="text-align: center;">
                                    <h6><?= $team->time; ?></h6>
                                    <span class="text-muted"><?= $team->stadium; ?></span>
                                </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <?php
                    if (isset($_GET['player'])) {
                        $member = $_GET['player'];  
                              
                    ?>
                    <div class="m-4">
                        <?php
                    $sql1 = 'SELECT * FROM team_member WHERE member_id=?';
                    $stmt = $connection->prepare($sql1);
                    $stmt->execute([$member]);
                    while($data=$stmt->fetch(PDO::FETCH_ASSOC)){
                    $fname = $data['fname'];
                    $lname = $data['lname'];
                    $number = $data['number'];
                    $post= $data['post'];
                }
                    ?>
                        <div class="mail-contnet">
                            <h6 class="text-dark font-medium mb-0"><span
                                    class="badge badge-success"><?= $number; ?></span> <?= $fname; ?> <?= $lname; ?>
                            </h6>
                        </div>
                        <hr>
                    </div>
                    <form class="form-horizontal  mx-2" method="post" action="">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="hidden" name="member_id" value="<?= $member ?>">
                                    <input type="number" name="goal" min="0" placeholder="Goals"
                                        class="form-control form-control-line">
                                </div>
                                <div class="col-md-6">
                                    <input type="number" name="goal_min" min="0" placeholder="Minutes"
                                        class="form-control form-control-line">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-8">
                                    <select name="card" class="form-control form-control-line">
                                        <option value="" selected>No Card</option>
                                        <option value="Yellow">Yellow</option>
                                        <option value="Double">Double Yellow</option>
                                        <option value="Red">Red</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <input type="number" name="card_min" min="0" placeholder="Minutes"
                                        class="form-control form-control-line">
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-sm-12">
                                <button name="report" class="btn btn-success">Report</button>
                            </div>
                        </div>
                    </form>
                    <?php
                    }
                    ?>
                    <?php
                    if (isset($_GET['staff'])) {
                        $member = $_GET['staff'];
                    ?>
                    <div class="m-4">
                                <?php
                            $sql1 = 'SELECT * FROM team_member WHERE member_id=?';
                            $stmt = $connection->prepare($sql1);
                            $stmt->execute([$member]);
                            while($data=$stmt->fetch(PDO::FETCH_ASSOC)){
                            $fname = $data['fname'];
                            $lname = $data['lname'];
                            $number = $data['number'];
                            $post= $data['post'];
                        }
                            ?>
                        <div class="mail-contnet">
                            <h6 class="text-dark font-medium mb-0"> <span class="badge badge-info"><?= $post; ?></span>
                                <?= $fname; ?> <?= $lname; ?></h6>
                        </div>
                        <hr>
                    </div>
                    <form class="form-horizontal  mx-2" method="post">
                        <input type="hidden" name="member_id" value="<?= $member ?>">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-8">
                                    <select name="card" class="form-control form-control-line">
                                        <option value="" selected>No Card</option>
                                        <option value="Yellow">Yellow</option>
                                        <option value="Double">Double Yellow</option>
                                        <option value="Red">Red</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <input type="number" name="card_min" min="0" placeholder="Minutes"
                                        class="form-control form-control-line">
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-sm-12">
                                <button name="report" class="btn btn-success">Report</button>
                            </div>
                        </div>
                    </form>
                    <?php
                    }
                    ?>
                </div>
                <a href="index.php" class="btn btn-sm btn-danger">Back</a>

            </div>
        </div>
        <!-- End Notification -->
    </div>
    <!-- Start Notification -->
    <?php
     $team =$_GET['team'];
     $week =$_GET['week'];
if (isset($_POST['report'])) {
    $member_id = $_POST['member_id'];
    $goal = $_POST['goal'];
    $goal_min = $_POST['goal_min'];
    $card = $_POST['card'];
    $card_min = $_POST['card_min'];
  try {
    $sql = 'UPDATE `match_day_reports` SET `goal`=?,`goal_min`=?,`card`=?,
    `card_min`=? WHERE `week`=? and team_member=?';
    $stmt = $connection->prepare($sql);
    if($stmt->execute([$goal,$goal_min,$card,$card_min,$week,$member_id]))
    {
        $sql1 = 'SELECT COUNT(card) AS allcard FROM match_day_reports WHERE team_member=? AND card="yellow"';
        $stmt = $connection->prepare($sql1);
        $stmt->execute([$member_id]);
        while($data=$stmt->fetch(PDO::FETCH_ASSOC))
        $allcard = $data['allcard'];
        if ($card == '') {    
            $sql ='UPDATE `team_member` SET `double_yellow`=0,red=0,`yellow`='.$allcard.' WHERE member_id=?';
            }
        if ($card == 'Yellow') {    
            $sql ='UPDATE `team_member` SET `double_yellow`=0,red=0,`yellow`='.$allcard.' WHERE member_id=?';
            }
            if ($card == 'Double') {
                $sql ='UPDATE `team_member` SET `double_yellow`=2,`yellow`=0,red=0 WHERE member_id=?';  
            }
            if ($card == 'Red') {
                $sql ='UPDATE `team_member` SET `red`=3,`double_yellow`=0,yellow=0 WHERE member_id=?';  
            }       
            $stmt = $connection->prepare($sql);
            $stmt->execute([$member_id]);

     echo"<script>window.location=' report.php?team=$team&week=$week';</script>";
  }     
}
catch (PDOException $e) {
  echo $e->getMessage();
  //header("Location: ../fixture.php?error");
  }
   
 } 
 
?>
    <!-- End Page Content -->
    <!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Container fluid  -->
<?php require 'footer.php'; ?>