<?php
header('Content-Type: text/html; charset=utf-8');
require('fpdf.php');

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
			unset($row['ID']);
            $keys = array_keys($row);
			
            $values = array_values($row);

            for ($i = 0; $i < count($keys); $i += 2) {
                $this->Cell($columnWidth, $rowHeight, utf8_decode(ucfirst($keys[$i])), 1);
                $this->Cell($columnWidth, $rowHeight, utf8_decode($values[$i]), 1);

                if (isset($keys[$i + 1])) {
                    $this->Cell($columnWidth, $rowHeight, utf8_decode(ucfirst($keys[$i + 1])), 1);
                    $this->Cell($columnWidth, $rowHeight, utf8_decode($values[$i + 1]), 1);
                }
                $this->Ln(); // Salto de línea
            }
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

function LoadData($id_alumno) {
    include_once("../../conf/config.php");
    
    if (!isset($con)) {
        die("Error: No se pudo establecer la conexión a la base de datos.");
    }

    $con->set_charset("utf8");

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
    WHERE usuarios.id = ?
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
    WHERE usuarios.id = ?
    ORDER BY solicitud.id
    ";

    $stmtMain = $con->prepare($queryMain);
    $stmtMain->bind_param("i", $id_alumno);
    $stmtMain->execute();
    $resultMain = $stmtMain->get_result();
    $dataMain = $resultMain->fetch_all(MYSQLI_ASSOC);

    $stmtSecondary = $con->prepare($querySecondary);
    $stmtSecondary->bind_param("i", $id_alumno);
    $stmtSecondary->execute();
    $resultSecondary = $stmtSecondary->get_result();
    $dataSecondary = $resultSecondary->fetch_all(MYSQLI_ASSOC);

    $con->close();
    return [$dataMain, $dataSecondary];
}

$id_alumno = isset($_GET['id']) ? intval($_GET['id']) : null;
if (!$id_alumno) {
    die('ID de alumno no proporcionado');
}

list($dataMain, $dataSecondary) = LoadData($id_alumno);

if (empty($dataMain)) {
    die('No se encontraron datos para el ID del alumno proporcionado.');
}

$pdf = new PDF('P', 'mm', 'Letter');
$pdf->AliasNbPages();
$pdf->SetMargins(10, 10, 10);

foreach ($dataMain as $row) {
    $pdf->AddPage();
    $pdf->ImprovedTable([$row]);

    $relatedArticles = array_filter($dataSecondary, function ($article) use ($row) {
        return $article['solicitud_id'] == $row['ID'];
    });

    $pdf->SecondaryTable($relatedArticles);
}

$pdf->Output();
?>
