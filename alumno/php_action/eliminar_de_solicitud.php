<?php
	$index = $_GET["in"];
	session_start();

	if(isset($_SESSION['solicitud'])){
		$solicitud = $_SESSION['solicitud'];
		unset($solicitud[$index]);
		$solicitud = array_values($solicitud);


		$_SESSION['solicitud'] = $solicitud;

		if(count($solicitud) == 0){
			unset($_SESSION['solicitud']);
		} 


	}
	header("Location: ../../home.php");
?>