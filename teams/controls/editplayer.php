<?php
session_start();
require '../../app/database.php';

if (isset($_POST['submit'])) {
  $fname = $_POST['fname'];
  $lname  = $_POST['lname'];
  $position = $_POST['position'];
  $member_id = $_POST['member_id'];
 
  try {
  
        $sql = 'UPDATE `team_member` SET `fname`=?, `lname`=?, `position`=? WHERE member_id =?';
        $stmt = $connection->prepare($sql);
        if($stmt->execute([$fname,$lname,$position,$member_id]))
        {
            $_SESSION['msg'] = '<script>swal("Good job!", "Player updated Succesfully", "success");</script>';
            header("Location: ../team_member.php");
      } 
   
}
catch (PDOException $e) {
  echo $e->getMessage();

   //header("Location: ../team_member.php?error");
  }
}
if (isset($_POST['delete'])) {
    $member_id = $_POST['member_id'];
    $sql = 'DELETE FROM `team_member` WHERE member_id =?';
    $stmt = $connection->prepare($sql);
    if($stmt->execute([$member_id]))
    {
        $_SESSION['msg'] = '<script>swal("Good job!", "Player Deleted Successfully ", "success");</script>';
        header("Location: ../team_member.php");
  } 
}
?>