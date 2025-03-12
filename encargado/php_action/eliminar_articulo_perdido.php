<?php 
 	require_once '../../conf/config.php';
 	if($_POST){

 		$opc_eliminar = $_POST['opc_eliminar'];
 		$id_articulo = $_POST['id_articulo'];

 		if($opc_eliminar == 'elim_cantidad'){

 		
 		$cantidad_inicial = $_POST['cantidad_inicial'];
 		$cantidad = $_POST['cantidad'];

 		$cantidad_total = $cantidad_inicial-$cantidad;

		$sql1 = "UPDATE articulos_perdidos SET cantidad = '$cantidad_total' WHERE articulo_perdido = {$id_articulo}";
		$result1 = $con->query($sql1);
		$sql2 = "INSERT INTO articulos_eliminados (articulo_eliminado,cantidad) VALUES ('$id_articulo','$cantidad')";
		$result2 = $con->query($sql2);
		header("Location: ../inv_perdido.php?m=9");

 		} else {
 			

 			$sql3 = "DELETE FROM articulos_perdidos WHERE articulo_perdido = {$id_articulo}";
			$result3 = $con->query($sql3);
			header("Location: ../inv_perdido.php?m=7");

 		}
	$con ->close();
 	}
?>