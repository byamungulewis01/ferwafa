<?php
session_start();
require '../../app/database.php';

if (isset($_POST['submit'])) {
  $fname = $_POST['fname'];
  $lname  = $_POST['lname'];
  $post =  $_POST['post'];
  $role = 'staff';
  $team_id = $_POST['team_id'];

  try {
    $sql = 'INSERT INTO `team_member`(`fname`, `lname`,role_in_team ,`post`, `team`) VALUES (?,?,?,?,?)';
    $stmt = $connection->prepare($sql);
    if($stmt->execute([$fname,$lname,$role,$post,$team_id]))
    {

        header("Location: ../team_member.php?staff");
  } 
}
catch (PDOException $e) {
  echo $e->getMessage();

  // header("Location: ../team_member.php?error");
  }
   
 }
?>