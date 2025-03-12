<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" href="css/full-form.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/estilo-fondo.css">
	
	<title>Inicio de sesión</title>
</head>
<body class="fondo">
	<div class="jumbotron" style="background-color: transparent;">
		<div class="container">
			<div class="container col-md-4 col-lg-3 col-sm-6 col-6 col-xl-2 d-flex justify-content-center align-items-center">
  	<img class="img-fluid" src="img/icono.png" alt="gorro-chef" style="width: 60%;">
  </div>
		<div class="container col-md-7 col-lg-5 col-sm-9 col-12 col-xl-4 shadow p-5 mb-4" id="fondo-form" style="border-radius: 50px;">
	<form action="login.php" method="POST" id="registration" class="registration">

  <div class="form-group">
  	<center><h1 class="lead">Iniciar sesión</h1></center>
  	<?php  
					if (isset($errorMsg))
					{
				?>
				<br>
				<div class="alert alert-danger alert-dimissible">
					<button type="button" class="close" data-dismiss="alert">&times;
					</button>
					<?php echo $errorMsg; ?>
				</div>
			<?php } ?>
			<br>
			<div class="lead">
    <label for="email"><i class="fa-solid fa-envelope" style="color: #dc3545;"></i> Correo electrónico</label>
    <input type="text" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Ingresa tu email" required/>
     
    <ul class="input-requirements" id="ul">
			<li style="margin-top: 2%;">Debes ingresar tu correo institucional</li>
		</ul>
 
  <div class="form-group">
    <label for="password"><i class="fa-solid fa-lock" style="color: #dc3545;"></i> Contraseña</label>
    <input type="password" class="form-control" name="password" id="password" placeholder="Ingresa tu contraseña" required/>
  </div> 
            </div>

            	<br>

  <button type="submit" name="submit" class="btn btn-danger btn-block"><h4 class="lead">Iniciar sesión</h4></button></div>
</form>
<script src="script.js"></script>
</div>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
	
</body>
</html>