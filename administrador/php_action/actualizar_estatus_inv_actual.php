<?php 
require_once '../../conf/config.php';

 	if($_POST){
 		$id_articulo = $_POST['id_articulo'];
 		$estatus = $_POST['estatus'];
 		//cantidad que existe en el stock
 		$cantidad_inicial = $_POST['cantidad_inicial'];
 		$comentario = $_POST['comentario'];
 		

 		if($estatus == 'dañado'){
 			$cantidad_d = $_POST['cantidad_d']; 
 			

 			$cantidad_total= $cantidad_inicial-$cantidad_d;

 			//ver si el articulo ya existe en la tabla de dañados y así solo sumar la cantidad
 			$checkArticulo = "SELECT * FROM articulos_danados WHERE articulo_danado = '$id_articulo' ";
			$resultCheck = $con->query($checkArticulo);
			if ($resultCheck ->num_rows > 0) {
				while ($row = $resultCheck ->fetch_assoc()) {
					//cantidad existente en la tabla de articulos dañados
					$cantidad_existente = $row['cantidad'];
					
				}
				
				$cantidad_danados = $cantidad_d + $cantidad_existente;

				//actualiza la cantidad en la tabla general de los articulos
				$sql = "UPDATE articulos SET cantidad = '$cantidad_total' WHERE id_articulo = {$id_articulo}";
				//actualiza la cantidad del articulo dañado que ya está en la tabla
				$sql2 = "UPDATE articulos_danados SET cantidad = '$cantidad_danados' WHERE articulo_danado = {$id_articulo}";
				//inserta el comentario en la tabla de comentarios
				$sqlComent = "INSERT INTO comentarios_danados (comentario, articulo_danado, cantidad) VALUES ('$comentario', '$id_articulo', '$cantidad_d') ";

			} else {
				//actualiza la cantidad en la tabla general de los articulos
				$sql = "UPDATE articulos SET cantidad = '$cantidad_total' WHERE id_articulo = {$id_articulo}";
				//inserta la cantidad en la tabla general de los articulos
				$sql2 = "INSERT INTO articulos_danados (articulo_danado,cantidad) VALUES ('$id_articulo','$cantidad_d')";
				//inserta el comentario en la tabla de comentarios
				$sqlComent = "INSERT INTO comentarios_danados (comentario, articulo_danado, cantidad) VALUES ('$comentario', '$id_articulo', '$cantidad_d') ";

			}
 			
 		} else {
 			$cantidad_p = $_POST['cantidad_p'];
 			$cantidad_total= $cantidad_inicial-$cantidad_p;
 			//ver si el articulo ya existe en la tabla de perdidos y así solo sumar la cantidad
 			$checkArticulo = "SELECT * FROM articulos_perdidos WHERE articulo_perdido = '$id_articulo' ";
			$resultCheck = $con->query($checkArticulo);
			if ($resultCheck ->num_rows > 0) {
				while ($row = $resultCheck ->fetch_assoc()) {
					//cantidad existente en la tabla de articulos dañados
					$cantidad_existente = $row['cantidad'];
				}
				
				$cantidad_perdidos = $cantidad_p + $cantidad_existente;

				//actualiza la cantidad en la tabla general de los articulos
				$sql = "UPDATE articulos SET cantidad = '$cantidad_total' WHERE id_articulo = {$id_articulo}";
				//actualiza la cantidad del articulo dañado que ya está en la tabla
				$sql2 = "UPDATE articulos_perdidos SET cantidad = '$cantidad_perdidos' WHERE articulo_perdido = {$id_articulo}";
				//inserta el comentario en la tabla de comentarios
				$sqlComent = "INSERT INTO comentarios_perdidos (comentario, articulo_perdido, cantidad) VALUES ('$comentario', '$id_articulo', '$cantidad_p') ";

			} else {
				//actualiza la cantidad en la tabla general de los articulos
				$sql = "UPDATE articulos SET cantidad = '$cantidad_total' WHERE id_articulo = {$id_articulo}";
				//inserta la cantidad en la tabla general de los articulos
				$sql2 = "INSERT INTO articulos_perdidos (articulo_perdido,cantidad) VALUES ('$id_articulo','$cantidad_p')";
				//inserta el comentario en la tabla de comentarios
				$sqlComent = "INSERT INTO comentarios_perdidos (comentario, articulo_perdido, cantidad) VALUES ('$comentario', '$id_articulo', '$cantidad_p') ";

			}
 		}
}
 		
		if($con -> query($sql) === TRUE) {
			if($con->query($sql2) === TRUE){
				if ($con->query($sqlComent) === TRUE) {
					header("Location: ../inv_actual.php?m=8");
				}	
			} else{
				echo "Error al actualizar el registro2" . $con ->error;
			}
		} else {
			echo "Error al actualizar el registro1" . $con ->error;
		}
	$con ->close();
 	


?>