<?php	
	session_start();
    include_once('../conf/config.php');
    if(!isset($_SESSION['ID'])){
		header("Location: ../index.php");
	}
	
	$nombre = $_SESSION['NAME'];
	$tipo_usuario = $_SESSION['ROLE'];	

    if(isset($_GET['m'])){
    $m = $_GET['m'];

    switch ($m) {
      case '1':
        echo "<div class='modal fade' id='exampleModal' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
  <div class='modal-dialog'>
    <div class='modal-content'>
      <div class='modal-header'>
        <h5 class='modal-title' id='exampleModalLabel'>Email existente</h5>
        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>
      <div class='modal-body'>
        <center><p class='lead'>¡El email ingresado ya existe!</p>
     
        <i class='fa-solid fa-envelope fa-3xl' style='font-size:50px'></i> </center>
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
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Añadir encargado</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
        <link href="../css/styles.css" rel="stylesheet" />
        <link rel="stylesheet" href="../css/estilo-nav.css">
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
		<!-- CDN FontAwesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/full-form-form.css">
    <link rel="stylesheet" href="css/style2.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <style>
   #nav {
  background: #870000;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #190A05, #870000);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #190A05, #870000); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
   }
</style>
</head>
<body class="sb-nav-fixed">
    <script>
  $(document).ready(function(){
    $('#exampleModal').modal('show');
  });
</script>
	<?php
		include_once("navbar.php");
	?>
	<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Añadir encargado</h1>
                        <br>
                        <hr>
                        <br>
                        <form action="php_action/registrar_encargado.php" method="POST" id="registration" class="registration">
                            <div class="container">
                            <div class="jumbotron shadow p-3 mb-5 bg-white rounded">
                            <div class="container">
                               
    <div class="form-row">
    <div class="form-group col-md-12">
      <label for="nombre">Nombre completo</label>
      <input type="text" class="form-control" id="nombre" name="nombre" required>
      <ul class="input-requirements">
        <li style="margin-top: 2%;">Debes ingresar las mayúsculas y minúsculas correctamente</li>
            <li style="margin-top: 2%;">Debes ingresar únicamente letras</li>
        </ul>
    </div>
</div>

   <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Correo electrónico</label>
      <input type="email" class="form-control" id="email" name="email" required>
      <ul class="input-requirements">
            <li style="margin-top: 2%;">Debes ingresar el correo institucional</li>
        </ul>
    </div>
    
    <div class="form-group col-md-6">
      <label for="telefono">Teléfono</label>
      <input type="tel" class="form-control" id="telefono" name="telefono" required>
      <ul class="input-requirements">
            <li style="margin-top: 2%;">Debes ingresar únicamente números</li>
            <li style="margin-top: 2%;">Debes ingresar 10 dígitos</li>
        </ul>
    </div>
    </div>
   
    <div class="form-row">
    <div class="form-group col-md-6 justify-content-center">
      <label for="password">Contraseña</label>
      <input type="text" class="form-control" id="password" name="password" value="12345678" disabled>
    </div>
  </div>
  <div class="d-flex container-fluid justify-content-end">
              <button type="submit" name="add" class="btn btn-outline-danger mr-3"><i class="fa-solid fa-check"></i> Registrar</button>
              <a href="encargados.php" class="btn btn-outline-info" role="button"><i class="fa-solid fa-arrow-left"></i> Atrás</a>
             
            </div>




  </div>
</form>
<script src="js/script.js"></script>
</div>
  </div> 
  </div>                              
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
</body>
</html>