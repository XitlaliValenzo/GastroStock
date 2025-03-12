<?php
  session_start();
  //incluimos la conexion a la BD
  include_once('conf/config.php');

  if (!isset($_SESSION['ID'])){
   header("Location: index.php");
   exit();
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
	<title>Inicio</title>

</head>
<body>
		
		<?php 
			if ($_SESSION['ROLE'] == 'alumno') {

				require_once('alumno/alumno.php'); ?>

			<?php }
			if ($_SESSION['ROLE'] == 'encargado') {

				include_once('encargado/inicio.php'); ?>

			<?php }
			if ($_SESSION['ROLE'] == 'administrador') {

				include_once('administrador/inicio.php'); ?>
				




			<?php }






		?>
	
</body>
</html>