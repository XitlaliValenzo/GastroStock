<?php 
	include '../../conf/config.php';

	function actualizarArticulos($con,$cantidad_total,$id_articulo){
		$sql = "UPDATE articulos SET cantidad = '$cantidad_total' WHERE id_articulo = '$id_articulo' ";

		if ($con->query($sql) === FALSE) {
		echo "Error al actualizar el registro" . $con ->error;
	}

	}

	function actualizarDanados($con,$cantidad_total_danados,$id_articulo){
		$sql2 = "UPDATE articulos_danados SET cantidad = '$cantidad_total_danados' WHERE articulo_danado = '$id_articulo' ";

		if ($con->query($sql2) === FALSE) {
		echo "Error al actualizar el registro" . $con ->error;
	}
}

	function agregarReposicion($con,$id_articulo,$cantidad_agregar,$tipo){
		$sql5 = "INSERT INTO articulos_reposiciones (articulo_repuesto, cantidad, tipo) VALUES ('$id_articulo','$cantidad_agregar','$tipo')";
		if ($con->query($sql5) === FALSE) {
		echo "Error al actualizar el registro" . $con ->error;
	}

	}

	if ($_POST) {
		$tipo = $_POST['tipo'];
		
		$cantidad_agregar = $_POST['cantidad_agregar'];

		$id_articulo = $_POST['id_articulo'];
		//cantidad que existe en la tabla de perdidos
		$cantidad_stock = $_POST['cantidad_stock'];
		$cantidad_total_danados = $cantidad_stock - $cantidad_agregar;
		//cantidad que existe en la tabla general de articulos
		$cantidad_articulos = $_POST['cantidad_articulos'];
		$tipo_material = $_POST['tipo_material'];

		$cantidad_total = $cantidad_agregar + $cantidad_articulos;
		actualizarArticulos($con,$cantidad_total,$id_articulo);

		//restar la cantidad en articulos perdidos 
		$cantidad_total_danados = $cantidad_stock - $cantidad_agregar;
		actualizarDanados($con,$cantidad_total_danados,$id_articulo);

		//agregar en la tabla de reposiciones
		agregarReposicion($con,$id_articulo,$cantidad_agregar,$tipo);

		if ($tipo == 'donativo') {
			$tipo_donante = $_POST['tipo_donante'];
			$nombre_donante = $_POST['nombre_donante'];
			
			//revisar si existe en la tabla de articulos donados
			$checkArticulo = "SELECT * FROM articulos_donados WHERE articulo_donado = '$id_articulo' ";
			$resultCheck = $con->query($checkArticulo);

			if ($resultCheck ->num_rows > 0) {
				while ($row = $resultCheck ->fetch_assoc()) {
					$cantidad_existente = $row['cantidad'];
				}
					$cantidad_total_donados = $cantidad_existente + $cantidad_agregar;
				//Actualizar la cantidad de articulos donados
				$sql3 = "UPDATE articulos_donados SET cantidad = '$cantidad_total_donados' WHERE articulo_donado = '$id_articulo' ";

				//Insertar la fecha
				$sql4 = "INSERT INTO fecha_donados (articulo_donado, cantidad, tipo_donante, nombre_donante) VALUES ('$id_articulo', '$cantidad_agregar','$tipo_donante','$nombre_donante')";

			} else{
				//Insertar en la tabla de articulos_donados
				$sql3 = "INSERT INTO articulos_donandos (articulo_donado,cantidad,tipo_material) VALUES ('$id_articulo','$cantidad_agregar','$tipo_material') ";

				//Insertar fecha
				$sql4 = "INSERT INTO fecha_donados (articulo_donado, cantidad, tipo_donante, nombre_donante) VALUES ('$id_articulo', '$cantidad_agregar','$tipo_donante','$nombre_donante')";
			}

			if($con->query($sql3)){
				if ($con->query($sql4)) {
					header("Location: ../inv_danado.php?m=13");
				}else{
					echo "Error al eliminar ejecutar la consulta 4" . $con ->error;
				}
			}else{
				echo "Error al ejecutar la consulta 3" . $con ->error;
			}
 	

		} else {
			//revisar si existe en la tabla de articulos adquiridos
			$checkArticulo = "SELECT * FROM articulos_adquiridos WHERE articulo_adquirido = '$id_articulo' ";
			$resultCheck = $con->query($checkArticulo);

			if ($resultCheck ->num_rows > 0) {
				while ($row = $resultCheck ->fetch_assoc()) {
					$cantidad_existente = $row['cantidad'];
				}
					$cantidad_total_adquiridos = $cantidad_existente + $cantidad_agregar;
				//Actualizar la cantidad de articulos donados
				$sql3 = "UPDATE articulos_adquiridos SET cantidad = '$cantidad_total_adquiridos' WHERE articulo_adquirido = '$id_articulo' ";

				//Insertar la fecha
				$sql4 = "INSERT INTO fecha_adquiridos (articulo_adquirido, cantidad) VALUES ('$id_articulo', '$cantidad_agregar')";

			} else{
				//Insertar en la tabla de articulos_adquiridos
				$sql3 = "INSERT INTO articulos_adquiridos (articulo_adquirido,cantidad,tipo_material) VALUES ('$id_articulo','$cantidad_agregar','$tipo_material') ";

				//Insertar la fecha
				$sql4 = "INSERT INTO fecha_adquiridos (articulo_adquirido, cantidad) VALUES ('$id_articulo', '$cantidad_agregar')";
			}

			if($con->query($sql3)){
				if ($con->query($sql4)) {
					header("Location: ../inv_danado.php?m=13");
				}else{
					echo "Error al eliminar ejecutar la consulta 4" . $con ->error;
				}
			}else{
				echo "Error al ejecutar la consulta 3" . $con ->error;
			}
			

		}

		$con->close();
	}

?>