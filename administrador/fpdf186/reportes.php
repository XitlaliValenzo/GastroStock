<?php
require('fpdf.php');

$tipo = $_GET['tipo'];
$reporte = $_GET['reporte'];
$where = "";


if ($tipo == 'mensual'){
    $mes = $_GET['mes'];
    $year = $_GET['year'];
    $where = "WHERE YEAR(fecha) = $year AND MONTH(fecha) = $mes";
    setlocale(LC_TIME, 'es_ES.UTF-8', 'es_ES', 'esp');
    $nombreMes = ucfirst(strftime('%B', mktime(0, 0, 0, $mes, 1))); 
    $subtituloReporte = 'Mensual' . ' (' .$nombreMes . ' ' .$year . ')';
} else if ($tipo == 'cuatrimestral'){
    $cuatrimestre = $_GET['cuatrimestre'];
    $year = $_GET['year'];

    $rangoMeses = [
        1 => "09, 10, 11, 12",   
        2 => "01, 02, 03, 04",  
        3 => "05, 06, 07, 08"   
    ];

    $nombresCuatrimestres = [
        1 => "Cuatrimestre Septiembre-Diciembre",
        2 => "Cuatrimestre Enero-Abril",
        3 => "Cuatrimestre Mayo-Agosto"
    ];
    $nombreCuatrimestre = $nombresCuatrimestres[$cuatrimestre];
    $meses = $rangoMeses[$cuatrimestre];
    $where = "WHERE YEAR(fecha) = $year AND MONTH(fecha) IN ($meses)";
    $subtituloReporte = $nombreCuatrimestre . ' ' .$year ;


} else if ($tipo == 'anual'){
    $year = $_GET['year'];
    $where = "WHERE YEAR(fecha) = $year";
    $subtituloReporte = 'Anual' . ' (' .$year . ')';

} else if ($tipo == 'fechaEspecifica'){
    $fecha = $_GET['fecha']; // Recibimos la fecha en formato 'YYYY-MM-DD'
    $timestamp = strtotime($fecha); // Convertimos la fecha a timestamp para descomponerla

    // Extraemos día, mes y año
    $dia = date('d', $timestamp);
    $mes = date('m', $timestamp);
    $year = date('Y', $timestamp);

    // Construimos la cláusula WHERE con los valores descompuestos
    $where = "WHERE DAY(fecha) = $dia AND MONTH(fecha) = $mes AND YEAR(fecha) = $year";

    // Formateamos el subtítulo con el día, mes y año en texto
    setlocale(LC_TIME, 'es_ES.UTF-8', 'es_ES', 'esp');
    $nombreMes = ucfirst(strftime('%B', mktime(0, 0, 0, $mes, 1))); // Mes en texto
    $subtituloReporte = 'Fecha específica: ' . $dia . ' de ' . $nombreMes . ' de ' . $year;

}

if ($reporte == 'adquiridos'){
    $tituloReporte = 'Reporte de materiales adquiridos';
    $consulta = "SELECT 
            id_articulo, 
            nombre, 
            fecha_adquiridos.cantidad AS cantidad, 
            fecha_adquiridos.fecha AS fecha
            FROM articulos 
            INNER JOIN fecha_adquiridos ON fecha_adquiridos.articulo_adquirido = articulos.id_articulo
            $where
            ORDER BY articulos.id_articulo";
} else if ($reporte == 'donados'){
    $tituloReporte = 'Reporte de materiales donados';
    $consulta = "SELECT 
            id_articulo, 
            nombre, 
            fecha_donados.cantidad AS cantidad, 
            fecha_donados.fecha AS fecha
            FROM articulos 
            INNER JOIN fecha_donados ON fecha_donados.articulo_donado = articulos.id_articulo
            $where
            ORDER BY articulos.id_articulo";
} else if ($reporte == 'danados'){
    $tituloReporte = 'Reporte de materiales dañados';
    $consulta = "SELECT 
            id_articulo, 
            nombre, 
            articulos_danados.cantidad AS cantidad, 
            articulos_danados.fecha AS fecha
            FROM articulos 
            INNER JOIN articulos_danados ON articulos_danados.articulo_danado = articulos.id_articulo
            $where
            ORDER BY articulos.id_articulo";
} else if ($reporte == 'perdidos'){
    $tituloReporte = 'Reporte de materiales perdidos';
    $consulta = "SELECT 
            id_articulo, 
            nombre, 
            comentarios_perdidos.cantidad AS cantidad, 
            comentarios_perdidos.fecha AS fecha
            FROM articulos 
            INNER JOIN comentarios_perdidos ON comentarios_perdidos.articulo_perdido = articulos.id_articulo
            $where
            ORDER BY articulos.id_articulo";
} else if ($reporte == 'mantenimiento') {
    $tituloReporte = 'Reporte de materiales en mantenimiento';
    $consulta = "SELECT 
            id_articulo, 
            nombre, 
            comentarios_reparacion.cantidad AS cantidad, 
            comentarios_reparacion.fecha AS fecha
            FROM articulos 
            INNER JOIN comentarios_reparacion ON comentarios_reparacion.articulo_reparacion = articulos.id_articulo
            $where
            ORDER BY articulos.id_articulo";
} else if ($reporte == 'eliminados'){
    $tituloReporte = 'Reporte de materiales dados de baja';
    $consulta = "SELECT 
            id_articulo, 
            nombre, 
            articulos_eliminados.cantidad AS cantidad, 
            articulos_eliminados.fecha AS fecha
            FROM articulos 
            INNER JOIN articulos_eliminados ON articulos_eliminados.articulo_eliminado = articulos.id_articulo
            $where
            ORDER BY articulos.id_articulo";
} else if ($reporte == 'reposiciones'){
    $tituloReporte = 'Reporte de reposiciones';
    $consulta = "SELECT 
            id_articulo, 
            nombre, 
            articulos_reposiciones.cantidad AS cantidad, 
            articulos_reposiciones.fecha AS fecha
            FROM articulos 
            INNER JOIN articulos_reposiciones ON articulos_reposiciones.articulo_repuesto = articulos.id_articulo
            $where
            ORDER BY articulos.id_articulo";
}

