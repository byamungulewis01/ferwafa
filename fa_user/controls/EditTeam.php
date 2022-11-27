<?php
require 'init.php';
if (isset($_POST['submit'])) {
  $team_id = $_POST['team_id'];
  $team_name = $_POST['team_name'];
  $stadium  = $_POST['stadium'];
  $username =  $_POST['username'];
  $password = $_POST['password'];
  $logon=$_FILES['logon']['name'];
  $temp_n=$_FILES['logon']['tmp_name'];
  $store ="../../Logo/" .basename($_FILES['logon']['name']);
  move_uploaded_file($temp_n, $store);

  try {
    $sql = 'UPDATE `team` SET `name`=:name, `logon`=:logon, `stadium`=:stadium ,`username`=:username, `password`=:password
    WHERE team_id=:team_id';
    $stmt = $connection->prepare($sql);
    if($stmt->execute([':name' => $team_name, ':logon' => $logon, ':stadium' => $stadium, ':username'=> $username, ':password'=>$password,':team_id'=>$team_id]))
    {

        header("Location: ../teams.php?Updated");
  } 
}
catch (PDOException $e) {
  echo $e->getMessage();

  // header("Location: ../teams.php?error");
  }
   
 }
?>