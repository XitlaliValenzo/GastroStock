<?php
session_start();

if (isset($_GET['cant'])) {
    $index = $_GET['cant'];

    if (isset($_SESSION['solicitud']) && isset($_SESSION['solicitud'][$index])) {
        
        $cantidadActual = $_SESSION['solicitud'][$index][3];

        if ($cantidadActual > 1) {
            $_SESSION['solicitud'][$index][3] -= 1;
            header("Location: ../../home.php"); 
        } else {
            header("Location: ../../home.php?m=2");
        }
    }
}

exit();
?>