<?php 
	//Configuración de la conexión a la bd
	require_once '../../conf/config.php';
	$con->set_charset("utf8");
	//Nombre de la tabla en la que se importarán los datos crudos
	$tableName = "articulos";

	//Obtener los datos de la tabla
	$query = "SELECT id_articulo,nombre,descripcion,cantidad,tipo FROM $tableName WHERE estatus = 'activo' ";
	$result = $con->query($query);

	//Verificar resultados
	if($result->num_rows > 0){
		//Nombre del archivo CSV a generar
		$filename = "materiales.csv";

		//Abrir el archivo CSV en modo escritura
		$file = fopen($filename, 'w');

		fprintf($file, chr(0xEF).chr(0xBB).chr(0xBF));

		//Escribir la linea de encabezado en el archivo CSV
		fputcsv($file, array('ID', 'Nombre', 'Descripción','Cantidad','Tipo'));

		//Iterar sobre los resultados y escribir cada fila en el archivo CSV
		while ($row = $result->fetch_assoc()) {
			array_walk($row, function(&$value) {
				$value = mb_convert_encoding($value, 'UTF-8', 'auto');
			});
			fputcsv($file, $row);
		}

		//Cerrar el archivo CSV
		fclose($file);

		//Descargar el archivo CSV
		header('Content-Type: application/csv; charset=UTF-8');
		header('Content-Disposition: attachment; filename="' . $filename . '"');
		readfile($filename);

		//Eliminar el archivo CSV
		unlink($filename);
	} else {
		echo "No hay datos para exportar";
	}

	//Cerrar la conexion
	$con->close();
?>