<?php 
  session_start();
    include_once('../conf/config.php');
    if(!isset($_SESSION['ID'])){
    header("Location: ../index.php");
  }
  
  $nombre = $_SESSION['NAME'];
  $tipo_usuario = $_SESSION['ROLE'];  

  if($_GET['id']){
        $id = $_GET['id'];

    $sql = "SELECT * FROM articulos WHERE id_articulo = {$id}";
        $result = $con ->query($sql);

        $data = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Editar inventario actual</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
        <link href="../css/styles.css" rel="stylesheet" />
        <link rel="stylesheet" href="../css/estilo-nav.css">
        <link rel="stylesheet" href="css/full-form-form.css">
    <link rel="stylesheet" href="css/style2.css">
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <!-- CDN FontAwesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
   #nav {
  background: #870000;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #190A05, #870000);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #190A05, #870000); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
   }

   /*Estilo para la vista previa de la imagen*/
    .image-preview {
      width: 100%; /*Ancho fijo de 200px*/
      height: 200px; /*Alto fijo de 200px*/
      border: 2px dashed #dddddd;
      display: flex;
      align-items: center;
      justify-content: center;
      font-weight: bold;
      color: #cccccc;
      margin-top: 15px;
      overflow: hidden; /*Ocultar cualquier oarte de la imagen que exceda el tamaño del contenedor*/
    }
    .image-preview img {
      display: block; /*La imagen está oculta inicialmente*/
      width: auto;
      height: 100%;
      object-fit: cover; /*Asegura que la imagen cubra completamente el contenedor sin perder sus proporciones*/
    }
</style>
    
</style>
</head>
<body class="sb-nav-fixed">
  <?php
    include_once("navbar.php");
  ?>
  <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Editar material (inventario actual)</h1>
                        <br>
                        <hr>
                        <br>
                        <form action="php_action/actualizar_inv_actual.php" method="POST" enctype="multipart/form-data">
                            <div class="container">
                            <div class="jumbotron shadow p-3 mb-5 bg-white rounded">
                            <div class="container">
                               
    <div class="form-row">
    <div class="form-group col-md-12">
      <label for="nombre">Nombre del material</label>
      <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo ucfirst($data['nombre']) ?>">
      <ul class="input-requirements">
            <li style="margin-top: 2%;">Debes ingresar únicamente letras</li>
        </ul>
    </div>
