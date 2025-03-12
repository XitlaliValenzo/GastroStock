<?php 
 	require_once '../../conf/config.php';

 	if($_POST){
		$observaciones = $_POST['observaciones'];
		$id = $_POST['id'];

		$sql = "UPDATE solicitud SET observaciones = '$observaciones' WHERE id = {$id}";

		if($con -> query($sql) === TRUE) {
			header("Location: ../historial.php?m=1");
		} else {
			echo "Error al actualizar el registro" . $con ->error;
		}
	$con ->close();
 	}
?>