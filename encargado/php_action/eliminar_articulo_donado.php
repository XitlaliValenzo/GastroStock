<?php 
 	require_once '../../conf/config.php';
 	if($_POST){

 		$opc_eliminar = $_POST['opc_eliminar'];
 		$id_articulo = $_POST['id_articulo'];
 		

 		if($opc_eliminar == 'elim_cantidad'){

 		
 		$cantidad_inicial = $_POST['cantidad_inicial'];
 		$cantidad = $_POST['cantidad'];

 		$cantidad_total = $cantidad_inicial-$cantidad;

		$sql1 = "UPDATE articulos SET cantidad = '$cantidad_total' WHERE id_articulo = {$id_articulo}";
		$result1 = $con->query($sql1);
		$sql2 = "INSERT INTO articulos_eliminados (articulo_eliminado,cantidad) VALUES ('$id_articulo','$cantidad')";
		$result2 = $con->query($sql2);
		header("Location: ../inv_donado.php?m=9");

 		} else {
 			$estatus = 'eliminado';

 			$sql3 = "UPDATE articulos SET estatus = '$estatus' WHERE id_articulo = {$id_articulo}";
			$result3 = $con->query($sql3);
			header("Location: ../inv_donado.php?m=7");

 		}
	$con ->close();
 	}
?>