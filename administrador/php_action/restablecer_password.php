<?php 
 	require_once '../../conf/config.php';

 	if($_POST){
		$password = 12345678; //Contraseña predeterminada
		$passHash = password_hash($password, PASSWORD_DEFAULT);
		$id = $_POST['id'];

		$sql = "UPDATE usuarios SET password = '$passHash' WHERE id = {$id}";

		if($con -> query($sql) === TRUE) {
			header("Location: ../encargados.php?m=5");
		} else {
			echo "Error al actualizar el registro" . $con ->error;
		}
	$con ->close();
 	}
?>