<?php
  require '../app/database.php';
  if (isset($_POST['refeere_id'])) {
    $refeere_id = $_POST['refeere_id'];
    $sql = 'UPDATE referee SET status=1 WHERE referee_id=:refeere_id';
    $statement = $connection->prepare($sql);
    if ($statement->execute([
      ':refeere_id' => $refeere_id
      ])) {
        $sql = 'SELECT * FROM referee WHERE status=0';
        $statement = $connection->prepare($sql);
        $statement->execute();
        $Referees = $statement->fetchAll(PDO::FETCH_OBJ);
        ?>
  <select id="select2" name="select2" class="form-control form-control-line">
  <option value="none" selected="" disabled="">Assistant Referee 1</option>                 
         <?php foreach($Referees as $Referee): ?>
    <option value="<?= $Referee->referee_id; ?>"><?= $Referee->fname; ?> <?= $Referee->lname; ?></option>
    <?php endforeach; ?>                                      
         </select>
    
         <?php 
         }
  }
?>
<?php 
  if (isset($_POST['AssRef1'])) {
    $AssRef1 = $_POST['AssRef1'];
    $sql = 'UPDATE referee SET status=1 WHERE referee_id=:AssRef1';
    $statement = $connection->prepare($sql);
    if ($statement->execute([
      ':AssRef1' => $AssRef1
      ])) {
        $sql = 'SELECT * FROM referee WHERE status=0';
        $statement = $connection->prepare($sql);
        $statement->execute();
        $Referees = $statement->fetchAll(PDO::FETCH_OBJ);
        ?>
<select id="select3" name="select3" class="form-control form-control-line">
  <option value="none" selected="" disabled="">Assistant Referee 2</option>
                      
         <?php foreach($Referees as $Referee): ?>
    <option value="<?= $Referee->referee_id; ?>"><?= $Referee->fname; ?> <?= $Referee->lname; ?></option>
    <?php endforeach; ?>                                      
         </select>
    
         <?php 
         }
  }
?>
<?php 
  if (isset($_POST['AssRef2'])) {
    $AssRef2 = $_POST['AssRef2'];
    $sql = 'UPDATE referee SET status=1 WHERE referee_id=:AssRef2';
    $statement = $connection->prepare($sql);
    if ($statement->execute([
      ':AssRef2' => $AssRef2
      ])) {
        $sql = 'SELECT * FROM referee WHERE status=0';
        $statement = $connection->prepare($sql);
        $statement->execute();
        $Referees = $statement->fetchAll(PDO::FETCH_OBJ);
        ?>
<select id="select4" name="select4" class="form-control form-control-line">
  <option value="none" selected="" disabled="">Official referee</option>
           
         <?php foreach($Referees as $Referee): ?>
    <option value="<?= $Referee->referee_id; ?>"><?= $Referee->fname; ?> <?= $Referee->lname; ?></option>
    <?php endforeach; ?>                                      
         </select>
    
         <?php 
         }
  }
?>
<?php 
  if (isset($_POST['official'])) {
    $official = $_POST['official'];
    $sql = 'UPDATE referee SET status=1 WHERE referee_id=:official';
    $statement = $connection->prepare($sql);
    if ($statement->execute([
      ':official' => $official
      ])) {
         }
  }
?>