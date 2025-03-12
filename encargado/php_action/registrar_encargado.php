<?php
		include '../../conf/config.php';

		//Verificamos la conexion
		if ($con->connect_error) {
			die("La conexión falló: " . $con->connect_error);
		}

		//Evita la inyección de SQL limpiando la entrada del usuario
		$email = mysqli_real_escape_string($con, $_POST['email']);

		//Consultamos para verificar si el correo electrónico ya existe
		$checkEmail = "SELECT * FROM usuarios WHERE email = '$email' ";

		//La variable $result mantiene los datos de conexión y la consulta
		$result = $con->query($checkEmail);

		//La variable $count retiene el resultado de la consulta
		$count = mysqli_num_rows($result);

		//Si count == 1 significa que el correo electrónico ya está en la bd
		if ($count == 1) {
			header("Location: ../form_encargados.php?m=1");
		} else {
			// Si el correo electrónico no existe, los datos del formulario se envían a la BD y se crea la cuenta
			// myslqi_real_scape_string es una función que ejecuta un proceso de limpieza para cada variable POST que se recibe para prevenr alguna inyección SQL
			$nombre = mysqli_real_escape_string($con, $_POST['nombre']);
			$email = mysqli_real_escape_string($con, $_POST['email']);
			$telefono = mysqli_real_escape_string($con, $_POST['telefono']);
			$password = 12345678; //Contraseña predeterminada
			

			//La función password_hash() convierte la contraseña en un hash antes de enviarla a la bd
			$passHash = password_hash($password, PASSWORD_DEFAULT);

			//Inserta la consulta para enviar por hash
			$query = "INSERT INTO usuarios (nombre, email, telefono, password, role, activo) VALUES ('$nombre', '$email', '$telefono', '$passHash', 'encargado',1)";

			if (mysqli_query($con, $query)) {
				header("Location: ../encargados.php?m=1");
			} else {
				echo "Error: " . $query . "<br>" . mysqli_error($con);
			}
		}
		mysqli_close($con);
		?>
