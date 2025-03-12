<?php
require('fpdf.php');

class PDF extends FPDF
{
    // Metodo para crear la cabecera de cada pagina
    function Header(){
        // Imagen de cabecera
        $this->Image('img/header.png', 10, 10, 190); // Inserta la imagen de encabezado en las coordenadas x=10, y=10 con un ancho de 190
        $this->SetY($this->GetY() + 25); // Establece la posicion Y debajo de la imagen de cabecera
        $this->SetFont('Arial', 'B', 12); // Establece el tipo de letra para el titulo
        $this->Cell(0, 6, utf8_decode('Inventario de Materiales en Mantenimiento / Reparación'), 0, 1, 'C'); // Agrega el titulo centrado

         // Definimos los anchos de las columnas
        $widths = [
            'id_articulo' => 10,
            'nombre' => 40,
            'descripcion' => 60,
            'cantidad' => 20,
            'comentario' => 35,
            'fecha' => 25
            ];

        $this->SetFont('Arial', 'B', 11);
        $this->SetFillColor(228, 232, 233); 
        $this->Cell($widths['id_articulo'], 10, utf8_decode('ID'), 1, 0, 'C', true);
        $this->Cell($widths['nombre'], 10, utf8_decode('Nombre'), 1, 0, 'C', true);
        $this->Cell($widths['descripcion'], 10, utf8_decode('Descripción'), 1, 0, 'C', true);
        $this->Cell($widths['cantidad'], 10, utf8_decode('Cantidad'), 1, 0, 'C', true);
        $this->Cell($widths['comentario'], 10, utf8_decode('Comentario'), 1, 0, 'C', true);
        $this->Cell($widths['fecha'], 10, utf8_decode('Fecha'), 1, 1, 'C', true);
    }

    // Método para crear el pie de pagina de cada pagina
    function Footer() {
        // Establece la posicion del pie de pagina
        $this->SetY(-15); // Posiciona el footer 15 mm desde el final de la pagina
        // Establece la fuente para el pie de pagina
        $this->SetFont('Arial', 'I', 8);
        // Añade una linea de pie de pagina con el numero de pagina
        $this->Cell(0, 10, utf8_decode('Página ') . $this->PageNo() . ' de {nb}', 0, 0, 'C');
    }

    // Método para crear una celda con texto multilínea
    function MultiCellRow($data, $widths) {
        // Calcular la altura máxima de la fila
        $nb = 0;
        foreach($data as $key => $text) {
            $nb = max($nb, $this->NbLines($widths[$key], utf8_decode($text)));
        }
        $h = 10 * $nb; // Altura de la fila

        // Crear una nueva página si la fila no cabe en la página actual
        if($this->GetY() + $h > $this->PageBreakTrigger) {
            $this->AddPage($this->CurOrientation);
        }

        // Dibujar las celdas
        foreach($data as $key => $text) {
            $w = $widths[$key];
            $x = $this->GetX();
            $y = $this->GetY();
            $this->Rect($x, $y, $w, $h);
            $this->MultiCell($w, 10, utf8_decode($text), 0, 'C');
            $this->SetXY($x + $w, $y);
        }
        $this->Ln($h);
    }

    // Calcular el número de líneas que tomará un MultiCell
    function NbLines($w, $txt) {
        $cw = &$this->CurrentFont['cw'];
        if($w == 0)
            $w = $this->w - $this->rMargin - $this->x;
        $wmax = ($w - 2 * $this->cMargin) * 1000 / $this->FontSize;
        $s = str_replace("\r", '', $txt);
        $nb = strlen($s);
        if($nb > 0 and $s[$nb-1] == "\n")
            $nb--;
        $sep = -1;
        $i = 0;
        $j = 0;
        $l = 0;
        $nl = 1;
        while($i < $nb) {
            $c = $s[$i];
            if($c == "\n") {
                $i++;
                $sep = -1;
                $j = $i;
                $l = 0;
                $nl++;
                continue;
            }
            if($c == ' ')
                $sep = $i;
            $l += $cw[$c];
            if($l > $wmax) {
                if($sep == -1) {
                    if($i == $j)
                        $i++;
                } else
                    $i = $sep + 1;
                $sep = -1;
                $j = $i;
                $l = 0;
                $nl++;
            } else
                $i++;
        }
        return $nl;
    }
}

include_once("../../conf/config.php"); // Conf. BD.
$consulta = "SELECT articulos.id_articulo,articulos.nombre,articulos.descripcion, comentarios_reparacion.cantidad,comentarios_reparacion.comentario,comentarios_reparacion.fecha FROM articulos INNER JOIN comentarios_reparacion ON articulos.id_articulo = comentarios_reparacion.articulo_reparacion WHERE articulos.estatus = 'activo' ORDER BY id_articulo";
$resultado = mysqli_query($con, $consulta);

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 10); // Establece la fuente Arial tamaño 12 para el contenido de la tabla

// Definimos los anchos de las columnas
$widths = [
    'id_articulo' => 10,
    'nombre' => 40,
    'descripcion' => 60,
    'cantidad' => 20,
    'comentario' => 35,
    'fecha' => 25
];

while ($row = $resultado->fetch_assoc()) {
    $row['nombre'] = ucwords($row['nombre']);
    $row['descripcion'] = ucwords($row['descripcion']);
    $row['comentario'] = ucwords($row['comentario']);
    $pdf->MultiCellRow($row, $widths);
}

$pdf->Output();
?>