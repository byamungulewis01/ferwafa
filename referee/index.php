<?php require_once 'header.php'; ?>
<!-- ============================================================== -->
<div class="container-fluid">

    <div class="row">
        <!-- Start Feeds -->
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body bg-light">
                    <div class="table-responsive mt-1 no-wrap">
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
                                    <td><span class="text-bold">Week <?= $team->week; ?> Fixtures</span></td>
                                </tr>

                                <td style="text-align: center;">
                                    <h6>Stadium</h6>
                                    <span class="text-muted"><?= $team->stadium; ?></span>

                                </td>

                                <td style="text-align: center;">
                                    <h6>Time</h6>
                                    <span class="text-muted"><?= $team->time; ?></span>
                                </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
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
                                    <td>
                                        <a href="report.php?team=<?= $team->home; ?>&week=<?= $team->week; ?>">
                                            <h4 class="mt-2"><?= $team->home; ?></h4>
                                        </a>
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
                                </tr>
                                <tr class="active">
                                    <?php
                                            $sql1 = 'SELECT team_id,name,logon FROM team WHERE name=:name';
                                            $stmt = $connection->prepare($sql1);
                                            $stmt->execute([':name' => $team->away]);
                                            while($data=$stmt->fetch(PDO::FETCH_ASSOC)){
                                            $logo = $data['logon'];
                                            $teamB = $data['team_id'];
                                        }
                                            ?>
                                    <td style="text-align: right;">

                                        <span class="round"><img src="../Logo/<?= $logo; ?>" alt="user" width="50"
                                                height="50">
                                        </span>

                                    </td>
                                    <td>
                                        <a href="report.php?team=<?= $team->away; ?>&week=<?= $team->week; ?>">
                                            <h4 class="mt-2"><?= $team->away; ?></h4>
                                        </a>
                                    </td>
                                    <td>
                                        <?php
                                        $sql1 = 'SELECT SUM(goal) AS T_goal FROM match_day_reports WHERE team=? AND week=?';
                                        $stmt = $connection->prepare($sql1);
                                        $stmt->execute([$teamB,$team->week]);
                                        while($data=$stmt->fetch(PDO::FETCH_ASSOC))
                                        $T_goal = $data['T_goal'];
                                        ?>
                                        <h3><?= $T_goal; ?></h3>
                                    </td>

                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card card-body mailbox">
                <h5 class="card-title">All Referees</h5>
                <div class="message-center">
                    <?php
                    $sql = 'SELECT * FROM `weekly_fixtures` WHERE access_code=?';
                    $statement = $connection->prepare($sql);
                    $statement->execute([$_SESSION['access']]);
                    $Referees = $statement->fetchAll(PDO::FETCH_OBJ);
                    foreach($Referees as $referee):
                        $ref = $referee->referee;
                        $ass1 = $referee->assistant1;
                        $ass2 = $referee->assistant2;
                        $offi = $referee->official;

                    ?>
                    <?php endforeach; ?>
                    <?php
                    $sql = 'SELECT * FROM `referee` WHERE referee_id=?';
                    $statement = $connection->prepare($sql);
                    $statement->execute([$ref]);
                    $Referees = $statement->fetchAll(PDO::FETCH_OBJ);
                    foreach($Referees as $referee):
                    ?>
                    <a href="#">
                        <span class="round" style="background:white;"><img src="../Profile/<?= $referee->image; ?>"
                                alt="user" width="50" height="50"></span>
                        <div class="mail-contnet">
                            <h6 class="text-dark font-medium mb-0"><?= $referee->fname; ?> <?= $referee->lname; ?></h6>
                            <span class="mail-desc">Referee</span>
                        </div>
                    </a>
                    <?php endforeach; ?>
                    <?php
                    $sql = 'SELECT * FROM `referee` WHERE referee_id=?';
                    $statement = $connection->prepare($sql);
                    $statement->execute([$ass1]);
                    $Referees = $statement->fetchAll(PDO::FETCH_OBJ);
                    foreach($Referees as $referee):
                    ?>
                    <a href="#">
                        <span class="round" style="background:white;"><img src="../Profile/<?= $referee->image; ?>"
                                alt="user" width="50" height="50"></span>
                        <div class="mail-contnet">
                            <h6 class="text-dark font-medium mb-0"><?= $referee->fname; ?> <?= $referee->lname; ?></h6>
                            <span class="mail-desc">assistant Referee 1</span>
                        </div>
                    </a>
                    <?php endforeach; ?>
                    <?php
                    $sql = 'SELECT * FROM `referee` WHERE referee_id=?';
                    $statement = $connection->prepare($sql);
                    $statement->execute([$ass2]);
                    $Referees = $statement->fetchAll(PDO::FETCH_OBJ);
                    foreach($Referees as $referee):
                    ?>
                    <a href="#">
                        <span class="round" style="background:white;"><img src="../Profile/<?= $referee->image; ?>"
                                alt="user" width="50" height="50"></span>
                        <div class="mail-contnet">
                            <h6 class="text-dark font-medium mb-0"><?= $referee->fname; ?> <?= $referee->lname; ?></h6>
                            <span class="mail-desc">assistant Referee 2</span>
                        </div>
                    </a>
                    <?php endforeach; ?>
                    <?php
                    $sql = 'SELECT * FROM `referee` WHERE referee_id=?';
                    $statement = $connection->prepare($sql);
                    $statement->execute([$offi]);
                    $Referees = $statement->fetchAll(PDO::FETCH_OBJ);
                    foreach($Referees as $referee):
                    ?>
                    <a href="#">
                        <span class="round" style="background:white;"><img src="../Profile/<?= $referee->image; ?>"
                                alt="user" width="50" height="50"></span>
                        <div class="mail-contnet">
                            <h6 class="text-dark font-medium mb-0"><?= $referee->fname; ?> <?= $referee->lname; ?></h6>
                            <span class="mail-desc">Official </span>
                        </div>
                    </a>
                    <?php endforeach; ?>

                </div>
            </div>
        </div>
        <div class="col-lg-6" style="text-align:center;">
            <a href="logout.php">
                <div class="card card-body">
                    <h5>Sign out</h5>
                </div>
            </a>
        </div>
    </div>

</div>

<!-- Start Notification -->

</div>
<!-- ============================================================== -->
<!-- End Container fluid  -->
<?php require 'footer.php'; ?>