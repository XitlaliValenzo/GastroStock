<?php 
 	require_once '../../conf/config.php';

		//Verificamos la conexion
		if ($con->connect_error) {
			die("La conexión falló: " . $con->connect_error);
		}

		$id = $_POST['id'];
		$matricula = mysqli_real_escape_string($con, $_POST['matricula']);

		$verificarMatricula = "SELECT * FROM usuarios WHERE matricula = '$matricula' and id = '$id' ";
		$result = $con->query($verificarMatricula);
		$row = $result->fetch_assoc();
		if ($result ->num_rows > 0 && $row['matricula'] == $matricula){
			
			$nombre = mysqli_real_escape_string($con, $_POST['nombre']);
			
			$email = mysqli_real_escape_string($con, $_POST['email']);
			
			$grupo = mysqli_real_escape_string($con, $_POST['grupo']);
				


				//Inserta la consulta para enviar por hash
				$query = "UPDATE usuarios SET nombre = '$nombre', email = '$email', grupo = '$grupo' WHERE id = {$id}";


				if (mysqli_query($con, $query)) {
					header("Location: ../alumnos.php?m=2");
				} else {
					echo "Error: " . $query . "<br>" . mysqli_error($con);
				}

		} else{

			$checkMatricula = "SELECT * FROM usuarios WHERE matricula = '$matricula' ";
			$result = $con->query($checkMatricula);
			$count = mysqli_num_rows($result);
			if ($count == 1) {
				header("Location: ../alumnos.php?m=3");
			} else {
				$nombre = mysqli_real_escape_string($con, $_POST['nombre']);
				$email = mysqli_real_escape_string($con, $_POST['email']);
				$matricula = mysqli_real_escape_string($con, $_POST['matricula']);
				$cuatrimestre = mysqli_real_escape_string($con, $_POST['cuatrimestre']);
			$grupo = mysqli_real_escape_string($con, $_POST['grupo']);


				//Inserta la consulta para enviar por hash
				$query = "UPDATE usuarios SET nombre = '$nombre', matricula = '$matricula', email = '$email', cuatrimestre = '$cuatrimestre', grupo = '$grupo' WHERE id = {$id}";


				if (mysqli_query($con, $query)) {
					header("Location: ../alumnos.php?m=2");
				} else {
					echo "Error: " . $query . "<br>" . mysqli_error($con);
				}

			}

		}
		mysqli_close($con);
		?>