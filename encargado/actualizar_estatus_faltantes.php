<?php 
include_once "../conf/config.php";

if($_POST){

    $nuevoEstatus = $_POST['nuevoEstatus'];
    $id_solicitud = $_POST['id_solicitud'];

    $sql5 = "SELECT articulos.cantidad AS cantidadExistente, articulos_perdidos.articulo_perdido AS articulo,articulos.nombre,articulos_perdidos.cantidad AS cantidadFaltante FROM articulos_perdidos 
          INNER JOIN articulos ON articulos.id_articulo = articulos_perdidos.articulo_perdido
          WHERE articulos_perdidos.solicitud =  $id_solicitud";
        $result5 = $con -> query($sql5);
        while($row5 = $result5 ->fetch_assoc()) {
            $id_articulo = $row5['articulo'];
            $cantidad_faltante = $row5['cantidadFaltante'];
            $cantidad_existente = $row5['cantidadExistente'];
            $cantidad_resultado = $cantidad_existente+$cantidad_faltante;
            echo $cantidad_faltante;

            $sql6 = "UPDATE articulos SET cantidad = '$cantidad_resultado' WHERE id_articulo = '$id_articulo' ";
                $result6 = $con -> query($sql6);
        }



       $sqlActualizar = "UPDATE solicitud SET estatus ='$nuevoEstatus', fecha_entrega = CURDATE() WHERE id ='$id_solicitud' " ;
        if (!$con->query($sqlActualizar)) {
            echo "Error al cambiar el estatus" . $con->error;
        } else{
            header("Location: solic_finalizadas.php?m=1");

        }

}

mysqli_close($con);
?>