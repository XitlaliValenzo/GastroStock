<?php 

include '../../conf/config.php';


if ($_POST) {
	$cantidad_agregar = $_POST['cantidad_agregar'];
	$id_articulo = $_POST['id_articulo'];
	//cantidad que existe en la tabla de articulos reparacion
	$cantidad_stock = $_POST['cantidad_stock'];
	//cantidad que existe en la tabla de articulos
	$cantidad_articulos = $_POST['cantidad_articulos'];

	//actualizar la cantidad en la tabla de articulos
		$cantidad_total = $cantidad_agregar + $cantidad_articulos;
		$sql3 = "UPDATE articulos SET cantidad = '$cantidad_total' WHERE id_articulo = '$id_articulo' ";

		//restar la cantidad en articulos reparacion
		$cantidad_total_reparados = $cantidad_stock - $cantidad_agregar;
		$sql4 = "UPDATE articulos_reparacion SET cantidad = '$cantidad_total_reparados' WHERE articulo_reparacion = '$id_articulo' ";


			if($cantidad_agregar <= 0){
				header("Location: ../inv_mantenimiento.php?m=12");
			} elseif($cantidad_agregar > $cantidad_stock){
				header("Location: ../inv_mantenimiento.php?m=15");

			} elseif($cantidad_agregar <= $cantidad_stock){

				if($con->query($sql3)){
				if ($con->query($sql4)) {
					header("Location: ../inv_mantenimiento.php?m=13");
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