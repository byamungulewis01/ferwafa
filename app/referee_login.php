<?php
session_start();
require 'database.php';
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $code = $_POST['code'];

 $sql1 = 'SELECT * FROM referee WHERE email=:email';
 $stmt = $connection->prepare($sql1);
 $stmt->execute([':email' => $email]);
 $row = $stmt->rowCount();
 if ($row > 0) {
    $sql1 = 'SELECT access_code FROM weekly_fixtures WHERE access_code=:access_code';
    $stmt = $connection->prepare($sql1);
    $stmt->execute([':access_code' => $code]);
    $row = $stmt->rowCount();
    if ($row > 0) {                       
           $_SESSION['email'] = $email;
           $_SESSION['access'] = $code;
           header("Location: ../referee/");      
    }
    else
    {
       $_SESSION['expire']; 
       header("Location: ../referee.php");
    }
 }
 else
 { 
    $_SESSION['invalidMail']; 
    header("Location: ../referee.php");
 }
}
?>