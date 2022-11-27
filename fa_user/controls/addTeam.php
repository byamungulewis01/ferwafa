<?php
require 'init.php';
if (isset($_POST['submit'])) {
  $team_name = $_POST['team_name'];
  $stadium  = $_POST['stadium'];
  $username =  $_POST['username'];
  $password = $_POST['password'];
  $logon=$_FILES['logon']['name'];
  $temp_n=$_FILES['logon']['tmp_name'];
  $store ="../../Logo/" .basename($_FILES['logon']['name']);
  move_uploaded_file($temp_n, $store);

  try {
    $sql = 'INSERT INTO `team`(`name`, `logon`, `stadium` ,`username`, `password`) VALUES (:name, :logon, :stadium, :username, :password)';
    $stmt = $connection->prepare($sql);
    if($stmt->execute([':name' => $team_name, ':logon' => $logon, ':stadium' => $stadium, ':username'=> $username, ':password'=>$password]))
    {

        header("Location: ../teams.php?registered");
  } 
}
catch (PDOException $e) {
  echo $e->getMessage();

  // header("Location: ../teams.php?error");
  }
   
 }
?>