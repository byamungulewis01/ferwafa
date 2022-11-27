<?php require_once 'header.php'; ?>
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->

        <!-- ============================================================== -->
        <!-- Notification And Feeds -->
        <!-- ============================================================== -->
        <div class="row">

            <!-- Start Feeds -->
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive mt-3 no-wrap">
                            <table class="table vm no-th-brd pro-of-month">

                                <tbody>
                                    <?php
                                        $sql = 'SELECT * FROM weekly_fixtures INNER JOIN calender ON weekly_fixtures.match_id=calender.id AND weekly_fixtures.access_code=?';
                                        $statement = $connection->prepare($sql);
                                        $statement->execute([$_SESSION['access']]);
                                        $Teams = $statement->fetchAll(PDO::FETCH_OBJ);
                                        foreach($Teams as $team):
                                        ?>
                                    <tr class="active">
                                    <tr>
                                        <td><span class="text-muted">Week <?= $team->week; ?></span></td>
                                    </tr>
                                    <td style="text-align: right;">
                                        <?php
                                            $sql1 = 'SELECT team_id,name,logon FROM team WHERE name=:name';
                                            $stmt = $connection->prepare($sql1);
                                            $stmt->execute([':name' => $team->home]);
                                            while($data=$stmt->fetch(PDO::FETCH_ASSOC)){
                                            $logo = $data['logon'];
                                            $teamA = $data['team_id'];
                                        }
                                            ?>
                                        <span class="round"><img src="../Logo/<?= $logo; ?>" alt="user" width="50"
                                                height="50">
                                        </span>

                                    </td>
                                    <td style="text-align: left;">
                                       <a href="report.php?team=<?= $team->home; ?>&week=<?= $team->week; ?>&home"> <h4 class="mt-2"><?= $team->home; ?></h4></a>
                                    </td>
                                    <td>
                                    <?php
                                            $sql1 = 'SELECT SUM(goal) AS T_goal FROM match_day_reports WHERE team=? AND week=?';
                                            $stmt = $connection->prepare($sql1);
                                            $stmt->execute([$teamA,$team->week]);
                                            while($data=$stmt->fetch(PDO::FETCH_ASSOC))
                                            $T_goal = $data['T_goal'];
                                            ?>
                                        <h3><?= $T_goal; ?></h3>
                                    </td>
                                    <td style="text-align: center;">
                                        <h6><?= $team->time; ?></h6>
                                        <span class="text-muted"><?= $team->stadium; ?></span>
                                    </td>
                                    <td>
                                    <?php
                                            $sql1 = 'SELECT team_id,name,logon FROM team WHERE name=:name';
                                            $stmt = $connection->prepare($sql1);
                                            $stmt->execute([':name' => $team->away]);
                                            while($data=$stmt->fetch(PDO::FETCH_ASSOC)){
                                            $logo = $data['logon'];
                                            $teamB = $data['team_id'];
                                        }
                                            ?>
                                            <?php
                                            $sql1 = 'SELECT SUM(goal) AS T_goal FROM match_day_reports WHERE team=? AND week=?';
                                            $stmt = $connection->prepare($sql1);
                                            $stmt->execute([$teamB,$team->week]);
                                            while($data=$stmt->fetch(PDO::FETCH_ASSOC))
                                            $T_goal = $data['T_goal'];
                                            ?>
                                        <h3><?= $T_goal; ?></h3>
                                    </td>
                                    <td style="text-align: right;">
                                       <a href="report.php?team=<?= $team->away; ?>&week=<?= $team->week; ?>&away"> <h4 class="mt-2"><?= $team->away; ?></h4></a>
                                    </td>
                                    <td style="text-align: left;">
                                     
                                        <span class="round"><img src="../Logo/<?= $logo; ?>" alt="user" width="50"
                                                height="50">
                                        </span>

                                    </td>
                                   
                                        </tr>
                                        <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      
        <!-- Start Notification -->

    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <?php require 'footer.php'; ?>