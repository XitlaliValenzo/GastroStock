<?php

include '../../conf/config.php'; // Incluye tu archivo de configuración de la base de datos

$message = ''; // Inicializa una variable para almacenar el mensaje del alert de JavaScript
if($_FILES['rutaImagen']){

	if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES['rutaImagen'])){
	$error = $_FILES['rutaImagen']['error'];
	//Verificar si el archivo ha sido cargado
	if ($error === UPLOAD_ERR_OK) {
		$fileTmpPath = $_FILES['rutaImagen']['tmp_name'];
		$fileName = $_FILES['rutaImagen']['name'];
		$fileSize = $_FILES['rutaImagen']['size'];
		$fileType = $_FILES['rutaImagen']['type'];
		$fileNameCmps = explode(".", $fileName);
		$fileExtension = strtolower(end($fileNameCmps));

		//Extensiones permitidas
		$allowedfileExtensions = ['jpeg','jpg','png'];
		//Se define el tamaño maximo permitido para los archivos que se cargan en el servidor, en este caso se establecio en 5 megabytes (MB). Aqui, 1024 * 1024 convierte un megabyte a bytes (pues 1KB = 1024 bytes y 1MB = 1024 KB), y luego se multiplica por 5 para obtener el total de bytes equivalentes a 5MB.
		$maxFileSize = 5 * 1024 * 1024; //5 MB, se ajusta este valor segun a las necesidades

		if(in_array($fileExtension, $allowedfileExtensions) && $fileSize <= $maxFileSize) {
			//Directorio donde se guardaran las imagenes
			$uploadFileDir = './uploaded_images/';
			$nombre = $_POST['nombre'];
			$descripcion = $_POST['descripcion'];
			$cantidad = $_POST['cantidad'];
			$tipo = $_POST['tipo'];
			$id_articulo = $_POST['id_articulo'];
			$randomNumber = rand(1000, 9999); //Número aleatorio
			$nombreArticuloFormatted = preg_replace('/[^A-Za-z0-9\-]/', '_', $nombre);
			$newFileName = $nombreArticuloFormatted . '-' . $cantidad . '_' . $randomNumber . '.' . $fileExtension; 
			$dest_path = $uploadFileDir . $newFileName;

			if (!file_exists($uploadFileDir)) {
				mkdir($uploadFileDir, 0755, true);
			}

			if(move_uploaded_file($fileTmpPath, $dest_path)) {
				$sql = "UPDATE articulos SET nombre = ?, cantidad = ?, descripcion = ?, imagen = ?, tipo = ? WHERE id_articulo = '$id_articulo' ";

				if($stmt = $con->prepare($sql)) {
					$stmt->bind_param("sisss", $nombre, $cantidad, $descripcion, $dest_path, $tipo);
					if($stmt->execute()) {
						header("Location: ../inv_equipo.php?m=2");
					} else {
						$message = "Error al insertar en la base de datos: " . $stmt->error;
					}
					$stmt->close();
				}
			} else {
	
				header("Location: ../inv_equipo.php?m=3");
			}
		} else {
			if ($fileSize > $maxFileSize) {
				header("Location: ../inv_equipo.php?m=4");
			} else {
				header("Location: ../inv_equipo.php?m=5");
			}
		}
	} else {
		$message = 'Error al cargar el archivo. Código de error: ' . $error;
	}
} else {
	header("Location: ../inv_equipo.php?m=6");
}

}

if ($_FILES['rutaImagen']){
	$nombre = $_POST['nombre'];
	$descripcion = $_POST['descripcion'];
	$cantidad = $_POST['cantidad'];
	$tipo = $_POST['tipo'];
	$id_articulo = $_POST['id_articulo'];

	$sql = "UPDATE articulos SET nombre = '$nombre', cantidad = '$cantidad', descripcion = '$descripcion', tipo = '$tipo' WHERE id_articulo = '$id_articulo' ";

				if (mysqli_query($con, $sql)) {
					header("Location: ../inv_equipo.php?m=2");
				} else {
					echo "Error: " . $sql . "<br>" . mysqli_error($con);
				}

}
	






$con->close();

//Usamos $message para imprimir el echo en el alert de JavaScript que mostrará la alerta y redireccionará
//echo "<script type='text/javascript'>alert('$message'); window.location.href = '../materiales.php';</script>";

?>