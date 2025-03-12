<?php 
 	require_once 'conf/config.php';

 	if($_POST){
		$password = $con->real_escape_string(password_hash($_POST['password'], PASSWORD_DEFAULT));
		$id = $_POST['id'];

		$sql = "UPDATE usuarios SET password = '$password' WHERE id = {$id}";

		if($con -> query($sql) === TRUE) {
			header("Location: password_actualizada.php");
		} else {
			echo "Error al actualizar el registro" . $con ->error;
		}
	$con ->close();
 	}
?>