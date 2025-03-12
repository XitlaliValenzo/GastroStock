<?php 
session_start();
header('Content-Type: application/json');

$datos = json_decode(file_get_contents('php://input'), true);

if(isset($datos['cantidad']) && isset($datos['ie'])){
    $cantidad = $datos['cantidad'];
    $index = $datos['ie'];


    if (isset($_SESSION['solicitud']) && isset($_SESSION['solicitud'][$index])) {
        
        $articulo = $_SESSION['solicitud'][$index];
        $cantidadActual = $articulo[3];
        $stockTotal = $articulo[4]; 

        if ($cantidad > $stockTotal) {
            echo json_encode(array("success" => false, "messageCode" => 1));
        } else if ($cantidad == 0) {
            echo json_encode(array("success" => false, "messageCode" => 2));
        } else {
            $_SESSION['solicitud'][$index][3] = $cantidad;
            echo json_encode(array("success" => true));
        }
    }



}

exit();

?>