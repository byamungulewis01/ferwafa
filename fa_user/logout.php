<?php 
session_start();
	session_destroy();
	if ($_SESSION['fa_user']) {
	header("location: ../");
}
 ?>