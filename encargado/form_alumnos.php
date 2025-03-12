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
	<title>Añadir alumno</title>
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
                        <h1 class="mt-4">Añadir alumno</h1>
                        <br>
                        <hr>
                        <br>
                        <form action="php_action/registrar_alumno.php" method="POST" id="registration" class="registration">
                            <div class="container">
                            <div class="jumbotron shadow p-3 mb-5 bg-white rounded">
                            <div class="container">
                               
    <div class="form-row">
    <div class="form-group col-md-12">
      <label for="nombre">Nombre completo</label>
      <input type="text" class="form-control" id="nombre" name="nombre" required>
      <ul class="input-requirements">
            <li style="margin-top: 2%;">Debes ingresar únicamente letras</li>
        </ul>
    </div>
</div>

   <div class="form-row">
    <div class="form-group col-md-6">
      <label for="matricula">Matrícula</label>
      <input type="text" class="form-control" id="matricula" name="matricula"  required>
      <ul class="input-requirements">
            <li style="margin-top: 2%;">Debes ingresar únicamente números</li>
            <li style="margin-top: 2%;">La matrícula debe ser de gastronomía</li>
            <li style="margin-top: 2%;">Debes ingresar 8 dígitos</li>
        </ul>
    </div>
   
    
        <div class="form-group col-md-6">
      <label for="password">Contraseña</label>
      <input type="text" class="form-control" id="password" name="password" value="12345678" disabled>
    </div>

    </div>
   
    <div class="form-row">
         <div class="form-group col-md-6">
      <label for="email">Correo electrónico</label>
      <input type="email" class="form-control" id="email" name="email" readonly>
      <!--<ul class="input-requirements">
            <li style="margin-top: 2%;">Debes ingresar el correo institucional</li>
        </ul>-->
    </div>

    <div class="form-group col-md-6">
      <label for="grupo">Grupo</label>
      <select class="custom-select" id="grupo" name="grupo" required>
        <option selected disabled value="">Selecciona...</option>
        <?php 
          $grupos = "SELECT * FROM grupo WHERE estatus = 1";
          $resultGrupo = $con -> query($grupos);
          if($resultGrupo ->num_rows > 0){
            while($grupo = $resultGrupo ->fetch_assoc()) { ?>
            <option value="<?php echo $grupo['id_grupo'] ?>"><?php echo $grupo['grupo'] ?></option>
        <?php } 
        } else { ?>
          <option selected disabled value="">Aún no hay grupos registrados</option>
        <?php }
        ?>
      </select>
    </div>
        
  </div>
  <div class="d-flex container-fluid justify-content-end">
              <button type="submit" name="add" class="btn btn-outline-danger mr-3"><i class="fa-solid fa-check"></i> Registrar</button>
              <a href="alumnos.php" class="btn btn-outline-info" role="button"><i class="fa-solid fa-arrow-left"></i> Atrás</a>
             
            </div>




  </div>
</form>
<script src="js/script_alumno.js"></script>
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

        <script>
        //Espera a que el contenido del documento se haya cargado antes de añadir los escuvhadores de eventos
        document.addEventListener('DOMContentLoaded', function(){
            //Obtiene el elemento de entrada de la matricula por su ID de acuerdo al input 
            var inputMatricula = document.getElementById('matricula');

            //Añade un escuchador de eventor que reacciona cada vez que el valor del campo de matricula cambia
            inputMatricula.addEventListener('input', function(){
                //Obtiene el valor actual del campo de matricula
                var matriculaValue = this.value;

                //Construye el email concatenando el valor de matricula y el dominio web fijo 
                var emailValue = matriculaValue + '@utcgg.edu.mx';

                //Obtiene el elemento de entrada del eamil por su ID y actualiza su valor
                document.getElementById('email').value = emailValue;
            });
        });
    </script>
</body>
</html>