<?php
 //session_start();
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


  
  if(isset($_GET['m'])){
    $m = $_GET['m'];

    switch ($m) {
      case '1':
        echo "<div class='modal fade' id='exampleModal' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
  <div class='modal-dialog'>
    <div class='modal-content'>
      <div class='modal-header'>
        <h5 class='modal-title' id='exampleModalLabel'>Sin Stock</h5>
        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>
      <div class='modal-body'>
        <center><p class='lead'>¡Por el momento, el material no cuenta con suficiente stock!</p>
     
        <i class='fa-solid fa-kitchen-set fa-3xl' style='font-size:50px'></i> </center>
      </div>
      <div class='modal-footer'>
        <button type='button' class='btn btn-success' data-dismiss='modal'><i class='fa-solid fa-circle-check'></i> Ok</button>
      </div>
    </div>
  </div>
</div>";
        break;
        case '2':
          echo "<div class='modal fade' id='exampleModal' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
  <div class='modal-dialog'>
    <div class='modal-content'>
      <div class='modal-header'>
        <h5 class='modal-title' id='exampleModalLabel'>Sin Stock</h5>
        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>
      <div class='modal-body'>
        <center><p class='lead'>¡La cantidad a requerir debe ser mayor a 0!</p>
     
        <i class='fa-solid fa-kitchen-set fa-3xl' style='font-size:50px'></i> </center>
      </div>
      <div class='modal-footer'>
        <button type='button' class='btn btn-success' data-dismiss='modal'><i class='fa-solid fa-circle-check'></i> Ok</button>
      </div>
    </div>
  </div>
</div>";
          break;
          case '3':
          echo "<div class='modal fade' id='exampleModal' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
  <div class='modal-dialog'>
    <div class='modal-content'>
      <div class='modal-header'>
        <h5 class='modal-title' id='exampleModalLabel'>Requisición enviada</h5>
        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>
      <div class='modal-body'>
        <center><p class='lead'>¡Requisición enviada exitosamente!</p>
     
        <i class='fa-regular fa-circle-check fa-3xl' style='font-size:50px'></i> </center>
       
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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<title>Alumno</title>
<link rel="stylesheet" href="alumno/css/stylesindex.css">
<link rel="stylesheet" href="alumno/css/stylex.css">
<link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.1.0/uicons-regular-rounded/css/uicons-regular-rounded.css'>
<link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.1.0/uicons-regular-straight/css/uicons-regular-straight.css'>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
<!--Multiple select-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<style>
   #nav {
  background: #870000;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #190A05, #870000);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #190A05, #870000); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
   }
    
</style>
<body style="background-color: #e9ecef;">
  <script>
  $(document).ready(function(){
    $('#exampleModal').modal('show');
  });
</script>
<div class="sticky-top">
  <nav class="navbar navbar-expand-lg navbar-dark" id="nav">
  <a class="navbar-brand" href="alumno/alumno.php">
    <img src="img/icono.png" width="70" height="70" class="d-inline-block align-center" alt="IoT">
    Gastro-Stock
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
        <a class="nav-link" href="home.php"><i class="fa-solid fa-house"></i> Inicio<span class="sr-only">(current)</span></a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="alumno/historial.php"><i class="fa-solid fa-file-circle-check"></i> Mis requisiciones</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="alumno/perfil.php"><i class="fa-solid fa-user"></i> <?php echo $row['nombre'] ?></a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="logout.php"><i class="fa-solid fa-right-from-bracket"></i> Cerrar sesión</a>
      </li>
    </ul>

  </div>
</nav>
</div>

<div class="row d-flex align-items-center justify-content-center" id="cont_img" style="background-image: url(alumno/img/buscar.jpg);">
  <div class="capa"></div>
  <div class="col-md-6 col-lg-6 col-sm-8 col-8 col-xl-5 text-center">
    <h1 id="titulo">Material de Cocina</h1>
  <br>
  <form class="d-flex" action="" method="POST">
      <input class="form-control mr-0" type="search" name="busqueda" placeholder="Buscar" aria-label="Search" style="border-radius: 0px 0 0 0px; border: none;">
      <button class="btn btn-info" type="submit" name="buscar" style="border-radius: 0 0px 0px 0; color:#fff; border: none;"><i class="fa-solid fa-magnifying-glass"></i></button>
    </form>
</div>
</div>


<div class="jumbotron" style="background-color: transparent">

<div class="row">
<div class="col-sm-12 col-xl-8 col-lg-12 col-md-12">
<!--Buscar-->
  <?php
    if(isset($_POST['buscar'])){ 
      $busqueda=$_POST['busqueda'];
      $query_buscar = "SELECT * FROM articulos WHERE nombre LIKE '%".$busqueda."%' AND estatus != 'eliminado' ";
      $result_bus = $con->query( $query_buscar);
      $i_buscar = 1;
      if ($result_bus->num_rows > 0) { ?>
        <h3>Resultados encontrados</h3>
        <br>
        <div class="row row-cols-1 row-cols-md-3 row-cols-xl-3 row-cols-sm-2">
        <?php while ($row_buscar = $result_bus->fetch_assoc()) { 
            
          ?>
          <div class="col mb-4">
            <div class="card shadow" style="border-radius: 20px;" >
               <div style="align-items: center; height: 30vh;display: flex;">
                   <img src="administrador/php_action/<?php echo $row_buscar['imagen'] ?>" class="card-img-top" alt="utensilio" style="object-fit: contain; width: 100%; height: 100%;" data-toggle="modal" data-target="#exampleModal1_<?php echo $i_buscar ?>">
                   <!-- Modal -->
<div class="modal fade" id="exampleModal1_<?php echo $i_buscar ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><?php echo $row_buscar['nombre'] ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="card mb-3" style="max-width: 540px; border: none;">
  <div class="row no-gutters">
    <div class="col-md-4">
      <div style="align-items: center; height: 20vh;display: flex; justify-content: center; padding: 0.5rem;">
      <img src="administrador/php_action/<?php echo $row_buscar['imagen'] ?>" alt="articulo" style="object-fit: contain; width: 100%; height: 100%; ">
      </div>
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title"><?php echo $row_buscar['nombre'] ?></h5>
        <p class="card-text"><?php echo $row_buscar['descripcion'] ?></p>
        <p class="card-text">Cantidad: <?php echo $row_buscar['cantidad'] ?></p>
      </div>
    </div>
  </div>
</div>
      </div>
      <div class="modal-footer">
         <form action="alumno/php_action/agregar_a_solicitud.php" method="POST">
              <div class="form-row align-items-center">
                <div class="col-auto my-1">
                <label for="cantidad_articulo">Solicitar Requisición:</label>
              </div>
               <div class="col-auto my-1">
              <input class="form-control" type="number" name="cantidad_articulo" value="1" min="1" required>
            </div>
            <input type="hidden" name="id_articulo" value="<?php echo $row_buscar['id_articulo'] ?>">
            <input type="hidden" name="nombre" value="<?php echo $row_buscar['nombre'] ?>">
            <input type="hidden" name="imagen" value="<?php echo $row_buscar['imagen'] ?>">
            <input type="hidden" name="cantidad" value="<?php echo $row_buscar['cantidad'] ?>">
            <br>
             <div class="col-auto my-1">
            <button type="submit" class="btn shadow" id="btn-solicitar"><i class="fa-solid fa-basket-shopping"></i> Realizar requisición</button>
            </div>
         </div>
            </form>
      </div>
    </div>
  </div>
</div>
<!--Fin modal-->
        </div>
        <div class="card-body">
          <h5 class="card-title" style="color: #c42d35"><?php echo $row_buscar['nombre'] ?></h5>
          <p class="card-text tex">
            Cantidad en stock: <?php echo $row_buscar['cantidad'] ?>
          </p>
          <br>
          <form action="alumno/php_action/agregar_a_solicitud.php" method="POST">
               <!--<div class="row d-flex align-items-center justify-content-center">-->
              <div class="form-group">
                <label for="cantidad_articulo">Solicitar requisición:</label>
              <input class="form-control" type="number" name="cantidad_articulo" value="1" required>
            </div>
            <input type="hidden" name="id_articulo" value="<?php echo $row_buscar['id_articulo'] ?>">
            <input type="hidden" name="nombre" value="<?php echo $row_buscar['nombre'] ?>">
            <input type="hidden" name="imagen" value="<?php echo $row_buscar['imagen'] ?>">
            <input type="hidden" name="cantidad" value="<?php echo $row_buscar['cantidad'] ?>">
             <div class=" form-group d-flex align-items-center justify-content-center" >
            <button type="submit" class="btn btn-block shadow" id="btn-solicitar"><i class="fa-solid fa-basket-shopping"></i> Solicitar requisición</button>
        </div>
         <!--</div>-->
            </form>
        </div>
      </div>
    </div>
        <?php $i_buscar++; } ?>
        </div>
        <hr>
        <br>
      <?php } else { ?>
<div class="row ">
        <div class="card text-center shadow rounded" style="width: 100%;">
  <div class="card-body">
    <p class="card-text lead">No se encontró "<?php echo $busqueda ?>" en nuestros Materiales</p>
    <br>
    <p><i class="fa-solid fa-magnifying-glass fa-xl"></i></p>
  </div>
</div> 
</div> 
    <?php  }
    }
  ?>
<!--Fin buscar-->


  <div class="row row-cols-1 row-cols-md-3 row-cols-xl-3 row-cols-sm-2">

    
  <?php
  include 'conf/config.php';
  $query = "SELECT id_articulo, nombre, cantidad, descripcion, imagen FROM articulos WHERE estatus !='eliminado' ";
  $result2 = $con->query($query);
  $i=1;
  if ($result2->num_rows > 0) {
        while($row2 = $result2->fetch_assoc()) { 
          $rows[] = $row2;
          ?>
          <div class="col mb-4">
            <div class="card shadow" style="border-radius: 20px;" >
               <div style="align-items: center; height: 30vh;display: flex;">
                   <img src="administrador/php_action/<?php echo $row2['imagen'] ?>" class="card-img-top" alt="utensilio" style="object-fit: contain; width: 100%; height: 100%;" data-toggle="modal" data-target="#exampleModal_<?php echo $i?>">
        <!--<?php 
        echo "<img src='administrador/php_action" . htmlspecialchars($row2['imagen']) . "' class='card-img-top' alt='utensilio' style='object-fit: contain; width: 100%; height: 100%;' data-toggle='modal' data-target='#exampleModal_". $i ."'>";
        ?>-->
        </div>
        <div class="card-body">
          <h5 class="card-title" style="color: #c42d35"><?php echo $row2['nombre'] ?></h5>
          <p class="card-text tex">
            Cantidad en stock: <?php echo $row2['cantidad'] ?>
          </p>
          <br>
        
          <form action="alumno/php_action/agregar_a_solicitud.php" method="POST">
               <!--<div class="row d-flex align-items-center justify-content-center">-->
              <div class="form-group">
                <label for="cantidad_articulo">Requerir:</label>
              <input class="form-control" type="number" name="cantidad_articulo" value="1" required>
            </div>
            <input type="hidden" name="id_articulo" value="<?php echo $row2['id_articulo'] ?>">
            <input type="hidden" name="nombre" value="<?php echo $row2['nombre'] ?>">
            <input type="hidden" name="imagen" value="<?php echo $row2['imagen'] ?>">
            <input type="hidden" name="cantidad" value="<?php echo $row2['cantidad'] ?>">
             <div class=" form-group d-flex align-items-center justify-content-center" >
            <button type="submit" class="btn btn-block shadow" id="btn-solicitar"><i class="fa-solid fa-basket-shopping"></i> Agregar material</button>
        </div>
         <!--</div>-->
            </form>

          
        </div>
      </div>
    </div>

    
    <?php $i++; }
      } else { ?>
        <div class="card text-center shadow rounded" style="width: 100%;">
  <div class="card-body">
    
    <p class="card-text lead">No se encontaron Materiales</p>
    
  </div>
</div>
      <?php }
      
  ?>
  

 
 
</div>
</div>

<!--col-md-6 col-lg-6 col-sm-8 col-8 col-xl-5-->
<div class="col-lg-12 col-md-12 col-sm-12 col-xl-4" >
  <div class="row">
  <div class="d-flex align-items-right justify-content-end px-4" style="height: 25vh; width: 100%;">
    <div class="d-flex align-items-center justify-content-center px-4">
    <h1 class="mb-4">Requisición</h1>
    </div>
  <img src="alumno/img/chef.png" class="img-fluid" style=" filter: drop-shadow(8px 2px 8px rgba(0, 0, 0, 0.7));">
  </div>
  </div>
  <div class="row">
    <?php
     
      if(isset($_SESSION['solicitud'])){
        $solicitud = $_SESSION ['solicitud']; 
      $total = 0;
      $ie = 0;
      foreach ($solicitud as $art){ ?>

        <div class="card shadow rounded" style="width: 100%; margin-bottom: 0.6rem;margin-left: 0.9rem;margin-right: 0.9rem;">
          <div class="row">
          <div class="col-4 d-flex align-items-center justify-content-center">
            
            <div style="align-items: center; height: 20vh;display: flex; justify-content: center; padding: 0.5rem;">
      <img src="administrador/php_action/<?php echo $art[1] ?>" alt="articulo" style="object-fit: contain; width: 100%; height: 100%; ">
      </div>
     
    </div>
    <div class="col-8 d-flex align-items-center justify-content-start" >
      
  <div class="card-body" style="padding: 0.8rem;">
    
     
        <p class="text-wrap"><?php echo $art[2]?></p>
     
      
        <p class="text-wrap">Cantidad requerida: <?php echo $art[3]?></p>
<form action="php_action/actualizar_cantidad.php" method="POST">
        <div class="btn-group" role="group" aria-label="Basic example">
  <button type="button" class="btn btn-danger" id="mas_art_<?php echo $ie ?>">
    <i class="fa-solid fa-plus fa-xs"></i>
  </button>
  <button type="button" class="btn btn-outline-danger" style="background-color:#fff; ">

    <input class="form-control" type="number" name="cantidad_articulo" value="<?php echo $art[3]?>" min="1" step="1" required style="border: none;text-align: center;" id="cantidad_<?php echo $ie ?>">
  </button>
  <button type="button" class="btn btn-danger" id="menos_art_<?php echo $ie ?>">
    <i class="fa-solid fa-minus fa-xs"></i>
  </button>
</div>
</form>
      <br>
      
         <a href="alumno/php_action/eliminar_de_solicitud.php?in=<?php echo $ie ?>" style="text-decoration: none;"><button type="button" class="btn btn-outline-danger btn-block"><i class="fa-solid fa-trash"></i> Eliminar</button></a>
    </div>
  </div>
</div>
</div>
      <?php 
      $total += $art[3]; ?>
      <script>
  document.addEventListener('DOMContentLoaded', () => {
    const botonIncrementar = document.getElementById('mas_art_<?php echo $ie ?>');
    const botonDecrementar = document.getElementById('menos_art_<?php echo $ie ?>');
    const cantidadInput = document.getElementById('cantidad_<?php echo $ie ?>');

    botonIncrementar.addEventListener('click', () => {
      cantidadInput.value = parseInt(cantidadInput.value) + 1;
      if (cantidadInput.value > <?php echo $art[4]?> ){
          window.alert("No hay suficiente cantidad en stock");
          cantidadInput.value = <?php echo $art[4]?>;
      } 
      
    });
    botonDecrementar.addEventListener('click', () => {
      if (cantidadInput.value > 0){
        cantidadInput.value = parseInt(cantidadInput.value) - 1;
      }
      if (cantidadInput.value <= 0 ){
          window.alert("La cantidad requeridad debe ser mayor a 0");
          cantidadInput.value = 1;
      } 
    });
  });
</script>
      <?php $ie++;
       } 
    ?>
    <br>
      <div class="container col-12 justify-content-end" style="margin-top: 0.7rem;">
        <p style="margin-right: 0.4rem;">Total de materiales: <?php echo $total ?></p>
        <?php
          $_SESSION['total'] = $total;
        ?>
        </div>

       
        <div class="container d-flex justify-content-end col-md-12 col-sm-12">
        <div class="shadow col-11 col-md-6 col-sm-8 col-xs-12 col-lg-6 col-xl-12" style=" padding: 2.4rem; background-color: #fff; border-radius: 10px;">

        <form action="alumno/php_action/crear_solicitud.php" method="POST">
           
            <div class="form-group">
      <label for="alumno">Integrantes de equipo:</label>
      
      <select class="form-control selectpicker" multiple data-live-search="true" name="alumno[]" data-size="4" required>
       
  <option class="text-wrap" selected>Selecciona los integrantes</option>
  <?php
      $consulta="SELECT * FROM usuarios WHERE role='alumno' AND activo=1";
      $ejecutar=mysqli_query($con,$consulta) or die (mysqli_error($connect));
                                
      while ($opciones = mysqli_fetch_assoc($ejecutar)) { ?>
      <option class="text-wrap" value="<?php echo $opciones['id']?>"><?php echo $opciones['matricula'] . " - " . $opciones['nombre'] ?></option>
      <?php } ?>
      
</select>

</div>

<div class="form-group">
    <label for="asignatura">Asignatura: </label>
    <input type="text" name="asignatura" class="form-control" id="asignatura" placeholder="Ingresa la asignatura de la práctica" required>
  </div>

  <div class="form-group">
    <label for="profesor">Profesor: </label>
    <input type="text" name="profesor" class="form-control" id="profesor" placeholder="Ingresa al profesor encargado" required>
  </div>

  <div class="form-group">
    <label for="fecha_solicitud">Fecha en que se requiere: </label>
    <input type="date" name="fecha_solicitud" class="form-control" id="fecha_solicitud" min="<?php echo date("Y-m-d"); ?>" required>
  </div>



           <input type="hidden" name="solicitante" value="<?php echo $row['id'] ?>">
           <button type="submit" class="btn btn-info btn-block"><i class="fa-solid fa-paper-plane"></i> Enviar requisición</button>
          
        </form>
</div>
</div>


      <?php } else { ?>
        <div class="card text-center shadow rounded" style="width: 100%; margin-left:1.5rem;margin-right:1.5rem;">
  <div class="card-body">
    
    <p class="card-text lead">Aún no has agregado ningún material a tu requisición.</p>
    
  </div>
</div>

      <?php }


    ?>
  
  
</div>



        
     


</div>
</div>

</div>

<?php 
$i=1;
  foreach ($rows as $row2) {
         ?>
<!-- Modal -->
<div class="modal fade" id="exampleModal_<?php echo $i ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><?php echo $row2['nombre'] ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">


        <div class="card mb-3" style="max-width: 540px; border: none;">
  <div class="row no-gutters">
    <div class="col-md-4">
      

      <div style="align-items: center; height: 20vh;display: flex; justify-content: center; padding: 0.5rem;">
      <img src="administrador/php_action/<?php echo $row2['imagen'] ?>" alt="articulo" style="object-fit: contain; width: 100%; height: 100%; ">
      </div>


    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title"><?php echo $row2['nombre'] ?></h5>
        <p class="card-text"><?php echo $row2['descripcion'] ?></p>
        <p class="card-text">Cantidad: <?php echo $row2['cantidad'] ?></p>
      </div>
    </div>
  </div>
</div>
      </div>
      <div class="modal-footer">


         <form action="alumno/php_action/agregar_a_solicitud.php" method="POST">
              
              <div class="form-row align-items-center">
                <div class="col-auto my-1">
                <label for="cantidad_articulo">Solicitar:</label>
              </div>
               <div class="col-auto my-1">
              <input class="form-control" type="number" name="cantidad_articulo" value="1" min="1" required>
            </div>
            <input type="hidden" name="id_articulo" value="<?php echo $row2['id_articulo'] ?>">
            <input type="hidden" name="nombre" value="<?php echo $row2['nombre'] ?>">
            <input type="hidden" name="imagen" value="<?php echo $row2['imagen'] ?>">
            <input type="hidden" name="cantidad" value="<?php echo $row2['cantidad'] ?>">
            <br>
             <div class="col-auto my-1">
            <button type="submit" class="btn shadow" id="btn-solicitar"><i class="fa-solid fa-basket-shopping"></i> Solicitar</button>
            </div>
      
         </div>
            </form>
      </div>
    </div>
  </div>
  
</div>
 <?php 
 $i++;
} 
$con->close();

?>  
<?php
    include_once("pie.php");
  ?> 



    
  
  

<!--<script src="alumno/js/crip.js"></script>-->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
<!--Multiple select-->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>

</body>
</html>