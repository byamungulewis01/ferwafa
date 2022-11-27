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
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Feeds</h5>
                                <div class="comment-widgets scrollable">
                                <!-- Comment Row -->
                                <div class="d-flex flex-row comment-row m-t-0">
                                    <div class="p-2"><img src="../assets/images/users/1.jpg" alt="user" width="50"
                                            class="rounded-circle"></div>
                                    <div class="comment-text w-100">
                                        <h6 class="font-medium">James Anderson</h6>
                                        <span class="m-b-15 d-block">Lorem Ipsum is simply  </span>
                                        <div class="comment-footer">
                                            <span class="text-muted float-end">April 14, 2021</span> <span
                                                class="badge bg-primary">Pending</span> <span
                                                class="action-icons">
                                                <a href="#"><i class="ti-pencil-alt">Allow</i></a>
                                         
                                            </span>
                                        </div>
                                    </div>
                                </div>               
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