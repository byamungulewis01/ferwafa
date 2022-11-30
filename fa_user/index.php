<?php require_once 'header.php'; ?>
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-5 col-md-4">
                                <div class="icon-big text-center icon-warning">
                                    <i class="nc-icon nc-money-coins text-success"></i>
                                </div>
                            </div>
                            <div class="col-7 col-md-8">
                                <div class="numbers">
                                    <p class="card-category">Teams</p>
                        <?php
                        $sql1 = 'SELECT * FROM team';
                        $stmt = $connection->prepare($sql1);
                        $stmt->execute();
                        $row = $stmt->rowCount();
                        ?>
                                    <p class="card-title"><?= $row; ?><p>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer ">
                        <hr>
                        <div class="stats">
                        <i class="fa  fa-support"></i>
                            RNPL
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-5 col-md-4">
                                <div class="icon-big text-center icon-warning">
                                    <i class="nc-icon nc-money-coins text-success"></i>
                                </div>
                            </div>
                            <div class="col-7 col-md-8">
                                <div class="numbers">
                                    <p class="card-category">Referees</p>
                                    <?php
                        $sql1 = 'SELECT * FROM referee';
                        $stmt = $connection->prepare($sql1);
                        $stmt->execute();
                        $row = $stmt->rowCount();
                        ?>
                                    <p class="card-title"><?= $row; ?><p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer ">
                        <hr>
                        <div class="stats">
                        <i class="fa  fa-support"></i>
                            RNPL
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-5 col-md-4">
                                <div class="icon-big text-center icon-warning">
                                    <i class="nc-icon nc-vector text-danger"></i>
                                </div>
                            </div>
                            <div class="col-7 col-md-8">
                                <div class="numbers">
                                    <p class="card-category">Players</p>
                                    <?php
                        $sql1 = 'SELECT * FROM team_member';
                        $stmt = $connection->prepare($sql1);
                        $stmt->execute();
                        $row = $stmt->rowCount();
                        ?>
                                    <p class="card-title"><?= $row; ?><p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer ">
                        <hr>
                        <div class="stats">
                        <i class="fa  fa-support"></i>
                            RNPL
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-5 col-md-4">
                                <div class="icon-big text-center icon-warning">
                                    <i class="nc-icon nc-favourite-28 text-primary"></i>
                                </div>
                            </div>
                            <div class="col-7 col-md-8">
                                <div class="numbers">
                                    <p class="card-category">Card</p>
                                    <?php
                                $sql1 = 'SELECT * FROM match_day_reports WHERE card != ""';
                                $stmt = $connection->prepare($sql1);
                                $stmt->execute();
                                $row = $stmt->rowCount();
                        ?>
                                    <p class="card-title"><?= $row; ?><p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer ">
                        <hr>
                        <div class="stats">
                            <i class="fa  fa-support"></i>
                            RNPL
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Notification And Feeds -->
        <!-- ============================================================== -->
        <div class="row">
            <!-- Start Notification -->
            <div class="col-lg-8 col-md-12">
                <div class="card card-body mailbox">
                    <h5 class="card-title">Next Fixtures</h5>
                    <div class="message-center" style="height: 420px !important;">
                    <div id="select" class="table-responsive mt-3 no-wrap">
                                <table class="table vm no-th-brd pro-of-month">

                                    <tbody>
                                        <?php
                                        $sql = 'SELECT * FROM `calender` WHERE status="next"';
                                        $statement = $connection->prepare($sql);
                                        $statement->execute();
                                        $Teams = $statement->fetchAll(PDO::FETCH_OBJ);
                                        foreach($Teams as $team):
                                        ?>
                                        <tr class="active">
                                            <td style="text-align: right;">
                                            <?php
                                            $sql1 = 'SELECT name,logon FROM team WHERE name=:name';
                                            $stmt = $connection->prepare($sql1);
                                            $stmt->execute([':name' => $team->home]);
                                            while($data=$stmt->fetch(PDO::FETCH_ASSOC))
                                            $logo = $data['logon'];
                                            ?>
                                            <span class="round"><img src="../Logo/<?= $logo; ?>" alt="user" width="50" height="50">
                                           </span>

                                            </td>
                                            <td style="text-align: left;">
                                                <h4 class="mt-2"><?= $team->home; ?></h4>
                                            </td>

                                            <td style="text-align: center;">
                                                <h6><?= $team->time; ?></h6>
                                                <span class="text-muted"><?= $team->stadium; ?></span>
                                            </td>
                                            <td style="text-align: right;">
                                                <h4 class="mt-2"><?= $team->away; ?></h4>
                                            </td>
                                            <td style="text-align: left;">
                                            <?php
                                            $sql1 = 'SELECT name,logon FROM team WHERE name=:name';
                                            $stmt = $connection->prepare($sql1);
                                            $stmt->execute([':name' => $team->away]);
                                            while($data=$stmt->fetch(PDO::FETCH_ASSOC))
                                            $logo = $data['logon'];
                                            ?>
                                            <span class="round"><img src="../Logo/<?= $logo; ?>" alt="user" width="50" height="50">
                                           </span>

                                            </td>
                                            <td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                    </div>
                </div>
            </div>
            <!-- End Notification -->
            <!-- Start Feeds -->
            <div class="col-lg-4">
            <div class="card card-body mailbox">
                                <h5 class="card-title">Suspended Player</h5>
                                <div class="message-center" style="height: 420px !important;">  
                                   <?php
                                   $sql = 'SELECT * FROM team_member WHERE yellow >= 5 OR double_yellow >= 2 OR red >= 2';
                                   $statement = $connection->prepare($sql);
                                   $statement->execute();
                                   $Teams = $statement->fetchAll(PDO::FETCH_OBJ);
                                   foreach($Teams as $team):
                                   ?>
                                    <a href="#">
                                        <?php
                                        $sql1 = 'SELECT * FROM team WHERE team_id=?';
                                        $stmt = $connection->prepare($sql1);
                                        $stmt->execute([$team->team]);
                                        while($data=$stmt->fetch(PDO::FETCH_ASSOC))
                                        $logon = $data['logon'];
                                        ?>
                                    <span class="round" style="background:white;"><img src="../Logo/<?= $logon; ?>"
                                            alt="user" width="50" height="50"></span>
                                        <div class="mail-contnet">
                                            <h6 class="text-dark font-medium mb-0"><?= $team->fname; ?> <?= $team->lname; ?></h6> 
                                            <span class="mail-desc"><?= $team->position; ?></span>
                                        </div>
                                    </a>
                                    <?php endforeach; ?>
                             
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