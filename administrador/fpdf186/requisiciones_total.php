<?php
header('Content-Type: text/html; charset=utf-8');
require('fpdf.php');

// Obtiene el parámetro 'dias' de la URL
$dias = isset($_GET['dias']) ? $_GET['dias'] : null;

if ($dias === null) {
    die('Debe proporcionar un rango de días válido.');
}

class PDF extends FPDF {
    function Header() {
        $this->Image('img/header.png', 10, 10, 190); // Asegúrate de que la ruta sea correcta
        $this->SetY($this->GetY() + 25);
        $this->SetFont('Arial', 'B', 10);
        $this->Cell(0, 6, utf8_decode('FORMATO DE PRÉSTAMO DE MATERIAL EN EL TALLER DE GASTRONOMÍA'), 0, 1, 'C');
    }

    function Footer() {
        $this->SetY(-45);
        $this->SetFont('Arial', '', 9);

        $nota = "Nota: En el caso de algún faltante tendrán como máximo 5 días hábiles para la reposición doble del material, ";
        $nota .= "de lo contrario se levantará un oficio de extrañamiento por medio de su director y no se le permitirá acceso a prácticas.";
        $this->MultiCell(0, 5, utf8_decode($nota), 0, 'L');

        $this->Ln(10); // Espaciado entre nota y firmas
        $this->Cell(90, 5, '__________________________________', 0, 0, 'C');
        $this->Cell(10, 5, '', 0, 0, 'C'); // Espaciado
        $this->Cell(90, 5, '__________________________________', 0, 1, 'C');
        $this->Cell(90, 5, utf8_decode('Nombre y Firma del docente que revisó y validó'), 0, 0, 'C');
        $this->Cell(10, 5, '', 0, 0, 'C');
        $this->Cell(90, 5, utf8_decode('Nombre y Firma del responsable de talleres de Gastronomía'), 0, 0, 'C');
    }

    function ImprovedTable($data) {
        $this->SetFont('Arial', '', 10);
        $columnWidth = 47.5;
        $rowHeight = 6;

        foreach ($data as $row) {
            $this->Cell($columnWidth, $rowHeight, utf8_decode('Fecha'), 1);
            $this->Cell($columnWidth, $rowHeight, utf8_decode($row['Fecha']), 1);
            $this->Cell($columnWidth, $rowHeight, utf8_decode('Alumno solicitante'), 1);
            $this->Cell($columnWidth, $rowHeight, utf8_decode($row['Alumno solicitante']), 1);
            $this->Ln();
            $this->Cell($columnWidth, $rowHeight, utf8_decode('Grupo'), 1);
            $this->Cell($columnWidth, $rowHeight, utf8_decode($row['Grupo']), 1);
            $this->Cell($columnWidth, $rowHeight, utf8_decode('Asignatura'), 1);
            $this->Cell($columnWidth, $rowHeight, utf8_decode($row['Asignatura']), 1);
            $this->Ln();
            $this->Cell($columnWidth, $rowHeight, utf8_decode('P.E'), 1);
            $this->Cell($columnWidth, $rowHeight, utf8_decode($row['P.E']), 1);
            $this->Cell($columnWidth, $rowHeight, utf8_decode('Profesor'), 1);
            $this->Cell($columnWidth, $rowHeight, utf8_decode($row['Profesor']), 1);
            $this->Ln();
        }
    }

    function SecondaryTable($data) {
        $this->SetFont('Arial', 'B', 10);
        $headers = ['Cantidad', 'Artículo', 'Fecha', 'Observaciones', 'Faltantes'];
        $columnWidths = [20, 60, 35, 55, 20];

        foreach ($headers as $index => $header) {
            $this->Cell($columnWidths[$index], 8, utf8_decode($header), 1, 0, 'C');
        }
        $this->Ln();
        $this->SetFont('Arial', '', 10);
        foreach ($data as $row) {
            $this->Cell($columnWidths[0], 6, utf8_decode($row['Cantidad']), 1);
            $this->Cell($columnWidths[1], 6, utf8_decode($row['Artículo']), 1);
            $this->Cell($columnWidths[2], 6, utf8_decode($row['Fecha']), 1);
            $this->Cell($columnWidths[3], 6, utf8_decode($row['Observaciones']), 1);
            $this->Cell($columnWidths[4], 6, utf8_decode($row['Faltantes']), 1);
            $this->Ln();
        }
    }
}

