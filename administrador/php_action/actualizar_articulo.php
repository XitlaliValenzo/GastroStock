<?php

include '../../conf/config.php'; // Incluye tu archivo de configuración de la base de datos

$message = ''; // Inicializa una variable para almacenar el mensaje del alert de JavaScript

function eliminar($con,$tabla,$articulo,$id_articulo){
	$sqlDelete = "DELETE FROM $tabla WHERE $articulo = '$id_articulo'";

	if ($con->query($sqlDelete) === FALSE) {
		echo "Error al eliminar el registro" . $con ->error;
	}
}

function insertarAdquirido($con,$id_articulo,$cantidad,$tipo_material){
	$sqlInsert = "INSERT INTO articulos_adquiridos (articulo_adquirido,cantidad,tipo_material) VALUES ('$id_articulo','$cantidad','$tipo_material')";
	if ($con->query($sqlInsert) === FALSE) {
		echo "Error al insertar el registro" . $con ->error;
	}
}

function insertarDonativo($con,$id_articulo,$cantidad,$tipo_material){
	$sqlInsertDon = "INSERT INTO articulos_donados (articulo_donado, cantidad, tipo_material) VALUES ('$id_articulo','$cantidad','$tipo_material')";
	if ($con->query($sqlInsertDon) === FALSE) {
		echo "Error al insertar el registro donativo" . $con ->error;
	}

}

function insertarFechaAdq($con,$id_articulo,$cantidad){
	$sqlFecha = "INSERT INTO fecha_adquiridos (articulo_adquirido,cantidad) VALUES ('$id_articulo','$cantidad')";
	if ($con->query($sqlFecha) === FALSE) {
		echo "Error al insertar el registro de fecha" . $con ->error;
	}
}

function insertarFechaDon($con,$id_articulo,$cantidad,$tipo_donante,$nombre_donante){
	$sqlFechaDon = "INSERT INTO fecha_donados (articulo_donado,cantidad,tipo_donante,nombre_donante) VALUES ('$id_articulo','$cantidad','$tipo_donante','$nombre_donante')";
	if ($con->query($sqlFechaDon) === FALSE) {
		echo "Error al insertar el registro de fecha" . $con ->error;
	}
}

function actualizarAdquirido($con,$cantidad,$tipo_material,$id_articulo){
	$sqlUpdate = "UPDATE articulos_adquiridos SET cantidad = '$cantidad', tipo_material = '$tipo_material' WHERE articulo_adquirido = '$id_articulo' ";
	if ($con->query($sqlUpdate) === FALSE) {
		echo "Error al actualizar el registro" . $con ->error;
	}
}

function actualizarDonativo($con,$cantidad,$tipo_material,$id_articulo){
	$sqlUpdate = "UPDATE articulos_donados SET cantidad = '$cantidad', tipo_material = '$tipo_material' WHERE articulo_donado = '$id_articulo' ";
	if ($con->query($sqlUpdate) === FALSE) {
		echo "Error al actualizar el registro" . $con ->error;
	}
}

function actualizarFecha($con, $tabla,$articulo,$id_articulo,$cantidad){
	$sqlUpdateFecha = "UPDATE $tabla SET cantidad = '$cantidad', fecha = current_timestamp() WHERE $articulo = '$id_articulo' ";
	if ($con->query($sqlUpdateFecha) === FALSE) {
		echo "Error al actualizar el registro de fecha" . $con ->error;
	}

}

function actualizarFechaDon($con, $tabla,$articulo,$id_articulo,$cantidad,$tipo_donante,$nombre_donante){
	$sqlUpdateFechaDon = "UPDATE fecha_donados SET cantidad = '$cantidad', tipo_donante = '$tipo_donante', nombre_donante = '$nombre_donante',fecha = current_timestamp() WHERE $articulo = '$id_articulo' ";
	if ($con->query($sqlUpdateFechaDon) === FALSE) {
		echo "Error al actualizar el registro de fecha" . $con ->error;
	}

}


