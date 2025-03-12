<?php
include_once "../conf/config.php";

if($_POST){
    $nuevoEstatus = $_POST['nuevoEstatus'];
    $id_solicitud = $_POST['id_solicitud'];
    $comentario = "Artículo perdido en la requisición " . $id_solicitud;

    if ($nuevoEstatus == 'faltantes'){
         // Arreglo de los artículos seleccionados
         $articulosSeleccionados = isset($_POST['articulos']) ? $_POST['articulos'] : [];
         //artículos asociados de la solicitud actual
         $sqlTodosArticulos = "SELECT articulo, cantidad_articulo FROM articulos_solicitud 
         WHERE solicitud = '$id_solicitud'";
         $resultTodosArticulos = $con->query($sqlTodosArticulos);

         // arreglo para poner los artículos no seleccionados
         $articulosNoSeleccionados = [];
        
         //articulos seleccionados
         while($rowArticulo = $resultTodosArticulos->fetch_assoc()){
            $id_articulo = $rowArticulo['articulo'];
            $cantidad_solicitud = $rowArticulo['cantidad_articulo'];

            if (in_array($id_articulo, $articulosSeleccionados)) {
                
                $index = array_search($id_articulo, $articulosSeleccionados);
                $cantidad_perdida = isset($_POST['cantidad_perdida_' . $index]) 
                                    ? intval($_POST['cantidad_perdida_' . $index]) 
                                    : 0;
    
                $sql1 = "INSERT INTO articulos_perdidos (articulo_perdido,cantidad,solicitud) VALUES ('$id_articulo','$cantidad_perdida','$id_solicitud')";
                $result1 = $con -> query($sql1);
                        
                $sql2= "INSERT INTO comentarios_perdidos (comentario, articulo_perdido, cantidad) VALUES ('$comentario','$id_articulo','$cantidad_perdida')";
                $result2 = $con -> query($sql2);

                $sql3 = "SELECT * FROM articulos WHERE id_articulo='$id_articulo'";
            $result3 = $con -> query($sql3);
            while($row3 = $result3 ->fetch_assoc()) {
                $cantidad_existente = $row3['cantidad'];
                $cantidad_final = $cantidad_existente;

                $sql4 = "UPDATE articulos SET cantidad = '$cantidad_final' WHERE id_articulo = '$id_articulo' ";
                $result4 = $con -> query($sql4);
            }  
            } else {
                $articulosNoSeleccionados[] = $id_articulo;
            }

         }
         //articulos no seleccionados
         foreach($articulosNoSeleccionados as $id_articulo_no_seleccionado){
            $sqlCantidadNoSeleccionada = "SELECT cantidad FROM articulos WHERE id_articulo = '$id_articulo_no_seleccionado'";
            $resultCantidadNoSeleccionada = $con->query($sqlCantidadNoSeleccionada);
            $rowCantidad = $resultCantidadNoSeleccionada->fetch_assoc();
            $cantidad_existente = $rowCantidad['cantidad'];
            
            $sqlCantidadSolicitud = "SELECT cantidad_articulo FROM articulos_solicitud 
                             WHERE articulo = '$id_articulo_no_seleccionado' 
                             AND solicitud = '$id_solicitud'";
            $resultCantidadSolicitud = $con->query($sqlCantidadSolicitud);
            $rowCantidadSolicitud = $resultCantidadSolicitud->fetch_assoc();
            $cantidad_solicitud = $rowCantidadSolicitud['cantidad_articulo'];

    // Sumar la cantidad de la solicitud al inventario del artículo
    $cantidad_final = $cantidad_existente + $cantidad_solicitud;

    // Actualizar la cantidad del artículo en la tabla 'articulos'
    $sqlActualizarNoSeleccionado = "UPDATE articulos 
                                     SET cantidad = '$cantidad_final' 
                                     WHERE id_articulo = '$id_articulo_no_seleccionado'";
    $resultActualizarNoSeleccionado = $con->query($sqlActualizarNoSeleccionado);
            
         }
        
         $sqlActualizar1 = "UPDATE solicitud SET estatus ='$nuevoEstatus', fecha_reposicion = DATE_ADD(CURDATE(), INTERVAL 5 DAY) WHERE id ='$id_solicitud' " ;
        if (!$con->query($sqlActualizar1)) {
            echo "Error al cambiar el estatus" . $con->error;
        } else{
            header("Location: solic_faltantes.php?m=1");

        }
            
        
        

    } elseif ($nuevoEstatus == 'finalizada'){
        $sql5 = "SELECT * FROM articulos_solicitud INNER JOIN articulos ON articulos_solicitud.articulo = articulos.id_articulo WHERE articulos_solicitud.solicitud = '$id_solicitud'";
        $result5 = $con -> query($sql5);
        while($row5 = $result5 ->fetch_assoc()) {
            $id_articulo = $row5['articulo'];
            $cantidad_existente = $row5['cantidad'];
            //cantidad que regresan completa de la requisicion
            $cantidad_solicitud = $row5['cantidad_articulo'];
            $cantidad_resultado = $cantidad_existente+$cantidad_solicitud;

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
    
}
mysqli_close($con);
?>
