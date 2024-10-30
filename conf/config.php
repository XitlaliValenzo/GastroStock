<?php
	
	$hostname = "localhost";
	$username = "root";
	$password = "";
	$dbname = "gastro_fnalv2";

	$con = new mysqli($hostname, $username, $password, $dbname);

	if ($con->connect_error) {
		die("Conexion fallida; " . $con->connect_error);
	}

?>