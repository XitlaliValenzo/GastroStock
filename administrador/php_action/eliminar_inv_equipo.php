<?php 
 	require_once '../../conf/config.php';
 	if($_POST){

 		$opc_eliminar = $_POST['opc_eliminar'];
 		$id_articulo = $_POST['id_articulo'];
 		$cantidad_stock = $_POST['cantidad_stock'];
 		

 		if($opc_eliminar == 'elim_cantidad'){
 			$cantidad = $_POST['cantidad'];
 			if ($cantidad <= 0) {
 				header("Location: ../materiales.php?m=12");
 			} elseif ($cantidad > $cantidad_stock) {
 				header("Location: ../materiales.php?m=11");
 			} elseif ($cantidad <= $cantidad_stock) {
 				//actualizar la cantidad de la tabla de articulos
 				$cantidad_total = $cantidad_stock - $cantidad;
 				$sql1 = "UPDATE articulos SET cantidad = '$cantidad_total' WHERE id_articulo = '$id_articulo' ";

 				//ver si el articulo existe en la tabla de eliminados
 				$checkArticulo = "SELECT * FROM articulos_eliminados WHERE articulo_eliminado = '$id_articulo' ";
				$resultCheck = $con->query($checkArticulo);

				if ($resultCheck ->num_rows > 0) {
					while ($row = $resultCheck ->fetch_assoc()) {
						$cantidad_existente = $row['cantidad'];
					}
					$cantidad_total_eliminados = $cantidad_existente + $cantidad;
					//Actualizar la cantidad de articulos eliminados
					$sql2 = "UPDATE articulos_eliminados SET cantidad = '$cantidad_total_eliminados' WHERE articulo_eliminado = '$id_articulo' ";

					//Insertar la fecha
					$sql3 = "INSERT INTO fecha_eliminados (articulo_eliminado, cantidad) VALUES ('$id_articulo', '$cantidad')";
				} else {
					//insertar el registro en la tabla de fecha_eliminados
 					$sql2 = "INSERT INTO articulos_eliminados (articulo_eliminado,cantidad) VALUES ('$id_articulo','$cantidad') ";
 					//Insertar fecha
					$sql3 = "INSERT INTO fecha_eliminados (articulo_eliminado, cantidad) VALUES ('$id_articulo', '$cantidad')";
				}


 			}
 		} else {
 			$estatus = 'eliminado';
 			//actualizar cantidad y estatus en la tabla articulos
 			$cantidad_total = $cantidad_stock - $cantidad_stock;
 			$sql1 = "UPDATE articulos SET cantidad = '$cantidad_total',estatus = '$estatus' WHERE id_articulo = '$id_articulo' ";


 			//ver si el articulo existe en la tabla de eliminados
 			$checkArticulo = "SELECT * FROM articulos_eliminados WHERE articulo_eliminado = '$id_articulo' ";
			$resultCheck = $con->query($checkArticulo);

 			if ($resultCheck ->num_rows > 0) {
				while ($row = $resultCheck ->fetch_assoc()) {
					$cantidad_existente = $row['cantidad'];
				}
					$cantidad_total_eliminados = $cantidad_existente + $cantidad_stock;
	
				//Actualizar la cantidad de articulos donados
				$sql2 = "UPDATE articulos_eliminados SET cantidad = '$cantidad_total_eliminados' WHERE articulo_eliminado = '$id_articulo' ";

				//Insertar la fecha
				$sql3 = "INSERT INTO fecha_eliminados (articulo_eliminado, cantidad) VALUES ('$id_articulo', '$cantidad_stock')";

			} else{
				//Insertar en la tabla de articulos_eliminados
				$sql2 = "INSERT INTO articulos_eliminados (articulo_eliminado,cantidad) VALUES ('$id_articulo','$cantidad_stock') ";

				//Insertar fecha
				$sql3 = "INSERT INTO fecha_eliminados (articulo_eliminado, cantidad) VALUES ('$id_articulo', '$cantidad_stock')";
			}

 		}

 		if ($con -> query($sql1) === TRUE) {
 			if ($con -> query($sql2) === TRUE) {
 				if ($con -> query($sql3) === TRUE) {
 					if ($opc_eliminar == 'elim_cantidad'){
 						header("Location: ../inv_equipo.php?m=9");
 					}else{
 						header("Location: ../inv_equipo.php?m=7");
 					}

 				}else{
 					echo "Error al actualizar el registro3" . $con ->error;
 				}
 				
 			} else{
 				echo "Error al actualizar el registro2" . $con ->error;
 			}
 		} else{
 			echo "Error al actualizar el registro1" . $con ->error;
 		}

 			$con ->close();
 	}
?>