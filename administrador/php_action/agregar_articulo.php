<?php

include '../../conf/config.php'; // Incluye tu archivo de configuración de la base de datos

$message = ''; // Inicializa una variable para almacenar el mensaje del alert de JavaScript

function maxId($con){
	//ver el id que se inserta el articulos 
	$sql_id = "SELECT max(id_articulo) FROM articulos"; 
	$result_id = $con->query($sql_id);
	$idUltimoArticulo = 0;
	if($rowId = $result_id->fetch_assoc()){
		$idUltimoArticulo = $rowId['max(id_articulo)'];
	}

	return $idUltimoArticulo;

}

function insertarFechaAdq($con,$idUltimoArticulo,$cantidad){
	$sqlFecha = "INSERT INTO fecha_adquiridos (articulo_adquirido,cantidad) VALUES ('$idUltimoArticulo','$cantidad')";
	$rowFecha = $con->query($sqlFecha);
}

function insertarFechaDon($con,$idUltimoArticulo,$cantidad,$tipo_donante,$nombre_donante){
	$sqlFechaDon = "INSERT INTO fecha_donados (articulo_donado,cantidad,tipo_donante,nombre_donante) VALUES ('$idUltimoArticulo','$cantidad','$tipo_donante','$nombre_donante')";
	$rowFechaDon = $con->query($sqlFechaDon);
}

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
			$estatus = 'activo';

			$randomNumber = rand(1000, 9999); //Número aleatorio
			$nombreArticuloFormatted = preg_replace('/[^A-Za-z0-9\-]/', '_', $nombre);
			$newFileName = $nombreArticuloFormatted . '-' . $cantidad . '_' . $randomNumber . '.' . $fileExtension; 
			$dest_path = $uploadFileDir . $newFileName;

			if (!file_exists($uploadFileDir)) {
				mkdir($uploadFileDir, 0755, true);
			}

			if(move_uploaded_file($fileTmpPath, $dest_path)) {
				$sql = "INSERT INTO articulos (nombre, cantidad, descripcion, imagen, tipo, estatus) VALUES (?, ?, ?, ?, ?, ?)";

				if($stmt = $con->prepare($sql)) {
					$stmt->bind_param("sissss", $nombre, $cantidad, $descripcion, $dest_path, $tipo, $estatus);
					if($stmt->execute()) {
						$idUltimoArticulo = maxId($con);
						//Insertar los datos en las tablas de donativos y adquiridos dependiendo del tipo
						if($tipo == 'donativo'){

					//Insertar en la tabla de articulos donados
					$tipo_material = $_POST['tipo_material'];
					$tipo_donante = $_POST['tipo_donante'];
					$nombre_donante = $_POST['nombre_donante'];

					$sql2 = "INSERT INTO articulos_donados (articulo_donado, cantidad, tipo_material) VALUES (?, ?, ?)";
					if($stmt2 = $con->prepare($sql2)){
						$stmt2->bind_param("iis", $idUltimoArticulo, $cantidad, $tipo_material);
						if($stmt2->execute()) {
							//Insertar el articulo en la tabla de fecha_donados
							insertarFechaDon($con,$idUltimoArticulo,$cantidad,$tipo_donante,$nombre_donante);
							header("Location: ../materiales.php?m=1");
						} else{
							$message = "Error al insertar en la base de datos de articulos donados: " . $stmt->error;
						} 
						$stmt2->close();
					}
				}else{

					//Insertar en la tabla de articulos adquiridos
					$tipo_material = $_POST['tipo_material'];
					$sql2 = "INSERT INTO articulos_adquiridos (articulo_adquirido, cantidad, tipo_material) VALUES (?, ?, ?)";
					if($stmt2 = $con->prepare($sql2)){
						$stmt2->bind_param("iis", $idUltimoArticulo, $cantidad,$tipo_material);
						if($stmt2->execute()) {
							//Insertar el articulo en la tabla de fecha_adquiridos
						insertarFechaAdq($con,$idUltimoArticulo,$cantidad);
							header("Location: ../materiales.php?m=1");
						} else{
							$message = "Error al insertar en la base de datos da articulos adquiridos: " . $stmt->error;
						} 
						$stmt2->close();
					}
				}

						
					} else {
						$message = "Error al insertar en la base de datos: " . $stmt->error;
					}
					$stmt->close();
				}
			} else {
	
				header("Location: ../form_material.php?m=1");
			}
		} else {
			if ($fileSize > $maxFileSize) {
				header("Location: ../form_material.php?m=2");
			} else {
				header("Location: ../form_material.php?m=3");
			}
		}
	} else {
		$message = 'Error al cargar el archivo. Código de error: ' . $error;
	}
} else {
	header("Location: ../form_material.php?m=4");
}

$con->close();

//Usamos $message para imprimir el echo en el alert de JavaScript que mostrará la alerta y redireccionará
echo "<script type='text/javascript'>alert('$message'); window.location.href = '../form_material.php';</script>";

?>