</div>

   <div class="form-row">
    <div class="form-group col-md-12">
      <label for="descripcion">Descripción</label>
      <textarea class="form-control" id="descripcion" name="descripcion" rows="3" value="<?php echo $data['descripcion'] ?>"><?php echo ucfirst($data['descripcion']) ?></textarea>
      
    </div>
    </div>
    <div class="form-row">
    <div class="form-group col-md-6">
      <label for="cantidad">Cantidad</label>
      <input type="number" class="form-control" id="cantidad" name="cantidad" value="<?php echo $data['cantidad'] ?>" min="1" style="border-color: #ced4da;">
    </div>
    <?php 
      $id_articulo = $data['id_articulo'];
      if($data['tipo'] == 'adquirido' || $data['tipo'] == 'donativo'){

        if ($data['tipo'] == 'adquirido') {
          //Obtener el tipo de material en caso de que esté en la tabla de artículos adquiridos
        
        $sqlAdq = "SELECT * FROM articulos_adquiridos WHERE articulo_adquirido = '$id_articulo' ";
        $resultAdq = $con ->query($sqlAdq);
        $data2 = $resultAdq->fetch_assoc();
        $tipo_material = $data2['tipo_material']; ?>

        <div class="form-group col-md-6">
      <label for="tipo">Tipo</label>
      <select class="custom-select" id="tipo" name="tipo" required>
        <option value="<?php echo $data['tipo'] ?>"><?php echo ucfirst($data['tipo']) ?> </option>
        <option value="donativo">Donativo</option>
      </select>
    </div>
     </div>
     <div class="form-row">
     <div class="form-group col-md-12" id="campo_oculto_tipo">
    <label for="tipo_material">Tipo de material</label>
    <select class="custom-select" id="tipo_material" name="tipo_material" required>
      <?php
        if ($tipo_material == 'cocina'){
          $tipo_material = 'Material de cocina'; ?>
          <option value="cocina"><?php echo $tipo_material ?></option>
        <option value="equipo">Equipo (electrodomésticos)</option>
        <?php } else {
          $tipo_material = 'Equipo (electrodomésticos)'; ?>
           <option value="equipo"><?php echo $tipo_material ?></option>
        <option value="cocina">Material de cocina</option>
        <?php }
      ?>
      </select>
   </div>
   
   <div class="form-group col-md-4" id="campo_oculto_donacion" style="display: none;">
    <label for="tipo_donante">Tipo de donante</label>
    <select class="custom-select" id="tipo_donante" name="tipo_donante">
        <option selected disabled value="">Selecciona...</option>
        <option value="empresa">Empresa</option>
        <option value="alumno">Alumno</option>
        <option value="otro">Otro</option>
      </select>
   </div>
   
   <div class="form-group col-md-4" id="campo_oculto_donante" style="display: none;">
    <label for="donante">Donante</label>
    <input type="text" class="form-control" id="nombre_donante" name="nombre_donante" placeholder="Ingresa el nombre del donante" style="border-color: #ced4da;">
   </div>
   </div>

       <?php } else {
          //Obtener el tipo de material en caso de que esté en la tabla de artículos donados
          $sqlAdq = "SELECT * FROM articulos_donados WHERE articulo_donado = '$id_articulo' ";
          $resultAdq = $con ->query($sqlAdq);
          $data2 = $resultAdq->fetch_assoc();
          $tipo_material = $data2['tipo_material']; 

          //Obtener el donante y el tipo de donante
          $sqlDonantes = "SELECT * FROM fecha_donados WHERE articulo_donado = '$id_articulo' ";
          $resultDonantes = $con ->query($sqlDonantes);
          $data3 = $resultDonantes->fetch_assoc();
          $tipo_donante = $data3['tipo_donante'];
          $nombre_donante = $data3['nombre_donante'];
          ?>

          <div class="form-group col-md-6">
      <label for="tipo">Tipo</label>
      <select class="custom-select" id="tipo" name="tipo" required>
        <option value="<?php echo $data['tipo'] ?>"><?php echo ucfirst($data['tipo']) ?></option>
        <option value="adquirido">Adquirido (UTCGG)</option>
      </select>
    </div>
     </div>
     <div class="form-row">
     <div class="form-group col-md-4" id="campo_oculto_tipo">
    <label for="tipo_material">Tipo de material</label>
    <select class="custom-select" id="tipo_material" name="tipo_material" required>
      <?php
        if ($tipo_material == 'cocina'){
          $tipo_material = 'Material de cocina'; ?>
          <option value="cocina"><?php echo $tipo_material ?></option>
        <option value="equipo">Equipo (electrodomésticos)</option>
        <?php } else {
          $tipo_material = 'Equipo (electrodomésticos)'; ?>
           <option value="equipo"><?php echo $tipo_material ?></option>
        <option value="cocina">Material de cocina</option>
        <?php }
      ?>
      </select>
   </div>
   
   <div class="form-group col-md-4" id="campo_oculto_donacion">
    <label for="tipo_donante">Tipo de donante</label>
    <select class="custom-select" id="tipo_donante" name="tipo_donante">
        <option value="<?php echo $data3['tipo_donante'] ?>"><?php echo ucfirst($data3['tipo_donante']) ?></option>
        <option value="empresa">Empresa</option>
        <option value="alumno">Alumno</option>
        <option value="otro">Otro</option>
      </select>
   </div>
   
   <div class="form-group col-md-4" id="campo_oculto_donante">
    <label for="donante">Donante</label>
    <input type="text" class="form-control" id="nombre_donante" name="nombre_donante" value="<?php echo ucfirst($data3['nombre_donante']) ?>" style="border-color: #ced4da;">
   </div>
   </div>

        <?php }
       

       } else { ?>
      
 
    <div class="form-group col-md-6">
      <label for="tipo">Tipo</label>
      <input class="form-control" type="text" id="tipo" name="tipo" value="<?php echo ucfirst($data['tipo'])?>" disabled>
      <input type="hidden" value="<?php echo $data['tipo']?>" id="tipo" name="tipo">
    </div>
 

</div>

      <?php } ?>
    
 

   
 <script>
  document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('tipo').addEventListener('change', function() {
      var campoOcultoDonacion = document.getElementById('campo_oculto_donacion');
      var campoOcultoDonante = document.getElementById('campo_oculto_donante');
      var campoOcultoTipo = document.getElementById('campo_oculto_tipo');

      if (this.value === 'donativo') {
        campoOcultoDonacion.style.display = 'block';
        campoOcultoDonante.style.display = 'block';
        campoOcultoTipo.style.display = 'block';
        campoOcultoTipo.classList.remove('col-md-12');
        campoOcultoTipo.classList.add('col-md-4');
      } else {
        campoOcultoDonacion.style.display = 'none';
        campoOcultoDonante.style.display = 'none';
        campoOcultoTipo.style.display = 'block';
        campoOcultoTipo.classList.add('col-md-12');

      }
      
    });
  });
            </script>

    <div class="form-row">
    <div class="col-md-6">
          <div class="form-group">
            <label for="rutaImagen">Cargar Imagen</label>
            <label class="small">(Admite solo .png, .jpg, .jpeg)</label>
            <input type="file" class="form-control-file" id="rutaImagen" name="rutaImagen" accept=".jpg, .jpeg, .png" onchange="validar()" value="<?php echo $data['imagen'] ?>">
          </div>
        </div>
          <div class="col-md-6">
          <div class="image-preview" id="imagePreview">
            <img src="php_action/<?php echo $data['imagen'] ?>" alt="Vista previa de la imagen" id="previewImg">      
          </div>
        </div>
  </div>
  <br>
  <input type="hidden" name="id_articulo" value="<?php echo $data['id_articulo'] ?>">
  <input type="hidden" name="cantidad_total" value="<?php echo $data['cantidad'] ?>">
  <input type="hidden" name="tipo_articulo" value="<?php echo $data['tipo'] ?>">
  <input type="hidden" name="imagen" value="<?php echo $data['imagen'] ?>">
  <div class="d-flex container-fluid justify-content-end">
              <button type="submit" name="add" class="btn btn-outline-danger mr-3"><i class="fa-solid fa-check"></i> Actualizar</button>
              <a href="inv_actual.php" class="btn btn-outline-info" role="button"><i class="fa-solid fa-arrow-left"></i> Atrás</a>
             
            </div>
  </div>