class PDF extends FPDF
{
    public $tituloReporte;
    // Metodo para crear la cabecera de cada pagina
    function Header(){

        // Imagen de cabecera
        $this->Image('img/header.png', 10, 10, 190); // Inserta la imagen de encabezado en las coordenadas x=10, y=10 con un ancho de 190
        $this->SetY($this->GetY() + 25); // Establece la posicion Y debajo de la imagen de cabecera
        $this->SetFont('Arial', 'B', 12); // Establece el tipo de letra para el titulo
        $this->Cell(0, 6, utf8_decode($this->tituloReporte), 0, 1, 'C'); // Agrega el titulo centrado
        $this->SetFont('Arial', '', 10); // Fuente para el subtítulo (puede ser más pequeña)
        $this->Cell(0, 6, utf8_decode($this->subtituloReporte), 0, 1, 'C'); // Subtítulo centrado
        $this->Ln(8); // Salto de línea antes de la tabla

         // Definimos los anchos de las columnas
        $widths = [
            'id_articulo' => 20,
            'nombre' => 90,
            'cantidad' => 20,
            'fecha' => 60
        ];

        $this->SetFont('Arial', 'B', 9);
        $this->SetFillColor(228, 232, 233); 
        $this->Cell($widths['id_articulo'], 10, utf8_decode('ID'), 1, 0, 'C', true);
        $this->Cell($widths['nombre'], 10, utf8_decode('Nombre'), 1, 0, 'C', true);
        $this->Cell($widths['cantidad'], 10, utf8_decode('Cantidad'), 1, 0, 'C', true);
        $this->Cell($widths['fecha'], 10, utf8_decode('Fecha'), 1, 0, 'C', true);
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


$resultado = mysqli_query($con, $consulta);

$pdf = new PDF();
$pdf->tituloReporte = $tituloReporte;
$pdf->subtituloReporte = $subtituloReporte;
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 10); // Establece la fuente Arial tamaño 10 para el contenido de la tabla


if (mysqli_num_rows($resultado) > 0) {
// Imprimir los datos obtenidos de la consulta
while ($row = mysqli_fetch_assoc($resultado)) {

    $fecha = $row['fecha'];
    setlocale(LC_TIME, 'es_ES.UTF-8', 'es_ES', 'esp');
    $fechaF = strftime('%d de %B de %Y', strtotime($fecha));
    // Definir los anchos de las columnas
    $pdf->Cell(20, 10, utf8_decode($row['id_articulo']), 1, 0, 'C');
    $pdf->Cell(90, 10, utf8_decode($row['nombre']), 1, 0, 'C');
    $pdf->Cell(20, 10, utf8_decode($row['cantidad']), 1, 0, 'C');
    $pdf->Cell(60, 10, utf8_decode($fechaF), 1, 0, 'C');
    $pdf->Ln(); //Salto de linea
}
} else {
    // Si no hay registros, mostrar un mensaje
    $pdf->SetFont('Arial', 'I', 12);
    $pdf->Cell(0, 10, utf8_decode('No hay registros disponibles.'), 0, 1, 'C');
}

$pdf->Output();
?>