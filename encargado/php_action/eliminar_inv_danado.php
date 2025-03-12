<?php 
 	require_once '../../conf/config.php';
 	if($_POST){

 		$opc_eliminar = $_POST['opc_eliminar'];
 		$id_articulo = $_POST['id_articulo'];
 		//cantidad que ya existe en la tabla de articulos_danados
 		$cantidad_stock = $_POST['cantidad_stock'];

 		if($opc_eliminar == 'elim_cantidad'){

 		
 		$cantidad = $_POST['cantidad'];

 		$cantidad_total = $cantidad_stock - $cantidad;
 		
		$sql1 = "UPDATE articulos_danados SET cantidad = '$cantidad_total' WHERE articulo_danado = {$id_articulo}";

			//revisar si existe en la tabla de articulos eliminados
			$checkArticulo = "SELECT * FROM articulos_eliminados WHERE articulo_eliminado = '$id_articulo' ";
			$resultCheck = $con->query($checkArticulo);

			if ($resultCheck ->num_rows > 0) {
				while ($row = $resultCheck ->fetch_assoc()) {
					$cantidad_existente = $row['cantidad'];
				}
					$cantidad_total_eliminados = $cantidad_existente + $cantidad;
				//Actualizar la cantidad de articulos eliminados
				$sql3 = "UPDATE articulos_eliminados SET cantidad = '$cantidad_total_eliminados' WHERE articulo_eliminado = '$id_articulo' ";

				//Insertar la fecha
				$sql4 = "INSERT INTO fecha_eliminados (articulo_eliminado, cantidad) VALUES ('$id_articulo', '$cantidad')";

			} else{
				//Insertar en la tabla de articulos_eliminados
				$sql3 = "INSERT INTO articulos_eliminados (articulo_eliminado,cantidad) VALUES ('$id_articulo','$cantidad') ";

				//Insertar fecha
				$sql4 = "INSERT INTO fecha_eliminados (articulo_eliminado, cantidad) VALUES ('$id_articulo', '$cantidad')";
			}

			if($con->query($sql1)){
				if ($con->query($sql3)) {
					if ($con->query($sql4)) {
						header("Location: ../inv_danado.php?m=9");
					}else{
						echo "Error al ejecutar la consulta 4" . $con ->error;
					}
				}else{
					echo "Error al ejecutar la consulta 3" . $con ->error;
				}
			}else{
				echo "Error al ejecutar consulta 1" . $con ->error;
			}
		
 		} else {
 			
 			$sql1 = "DELETE FROM comentarios_danados WHERE articulo_danado = {$id_articulo}";
 			$sql2 = "DELETE FROM articulos_perdidos WHERE articulo_danado = {$id_articulo}";
		

			//revisar si existe en la tabla de articulos eliminados
			$checkArticulo = "SELECT * FROM articulos_eliminados WHERE articulo_eliminado = '$id_articulo' ";
			$resultCheck = $con->query($checkArticulo);

			if ($resultCheck ->num_rows > 0) {
				while ($row = $resultCheck ->fetch_assoc()) {
					$cantidad_existente = $row['cantidad'];
				}
					$cantidad_total_eliminados = $cantidad_existente + $cantidad_stock;
	
				//Actualizar la cantidad de articulos donados
				$sql3 = "UPDATE articulos_eliminados SET cantidad = '$cantidad_total_eliminados' WHERE articulo_eliminado = '$id_articulo' ";

				//Insertar la fecha
				$sql4 = "INSERT INTO fecha_eliminados (articulo_eliminado, cantidad) VALUES ('$id_articulo', '$cantidad_stock')";

			} else{
				//Insertar en la tabla de articulos_eliminados
				$sql3 = "INSERT INTO articulos_eliminados (articulo_eliminado,cantidad) VALUES ('$id_articulo','$cantidad_stock') ";

				//Insertar fecha
				$sql4 = "INSERT INTO fecha_eliminados (articulo_eliminado, cantidad) VALUES ('$id_articulo', '$cantidad_stock')";
			}


			if($con->query($sql1)){
				if ($con->query($sql2)) {
					if ($con->query($sql3)) {
						if ($con->query($sql4)) {
							header("Location: ../inv_danado.php?m=7");
						} else{
							echo "Error al ejecutar la consulta 4" . $con ->error;
						}
					}else{
						echo "Error al ejecutar la consulta 3" . $con ->error;
					}
				}else{
					echo "Error al ejecutar la consulta 2" . $con ->error;
				}
			}else{
				echo "Error al ejecutar consulta 1" . $con ->error;
			}

 		}
	$con ->close();
 	}
?>
