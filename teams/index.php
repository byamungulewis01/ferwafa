<?php require 'header.php'; ?>
<div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
          
                <div class="row">
                    <!-- Start Notification -->
                    <div class="col-lg-4 col-md-12">
                        <div class="card card-body mailbox">
                            <h5 class="card-title">All Fixtures</h5>
                            <div class="message-center" style="height: 420px !important;">
                                   <?php
                                        $sql = 'SELECT * FROM `calender` WHERE home=? OR away=?';
                                        $statement = $connection->prepare($sql);
                                        $statement->execute([$_SESSION['Team_Name'],$_SESSION['Team_Name']]);
                                        $Teams = $statement->fetchAll(PDO::FETCH_OBJ);
                                        foreach($Teams as $team):
                                            if ($team->home != $_SESSION['Team_Name']) {
                                                $VS = $team->home;
                                            }
                                            elseif ($team->away != $_SESSION['Team_Name']) {
                                                $VS = $team->away;
                                            }
                                        $next = $team->status;
                                        if ($next == 'next') {
                                           $msg = 'lineUp.php?week='.$team->week;
                                        } else {
                                            $msg = '#';
                                        }
                                        
                                        ?>
                            <a href="<?= $msg; ?>">
                            <?php
                                            $sql1 = 'SELECT name,logon FROM team WHERE name=?';
                                            $stmt = $connection->prepare($sql1);
                                            $stmt->execute([$VS]);
                                            while($data=$stmt->fetch(PDO::FETCH_ASSOC))
                                            $logo = $data['logon'];
                                            ?>
                            <span class="round" style="background:white;">
                            <img src="../Logo/<?= $logo; ?>" alt="user" width="50" height="50">    
                        </span>
                            <div class="mail-contnet">
                                <h6 class="text-dark font-medium mb-0"><?= $VS; ?></h6>
                                <span class="mail-desc">Week <?= $team->week; ?> Fixtures</span>
                            </div>
                        </a>
                        <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                    <!-- End Notification -->
                    <!-- Start Feeds -->
                    <div class="col-lg-4">
                        <div class="card">
                        <div class="card-body">
                        <h5 class="card-title">Player</h5>
                        <?php
                                   $sql = 'SELECT * FROM `team_member` WHERE role_in_team="player" AND team=?';
                                   $statement = $connection->prepare($sql);
                                   $statement->execute([$_SESSION['Team_id']]);
                                   $Teams = $statement->fetchAll(PDO::FETCH_OBJ);
                                   foreach($Teams as $team):
                                   ?>
                        <div class="d-flex flex-row comment-row m-t-0">
                            <div class="p-2"><span class="round round-info"><?= $team->number; ?></span></div>
                            <div class="comment-text">
                                <h6 class="font-medium"><?= $team->fname; ?> <?= $team->lname; ?></h6>

                                <div class="comment-footer">
                                    <?php 
                                    if ($team->yellow >= 5) {
                                        echo '<span title="Due to have 5 Yellow cards" class="badge bg-danger">Suspend</span>';
                                    }
                                    elseif ($team->double_yellow > 0) {
                                        echo '<span title="Last Days you have Double Yellows" class="badge bg-danger">Suspend</span>';
                                    }
                                    elseif ($team->red > 0) {
                                        echo '<span title="Have Red Card in Previous Match" class="badge bg-danger">Suspend</span>';
                                    }
                                    else {
                                        echo '<span class="badge bg-info">Allowed</span>';
                                       ?>
                                        <span class="action-icons">
                                        <a href="?add=<?= $team->member_id; ?>"><i class="fa fa-plus-square-o"></i></a>
                                    </span>
                                       <?php
                                    }
                                    ?>
                                
                                    <span class="text-muted float-end"><?= $team->position; ?></span>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>


                    </div>

                        </div>
                            </div>
                        </div>
                    </div>

                    
                    <!-- End Feeds -->
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