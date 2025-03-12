<?php 
 	require_once '../../conf/config.php';

		//Verificamos la conexion
		if ($con->connect_error) {
			die("La conexión falló: " . $con->connect_error);
		}

		$id = $_POST['id'];
		$email = mysqli_real_escape_string($con, $_POST['email']);

		$verificarEmail = "SELECT * FROM usuarios WHERE email = '$email' and id = '$id' ";
		$result = $con->query($verificarEmail);
		$row = $result->fetch_assoc();
		if ($row['email'] == $email){

			$nombre = mysqli_real_escape_string($con, $_POST['nombre']);
				$email = mysqli_real_escape_string($con, $_POST['email']);
				$telefono = mysqli_real_escape_string($con, $_POST['telefono']);
				

				//Inserta la consulta para enviar por hash
				$query = "UPDATE usuarios SET nombre = '$nombre', email = '$email', telefono = '$telefono' WHERE id = {$id}";


				if (mysqli_query($con, $query)) {
					header("Location: ../encargados.php?m=2");
				} else {
					echo "Error: " . $query . "<br>" . mysqli_error($con);
				}

		} else{

			$checkEmail = "SELECT * FROM usuarios WHERE email = '$email' ";
			$result = $con->query($checkEmail);
			$count = mysqli_num_rows($result);
			if ($count == 1) {
				header("Location: ../encargados.php?m=3");
			} else {
				$nombre = mysqli_real_escape_string($con, $_POST['nombre']);
				$email = mysqli_real_escape_string($con, $_POST['email']);
				$telefono = mysqli_real_escape_string($con, $_POST['telefono']);


				//Inserta la consulta para enviar por hash
				$query = "UPDATE usuarios SET nombre = '$nombre', email = '$email', telefono = '$telefono' WHERE id = {$id}";


				if (mysqli_query($con, $query)) {
					header("Location: ../encargados.php?m=2");
				} else {
					echo "Error: " . $query . "<br>" . mysqli_error($con);
				}

			}

		}
		mysqli_close($con);
		?>