<?php
	session_start();
	session_destroy();
	unset($_SESSION['NAME']);
	unset($_SESSION['ROLE']);
	unset($_SESSION['ID']);
	header("Location: index.php");
	die();
?>