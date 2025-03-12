<?php 
    session_start();
    if(isset($_SESSION['ID'])){
    	if ($_SESSION['ROLE'] == 'administrador') {
    		//header("Location: administrador/pedidos.php");
    		header("Location: home.php");
    		exit();
    	}
    	if ($_SESSION['ROLE'] == 'encargado') {
    		header("Location: home.php");
    		exit();
    	}
    	if ($_SESSION['ROLE'] == 'alumno') {
    		header("Location: home.php");
    		exit();
    	}

    	
    } 

	//Incluimos el archivo de conexion a la bd.
	include_once('conf/config.php');

	if (isset($_POST['submit'])) {
		$errorMsg = "";
		$email = $_POST['email'];
		$password = $_POST['password'];
		
		    
		if (!empty($email) || !empty($password)){
        $query = "SELECT * FROM usuarios where email = '$email' and activo=1";
		$result = $con->query($query);

		    if ($result->num_rows > 0) {
			    $row = $result->fetch_assoc();

			    if (password_verify($password, $row['password'])){
			    	$_SESSION['ID'] = $row['id'];
			    $_SESSION['ROLE'] = $row['role'];
			    $_SESSION['NAME'] = $row['nombre'];
			    //header("Location: pedidos.php");
			    //die();
			    if ($_SESSION['ROLE'] == 'administrador') {
			    	//header("Location: administrador/pedidos.php");
			    	header("Location: home.php");
			    	die();
			    }
			    if ($_SESSION['ROLE'] == 'encargado') {
			    	header("Location: home.php");
			    	die();
			    }
			    if ($_SESSION['ROLE'] == 'alumno') {
			    	header("Location: home.php");
			    	die();
			    }

			    } else {
			    	$errorMsg = "Correo electrónico o contraseña incorrectos";
			    }

			    
		    } else {
		    	$errorMsg = "Correo electrónico o contraseña incorrectos";
		    }
	    } else{
	    	$errorMsg= "El correo electrónico y la contraseña son obligatorias.";
	    }
    }
    require_once("index.php");
?>