<?php
require 'init.php';
if (isset($_POST['submit'])) {
  $fname = $_POST['fname'];
  $lname  = $_POST['lname'];
  $email =  $_POST['email'];
  $profile=$_FILES['profile']['name'];
  $temp_n=$_FILES['profile']['tmp_name'];
  $store ="../../Profile/" .basename($_FILES['profile']['name']);
  move_uploaded_file($temp_n, $store);

  try {
    $sql = 'INSERT INTO `referee`(`fname`, `lname`, `image` ,`email`) VALUES (:fname, :lname, :image, :email)';
    $stmt = $connection->prepare($sql);
    if($stmt->execute([':fname' => $fname, ':lname' => $lname, ':image' => $profile, ':email'=> $email]))
    {

        header("Location: ../referee.php?registered");
  } 
}
catch (PDOException $e) {
  //echo $e->getMessage();
header("Location: ../referee.php?error");
  }
   
 }
?>