function LoadData($dias) {
    include_once("../../conf/config.php");

    if (!isset($con)) {
        die("Error: No se pudo establecer la conexión a la base de datos.");
    }

    $con->set_charset("utf8");

    // Si $dias es '#', no filtramos por fecha
    if ($dias === '#') {
        $queryMain = "
        SELECT 
            solicitud.id AS 'ID',
            solicitud.fecha AS 'Fecha',
            usuarios.nombre AS 'Alumno solicitante',
            grupo.grupo AS 'Grupo',
            materias.materia AS 'Asignatura',
            usuarios.matricula AS 'P.E',
            profesores.nombre AS 'Profesor'
        FROM solicitud
        JOIN usuarios ON solicitud.solicitante = usuarios.id
        INNER JOIN grupo ON grupo.id_grupo = usuarios.grupo
        INNER JOIN materias ON materias.id_materia = solicitud.asignatura
        INNER JOIN profesores ON profesores.id_profesor = solicitud.profesor
        ORDER BY solicitud.id
        ";

        $querySecondary = "
        SELECT 
            articulos_solicitud.cantidad_articulo AS 'Cantidad',
            articulos.nombre AS 'Artículo',
            solicitud.fecha_solicitud AS 'Fecha',
            solicitud.observaciones AS 'Observaciones',
            IFNULL(solicitud.faltantes, '0') AS 'Faltantes',
            solicitud.id AS 'solicitud_id'
        FROM solicitud
        JOIN usuarios ON solicitud.solicitante = usuarios.id
        JOIN articulos_solicitud ON articulos_solicitud.solicitud = solicitud.id
        JOIN articulos ON articulos_solicitud.articulo = articulos.id_articulo
        ORDER BY solicitud.id
        ";
    } else {
        $fecha_limite = date('Y-m-d', strtotime("-$dias days"));

        $queryMain = "
        SELECT 
            solicitud.id AS 'ID',
            solicitud.fecha AS 'Fecha',
            usuarios.nombre AS 'Alumno solicitante',
            grupo.grupo AS 'Grupo',
            materias.materia AS 'Asignatura',
            usuarios.matricula AS 'P.E',
            profesores.nombre AS 'Profesor'
        FROM solicitud
        JOIN usuarios ON solicitud.solicitante = usuarios.id
        INNER JOIN grupo ON grupo.id_grupo = usuarios.grupo
        INNER JOIN materias ON materias.id_materia = solicitud.asignatura
        INNER JOIN profesores ON profesores.id_profesor = solicitud.profesor
        WHERE solicitud.fecha >= ?
        ORDER BY solicitud.id
        ";

        $querySecondary = "
        SELECT 
            articulos_solicitud.cantidad_articulo AS 'Cantidad',
            articulos.nombre AS 'Artículo',
            solicitud.fecha_solicitud AS 'Fecha',
            solicitud.observaciones AS 'Observaciones',
            IFNULL(solicitud.faltantes, '0') AS 'Faltantes',
            solicitud.id AS 'solicitud_id'
        FROM solicitud
        JOIN usuarios ON solicitud.solicitante = usuarios.id
        JOIN articulos_solicitud ON articulos_solicitud.solicitud = solicitud.id
        JOIN articulos ON articulos_solicitud.articulo = articulos.id_articulo
        WHERE solicitud.fecha >= ?
        ORDER BY solicitud.id
        ";
    }

    if ($dias === '#') {
        $dataMain = $con->query($queryMain)->fetch_all(MYSQLI_ASSOC);
        $dataSecondary = $con->query($querySecondary)->fetch_all(MYSQLI_ASSOC);
    } else {
        if ($stmtMain = $con->prepare($queryMain)) {
            $stmtMain->bind_param("s", $fecha_limite);
            $stmtMain->execute();
            $dataMain = $stmtMain->get_result()->fetch_all(MYSQLI_ASSOC);
        }

        if ($stmtSecondary = $con->prepare($querySecondary)) {
            $stmtSecondary->bind_param("s", $fecha_limite);
            $stmtSecondary->execute();
            $dataSecondary = $stmtSecondary->get_result()->fetch_all(MYSQLI_ASSOC);
        }
    }

    $con->close();
    return [$dataMain, $dataSecondary];
}

list($dataMain, $dataSecondary) = LoadData($dias);

if (empty($dataMain)) {
    die('No se encontraron datos.');
}

$pdf = new PDF('P', 'mm', 'Letter');
$pdf->AliasNbPages();
$pdf->SetMargins(10, 10, 10);
$pdf->AddPage();

foreach ($dataMain as $index => $row) {
    if ($index > 0) {
        $pdf->AddPage();
    }
    $pdf->ImprovedTable([$row]);

    $relatedArticles = array_filter($dataSecondary, function ($article) use ($row) {
        return $article['solicitud_id'] == $row['ID'];
    });

    $pdf->SecondaryTable($relatedArticles);
}

$pdf->Output();
?>
