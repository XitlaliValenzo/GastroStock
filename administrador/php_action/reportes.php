<?php

include '../../conf/config.php';

function obtenerDatos($tipo) {
    $datos = [];
    if ($tipo == 'mensual') {
        $datos['mes'] = $_POST['mes'];
        $datos['year'] = $_POST['year'];
    } else if ($tipo == 'cuatrimestral') {
        $datos['cuatrimestre'] = $_POST['cuatrimestre'];
        $datos['year'] = $_POST['year'];
    } else if ($tipo == 'anual') {
        $datos['year'] = $_POST['year'];
    } else if ($tipo == 'fechaEspecifica') {
        $datos['fecha'] = $_POST['fecha'];
    }
    return $datos;
}


if ($_POST){
    $reporte = $_POST['reporte'];
    $tipo = $_POST['tipo'];

    $datos = obtenerDatos($tipo);

    if ($reporte == 'adquiridos'){
        
        header("Location: ../fpdf186/reportes.php?" . http_build_query([
            'reporte' => $reporte,
            'tipo' => $tipo,
        ] + $datos));
        exit;
        

    } else if ($reporte == 'donados'){
        header("Location: ../fpdf186/reportes.php?" . http_build_query([
            'reporte' => $reporte,
            'tipo' => $tipo,
        ] + $datos));
        exit;

    } else if ($reporte == 'danados') {
        header("Location: ../fpdf186/reportes.php?" . http_build_query([
            'reporte' => $reporte,
            'tipo' => $tipo,
        ] + $datos));
        exit;
    } else if ($reporte == 'perdidos'){
        header("Location: ../fpdf186/reportes.php?" . http_build_query([
            'reporte' => $reporte,
            'tipo' => $tipo,
        ] + $datos));
        exit;

    } else if ($reporte == 'mantenimiento'){
        header("Location: ../fpdf186/reportes.php?" . http_build_query([
            'reporte' => $reporte,
            'tipo' => $tipo,
        ] + $datos));
        exit;

    } else if ($reporte == 'eliminados'){
        header("Location: ../fpdf186/reportes.php?" . http_build_query([
            'reporte' => $reporte,
            'tipo' => $tipo,
        ] + $datos));
        exit;

    } else if ($reporte == 'reposiciones') {
        header("Location: ../fpdf186/reportes.php?" . http_build_query([
            'reporte' => $reporte,
            'tipo' => $tipo,
        ] + $datos));
        exit;

    }
} 



?>