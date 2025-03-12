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
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Editar equipo</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
        <link href="../css/styles.css" rel="stylesheet" />
        <link rel="stylesheet" href="../css/estilo-nav.css">
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
		<!-- CDN FontAwesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
   #nav {
  background: #870000;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #190A05, #870000);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #190A05, #870000); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
   }
    
</style>
</head>
<body class="sb-nav-fixed">
	<?php
		include_once("navbar.php");
	?>
	<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Editar equipo</h1>
                        <br>
                        <hr>
                        <br>
                        <form action="#" method="POST" id="registration">
                            <div class="container">
                            <div class="jumbotron shadow p-3 mb-5 bg-white rounded">
                            <div class="container">
                               
    <div class="form-row">
    <div class="form-group col-md-12">
      <label for="nombre">Nombre del material</label>
      <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingresa el nombre del material" required>
    </div>
</div>

   <div class="form-row">
    <div class="form-group col-md-12">
      <label for="inputEmail4">Descripción</label>
      <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Ingresa la descripción del material" required></textarea>
      
    </div>
    </div>
    <div class="form-row">
    <div class="form-group col-md-4">
      <label for="inputEmail4">Cantidad</label>
      <input type="number" class="form-control" id="cantidad" name="cantidad" value="1" min="1" max="100" required>
    </div>
    <div class="form-group col-md-4">
      <label for="cuatrimestre">Categoría</label>
      <select class="custom-select" id="cuatrimestre" name="cuatrimestre" required>
        <option selected disabled value="">Selecciona...</option>
        <option value="1">Categoría 1</option>
        <option value="2">Categoría 2</option>
        <option value="3">Categoría 3</option>
        <option value="4">Categoría 4</option>
        <option value="5">Categoría 5</option>
      </select>
    </div>
    <div class="form-group col-md-4">
      <label for="inputEmail4">Capacidad</label>
      <input type="text" class="form-control" id="capacidad" name="capacidad" required>
    </div>
   </div>

   <div class="form-row">
    <div class="form-group col-md-12">
      <label for="inputEmail4">Observaciones</label>
      <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Ingresa la descripción del material"></textarea>
      
    </div>
    </div>

    <div class="form-row">
    <div class="form-group col-md-6">
      <label for="tmp_vida">Tiempo de vida</label>
      <input type="text" class="form-control" id="tmp_vida" name="tmp_vida" placeholder="Ingresa el tiempo de vida aproximado" required>
    </div>
    <div class="form-group col-md-6">
    <label for="exampleFormControlFile1">Imagen del material</label>
    <input type="file" class="form-control-file" id="exampleFormControlFile1">
  </div>
  </div>
  <div class="d-flex container-fluid justify-content-end">
              <button type="submit" name="add" class="btn btn-outline-danger mr-3"><i class="fa-solid fa-check"></i> Editar</button>
              <a href="inv_equipo.php" class="btn btn-outline-info" role="button"><i class="fa-solid fa-arrow-left"></i> Atrás</a>
             
            </div>




  </div>
</form>

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