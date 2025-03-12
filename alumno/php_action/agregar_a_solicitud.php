<?php

require_once '../../conf/config.php';

$id_articulo = $_POST['id_articulo'];
$imagen = $_POST['imagen'];
$nombre = $_POST['nombre'];
$cantidad_articulo = $_POST['cantidad_articulo'];
$cantidad = $_POST['cantidad'];

if ($cantidad_articulo > 0) {
	$articulo = array($id_articulo, $imagen, $nombre, $cantidad_articulo, $cantidad);

$query = "SELECT cantidad FROM  articulos WHERE id_articulo = $id_articulo";
$result = $con->query($query);
$stockActual = 0;
if ($row = $result->fetch_assoc()){
	$stockActual = $row['cantidad'];

}
if($stockActual >= $cantidad_articulo) {
	session_start();

if(isset($_SESSION["solicitud"])) {
	$solicitud = $_SESSION["solicitud"];
} else {
	$solicitud = array();
}

$sumaStocks = 0;
$articulo_encontrado = false;

foreach ($solicitud as &$a) {
	if ($a[0] == $id_articulo){
		$sumaStocks += $a[3];
		$articulo_encontrado = true;
	}
}

$sumaStocks += $cantidad_articulo;
 if($articulo_encontrado == false ){

 	if ($cantidad >= $sumaStocks){
	array_push($solicitud, $articulo);
	$_SESSION["solicitud"] = $solicitud;
	header("Location: ../../home.php");
	} else {
		header("Location: ../../home.php?m=1");
	}
 } else {
 		if ($cantidad >= $sumaStocks){

 			foreach ($solicitud as &$a) {
	if ($a[0] == $id_articulo){
		$a[3] += $cantidad_articulo;
	}
}


	$_SESSION["solicitud"] = $solicitud;
	header("Location: ../../home.php");
	} else {
		header("Location: ../../home.php?m=1");
	}
 		
 
 }

} else {
	header("Location: ../../home.php?m=1");
}

} else {
	header("Location: ../../home.php?m=2");
}
 
?>