function actualizar($con,$tipo_articulo,$id_articulo,$cantidad,$tipo,$tipo_material){
	if ($tipo_articulo == 'donativo' ){
		if ($tipo == 'adquirido'){

			//Eliminar de la tabla de fechas_donativos el articulo
			$tabla = 'fecha_donados';
			$articulo = 'articulo_donado';			
			eliminar($con,$tabla,$articulo,$id_articulo);

			//Eliminar de la tabla de donativos el articulo
			$tabla = 'articulos_donados';
			eliminar($con,$tabla,$articulo,$id_articulo);

			//Insertar el articulo en la tabla de adquiridos
			insertarAdquirido($con,$id_articulo,$cantidad,$tipo_material);

			//Insertar el articulo en la tabla de fechas_adquiridos
			insertarFechaAdq($con,$id_articulo,$cantidad);

		} else{
			$tipo_donante = $_POST['tipo_donante'];
			$nombre_donante = $_POST['nombre_donante'];
			//Actualizar en la tabla de donativos
			actualizarDonativo($con,$cantidad,$tipo_material,$id_articulo);

			//Actualizar en la tabla de fecha_donados
			actualizarFechaDon($con, $tabla,$articulo,$id_articulo,$cantidad,$tipo_donante,$nombre_donante);

		}

	} elseif($tipo_articulo == 'adquirido'){
		
		if ($tipo == 'donativo'){
			$tipo_donante = $_POST['tipo_donante'];
			$nombre_donante = $_POST['nombre_donante'];

			//Eliminar de la tabla de fecha_adquiridos el articulo
			$tabla = 'fecha_adquiridos';
			$articulo = 'articulo_adquirido';
			eliminar($con,$tabla,$articulo,$id_articulo);

			//Eliminar de la tabla de adquiridos el articulo
			$tabla = 'articulos_adquiridos';
			eliminar($con,$tabla,$articulo,$id_articulo);

			//Insertar el articulo en la tabla de donativos
			insertarDonativo($con,$id_articulo,$cantidad,$tipo_material);

			//Insertar el articulo en la tabla de fecha_donados
			insertarFechaDon($con,$id_articulo,$cantidad,$tipo_donante,$nombre_donante);

		} else{
			//Actualizar en la tabla de adquiridos
			actualizarAdquirido($con,$cantidad,$tipo_material,$id_articulo);

			//Actualizar en la tabla de fecha_adquiridos
			$tabla = 'fecha_adquiridos';
			$articulo = 'articulo_adquirido';
			actualizarFecha($con, $tabla,$articulo,$id_articulo,$cantidad);

		}

	}
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
	$nombre = $_POST['nombre'];
	$descripcion = $_POST['descripcion'];
	$cantidad = $_POST['cantidad'];
	$id_articulo = $_POST['id_articulo']; 
	$tipo_material = $_POST['tipo_material'];

	//para ver en que tabla está el articulo actualmente 
	$tipo_articulo = $_POST['tipo_articulo'];
	$tipo = $_POST['tipo'];

	if(!empty($_FILES['rutaImagen']['name'])){
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
						actualizar($con,$tipo_articulo,$id_articulo,$cantidad,$tipo,$tipo_material);
						header("Location: ../materiales.php?m=2");
					} else {
						$message = "Error al insertar en la base de datos: " . $stmt->error;
					}
					$stmt->close();
				}
			} else {
	
				header("Location: ../materiales.php?m=3");
			}
		} else {
			if ($fileSize > $maxFileSize) {
				header("Location: ../materiales.php?m=4");
			} else {
				header("Location: ../materiales.php?m=5");
			}
		}
	} else {
		$message = 'Error al cargar el archivo. Código de error: ' . $error;
	}
} else {
	//en caso de que no se ponga una imagen en el formulario de editar esta no se actualizará en la tabla de articulos
	$sql = "UPDATE articulos SET nombre = '$nombre', cantidad = '$cantidad', descripcion = '$descripcion', tipo = '$tipo' WHERE id_articulo = '$id_articulo' ";
	
				if (mysqli_query($con, $sql)) {
					actualizar($con,$tipo_articulo,$id_articulo,$cantidad,$tipo,$tipo_material);
					header("Location: ../materiales.php?m=2");
				} else {
					echo "Error: " . $sql . "<br>" . mysqli_error($con);
				}
}


}
	
$con->close();

//Usamos $message para imprimir el echo en el alert de JavaScript que mostrará la alerta y redireccionará
//echo "<script type='text/javascript'>alert('$message'); window.location.href = '../materiales.php';</script>";

?>