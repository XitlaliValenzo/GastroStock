<?php 
  session_start();
    include_once('../conf/config.php');
    if(!isset($_SESSION['ID'])){
    header("Location: ../index.php");
  }
  
  $nombre = $_SESSION['NAME'];
  $tipo_usuario = $_SESSION['ROLE'];  
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Historial de Pedidos</title>
  <!-- CDN FontAwesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <link rel="stylesheet" href="css\historial.css">
  <link rel="stylesheet" href=" css\stylesindex.css">
  <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.1.0/uicons-regular-rounded/css/uicons-regular-rounded.css'>
<link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.1.0/uicons-regular-straight/css/uicons-regular-straight.css'>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

</head>
<body>
  <?php 
include_once('navbar.php'); ?>
<br>

<div class="containerh">
  <center><h1>¡Contraseña actualizada correctamente!</h1>
    <hr>
  <br>
                                    <br>
                                    <div class="table-responsive-sm">
    <br>
                               <i class="fa-solid fa-circle-check fa-bounce fa-lg" style="color: #27d01b;font-size: 300%;"></i></center>
                               <br>
                               <div class="d-flex container-fluid justify-content-end">
              
              <a href="../home.php" class="btn btn-outline-info" role="button"><i class="fa-solid fa-arrow-left"></i> Atrás</a>
             
            </div>
          </div>
  


</div>
  </div> 
</div>
<script src="js\historial.js"></script>

</body>
</html>