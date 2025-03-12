<?php 
  session_start();
    include_once('../conf/config.php');
    if(!isset($_SESSION['ID'])){
    header("Location: ../index.php");
  }
  
  $nombre = $_SESSION['NAME'];
  $tipo_usuario = $_SESSION['ROLE'];  
?>
<?php  //No tenemos la contraseña o la información del email almacenado en las sesiones,por lo que podemos obtener resultados desde la BD.
  $id = $_SESSION['ID'];
  $sql = "SELECT * FROM usuarios WHERE id = '$id'";

  //En este caso podemos identificar el id de la cuenta para obtener su información.
  $result = $con->query($sql);
  $row = $result->fetch_assoc();
  
   //foto
   $query = "SELECT foto FROM usuarios WHERE id=$id";
   $resultado = mysqli_query($con, $query);
   $fila = mysqli_fetch_assoc($resultado);
   $nombreImagenUnico = $fila['foto'];

  if(isset($_GET['m'])){
    $m = $_GET['m'];

    switch ($m) {
      case '1':
        echo "<div class='modal fade' id='exampleModal12' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
  <div class='modal-dialog'>
    <div class='modal-content'>
      <div class='modal-header'>
        <h5 class='modal-title' id='exampleModalLabel'>Contraseña actualizada</h5>
        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>
      <div class='modal-body'>
        <center><p class='lead'>¡Contraseña actualizada correctamente!</p>
     
        <i class='fa-solid fa-lock fa-3xl' style='font-size:50px'></i> </center>
        
      </div>
      <div class='modal-footer'>
        <button type='button' class='btn btn-success' data-dismiss='modal'><i class='fa-solid fa-circle-check'></i> Ok</button>
      </div>
    </div>
  </div>
</div>";
        break;
    }
  }

  ?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Perfil</title>
  <link rel="stylesheet" href="css/full-form.css">
  <link rel="stylesheet" href="css/style2.css">
  <!-- CDN FontAwesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!--<link rel="stylesheet" href="css\perfil.css">
  <link rel="stylesheet" href=" css\stylesindex.css">-->
<link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.1.0/uicons-regular-rounded/css/uicons-regular-rounded.css'>
<link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.1.0/uicons-regular-straight/css/uicons-regular-straight.css'>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
<style>
    /*Estilo para la vista previa de la imagen*/
    .image-preview {
      width: 200px; /*Ancho fijo de 200px*/
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
      display: none; /*La imagen está oculta inicialmente*/
      width: 100%;
      height: 100%;
      object-fit: cover; /*Asegura que la imagen cubra completamente el contenedor sin perder sus proporciones*/
    }
  </style>
</head>

<body style="background-color: #e9ecef;">
  
<?php
include_once('navbar.php');
?>
  <br>
  <div class="jumbotron">
    <div class="container">

<div class="row row-cols-1 row-cols-md-2 d-flex justify-content-center">
  <div class="col mb-4">
    <div class="card shadow p-4" style="border-radius: 50px;">
    
     
      <?php
    // Mostrar la imagen si existe
    if ($nombreImagenUnico) {
         echo "<div style='align-items: center; height: 35vh; display: flex;'>
         <img src='uploads/$nombreImagenUnico' class='card-img-top' alt='Foto del Alumno' style='border-radius: 50px; object-fit: contain; width: 100%; height: 100%;'>
          </div>";
    } else {
        echo "<div style='align-items: center; height: 30vh;display: flex;'> 
        <img src='img/perfil_predeterminada.png' class='card-img-top' alt='perfil' style='border-radius: 50px; object-fit: contain; width: 100%; height: 100%;'>
        </div>";

    }
    ?>
    <br>
    
<div class="d-flex justify-content-end">
    <button type="submit" class="btn btn-info" style="border-radius: 50px;" data-toggle="modal" data-target="#exampleModal1_foto"><i class="fa-regular fa-image"></i> Actualizar</button>
    </div>
    <!--Modal-->
<div class="modal fade" id="exampleModal1_foto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Actualizar foto de perfil</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form class="p-4" action="upload.php" method="post" enctype="multipart/form-data">
      
      <div class="form-group">
        <label class='custom-file-label mx-4 my-4' for="foto">Seleciona una foto:</label>
        <input type="file" class=" custom-file-input" id="foto" name="foto" accept="image/*" required>
      </div>
      <div class="form-group d-flex justify-content-center">
          <div class="image-preview" id="imagePreview">
            <img src="" alt="Vista previa de la imagen" id="previewImg">
            <span id="previewText">Vista previa de la imagen</span>         
          </div>
        </div>
        <input type="hidden" name="id" value="<?php echo $id?>">
    
      </div>
      <div class="modal-footer p-4">
        <button type="submit" class="btn btn-danger"><i class="fa-regular fa-image"></i> Actualizar foto de perfil</button>
        </form>
        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal"><i class="fa-regular fa-circle-xmark"></i> Cancelar</button>
      </div>
    </div>
  </div>
