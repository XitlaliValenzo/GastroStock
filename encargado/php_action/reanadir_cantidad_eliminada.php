<?php 
include '../../conf/config.php';

function actualizarArticulos($con,$cantidad_total,$id_articulo){
    
    $sql = "UPDATE articulos SET cantidad = '$cantidad_total', estatus='activo' WHERE id_articulo = '$id_articulo' ";
    
		if ($con->query($sql) === FALSE) {
		echo "Error al actualizar el registro" . $con ->error;
	}
}

function agregarReposicion($con,$id_articulo,$cantidad_agregar,$tipo){
		$sql5 = "INSERT INTO articulos_reposiciones (articulo_repuesto, cantidad, tipo) VALUES ('$id_articulo','$cantidad_agregar','$tipo')";
		if ($con->query($sql5) === FALSE) {
		echo "Error al actualizar el registro" . $con ->error;
	}
}

function actualizarEliminados($con,$cantidad_total_eliminados,$id_articulo){
		$sql2 = "UPDATE articulos_eliminados SET cantidad = '$cantidad_total_eliminados' WHERE articulo_eliminado = '$id_articulo' ";

		if ($con->query($sql2) === FALSE) {
		echo "Error al actualizar el registro" . $con ->error;
	}
}

if ($_POST) {
	$tipo = $_POST['tipo'];
	$cantidad_agregar = $_POST['cantidad_agregar'];
	$tipo_material = $_POST['tipo_material'];
	//cantidad que ya existe en la tabla de eliminados
	$cantidad_stock = $_POST['cantidad_stock'];
	//cantidad que está en la tabla de articulos general
	$cantidad_articulos = $_POST['cantidad_articulos'];
	$id_articulo = $_POST['id_articulo'];

	//actualizar la cantidad en la tabla de articulos
	$cantidad_total = $cantidad_articulos + $cantidad_agregar;
	actualizarArticulos($con,$cantidad_total,$id_articulo);
	agregarReposicion($con,$id_articulo,$cantidad_agregar,$tipo);


	if ($tipo == 'donativo') {
		$tipo_donante = $_POST['tipo_donante'];
		$nombre_donante = $_POST['tipo_donante'];

		//ver si existe en la tabla de articulos_donados
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
				$sql3 = "INSERT INTO articulos_donados (articulo_donado,cantidad,tipo_material) VALUES ('$id_articulo','$cantidad_agregar','$tipo_material') ";

				//Insertar fecha
				$sql4 = "INSERT INTO fecha_donados (articulo_donado, cantidad, tipo_donante, nombre_donante) VALUES ('$id_articulo', '$cantidad_agregar','$tipo_donante','$nombre_donante')";
			}

	}else{

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


	}
	
	if ($cantidad_agregar <= 0){
		header("Location: ../inv_eliminado.php?m=12");
	} elseif ($cantidad_agregar <= $cantidad_stock) {
		$cantidad_total_eliminados = $cantidad_stock - $cantidad_agregar;
		actualizarEliminados($con,$cantidad_total_eliminados,$id_articulo);
		if($con->query($sql3)){
		    if ($con->query($sql4)) {
		        header("Location: ../inv_eliminado.php?m=10");
		    }else{
		        echo "Error al ejecutar la consulta 4" . $con ->error;
		    }
		}else{
		echo "Error al ejecutar la consulta 3" . $con ->error;
		}
	} elseif ($cantidad_agregar > $cantidad_stock) {
		$cantidad_total_eliminados = 0;
		actualizarEliminados($con,$cantidad_total_eliminados,$id_articulo);
		if($con->query($sql3)){
		    if ($con->query($sql4)) {
		        header("Location: ../inv_eliminado.php?m=10");
		    }else{
		        echo "Error al ejecutar la consulta 4" . $con ->error;
		    }
		}else{
		    echo "Error al ejecutar la consulta 3" . $con ->error;
		}
	}
	
	$con->close();
}



?>