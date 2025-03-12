<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Solicitudes</title>
  <link rel="stylesheet" href="css\encargado.css">
  <link rel="stylesheet" href=" css\stylesindex.css"></head>
<body>
 <nav class="navbar">
  <div class="container">
    <ul class="nav-links">
      <li><a href="ralumnos.php">Registro de alumnos</a></li>
      <li><a href="rutencilios.php">agregar utencilios</a></li>  
      <li><a href="vsolitudes.php">Ver solicitudes</a></li>  
      <li><button class="button">Cerrar sesion</button></li>  
    </ul>

  </div>
</nav>

  <br>  

<h2>Tabla de Solicitudes</h2>
<table>
    <thead>
        <tr>
            <th>Matrícula ID</th>
            <th>Hora</th>
            <th>Fecha de Solicitud</th>
            <th>Fecha Requerida</th>
            <th>Estatus</th>
            <th>Comentarios</th>
        </tr>
    </thead>
    <tbody id="solicitud-table-body">
        <!-- Aquí se agregarán dinámicamente las filas de la tabla -->
    </tbody>
</table>
<script src="js\encargado.js"></script></body>
</html>
