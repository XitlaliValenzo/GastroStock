<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulario para agregar utensilios</title>
  <link rel="stylesheet" href="css\encargado.css">
  <link rel="stylesheet" href=" css\stylesindex.css"></head>
<body>
 <nav class="navbar">
  <div class="containera">
    <ul class="nav-links">
      <li><a href="ralumnos.php">Registro de alumnos</a></li>
      <li><a href="rutencilios.php">agregar utencilios</a></li>  
      <li><a href="vsolitudes.php">Ver solicitudes</a></li>  
      <li><button class="button">Cerrar sesion</button></li>  
    </ul>

  </div>
</nav>

  <br>  
<h1>Agregar Utensilio</h1>
<div class="containere">
  <form class="form-container" id="formulario-utensilio">
    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="nombre" required><br>

    <label for="descripcion">Descripción:</label>
    <textarea id="descripcion" name="descripcion" rows="4" required></textarea><br>

    <label for="fecha-entrega">Fecha de Entrega:</label>
    <input type="date" id="fecha-entrega" name="fecha-entrega" required><br>

    <label for="estatus">Estatus:</label>
    <select class="relleno" id="estatus" name="estatus" required>
      <option value="comprado">Comprado</option>
      <option value="donado">Donado</option>
    </select><br>

    <label for="marca">Marca:</label>
    <input type="text" id="marca" name="marca" required><br>

    <label for="categoria">Categoría:</label>
    <input type="text" id="categoria" name="categoria" required><br>

    <button class="button2" type="submit">Agregar Utensilio</button>
  </form>
</div>

<script src="js\encargado.js"></script>
</body>
</html>