</div>
<!--fin modal-->
    
      <div class="card-body">
        <center><h5 class="card-title"><?php echo $row['nombre']?></h5></center>
        <br>
        <p class="card-text"><span class="text-info">Matrícula: </span><?php echo $row['matricula']?></p>
        <p class="card-text"><span class="text-info">Correo electrónico: </span><?php echo $row['email']?></p>
        <?php 
         $cuatrimestre = "SELECT * FROM usuarios 
         INNER JOIN grupo ON grupo.id_grupo = usuarios.grupo
         WHERE usuarios.id = '$id' ";
         $resultCuatrimestre = $con->query($cuatrimestre);
         $rowCuatrimestre = $resultCuatrimestre->fetch_assoc();
        ?>
        <p class="card-text"><span class="text-info">Cuatrimestre: </span><?php echo $rowCuatrimestre['cuatrimestre']?></p>
        <p class="card-text"><span class="text-info">Grupo: </span><?php echo $rowCuatrimestre['grupo']?></p>
        <p class="card-text"><span class="text-info">Solicitudes realizadas:</span>
             <?php 
          $query = " SELECT COUNT(DISTINCT solicitud.id) as total_enviadas FROM solicitud
          INNER JOIN num_equipo ON solicitud.equipo = num_equipo.id
          INNER JOIN integrantes_equipo ON num_equipo.id = integrantes_equipo.num_equipo
          INNER JOIN usuarios ON integrantes_equipo.alumno = usuarios.id WHERE (solicitud.solicitante = $id OR integrantes_equipo.alumno = $id) AND solicitud.estatus = 'finalizada' ";
          $result_t = $con -> query($query);
          $row_t = $result_t->fetch_assoc();
          echo $row_t['total_enviadas'];
        ?>

        </p>
        <br>
        
    <div class="d-flex justify-content-end">
    <button type="submit" class="btn btn-danger" style="border-radius: 50px;" data-toggle="modal" data-target="#exampleModal"><i class="fa-solid fa-lock"></i> Cambiar contraseña</button>
    </div>

      </div>
    </div>
  </div>
</div>

<!--Modal-->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cambiar contraseña</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form class="p-4" action="php_action/cambiar_passw.php" method="POST" id="registration" class="registration">

  <div class="form-group">
    
    <label for="password"><i class="fa-solid fa-lock" style="color: #dc3545;"></i> Ingresa tu nueva contraseña </label>
    <input type="text" class="form-control" name="password" id="password" aria-describedby="emailHelp" placeholder="Ingresa tu nueva contraseña" required/>
    <ul class="input-requirements" style="margin-top: 4%;">
      <li>Contener al menos 8 caracteres y menos de 100</li>
      <li>Contener al menos 1 número.</li>
      <li>Contener al menos una letra minúscula.</li>
      <li>Contener al menos una letra mayúscula.</li>
      <li>Contener algun caracter especial (por ejemplo: @ !).</li> 
    </ul>
    
  </div>
  <div class="form-group">
    <label for="password_repeat"><i class="fa-solid fa-lock" style="color: #dc3545;"></i> Repetir contraseña</label>
    <input type="password" class="form-control" name="password_repeat" id="password_repeat" placeholder="Ingresa tu nueva contraseña" minlength="8" maxlength="100" required/>
  </div> 
<br>

<input type="hidden" name="id" value="<?php echo $row['id']?>"/>
            
  <button type="submit" name="submit" class="btn btn-danger btn-block">Cambiar contraseña</button>
</form>
<script src="../script_passw.js"></script>
        


      </div>
      <div class="modal-footer p-4">
        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal"><i class="fa-regular fa-circle-xmark"></i> Cancelar</button>
      </div>
    </div>
  </div>
</div>
<!--fin modal-->

    </div>
  </div>


<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>

<script>
  $(document).ready(function(){
    $('#exampleModal12').modal('show');
  });
</script>

<?php
		include_once("pie.php");
	?>

  <script>
  // Javascript para manejar la vista previa de la imagen
  // Añade un escuchador de eventos al elemento con ID 'rutaImagen' para el evento 'change'
  document.getElementById("foto").addEventListener("change", function() {
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
