<?php
 //incluimos la conexion a la BD
 include_once('../conf/config.php');

// Conectar a la base de datos y obtener el nombre de la imagen para el alumno específico
$id_alumno = 1; // Supongamos que este es el id del alumno cuya imagen queremos mostrar
$query = "SELECT foto FROM usuarios WHERE id=$id_alumno";
$resultado = mysqli_query($con, $query);
$fila = mysqli_fetch_assoc($resultado);
$nombreImagen = $fila['foto'];

// Mostrar la imagen
echo "<img src='uploads/$nombreImagen' class='img-fluid' alt='Foto de usuario'>";
?>
