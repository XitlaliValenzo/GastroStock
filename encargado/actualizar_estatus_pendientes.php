<?php
include_once "../conf/config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener el nuevo estatus y el ID de la solicitud desde el formulario
    $nuevoEstatus = $_POST['nuevoEstatus'];
    $idSolicitud = $_POST['id']; 

    // Consulta SQL para actualizar el estatus en la base de datos
    $sql = "UPDATE solicitud SET estatus = '$nuevoEstatus' WHERE id = $idSolicitud";
    $sql2 = "SELECT * FROM articulos_solicitud INNER JOIN articulos ON articulos.id_articulo = articulos_solicitud.articulo WHERE solicitud = '$idSolicitud' ";

    // Ejecutar la consulta
    if (mysqli_query($con, $sql)) {
        $result = $con -> query($sql2);
        if($result ->num_rows > 0){
            while($row = $result ->fetch_assoc()) {
                $id_articulo = $row['articulo'];
                $cantidad_articulo_solicitud = $row['cantidad_articulo'];
                $cantidad_existente = $row['cantidad'];

                $cantidad_resultante = $cantidad_existente - $cantidad_articulo_solicitud;
                
                $sql3 = "UPDATE articulos SET cantidad = '$cantidad_resultante' WHERE id_articulo = '$id_articulo' ";
                $result3 = $con -> query($sql3);
            }
        }
        header("Location: solic_prestamo.php?m=1");

    } else {
        echo "Error al cambiar actualizar el estatus " . $con->error;
    }
        
} 
?>
