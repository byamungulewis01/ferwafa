<?php
session_start();
require '../../app/database.php';

if (isset($_POST['submit'])) {
  $fname = $_POST['fname'];
  $lname  = $_POST['lname'];
  $number =  $_POST['number'];
  $position = $_POST['position'];
  $role = 'player';
  $team_id = $_POST['team_id'];

  try {
      $sql = "SELECT number,team FROM team_member WHERE team=? AND number=?";
      $stmt = $connection->prepare($sql);
      $stmt->execute([$team_id,$number]);
      $row = $stmt->rowCount();
      if ($row > 0) {
        header("Location: ../team_member.php?num_taken");
      } else {
        $sql = 'INSERT INTO `team_member`(`fname`, `lname`, `number`,role_in_team,`position`, `team`) VALUES (?,?,?,?,?,?)';
        $stmt = $connection->prepare($sql);
        if($stmt->execute([$fname,$lname,$number,$role,$position,$team_id]))
        {
    
            header("Location: ../team_member.php?player");
      } 
      }
}
catch (PDOException $e) {
  echo $e->getMessage();

   //header("Location: ../team_member.php?error");
  }
   
 }
?>