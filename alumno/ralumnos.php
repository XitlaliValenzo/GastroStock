<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registro de Alumnos</title>
  <link rel="stylesheet" href="css\encargado.css">
  <link rel="stylesheet" href=" css\stylesindex.css">
</head>
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
<h1 style="text-align: center;">Registro de Alumnos</h1>
<div class="containeral">
  <div class="formulario">
    <h2>Agregar Alumno</h2>
    <form class="form-container" id="formulario-alumno">
      <label for="nombre">Nombre:</label>
      <input type="text" id="nombre" name="nombre" required><br>

      <label for="matricula">Matrícula:</label>
      <input type="text" id="matricula" name="matricula" required><br>

      <label for="correo">Correo:</label>
      <input type="email" id="correo" name="correo" required><br>

      <label for="grado">Grado:</label>
      <input type="text" id="grado" name="grado" required><br>

      <label for="grupo">Grupo:</label>
      <input type="text" id="grupo" name="grupo" required><br>

      <button class="button2" type="submit">Agregar</button>
    </form>
  </div>

  <div class="alumnos-container">
    <!-- Las tarjetas de alumnos se generarán dinámicamente con JavaScript -->
  </div>
</div>

<script src="js\encargado.js"></script>
</body>
</html>
