<?php 
 	require_once '../../conf/config.php';
 	if($_POST){
 		$id = $_POST['id'];
 		$activo = 2;

		$sql = "UPDATE usuarios SET activo = '$activo' WHERE id = {$id}";

		if($con -> query($sql) === TRUE) {
			header("Location: ../encargados.php?m=4");
		} else {
			echo "Error al actualizar el registro" . $con ->error;
		}
	$con ->close();
 	}
?>