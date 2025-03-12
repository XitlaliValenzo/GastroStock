<?php 
require_once '../../conf/config.php';
 	if($_POST){
 		$id_articulo = $_POST['id_articulo'];
 		$estatus = $_POST['estatus'];
 		$cantidad_inicial = $_POST['cantidad_inicial'];

 		date_default_timezone_set('America/Mexico_City');
			$fecha = date("Y-m-d");
 		

 		/*if($estatus == 'dañado'){
 			$cantidad_d = $_POST['cantidad_d']; 
 			$comentario = $_POST['comentario'];
 		//ver si el articulo ya tiene una cantidad en la tabla de dañados pra solo actualizar la cantidad
 		$checkArticulo = "SELECT * FROM articulos_danados WHERE articulo_danado = '$id_articulo' ";
 		$resultCheck = $con->query($checkArticulo);
 		
 		if ($resultCheck ->num_rows > 0){
 			while ($row = $resultCheck ->fetch_assoc()) {
 				$cantidad_existente = $row['cantidad'];

 				
 			$cantidad_sum = $cantidad_existente+$cantidad_d;
 			
 			
 			$sqlUpdate = "UPDATE articulos_danados SET cantidad = '$cantidad_sum', comentario = '$comentario',fecha='$fecha' WHERE articulo_danado = {$id_articulo}";
 			$resultUpdate = $con->query($sqlUpdate);

 			$cantidad_total = $cantidad_inicial-$cantidad_d;
 			$sqlUpdate2 = "UPDATE articulos SET cantidad = '$cantidad_total' WHERE id_articulo = {$id_articulo}";
 			$resultUpdate2 = $con->query($sqlUpdate2);
 			header("Location: ../inv_danado.php?m=8");

 			}


 		} else {
 			$cantidad_d = $_POST['cantidad_d'];
 			$comentario = $_POST['comentario'];
 			$sql = "INSERT INTO articulos_danados (articulo_danado,cantidad,comentario) VALUES ('$id_articulo','$cantidad_d','$comentario')";
 			$result = $con->query($sql);

 			$cantidad_total = $cantidad_inicial-$cantidad_d;
 			$sql2 = "UPDATE articulos SET cantidad = '$cantidad_total', estatus = '$estatus' WHERE id_articulo = {$id_articulo}";
 			$result2 = $con->query($sql2);
 			header("Location: ../inv_danado.php?m=8");

 		}	
 		}*/

 		if($estatus == 'perdido'){
 			$cantidad_p = $_POST['cantidad_p']; 
 			//ver si el articulo ya tiene una cantidad en la tabla de dañados pra solo actualizar la cantidad
 			$checkArticulo = "SELECT * FROM articulos_perdidos WHERE articulo_perdido = '$id_articulo' ";
 		$resultCheck = $con->query($checkArticulo);
 		
 		if ($resultCheck ->num_rows > 0){
 			while ($row = $resultCheck ->fetch_assoc()) {
 				$cantidad_existente = $row['cantidad'];

 			$cantidad_sum = $cantidad_existente+$cantidad_p;
 			$sqlUpdate = "UPDATE articulos_perdidos SET cantidad = '$cantidad_sum',fecha='$fecha' WHERE articulo_perdido = {$id_articulo}";
 			$resultUpdate = $con->query($sqlUpdate);

 			$cantidad_total = $cantidad_inicial-$cantidad_p;
 			$sqlUpdate2 = "UPDATE articulos_danados SET cantidad = '$cantidad_total' WHERE articulo_danado = {$id_articulo}";
 			$resultUpdate2 = $con->query($sqlUpdate2);
 			header("Location: ../inv_danado.php?m=8");

 			}


 		} else {

 			$cantidad_p = $_POST['cantidad_p'];
 			
 			$sql = "INSERT INTO articulos_perdidos (articulo_perdido,cantidad) VALUES ('$id_articulo','$cantidad_p')";
 			$result = $con->query($sql);

 			$cantidad_total = $cantidad_inicial-$cantidad_p;
 			$sql2 = "UPDATE articulos_danados SET cantidad = '$cantidad_total' WHERE articulo_danado = {$id_articulo}";
 			$result2 = $con->query($sql2);
 			header("Location: ../inv_danado.php?m=8");

 		} 
		
 		}
}
 		

		/*if($con -> query($sql) === TRUE) {
			$result = $con->query($sql2);
			header("Location: ../materiales.php?m=7");
		} else {
			echo "Error al actualizar el registro" . $con ->error;
		}*/
	$con ->close();
 	


?>