<?php
	include '../../conf/config.php';

	if ($_POST) {

		$cantidad_agregar = $_POST['cantidad_agregar'];
		//cantidad de la tabla general de articulos
		$cantidad_stock = $_POST['cantidad_stock'];
		//cantidad que ya esta en la tabla de perdidos
		$cantidad_danados = $_POST['cantidad_danados'];
		$comentario = $_POST['comentario'];
		$id_articulo = $_POST['id_articulo'];

		if ($cantidad_agregar <= 0){
			header("Location: ../inv_danado.php?m=12");
		} elseif($cantidad_agregar >= $cantidad_stock){
			header("Location: ../inv_danado.php?m=11");
		} elseif($cantidad_agregar <= $cantidad_stock){
			$cantidad_total = $cantidad_stock - $cantidad_agregar;

			$sql1 = "UPDATE articulos SET cantidad = '$cantidad_total' WHERE id_articulo = {$id_articulo}";

			$cantidad_total_danados = $cantidad_danados + $cantidad_agregar;
 			$sql2 = "UPDATE articulos_danados SET cantidad = '$cantidad_total_danados' WHERE articulo_danado = {$id_articulo}";

 			$sql3 = "INSERT INTO comentarios_danados (comentario,articulo_danado,cantidad) VALUES ('$comentario','$id_articulo','$cantidad_agregar')";
 		}	
	}

	if($con -> query($sql1) === TRUE) {
			if($con->query($sql2) === TRUE){
				if ($con->query($sql3) === TRUE) {
					header("Location: ../inv_danado.php?m=10");
				} else{
					echo "Error al actualizar el registro3" . $con ->error;
				}
				
			} else{
				echo "Error al actualizar el registro2" . $con ->error;
			}
		} else {
			echo "Error al actualizar el registro1" . $con ->error;
		}
	$con ->close();

?>