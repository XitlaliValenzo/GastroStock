<?php
	
	$hostname = "localhost";
	$username = "u647180004_OPUbF";
	$password = "GastroStock*1";
	$dbname = "u647180004_chrYa";

	$con = new mysqli($hostname, $username, $password, $dbname);

	if ($con->connect_error) {
		die("Conexion fallida; " . $con->connect_error);
	}

?>