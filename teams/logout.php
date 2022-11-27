<?php 
session_start();
	session_destroy();
	if ($_SESSION['Team_Name']) {
	header("location: ../teams.php");
}
 ?>