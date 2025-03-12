<?php 

require_once '../../conf/config.php';
session_start();

$solicitud = $_SESSION['solicitud'];
$total = $_SESSION['total'];


$listaArticulos = $solicitud;

$equipo = $_POST['alumno'];
$solicitante = $_POST['solicitante'];
$asignatura = $_POST['asignatura'];
$profesor = $_POST['profesor'];
$fecha_solicitud = $_POST['fecha_solicitud'];
/*print_r($equipo);*/

$sqlnum = "INSERT INTO num_equipo (activo) VALUES (1)";
$resultnum = $con->query($sqlnum);

$sql3 = "SELECT max(id) FROM num_equipo"; 
$result3 = $con->query($sql3);

$idUltimoEquipo = 0;

if($row2 = $result3->fetch_assoc()){
	$idUltimoEquipo = $row2['max(id)'];
}

foreach ($equipo as $alumno) {
 $sqlequipo = "INSERT INTO integrantes_equipo (alumno, num_equipo) VALUES ('$alumno', '$idUltimoEquipo')";
 $resultequipo = $con->query($sqlequipo);
}





$sql = "INSERT INTO solicitud (solicitante, total, equipo, asignatura, profesor, fecha_solicitud, estatus) VALUES ( '$solicitante', '$total', '$idUltimoEquipo', '$asignatura', '$profesor', '$fecha_solicitud', 'pendiente')";
$result = $con->query($sql);

$sql2 = "SELECT max(id) FROM solicitud"; 
$result2 = $con->query($sql2);

$idUltimaSolicitud = 0;

if($row = $result2->fetch_assoc()){
	$idUltimaSolicitud = $row['max(id)'];
}
/*
$id_articulo 0;
$imagen = 1;
$nombre = 2;
$cantidad_articulo = 3;
$cantidad = 4*/

foreach ($listaArticulos as $art){
	 
    
	$query = "INSERT INTO articulos_solicitud (solicitud, articulo, cantidad_articulo) VALUES ('$idUltimaSolicitud', '$art[0]', '$art[3]')";

	$result = $con->query($query);

	//Actualizar stock
$query_act = "SELECT cantidad FROM articulos WHERE id_articulo = $art[0]";
$result_act = $con->query($query_act);

$stockActual = 0;
if ($row_act = $result_act->fetch_assoc()){
	$stockActual = $row_act['cantidad'];

}

$stockActual -= $art[3];

$query_act2 = "UPDATE articulos SET cantidad = $stockActual where id_articulo = $art[0]";
$result_act2 = $con->query($query_act2);

}






unset($_SESSION['solicitud']);
unset($_SESSION['solicitud']);
header("Location: ../../home.php?m=3");

?>