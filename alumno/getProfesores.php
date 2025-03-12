<?php
require_once '../conf/config.php';

// Obtiene el ID de la asignatura de la solicitud
$asignaturaId = $_GET['asignatura'];

$sqlProfesor = "SELECT profesores.id_profesor AS id, profesores.nombre AS nombre
                FROM profesores
                INNER JOIN profesores_materias ON profesores.id_profesor = profesores_materias.profesor
                WHERE profesores_materias.materia = '$asignaturaId'";
$resultProfesor = $con->query($sqlProfesor);

$profesores = [];
if ($resultProfesor->num_rows > 0) {
    while ($profesor = $resultProfesor->fetch_assoc()) {
        $profesores[] = [
            'id' => $profesor['id'],
            'nombre' => $profesor['nombre']
        ];
    }
}

echo json_encode($profesores);
?>
