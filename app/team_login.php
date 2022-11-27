<?php
session_start();
require 'database.php';
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
 $sql1 = 'SELECT * FROM team WHERE username=? AND password = ?';
 $stmt = $connection->prepare($sql1);
 $stmt->execute([$username,$password]);
 $row = $stmt->rowCount();
 if ($row > 0) {
 while($data=$stmt->fetch(PDO::FETCH_ASSOC))  {                          
        $_SESSION['Team_id'] = $data['team_id'];
        $_SESSION['Team_Name'] = $data['name'];
        $_SESSION['logo'] = $data['logon'];
        header("Location: ../teams/");
 }       
 }
 else
 {
    header("Location: ../teams.php?failure");
 }
}