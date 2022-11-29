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
            <!-- Column -->
            <div class="col-lg-8 d-flex align-items-stretch">
                <div class="card w-100">
                    <div class="card-body">
                        <div class="d-flex">
                            <div>
                                <h5 class="card-title">Season Calender</h5>
                            </div>
                            <!-- <div class="ms-auto">
                            <select class="form-control form-control-line" name="season">
                                    <option value="2018 - 2019">2018 - 2019</option>
                                    <option value="2019 - 2020">2019 - 2020</option>
                                    <option value="2021 - 2022" selected>2021 - 2022</option>
                                    <option value="2022 - 2023">2022 - 2023</option>

                                </select>
                                    </div> -->
                        </div>
                        <div class="message-center" style="height: 450px !important;">
                            <div id="select" class="table-responsive mt-3 no-wrap">
                                <table class="table vm no-th-brd pro-of-month">

                                    <tbody>
                                        <?php
                                        $sql = 'SELECT * FROM `calender`';
                                        $statement = $connection->prepare($sql);
                                        $statement->execute();
                                        $Teams = $statement->fetchAll(PDO::FETCH_OBJ);
                                        foreach($Teams as $team):
                                        ?>
                                        <tr class="active">
                                           <tr><td><span class="text-muted">Week <?= $team->week; ?></span></td></tr>
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
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-lg-4 col-md-12">
                <div class="card card-body mailbox">
                    <h5 class="card-title mb-5">Upload season Calender</h5>
                    <form class="form-horizontal form-material mx-2" method="post" action="controls/upload_calender.php"
                        enctype="multipart/form-data">
                        <div class="form-group">
                            <div class="col-md-12">
                                <input type="file" accept=".csv" name="file" class="form-control form-control-line" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <select class="form-control form-control-line" name="season" required>
                                    <option selected disabled>Select Season year</option>
                                    <option value="2018 - 2019">2018 - 2019</option>
                                    <option value="2019 - 2020">2019 - 2020</option>
                                    <option value="2021 - 2022">2021 - 2022</option>
                                    <option value="2022 - 2023">2022 - 2023</option>

                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <button name="import" class="btn btn-success">Uploaded</button>
                            </div>
                        </div>
                    </form>
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
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <?php require 'footer.php'; ?>