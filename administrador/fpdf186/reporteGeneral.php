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
        $this->Cell(0, 6, utf8_decode('Reporte General'), 0, 1, 'C'); // Agrega el titulo centrado

         // Definimos los anchos de las columnas
        $widths = [
            'id_articulo' => 8,
            'nombre' => 50,
            'donativos' => 18,
            'adquiridos' => 18,
            'perdidos' => 16,
            'dañados' => 18,
            'reparacion' => 18,
            'eliminados' => 18,
            'reposiciones' => 18,
            'total' => 16
        ];

        $this->SetFont('Arial', 'B', 9);
        $this->SetFillColor(228, 232, 233); 
        $this->Cell($widths['id_articulo'], 10, utf8_decode('ID'), 1, 0, 'C', true);
        $this->Cell($widths['nombre'], 10, utf8_decode('Nombre'), 1, 0, 'C', true);
        $this->Cell($widths['donativos'], 10, utf8_decode('Donativos'), 1, 0, 'C', true);
        $this->Cell($widths['adquiridos'], 10, utf8_decode('Adquiridos'), 1, 0, 'C', true);
        $this->Cell($widths['perdidos'], 10, utf8_decode('Perdidos'), 1, 0, 'C', true);
        $this->Cell($widths['dañados'], 10, utf8_decode('Dañados'), 1, 0, 'C', true);
        $this->Cell($widths['reparacion'], 10, utf8_decode('Reparación'), 1, 0, 'C', true);
        $this->Cell($widths['eliminados'], 10, utf8_decode('Eliminados'), 1, 0, 'C', true);
        $this->Cell($widths['reposiciones'], 10, utf8_decode('Repuestos'), 1, 0, 'C', true);
        $this->Cell($widths['total'], 10, utf8_decode('Total'), 1, 0, 'C', true);
        $this->Ln();
       
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
}

include_once("../../conf/config.php"); // Configuración de la BD.
$consulta = "SELECT 
            id_articulo, 
            nombre, 
            articulos.cantidad AS total, 
            IFNULL(articulos_donados.cantidad, 0) AS t_donados,
            IFNULL(articulos_adquiridos.cantidad, 0) AS t_adquiridos,
            IFNULL(articulos_perdidos.cantidad, 0) AS t_perdidos,
            IFNULL(articulos_danados.cantidad, 0) AS t_danados,
            IFNULL(articulos_reparacion.cantidad, 0) AS t_reparacion,
            IFNULL(articulos_eliminados.cantidad, 0) AS t_eliminados,
            IFNULL(articulos_reposiciones.cantidad, 0) AS t_reposiciones
            FROM articulos 
            LEFT JOIN articulos_donados ON articulos_donados.articulo_donado = articulos.id_articulo
            LEFT JOIN articulos_adquiridos ON articulos_adquiridos.articulo_adquirido = articulos.id_articulo 
            LEFT JOIN articulos_perdidos ON articulos_perdidos.articulo_perdido = articulos.id_articulo
            LEFT JOIN articulos_danados ON articulos_danados.articulo_danado = articulos.id_articulo
            LEFT JOIN articulos_reparacion ON articulos_reparacion.articulo_reparacion = articulos.id_articulo
            LEFT JOIN articulos_eliminados ON articulos_eliminados.articulo_eliminado = articulos.id_articulo
            LEFT JOIN articulos_reposiciones ON articulos_reposiciones.articulo_repuesto = articulos.id_articulo
            GROUP BY id_articulo, nombre, articulos.cantidad
            ORDER BY articulos.id_articulo";

$resultado = mysqli_query($con, $consulta);

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 10); // Establece la fuente Arial tamaño 10 para el contenido de la tabla

// Imprimir los datos obtenidos de la consulta
while ($row = mysqli_fetch_assoc($resultado)) {
    // Definir los anchos de las columnas
    $pdf->Cell(8, 10, utf8_decode($row['id_articulo']), 1, 0, 'C');
    $pdf->Cell(50, 10, utf8_decode($row['nombre']), 1, 0, 'C');
    $pdf->Cell(18, 10, utf8_decode($row['t_donados']), 1, 0, 'C');
    $pdf->Cell(18, 10, utf8_decode($row['t_adquiridos']), 1, 0, 'C');
    $pdf->Cell(16, 10, utf8_decode($row['t_perdidos']), 1, 0, 'C');
    $pdf->Cell(18, 10, utf8_decode($row['t_danados']), 1, 0, 'C');
    $pdf->Cell(18, 10, utf8_decode($row['t_reparacion']), 1, 0, 'C');
    $pdf->Cell(18, 10, utf8_decode($row['t_eliminados']), 1, 0, 'C');
    $pdf->Cell(18, 10, utf8_decode($row['t_reposiciones']), 1, 0, 'C');
    $pdf->Cell(16, 10, utf8_decode($row['total']), 1, 0, 'C');
    $pdf->Ln(); //Salto de linea
}

$pdf->Output();
?>