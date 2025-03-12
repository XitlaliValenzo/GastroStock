<?php 
    session_start();
    include_once('../conf/config.php');
    if(!isset($_SESSION['ID'])){
        header("Location: ../index.php");
    }
    
    $nombre = $_SESSION['NAME'];
    $tipo_usuario = $_SESSION['ROLE'];  
   
    if($_POST['id']){
        $id = $_POST['id'];

        $sql = "SELECT * FROM usuarios WHERE id = {$id}";
        $result = $con ->query($sql);

        $data = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cambiar contraseña</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
        <link href="../css/styles.css" rel="stylesheet" />
        <link rel="stylesheet" href="../css/estilo-nav.css">
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <!-- CDN FontAwesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../css/full-form.css">
    <link rel="stylesheet" href="../css/style2.css">
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
                        <h1 class="mt-4">Cambiar contraseña</h1>
                        <br>
                        <hr>
                        <br>
                        <div class="jumbotron shadow p-3 mb-5 bg-white rounded">
        <div class="container col-md-12">
    <form action="php_action/cambiar_passw.php" method="POST" id="registration" class="registration">
<div class="row">
  <div class="form-group col-md-6">
    <label for="password"><i class="fa-solid fa-lock" style="color: #dc3545;"></i> Ingresa tu nueva contraseña </label>
    <input type="text" class="form-control" name="password" id="password" placeholder="Ingresa tu nueva contraseña" required/>
    <ul class="input-requirements" style="margin-top: 2%;">
            <li>Contener al menos 8 caracteres y menos de 100</li>
            <li>Contener al menos 1 número.</li>
            <li>Contener al menos una letra minúscula.</li>
            <li>Contener al menos una letra mayúscula.</li>
            <li>Contener algun caracter especial (por ejemplo: @ !).</li>   
        </ul>
    
  </div>
  <div class="form-group col-md-6">
    <label for="password_repeat"><i class="fa-solid fa-lock" style="color: #dc3545;"></i> Repetir contraseña</label>
    <input type="password" class="form-control" name="password_repeat" id="password_repeat" placeholder="Ingresa tu nueva contraseña" minlength="8" maxlength="100" required/>
  </div> 
</div>

<input type="hidden" name="id" value="<?php echo $data['id']?>"/>

  <div class="d-flex container-fluid justify-content-end">
              <button type="submit" name="submit" class="btn btn-outline-danger"><i class="fa-solid fa-check"></i> Cambiar contraseña</button>
            </div>
</form>
<script src="../script_passw.js"></script>
</div>
</div>
                        
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
<?php
    }
?>