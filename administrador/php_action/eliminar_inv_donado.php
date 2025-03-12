<?php 
 	require_once '../../conf/config.php';
 	if($_POST){

 		$opc_eliminar = $_POST['opc_eliminar'];
 		$id_articulo = $_POST['id_articulo'];
 		//cantidad que ya existe en la tabla de articulos donados
 		$cantidad_stock = $_POST['cantidad_stock'];
 		//cantidad que está en la tabla general de articulos
 		$cantidad_articulos = $_POST['cantidad_articulos'];
 		$tipo = $_POST['tipo'];

 		if($opc_eliminar == 'elim_cantidad'){

 		
 		//cantidad obtenida del formulario
 		$cantidad = $_POST['cantidad'];
 		//cantidad a agregar en la tabla de articulos_donados
 		$cantidad_total = $cantidad_stock - $cantidad;

 		//actualizar la cantidad en la tabla de articulos donados
 		$sql1 = "UPDATE articulos_donados SET cantidad = '$cantidad_total' WHERE articulo_donado = '$id_articulo' ";

 		//cantidad a actualizar en la tabla general de articulos
 		$cantidad_total_articulos = $cantidad_articulos - $cantidad;

 		//actualizar la cantidad en la tabla de articulos
		$sql2 = "UPDATE articulos SET cantidad = '$cantidad_total_articulos' WHERE id_articulo = {$id_articulo}";

		//revisar si existe en la tabla de articulos eliminados
		$checkArticulo = "SELECT * FROM articulos_eliminados WHERE articulo_eliminado = '$id_articulo' ";
		$resultCheck = $con->query($checkArticulo);

		if ($resultCheck ->num_rows > 0) {
			while ($row = $resultCheck ->fetch_assoc()) {
				$cantidad_existente = $row['cantidad'];
			}

			$cantidad_total_eliminados = $cantidad + $cantidad_existente;
			//Actualizar en la cantidad en la tabla de articulos eliminados 
			$sql3 = "UPDATE articulos_eliminados SET cantidad = '$cantidad_total_eliminados' WHERE articulo_eliminado = {$id_articulo}";

			//Inserta la fecha en la tabla de fechas
 			$sql4 = "INSERT INTO fecha_eliminados (articulo_eliminado, cantidad) VALUES ('$id_articulo', '$cantidad')";
		} else {
			//Insertar en la tabla de articulos eliminados
 			$sql3 = "INSERT INTO articulos_eliminados (articulo_eliminado,cantidad) VALUES ('$id_articulo','$cantidad')";

 			//Inserta la fecha en la tabla de fechas
 			$sql4 = "INSERT INTO fecha_eliminados (articulo_eliminado, cantidad) VALUES ('$id_articulo', '$cantidad')";
		}

		if($con->query($sql1)){
				if ($con->query($sql2)) {
					if($con->query($sql3)){
						if ($con->query($sql4)) {
							header("Location: ../inv_donado.php?m=9");
						}else{
							echo "Error al eliminar el articulo donado 4" . $con ->error;
						}
					}else{
						echo "Error al eliminar el articulo donado 3" . $con ->error;
					}
				}else{
					echo "Error al eliminar el articulo donado 2" . $con ->error;
				}
			}else{
				echo "Error al eliminar el articulo donado" . $con ->error;
			}
 	

 		} else {
 			$estatus = 'eliminado';

 			$sql2 = "DELETE FROM articulos_donados WHERE articulo_donado = '$id_articulo'";

 			$sql1 = "DELETE FROM fecha_donados WHERE articulo_donado = '$id_articulo'";

 			//revisar si existe en la tabla de articulos eliminados
		$checkArticulo = "SELECT * FROM articulos_eliminados WHERE articulo_eliminado = '$id_articulo' ";
		$resultCheck = $con->query($checkArticulo);

		if ($resultCheck ->num_rows > 0) {
			while ($row = $resultCheck ->fetch_assoc()) {
				$cantidad_existente = $row['cantidad'];
			}

			$cantidad_total_eliminados = $cantidad_stock + $cantidad_existente;
			//Actualizar en la cantidad en la tabla de articulos eliminados 
			$sql3 = "UPDATE articulos_eliminados SET cantidad = '$cantidad_total_eliminados' WHERE articulo_eliminado = {$id_articulo}";

			//Inserta la fecha en la tabla de fechas
 			$sql4 = "INSERT INTO fecha_eliminados (articulo_eliminado, cantidad) VALUES ('$id_articulo', '$cantidad_stock')";
		} else {
			//Insertar en la tabla de articulos eliminados
 			$sql3 = "INSERT INTO articulos_eliminados (articulo_eliminado,cantidad) VALUES ('$id_articulo','$cantidad_stock')";

 			//Inserta la fecha en la tabla de fechas
 			$sql4 = "INSERT INTO fecha_eliminados (articulo_eliminado, cantidad) VALUES ('$id_articulo', '$cantidad_stock')";
		}



			$cantidad_total = $cantidad_articulos - $cantidad_stock;


			if ($tipo == 'donativo / adquirido'){
				$sql5 = "UPDATE articulos SET cantidad ='$cantidad_total', tipo = 'adquirido' WHERE id_articulo = {$id_articulo}";

			} else{
				$sql5 = "UPDATE articulos SET cantidad ='$cantidad_total', estatus = '$estatus' WHERE id_articulo = {$id_articulo}";

			}
			

			if($con->query($sql1)){
				if ($con->query($sql2)) {
					if($con->query($sql3)){
						if ($con->query($sql4)) {
							if ($con->query($sql5)) {
								header("Location: ../inv_donado.php?m=7");
							}else{
								echo "Error al eliminar el articulo donado 5" . $con ->error;
							}
							
						}else{
							echo "Error al eliminar el articulo donado 4" . $con ->error;
						}
					}else{
						echo "Error al eliminar el articulo donado 3" . $con ->error;
					}
				}else{
					echo "Error al eliminar el articulo donado 2" . $con ->error;
				}
			}else{
				echo "Error al eliminar el articulo donado" . $con ->error;
			}
 		}
	$con ->close();
 	}
?>

