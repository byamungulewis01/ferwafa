<?php 
session_start();
	session_destroy();
	if ($_SESSION['email']) {
	header("location: ../referee.php");
}
 ?>