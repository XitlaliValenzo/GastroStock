<?php 

include '../../conf/config.php';

if ($_POST) {
	$cantidad_agregar = $_POST['cantidad_agregar'];
	$comentario = $_POST['comentario'];

	$id_articulo = $_POST['id_articulo'];
	//cantidad que se encuentra en la tabla de articulos dañados
	$cantidad_stock = $_POST['cantidad_stock'];
	//cantidad que se encuentra en la tabla de articulos general
	$cantidad_articulos = $_POST['cantidad_articulos'];


	if ($cantidad_agregar <= 0){
			header("Location: ../inv_danado.php?m=12");
		} elseif($cantidad_agregar >= $cantidad_articulos){
			header("Location: ../inv_danado.php?m=11");
		} elseif($cantidad_agregar <= $cantidad_articulos){

			//Restar la cantidad en la tabla de articulos general
			$cantidad_total = $cantidad_articulos - $cantidad_agregar;
			$sql1 = "UPDATE articulos SET cantidad = '$cantidad_total' WHERE id_articulo = '$id_articulo' ";

			//Restar la cantidad en la tabla de dañados
			$cantidad_total_danados = $cantidad_stock - $cantidad_agregar;
			$sql2 = "UPDATE articulos_danados SET cantidad = '$cantidad_total_danados' WHERE articulo_danado = '$id_articulo' ";

			//ver si existe en la tabla de articulos_reparacion
			$checkArticulo = "SELECT * FROM articulos_reparacion WHERE articulo_reparacion = '$id_articulo' ";
			$resultCheck = $con->query($checkArticulo);
			if ($resultCheck ->num_rows > 0) {
				while ($row = $resultCheck ->fetch_assoc()) {
					$cantidad_existente = $row['cantidad'];
				}
				//si si existe actualizar la cantidad e insertar en comentarios reparación
				$cantidad_total_reparacion = $cantidad_existente + $cantidad_agregar;

				$sql3 = "UPDATE articulos_reparacion SET cantidad = '$cantidad_total_reparacion' WHERE articulo_reparacion = '$id_articulo' ";

				$sql4 = "INSERT INTO comentarios_reparacion (articulo_reparacion,cantidad,comentario) VALUES ('$id_articulo','$cantidad_agregar','$comentario')";
			} else{
				//si no existe insertar en la tabla de articulos_reparación e insertar en comentarios_reparacion
				$sql3 = "INSERT INTO articulos_reparacion (articulo_reparacion,cantidad) VALUES ('$id_articulo','$cantidad_agregar')";

				$sql4 = "INSERT INTO comentarios_reparacion (articulo_reparacion,cantidad,comentario) VALUES ('$id_articulo','$cantidad_agregar','$comentario')";

			}
 		}	
 		if($con -> query($sql1) === TRUE) {
			if($con->query($sql2) === TRUE){
				if ($con->query($sql3) === TRUE) {
					if ($con->query($sql4) === TRUE) {
						header("Location: ../inv_danado.php?m=14");
					}else{
						echo "Error al actualizar el registro4" . $con ->error;
					}
					
				} else{
					echo "Error al actualizar el registro3" . $con ->error;
				}
				
			} else{
				echo "Error al actualizar el registro2" . $con ->error;
			}
		} else {
			echo "Error al actualizar el registro1" . $con ->error;
		}
 		$con->close();
	
}




?>