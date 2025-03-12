<?php 
 	require_once '../../conf/config.php';
 	function eliminarArticulo ($con,$id_articulo,$cantidad, $cantidad_total, $estatus, $opc_eliminar){

 		//ver si el articulo ya existe en la tabla de articulos eliminados
 		$checkArticulo = "SELECT * FROM articulos_eliminados WHERE articulo_eliminado = '$id_articulo' ";
		$resultCheck = $con->query($checkArticulo);

		if ($resultCheck ->num_rows > 0) {
			while ($row = $resultCheck ->fetch_assoc()) {
				$cantidad_existente = $row['cantidad'];
			}
			$cantidad_sum = $cantidad_existente+$cantidad;
			//Actualizar en la cantidad en la tabla de articulos eliminados 
			$sql1 = "UPDATE articulos_eliminados SET cantidad = '$cantidad_sum' WHERE articulo_eliminado = {$id_articulo}";

			//actualizar la cantidad en la tabla de articulos general
 			$sql2 = "UPDATE articulos SET cantidad = '$cantidad_total', estatus='$estatus' WHERE id_articulo = {$id_articulo}";
 			//Inserta la fecha en la tabla de fechas
 			$sql3 = "INSERT INTO fecha_eliminados (articulo_eliminado, cantidad) VALUES ('$id_articulo', '$cantidad')";
		} else {
			//Insertar en la tabla de articulos eliminados
 			$sql1 = "INSERT INTO articulos_eliminados (articulo_eliminado,cantidad) VALUES ('$id_articulo','$cantidad')";

 			//actualizar la cantidad en la tabla de articulos general
 			$sql2 = "UPDATE articulos SET cantidad = '$cantidad_total', estatus='$estatus' WHERE id_articulo = {$id_articulo}";
 			//Inserta la fecha en la tabla de fechas
 			$sql3 = "INSERT INTO fecha_eliminados (articulo_eliminado, cantidad) VALUES ('$id_articulo', '$cantidad')";
		}


 		if($con -> query($sql1) === TRUE) {
			if($con->query($sql2) === TRUE){
				if ($con->query($sql3) === TRUE){
					if ($opc_eliminar == 'elim_cantidad'){
 						header("Location: ../materiales.php?m=9");
 					}else{
 						header("Location: ../materiales.php?m=7");
 					}
				} else {
					echo "Error al actualizar el registro2" . $con ->error;
				}
				
			} else{
				echo "Error al actualizar el registro2" . $con ->error;
			}
		} else {
			echo "Error al actualizar el registro1" . $con ->error;
		}

 	}

 	if($_POST){
 		$opc_eliminar = $_POST['opc_eliminar'];
 		$id_articulo = $_POST['id_articulo'];
 		
		//cantidad que hay en el stock
		$cantidad_inicial = $_POST['cantidad_inicial'];
		
		if ($opc_eliminar=='elim_cantidad') {

			$cantidad = $_POST['cantidad'];
			if ($cantidad > $cantidad_inicial) {
				header("Location: ../materiales.php?m=11");
			} elseif ($cantidad <= 0 ){
				header("Location: ../materiales.php?m=12");

			} elseif($cantidad <= $cantidad_inicial){
				//activo porque no se elimina toda la cantidad
 					$estatus = 'activo';
 					$cantidad_total = $cantidad_inicial-$cantidad;

 					eliminarArticulo($con,$id_articulo,$cantidad, $cantidad_total, $estatus, $opc_eliminar);

			}

			
		} else {
			$estatus = 'eliminado';

 				$cantidad_total = $cantidad_inicial-$cantidad_inicial;
 				eliminarArticulo($con,$id_articulo,$cantidad_inicial, $cantidad_total, $estatus, $opc_eliminar);

		}
	
	}

	$con ->close();
 	
?>