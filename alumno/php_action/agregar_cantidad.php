<?php
session_start();

if (isset($_GET['cant'])) {
    $index = $_GET['cant'];

    if (isset($_SESSION['solicitud']) && isset($_SESSION['solicitud'][$index])) {
        
        $articulo = $_SESSION['solicitud'][$index];
        $cantidadActual = $articulo[3];
        $stockTotal = $articulo[4]; 

        if ($cantidadActual < $stockTotal) {
            $_SESSION['solicitud'][$index][3] += 1; 

            header("Location: ../../home.php");
        } else {
            header("Location: ../../home.php?m=1");
        }
    }
}

exit();
?>