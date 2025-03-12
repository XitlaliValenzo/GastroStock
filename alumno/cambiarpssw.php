<?php
  session_start();
  //incluimos la conexion a la BD
  include_once('../conf/config.php');

  if (!isset($_SESSION['ID'])){
   header("Location: ../index.php");
   exit();
  }
?>
<?php
	require_once '../conf/config.php';

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
	<link rel="stylesheet" href="css/full-form.css">
	<link rel="stylesheet" href="css/style2.css">
	<!-- CDN FontAwesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.1.0/uicons-regular-rounded/css/uicons-regular-rounded.css'>
<link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.1.0/uicons-regular-straight/css/uicons-regular-straight.css'>
	<title>Cambiar contraseña</title>
</head>
<body>
	<?php
include_once('navbar.php');
?>
	<div class="jumbotron" style="background-color: #fff;">
		<div class="container col-md-4">
	<form action="php_action/cambiar_passw.php" method="POST" id="registration" class="registration">

  <div class="form-group">
  	<h3>Cambiar contraseña</h3>
  	<br>
  	
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


<input type="hidden" name="id" value="<?php echo $data['id']?>"/>
            
  <button type="submit" name="submit" class="btn btn-danger btn-block">Cambiar contraseña</button>
</form>
<script src="../script_passw.js"></script>
</div>
</div>

	
</body>
</html>
<?php
	}
?>