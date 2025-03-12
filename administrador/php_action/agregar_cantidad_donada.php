<?php

include '../../conf/config.php';

if ($_POST) {
	$tipo_donante = $_POST['tipo_donante'];
	$nombre_donante = $_POST['nombre_donante'];
	$cantidad_agregar = $_POST['cantidad_agregar'];
	//cantidad que ya existe en la tabla de articulos_donados
	$cantidad_stock = $_POST['cantidad_stock'];
	//cantidad que ya existe en la tabla general de articulos
	$cantidad_articulos = $_POST['cantidad_articulos'];
	$id_articulo = $_POST['id_articulo'];

	//actualizar la cantidad en la tabla de articulos donados
	$cantidad_total = $cantidad_agregar + $cantidad_stock;
	$sql = "UPDATE articulos_donados SET cantidad = '$cantidad_total' WHERE articulo_donado = '$id_articulo' ";

	//Insertar un registro en la tabla de fecha_donandos, ya que es una cantidad y donante diferente 
	$sqlInsert = "INSERT INTO fecha_donados (articulo_donado,cantidad,tipo_donante,nombre_donante) VALUES ('$id_articulo','$cantidad_agregar','$tipo_donante','$nombre_donante')";

	//Sumar la cantidad agregar en la tabla general de articulos
	$cantidad_total_articulos = $cantidad_agregar + $cantidad_articulos;
	$sqlUpdate = "UPDATE articulos SET cantidad = '$cantidad_total_articulos' WHERE id_articulo = '$id_articulo' ";


	if($con -> query($sql) === TRUE) {
		if ($con -> query($sqlInsert)) {
			if ($con -> query ($sqlUpdate)) {
				header("Location: ../inv_donado.php?m=10");
			} else{
				echo "Error al actualizar el registro" . $con ->error;

			}
		} else{
			echo "Error al insertar el registro" . $con ->error;
		}
 			
		} else {
			echo "Error al actualizar material donado" . $con ->error;
		}

	$con->close();

}






?>