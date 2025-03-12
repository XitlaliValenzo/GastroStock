<?php 
include '../../conf/config.php';

function FechaDonados ($con,$id_articulo,$cantidad_agregar,$tipo_donante,$nombre_donante){
	$sql3 = "INSERT INTO fecha_donados (articulo_donado,cantidad,tipo_donante,nombre_donante) VALUES ('$id_articulo','$cantidad_agregar','$tipo_donante','$nombre_donante')";
	if($con -> query($sql3) === FALSE) {
 			echo "Error al insertar la fecha" . $con ->error;
		} 
}

function FechaAdquiridos ($con,$id_articulo,$cantidad_agregar){
	$sql3 = "INSERT INTO fecha_adquiridos (articulo_adquirido,cantidad) VALUES ('$id_articulo','$cantidad_agregar')";
	if($con -> query($sql3) === FALSE) {
 			echo "Error al insertar la fecha" . $con ->error;
		}
}

if ($_POST) {
	$tipo = $_POST['tipo'];
	$cantidad_agregar = $_POST['cantidad_agregar'];
	$id_articulo = $_POST['id_articulo'];
	$cantidad_stock = $_POST['cantidad_stock'];
	$tipo_material = 'equipo';

	//se actualiza la cantidad del articulo en la tabla general de articulos
	$cantidad_total = $cantidad_stock + $cantidad_agregar;
	$sql1 = "UPDATE articulos SET cantidad = '$cantidad_total' WHERE id_articulo = '$id_articulo' ";


	if ($tipo == 'donativo') {
		$tipo_donante = $_POST['tipo_donante'];
		$nombre_donante = $_POST['nombre_donante'];

		//Revisar si el equipo ya existe en la tabla de donativos
		$checkArticulo = "SELECT * FROM articulos_donados WHERE articulo_donado = '$id_articulo' ";
		$resultCheck = $con->query($checkArticulo);

		if ($resultCheck ->num_rows > 0) {
			while ($row = $resultCheck ->fetch_assoc()) {
				$cantidad_existente = $row['cantidad'];
			}
			$cantidad_total_donada = $cantidad_existente + $cantidad_agregar;
			//si si está en la tabla de donados solo actualiza la cantidad
			$sql4 = "UPDATE articulos_donados SET cantidad = '$cantidad_total_donada' WHERE articulo_donado = '$id_articulo' ";
			//se inserta en la tabla de fecha_donados
			FechaDonados($con,$id_articulo,$cantidad_agregar,$tipo_donante,$nombre_donante);
			
		} else {
			//si no está en la tabla de donados hacemos un registro
			$sql2 = "INSERT INTO articulos_donados (articulo_donado,cantidad,tipo_material) VALUES ('$id_articulo','$cantidad_agregar','$tipo_material') ";
			if($con -> query($sql2) === FALSE) {
 			echo "Error al insertar material" . $con ->error;
 		}
			//se inserta en la tabla de fecha_donados
			FechaDonados($con,$id_articulo,$cantidad_agregar,$tipo_donante,$nombre_donante);
		}
	} else {
		//Revisar si el equipo ya existe en la tabla de adquiridos
		$checkArticulo = "SELECT * FROM articulos_adquiridos WHERE articulo_adquirido = '$id_articulo' ";
		$resultCheck = $con->query($checkArticulo);

		if ($resultCheck ->num_rows > 0) {
			while ($row = $resultCheck ->fetch_assoc()) {
				$cantidad_existente = $row['cantidad'];
			}
			$cantidad_total_adquirida = $cantidad_existente + $cantidad_agregar;
			//si si está en la tabla de adquiridos solo se actualiza la cantidad
			$sql4 = "UPDATE articulos_adquiridos SET cantidad = '$cantidad_total_adquirida' WHERE articulo_adquirido = '$id_articulo' ";
			//se inserta en la tabla de fecha_adquiridos
			FechaAdquiridos($con,$id_articulo,$cantidad_agregar);
		} else {
			$sql2 = "INSERT INTO articulos_adquiridos (articulo_adquirido,cantidad,tipo_material) VALUES ('$id_articulo','$cantidad_agregar','$tipo_material') ";
			if($con -> query($sql2) === FALSE) {
 			echo "Error al insertar material" . $con ->error;
 		}
			FechaAdquiridos($con,$id_articulo,$cantidad_agregar);
		}

	}
	if ($con->query($sql1)) {
			if ($con->query($sql4)) {
				header("Location: ../inv_equipo.php?m=10");
			}else{
				echo "Error al ejecutar la consulta 4" . $con ->error;
			}
		}else{
			echo "Error al ejecutar la consulta 1" . $con ->error;
		}
$con->close();
}
?>