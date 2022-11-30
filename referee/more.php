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
                        <h6 class="text-dark font-medium mb-0"><span class="badge badge-success"><?= $number; ?></span>
                            <?= $fname; ?> <?= $lname; ?>
                        </h6>
                    </div>
                    <hr>
                </div>
                <form class="form-horizontal form-material mx-2" method="post" action="">
                    <div class="form-group">

                        <div class="col-md-6">
                            <input type="hidden" name="member_id" value="<?= $member ?>">
                            <input type="text" id="phone" name="goal" placeholder="Goals"
                                class="form-control form-control-line">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6">
                            <input type="number" name="goal_min" min="0" placeholder="Minutes"
                                class="form-control form-control-line">
                        </div>

                    </div>
                    <div class="form-group">

                        <div class="col-md-8">
                            <select name="card" class="form-control form-control-line">
                                <option value="" selected>No Card</option>
                                <option value="Yellow">Yellow</option>
                                <option value="Double">Double Yellow</option>
                                <option value="Red">Red</option>
                            </select>
                        </div>

                    </div>
                    <div class="form-group">
                        <div class="col-md-4">
                            <input type="number" name="card_min" min="0" placeholder="Minutes"
                                class="form-control form-control-line">
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
                <form class="form-horizontal form-material mx-2" method="post">
                    <input type="hidden" name="member_id" value="<?= $member ?>">
                    <div class="form-group">
                            <div class="col-md-8">
                                <select name="card" class="form-control form-control-line">
                                    <option value="" selected>No Card</option>
                                    <option value="Yellow">Yellow</option>
                                    <option value="Double">Double Yellow</option>
                                    <option value="Red">Red</option>
                                </select>
                            </div>
                        <div class="form-group">
                                <div class="col-md-4">
                                    <input type="number" name="card_min" min="0" placeholder="Minutes"
                                        class="form-control form-control-line">
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
    @$goal = $_POST['goal'];
    @$goal_min = $_POST['goal_min'];
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
            if ($allcard == 5) {
          $sql ='UPDATE `team_member` SET `double_yellow`=0,red=0,`yellow`=6 WHERE member_id=?';
            } else {
            $sql ='UPDATE `team_member` SET `double_yellow`=0,red=0,`yellow`='.$allcard.' WHERE member_id=?';
            }
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