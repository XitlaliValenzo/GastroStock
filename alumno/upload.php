<?php
//incluimos la conexion a la BD
include_once('../conf/config.php');
// Verificar si se ha enviado una imagen
if ($_FILES['foto']) {
    $nombreArchivoOriginal = $_FILES['foto']['name'];
    $archivoTemporal = $_FILES['foto']['tmp_name'];

    // Generar un nombre único para la imagen
    $nombreUnico = time() . '_' . $nombreArchivoOriginal;

    // Subir imagen al servidor
    move_uploaded_file($archivoTemporal, "uploads/$nombreUnico");

    // Guardar el nombre único de la imagen en la base de datos
    $id_alumno = $_POST['id']; // Supongamos que este es el id del alumno que subió la foto
    $nombreUnico = mysqli_real_escape_string($con, $nombreUnico);
    $query = "UPDATE usuarios SET foto='$nombreUnico' WHERE id=$id_alumno";
    mysqli_query($con, $query);
}
header("Location: perfil.php");
exit();
?>