</form>

<script src="js/script_articulos.js"></script>
</div>
  </div> 
  </div> 
  
  <script type="text/javascript">
  function validar(){
    var fileName = document.getElementById("rutaImagen").value;
    var idxDot = fileName.lastIndexOf(".") + 1;
    var extFile = fileName.substr(idxDot, fileName.length).toLowerCase();
    if (extFile== "jpg" || extFile=="jpeg" || extFile=="png") {
    }else{
      alert("¡Solo se permiten archivos jpg/jpeg y png!");
    }
  }
</script>                             
        </main>
        <?php include_once('footer.php'); ?>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="../assets/demo/chart-area-demo.js"></script>
        <script src="../assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="../assets/demo/datatables-demo.js"></script>

        <script>
  // Javascript para manejar la vista previa de la imagen
  // Añade un escuchador de eventos al elemento con ID 'rutaImagen' para el evento 'change'
  document.getElementById("rutaImagen").addEventListener("change", function() {
    // Crea una nueva instancia de FileReader, que permite leer archivos 
    const reader = new FileReader();
    // Define lo que sucede una vez que se completa la lectura del archivo
    reader.onload = function(e) {
      // Accede al resultado de la lectura del archivo, que es una URL de datos
      const uploaded_image = e.target.result;
      // Asigna la URL de datos como el src (fuente) del elemento de imagen 'previewImg'
      document.getElementById("previewImg").src = uploaded_image;
      // Asegura que el elemento 'previewImg' se muestre
      document.getElementById("previewImg").style.display = "block";
      // Oculta el texto "Vista previa de la imagen" cambiando su estilo a 'display: none'
      document.getElementById("previewText").style.display="none"; 
    };
    // Lee el primer archivo seleccionado por el usuario y lo convierte en una URL de datos base64, ya que esto permite que el contenido del archivo (en este caso, una imagen) se represente directamente en el HTML como parte de la URL del atributo src de una etiqueta img. Facilitando la vista previa inmediata de la imagen seleccionada sin necesidad de subirla en ese instante al servidor.
    reader.readAsDataURL(this.files[0]);
  });
  </script>
</body>
</html>
<?php }
?>