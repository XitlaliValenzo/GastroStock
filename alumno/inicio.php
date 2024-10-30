<?php

  if (!isset($_SESSION['ID'])){
    header("Location: ../index.php");
    exit();
  }

  //No tenemos la contraseña o la información del email almacenado en las sesiones,por lo que podemos obtener resultados desde la BD.
  $id = $_SESSION['ID'];
  $sql = "SELECT * FROM usuarios WHERE id = '$id'";

  //En este caso podemos identificar el id de la cuenta para obtener su información.
  $result = $con->query($sql);
  $row = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<h3><?php echo ucwords($_SESSION['ROLE']); ?></h3>

	<form action="cambiarpssw.php" method="POST">
    <input type="hidden" name="id" value="<?php echo $row['id'];?>">
    <button type="submit" class="btn btn-info"><i class="fa-solid fa-lock"></i> Cambiar contraseña</button>
</form>

</body>
</html>