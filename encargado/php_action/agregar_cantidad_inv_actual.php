<?php

	include '../../conf/config.php';

	function actualizarTipo($con,$id_articulo){
		$nuevoTipo = 'donativo / adquirido';
	 	$sqlTipo = "UPDATE articulos SET tipo = '$nuevoTipo' WHERE id_articulo = {$id_articulo}";
 		if($con -> query($sqlTipo) === FALSE) {
 			echo "Error al actualizar tipo" . $con ->error;
		} 
	}

	function insertarDonativo($con,$id_articulo,$cantidad_agregar,$tipo_material){
		
		$sqlInsertDon = "INSERT INTO articulos_donados (articulo_donado, cantidad, tipo_material) VALUES ('$id_articulo', '$cantidad_agregar', '$tipo_material')";
 		
 		if($con -> query($sqlInsertDon) === TRUE) {
 			header("Location: ../inv_actual.php?m=10");
		} else {
			echo "Error al insertar el donativo" . $con ->error;
		}
	}

	function insertarAdquirido($con,$id_articulo,$cantidad_agregar,$tipo_material){
		
		$sqlInsertAdq = "INSERT INTO articulos_adquiridos (articulo_adquirido, cantidad, tipo_material) VALUES ('$id_articulo', '$cantidad_agregar', '$tipo_material')";
		
 		if($con -> query($sqlInsertAdq) === TRUE) {
 			header("Location: ../inv_actual.php?m=10");
		} else {
			echo "Error al insertar el material adquirido" . $con ->error;
		}

	}

	function actualizarDonativo($con,$id_articulo,$cantidad_agregar){
		$verArtDon = "SELECT * FROM articulos_donados WHERE articulo_donado = '$id_articulo' ";
 		$resultDon = $con->query($verArtDon);

 		if ($resultDon ->num_rows > 0){
 			while($row = $resultDon ->fetch_assoc()){
 				$cantidad_donativo = $row['cantidad'];
 			}
 		}

 		$cantidad_total_donativos = $cantidad_agregar + $cantidad_donativo;

 		$sqlUpdateDon = "UPDATE articulos_donados SET cantidad = '$cantidad_total_donativos' WHERE articulo_donado = {$id_articulo}";

 		if($con -> query($sqlUpdateDon) === TRUE) {
 			header("Location: ../inv_actual.php?m=10");
		} else {
			echo "Error al actualizar material donado" . $con ->error;
		}

	}

	function actualizarAdquirido($con,$id_articulo,$cantidad_agregar){
		$verArtAdq = "SELECT * FROM articulos_adquiridos WHERE articulo_adquirido = '$id_articulo' ";
 		$resultAdq = $con->query($verArtAdq);

 		if ($resultAdq ->num_rows > 0){
 			while($row = $resultAdq ->fetch_assoc()){
 				$cantidad_adquirida = $row['cantidad'];
 			}
 		}

 		$cantidad_total_adquiridos = $cantidad_agregar + $cantidad_adquirida;

 		$sqlUpdateAdq = "UPDATE articulos_adquiridos SET cantidad = '$cantidad_total_adquiridos' WHERE articulo_adquirido = {$id_articulo}";
 		
 		if($con -> query($sqlUpdateAdq) === TRUE) {
 			header("Location: ../inv_actual.php?m=10");
		} else {
			echo "Error al actualizar material adquirido" . $con ->error;
		}

	}

	function insertarFechaAdq($con,$id_articulo,$cantidad_agregar){
		$sqlFecha = "INSERT INTO fecha_adquiridos (articulo_adquirido,cantidad) VALUES ('$id_articulo','$cantidad_agregar')";
		$resultFecha = $con->query($sqlFecha);
	}

	function insertarFechaDon($con,$id_articulo,$cantidad_agregar,$tipo_donante,$nombre_donante){
		$sqlFechaDon = "INSERT INTO fecha_donados (articulo_donado,cantidad,tipo_donante,nombre_donante) VALUES ('$id_articulo','$cantidad_agregar','$tipo_donante','$nombre_donante')";
		$resultFechaDon = $con->query($sqlFechaDon);
	}

	if ($_POST) {
		$id_articulo = $_POST['id_articulo'];
	 	$cantidad_stock = $_POST['cantidad_stock'];
	 	$tipo = $_POST['tipo'];
	 	$cantidad_agregar = $_POST['cantidad_agregar'];

	 	$tipo_articulo = $_POST['tipo_articulo'];

	 	//sumar las cantidades, la de stock y la que se agregará esa irá en la cantidad de la tabla de articulos
	 	$cantidad_total = $cantidad_stock+$cantidad_agregar;

	 	$sqlUpdate = "UPDATE articulos SET cantidad = '$cantidad_total' WHERE id_articulo = {$id_articulo}";
 		$resultUpdate = $con->query($sqlUpdate);

 		

	 	if ($tipo == 'donativo') {
	 		$tipo_donante = $_POST['tipo_donante'];
	 		$nombre_donante = $_POST['nombre_donante'];

	 		//si el articulo era de tipo adquirido pero se agrega un donado entonces ahora su tipo sería donativo/adquirido
	 		if ($tipo_articulo == 'adquirido'){
	 			actualizarTipo($con,$id_articulo);

	 			//recuperar que tipo de articulo era para poder insertar en la tabla
	 			$verArtAdq = "SELECT * FROM articulos_adquiridos WHERE articulo_adquirido = '$id_articulo' ";
 				$resultAdq = $con->query($verArtAdq);

 				if ($resultAdq ->num_rows > 0) {
 					while($row = $resultAdq ->fetch_assoc()){
 						$tipo_material = $row['tipo_material'];
 					}
 				}
 				//Insertar en la tabla de donativos
 				insertarDonativo($con,$id_articulo,$cantidad_agregar,$tipo_material);

	 		} elseif ($tipo_articulo == 'donativo') {
	 			//si el articulo ya es del tipo donativo, quiere decir que ya existe en la tabla de articulos_donados, asi que solo actualizamos la cantidad
	 			actualizarDonativo($con,$id_articulo,$cantidad_agregar);
	 		} else {
	 			//en caso de que sea de tipo donativo/adquirido, quiere decir que ya existe en la tabla de articulos_donados, asi que solo actualizamos la cantidad
	 			actualizarDonativo($con,$id_articulo,$cantidad_agregar);	
	 		}
	 			//insertar en la tabla de fechas correspondiente al tipo de articulo, en este caso fecha_donados
 				insertarFechaDon($con,$id_articulo,$cantidad_agregar,$tipo_donante,$nombre_donante);
	 	}else{
	 		//si el articulo era de tipo donativo pero se agrega un adquirido entonces ahora su tipo sería donativo/adquirido
	 		if ($tipo_articulo == 'donativo'){
	 			actualizarTipo($con,$id_articulo);

	 			//recuperar que tipo de articulo era para poder insertar en la tabla
	 			$verArtDon = "SELECT * FROM articulos_donados WHERE articulo_donado = '$id_articulo' ";
 				$resultDon = $con->query($verArtDon);

 				if ($resultDon ->num_rows > 0) {
 					while($row = $resultDon ->fetch_assoc()){
 						$tipo_material = $row['tipo_material'];
 					}
 				}
 				//Insertar en la tabla de adquiridos
 				insertarAdquirido($con,$id_articulo,$cantidad_agregar,$tipo_material);
	 		} elseif ($tipo_articulo == 'adquirido') {
	 			//si el articulo ya es del tipo adquirido, quiere decir que ya existe en la tabla de articulos_adquiridos, asi que solo actualizamos la cantidad
	 			actualizarAdquirido($con,$id_articulo,$cantidad_agregar);
	 			
	 		} else {
	 			//en caso de que sea de tipo donativo/adquirido, quiere decir que ya existe en la tabla de articulos_donados, asi que solo actualizamos la cantidad
	 			actualizarAdquirido($con,$id_articulo,$cantidad_agregar);	
	 		}

 		insertarFechaAdq($con,$id_articulo,$cantidad_agregar);

	 		
	 	}
	 }
?>