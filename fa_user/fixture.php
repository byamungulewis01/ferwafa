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
                                <h5 class="card-title">Match day fixtures</h5>
                            </div>

                        </div>
                        <div class="table-responsive no-wrap">
                            <table class="table vm no-th-brd pro-of-month">
                                <tbody>
                                    <?php
                                        $sql = 'SELECT * FROM `calender` where status="next"';
                                        $statement = $connection->prepare($sql);
                                        $statement->execute();
                                        $Teams = $statement->fetchAll(PDO::FETCH_OBJ);
                                        foreach($Teams as $team):
                                        ?>
                                    <tr class="active">
                                    <tr>
                                        <td><span class="text-muted">Week <?= $team->week; ?></span></td>
                                    </tr>
                                    <td style="text-align: right;">
                                        <?php
                                            $sql1 = 'SELECT name,logon FROM team WHERE name=:name';
                                            $stmt = $connection->prepare($sql1);
                                            $stmt->execute([':name' => $team->home]);
                                            while($data=$stmt->fetch(PDO::FETCH_ASSOC))
                                            $logo = $data['logon'];
                                            ?>
                                        <span class="round"><img src="../Logo/<?= $logo; ?>" alt="user" width="50"
                                                height="50">
                                        </span>

                                    </td>
                                    <td style="text-align: left;">
                                        <h4 class="mt-2"><?= $team->home; ?></h4>
                                    </td>

                                    <td style="text-align: center;">
                                        <h6><a href="?set=<?= $team->id ?>">Set referee</a></h6>

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
                                        <span class="round"><img src="../Logo/<?= $logo; ?>" alt="user" width="50"
                                                height="50">
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
            <!-- Column -->
            <!-- Column -->
            <div class="col-lg-4 col-md-12">
                <div class="card card-body mailbox">
                    <h5 class="card-title mb-5">MatchDay Referees</h5>

                    <?php
                           if (isset($_GET['set'])) {
                            $id = $_GET['set'];
                            $sql = 'SELECT * FROM `weekly_fixtures` where match_id=?';
                            $statement = $connection->prepare($sql);
                            $statement->execute([$id]);
                            $row = $statement->rowCount();
                            if ($row > 0) {
                            $Referees = $statement->fetchAll(PDO::FETCH_OBJ);
                            foreach($Referees as $match):
                                ?>
                    <form class="form-horizontal form-material mx-2" method="post" action="controls/reset_ref.php">
                        <div class="form-group">
                            <label class="col-md-12">Match Referee</label>
                            <div class="col-md-12">
                            <input type="hidden" name="match_id" value="<?= $_GET['set'] ?>"> 
                            <?php
                                        $referee = $match->referee;
                                         $sql = 'SELECT * FROM referee WHERE referee_id=?';
                                         $statement = $connection->prepare($sql);
                                         $statement->execute([$referee]);
                                         $Referes = $statement->fetchAll(PDO::FETCH_OBJ);
                                         foreach($Referes as $refere):
                                        ?>   
                                        <input type="hidden" name="select1" value="<?= $refere->referee_id; ?>">                                                                                       
                                <input type="text" value="<?= $refere->fname; ?> <?= $refere->lname; ?>" class="form-control form-control-line">
                                       <?php endforeach; ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">First Assistant Referee</label>
                            <div class="col-md-12">
                                       <?php
                                        $assistant1 = $match->assistant1;
                                         $sql = 'SELECT * FROM referee WHERE referee_id=?';
                                         $statement = $connection->prepare($sql);
                                         $statement->execute([$assistant1]);
                                         $Referes = $statement->fetchAll(PDO::FETCH_OBJ);
                                         foreach($Referes as $refere):
                                        ?>    
                                <input type="hidden" name="select2" value="<?= $refere->referee_id; ?>">                                                                                       
                                <input type="text" value="<?= $refere->fname; ?> <?= $refere->lname; ?>" class="form-control form-control-line">
                                       <?php endforeach; ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Second Assistant Referee</label>
                            <div class="col-md-12">
                            <?php
                                        $assistant2 = $match->assistant2;
                                         $sql = 'SELECT * FROM referee WHERE referee_id=?';
                                         $statement = $connection->prepare($sql);
                                         $statement->execute([$assistant2]);
                                         $Referes = $statement->fetchAll(PDO::FETCH_OBJ);
                                         foreach($Referes as $refere):
                                        ?>   
                                <input type="hidden" name="select3" value="<?= $refere->referee_id; ?>">                                                                                       
                                <input type="text" value="<?= $refere->fname; ?> <?= $refere->lname; ?>" class="form-control form-control-line">
                                       <?php endforeach; ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Official Referee</label>
                            <div class="col-md-12">
                            <?php
                                        $official = $match->official;
                                         $sql = 'SELECT * FROM referee WHERE referee_id=?';
                                         $statement = $connection->prepare($sql);
                                         $statement->execute([$official]);
                                         $Referes = $statement->fetchAll(PDO::FETCH_OBJ);
                                         foreach($Referes as $refere):
                                        ?>    
                                <input type="hidden" name="select4" value="<?= $refere->referee_id; ?>">                                                                                       
                                <input type="text" value="<?= $refere->fname; ?> <?= $refere->lname; ?>" class="form-control form-control-line">
                                       <?php endforeach; ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-12">
                                <button name="submit" class="btn btn-success">Reset</button>
                            </div>
                        </div>
                    </form>
                    <?php endforeach; ?>
                    <?php
                            }
                           else{
                            ?>
                    <form class="form-horizontal form-material mx-2" method="post" action="controls/setReferee.php">
                        <div class="form-group">
                            <div class="col-sm-12">
                                <input type="hidden" name="match_id" value="<?= $_GET['set']; ?>">
                                <select id="select1" name="select1" class="form-control form-control-line">
                                    <option selected disabled>Select Match Referee</option>
                                    <?php
                                            $sql = 'SELECT * FROM referee WHERE status=0';
                                            $statement = $connection->prepare($sql);
                                            $statement->execute();
                                            $Referees = $statement->fetchAll(PDO::FETCH_OBJ);
                                                ?>
                                    <?php foreach($Referees as $Referee): ?>
                                    <option value="<?= $Referee->referee_id; ?>"><?= $Referee->fname; ?>
                                        <?= $Referee->lname; ?></option>
                                    <?php endforeach; ?>

                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <select id="select2" name="select2" class="form-control form-control-line">
                                    <option selected>First Assistant Referee</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <select id="select3" name="select3" class="form-control form-control-line">
                                    <option selected>Second Assistant Referee</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <select id="select4" name="select4" class="form-control form-control-line">
                                    <option selected>Select Official Referee</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <button name="submit" class="btn btn-success">Set referees</button>
                            </div>
                        </div>
                    </form>
                    <?php
                           }
                           ?>

                    <?php
                               }
                            
                               else {
                            ?>
                    <center class="mt-4">
                        <img src="../Logo/Ferwafa_logo.png" class="img-circle" width="150" />
                        <h4 class="card-title mt-2">Primus National League</h4>
                        <h6 class="card-subtitle">Week <?= $team->week; ?> Fixtures</h6>
                        <div class="row text-center justify-content-md-center">
                            <div class="col-2"></div>
                            <div class="col-2"></div>

                        </div>
                    </center>
                    <?php
                               }
                               ?>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
    <?php require 'footer.php'; ?>