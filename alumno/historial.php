<?php 
  session_start();
    include_once('../conf/config.php');
    if(!isset($_SESSION['ID'])){
    header("Location: ../index.php");
  }
  
  $nombre = $_SESSION['NAME'];
  $tipo_usuario = $_SESSION['ROLE']; 

   $id = $_SESSION['ID'];
  $sql = "SELECT * FROM usuarios WHERE id = '$id'";

  //En este caso podemos identificar el id de la cuenta para obtener su información.
  $result = $con->query($sql);
  $row = $result->fetch_assoc();

  if(isset($_GET['m'])){
    $m = $_GET['m'];

    switch ($m) {
      case '1':
        echo "<div class='modal fade' id='exampleModal123' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
  <div class='modal-dialog'>
    <div class='modal-content'>
      <div class='modal-header'>
        <h5 class='modal-title' id='exampleModalLabel'>Observaciones enviadas</h5>
        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>
      <div class='modal-body'>
        <center><p class='lead'>¡Observaciones enviadas exitosamente!</p>
     
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
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Historial de solicitudes</title>
  <!-- CDN FontAwesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!--<link rel="stylesheet" href="css/historial.css">
  <link rel="stylesheet" href=" css/stylesindex.css">-->
  <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.1.0/uicons-regular-rounded/css/uicons-regular-rounded.css'>
<link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.1.0/uicons-regular-straight/css/uicons-regular-straight.css'>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

</head>
<body style="background-color: #e9ecef;">
  
  <?php 
include_once('navbar.php'); ?>
<br>
<div class="jumbotron" style="background-color: transparent;">
  <div class="container">
    <h1>Historial de requisiciones</h1>
    <br>
    <div class="accordion" id="accordionExample" style="background-color: #e9ecef;">
  <div class="card" style="border-top: none; border-left: none; border-right: none; background-color: #e9ecef;">
    <div class="card-header p-4" id="headingOne" style="background-color: #e9ecef;">
      <div class="d-flex align-items-center justify-content-between">
      <h5 class="mb-0" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" style="cursor: pointer;">Requisiciones enviadas&nbsp;&nbsp; 
      <span class="badge badge-pill badge-danger">
        <?php 
          $query = " SELECT COUNT(DISTINCT solicitud.id) as total_enviadas FROM solicitud
          INNER JOIN num_equipo ON solicitud.equipo = num_equipo.id
          INNER JOIN integrantes_equipo ON num_equipo.id = integrantes_equipo.num_equipo
          INNER JOIN usuarios ON integrantes_equipo.alumno = usuarios.id WHERE (solicitud.solicitante = $id OR integrantes_equipo.alumno = $id) AND solicitud.estatus = 'pendiente' ";
          $result_t = $con -> query($query);
          $row_t = $result_t->fetch_assoc();
          echo $row_t['total_enviadas'];
        ?>
      </span>
    </h5>
       <h5><i class="fa-solid fa-chevron-down" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" style="cursor: pointer;"></i> </h5>
    </div>
</div>
    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
      <div class="card-body">

        <div class="row row-cols-1 row-cols-md-3">
          <?php
          include '../conf/config.php';
          $query2 = "SELECT DISTINCT solicitud.* FROM solicitud 
          INNER JOIN num_equipo ON solicitud.equipo = num_equipo.id
          INNER JOIN integrantes_equipo ON num_equipo.id = integrantes_equipo.num_equipo
          WHERE (solicitud.solicitante = $id OR integrantes_equipo.alumno = $id) AND solicitud.estatus = 'pendiente' 
          ORDER BY id DESC";

          $result2 = $con->query($query2);
          $i=0;
          if ($result2->num_rows > 0) {
            while($row2 = $result2->fetch_assoc()) { 
              $id_solicitud = $row2['id'];
        ?>
          <div class="col mb-4">
    <div class="card h-100">
      <div class="card-body" style="display: flex; height: 100%; flex-direction: column;">
        <h5 class="card-title">Requisición # <?php echo $row2['id']?></h5>
        <p class="card-text" style="flex-grow: 1;">
          <span class="text-primary">Fecha de envío:</span> 
          <?php setlocale(LC_TIME, 'es_ES', 'Spanish_Spain', 'Spanish'); 
                  echo strftime("%d de %B de %Y", strtotime($row2['fecha'])); ?> 
              </p>
           <p class="card-text" style="flex-grow: 1;">
            <span class="text-primary">Fecha en que se requiere:</span> 
            <?php setlocale(LC_TIME, 'es_ES', 'Spanish_Spain', 'Spanish'); 
              echo strftime("%d de %B de %Y", strtotime($row2['fecha_solicitud'])); ?> 
            </p>
            <p class="card-text" style="flex-grow: 1;">
              <span class="text-primary">Total de materiales:</span> 
              <?php echo $row2['total']?> </p>
              <a target="_blank" href="../encargado/fpdf186/requi_alumno.php?id_reposicion=<?php echo $row2['id'] ?>" class="btn btn-info" role="button"><i class="fa-solid fa-file"></i> Ver PDF </a>
              <br>
        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal_<?php echo $i ?>">Ver detalles</button>
        <!-- Modal -->
  <div class="modal fade" id="exampleModal_<?php echo $i ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Requisición # <?php echo $row2['id']?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p><b>Solicitante: </b>
        <?php 
          $query4 = "SELECT * FROM solicitud INNER JOIN usuarios ON solicitud.solicitante = usuarios.id WHERE solicitud.id =  $id_solicitud ";
          $result4 = $con->query($query4);
          while ($row4 = $result4->fetch_assoc()) { ?>
            <?php echo $row4['matricula'] . ' - ' . $row4['nombre'] ?></p>
          <?php }
        ?>
        <p><b>Material requerido: </b></p>
        <?php 
          $query3 = "SELECT * FROM solicitud INNER JOIN articulos_solicitud ON solicitud.id = articulos_solicitud.solicitud 
          INNER JOIN articulos ON articulos.id_articulo = articulos_solicitud.articulo
          WHERE solicitud.id =  $id_solicitud ";
          $result3 = $con->query($query3);
          while ($row3 = $result3->fetch_assoc()) { ?>
            <p><?php echo $row3['cantidad_articulo'] . ' - ' . $row3['nombre'] ?></p>
          <?php }
        ?>
        <p><b>Equipo: </b></p>
        <?php 
          $query5 = "SELECT * FROM solicitud INNER JOIN num_equipo ON solicitud.equipo = num_equipo.id
          INNER JOIN integrantes_equipo ON num_equipo.id = integrantes_equipo.num_equipo
          INNER JOIN usuarios ON integrantes_equipo.alumno = usuarios.id 
          WHERE solicitud.id =  $id_solicitud ";
          $result5 = $con->query($query5);
          while ($row5 = $result5->fetch_assoc()) { ?>
            <p><?php echo $row5['matricula'] . ' - ' . $row5['nombre'] ?></p>
          <?php }
        ?>
        <p><b>Asignatura: </b></p>
        <?php 
          $queryAsignatura = "SELECT * FROM solicitud INNER JOIN materias ON solicitud.asignatura = materias.id_materia
          WHERE solicitud.id =  $id_solicitud ";
          $resultAsignatura = $con->query($queryAsignatura);
          while ($rowAsignatura = $resultAsignatura->fetch_assoc()) { ?>
            <p><?php echo $rowAsignatura['materia'] ?></p>
          <?php }
        ?>
        <p><b>Profesor encargado de la práctica:</b></p>
        <?php 
          $queryProfesor = "SELECT * FROM solicitud INNER JOIN profesores ON solicitud.profesor = profesores.id_profesor
          WHERE solicitud.id =  $id_solicitud ";
          $resultProfesor = $con->query($queryProfesor);
          while ($rowProfesor = $resultProfesor->fetch_assoc()) { ?>
            <p><?php echo $rowProfesor['nombre'] ?></p>
          <?php }
        ?>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal"><i class="fa-solid fa-circle-check"></i> Ok</button>
      </div>
    </div>
  </div>
</div>

      </div>
    </div> 
  </div>
          


    
    <?php $i++; } ?>
    </div>
      <?php } else { ?>
        <div class="card-body lead">
        No existen requisiciones enviadas.
      </div>
      <?php }
      
  ?>



  

  
  
  


      </div>
    </div>
  </div>
  <div class="card" style="border-left: none; border-right: none; background-color: #e9ecef;">
    <div class="card-header p-4" id="headingTwo" style="background-color:#e9ecef;">
      <div class="d-flex align-items-center justify-content-between">
      <h5 class="mb-0" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" style="cursor: pointer;">Requisiciones en préstamo&nbsp;&nbsp; 
      <span class="badge badge-pill badge-danger">
        <?php 
          $query = " SELECT COUNT(DISTINCT solicitud.id) as total_enviadas FROM solicitud
          INNER JOIN num_equipo ON solicitud.equipo = num_equipo.id
          INNER JOIN integrantes_equipo ON num_equipo.id = integrantes_equipo.num_equipo
          INNER JOIN usuarios ON integrantes_equipo.alumno = usuarios.id WHERE (solicitud.solicitante = $id OR integrantes_equipo.alumno = $id) AND solicitud.estatus = 'prestamo' ";
          $result_t = $con -> query($query);
          $row_t = $result_t->fetch_assoc();
          echo $row_t['total_enviadas'];
        ?>
      </span></h5>
        <h5><i class="fa-solid fa-chevron-down" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" style="cursor: pointer;"></i> </h5>
      </div>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
      <div class="card-body">

        <div class="row row-cols-1 row-cols-md-3">
          <?php
          include '../conf/config.php';
          $query2 = "SELECT DISTINCT solicitud.* FROM solicitud 
          INNER JOIN num_equipo ON solicitud.equipo = num_equipo.id
          INNER JOIN integrantes_equipo ON num_equipo.id = integrantes_equipo.num_equipo
          WHERE (solicitud.solicitante = $id OR integrantes_equipo.alumno = $id) AND solicitud.estatus = 'prestamo' 
          ORDER BY id DESC";

          $result2 = $con->query($query2);
          $i=0;
          if ($result2->num_rows > 0) {
            while($row2 = $result2->fetch_assoc()) { 
              $id_solicitud = $row2['id'];
        ?>
          <div class="col mb-4">
    <div class="card h-100">
      <div class="card-body" style="display: flex; height: 100%; flex-direction: column;">
        <h5 class="card-title">Requisición # <?php echo $row2['id']?></h5>
        <p class="card-text" style="flex-grow: 1;">
          <span class="text-primary">Fecha de envío:</span> 
          <?php setlocale(LC_TIME, 'es_ES', 'Spanish_Spain', 'Spanish'); 
                  echo strftime("%d de %B de %Y", strtotime($row2['fecha'])); ?> 
              </p>
           <p class="card-text" style="flex-grow: 1;">
            <span class="text-primary">Fecha en que se requiere:</span> 
            <?php setlocale(LC_TIME, 'es_ES', 'Spanish_Spain', 'Spanish'); 
              echo strftime("%d de %B de %Y", strtotime($row2['fecha_solicitud'])); ?> 
            </p>
            <p class="card-text" style="flex-grow: 1;">
              <span class="text-primary">Total de materiales:</span> 
              <?php echo $row2['total']?> </p>
        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal1_<?php echo $i ?>">Ver detalles</button>

        <!-- Modal -->
  <div class="modal fade" id="exampleModal1_<?php echo $i ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Requisición # <?php echo $row2['id']?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p><b>Solicitante: </b>
        <?php 
          $query4 = "SELECT * FROM solicitud INNER JOIN usuarios ON solicitud.solicitante = usuarios.id WHERE solicitud.id =  $id_solicitud ";
          $result4 = $con->query($query4);
          while ($row4 = $result4->fetch_assoc()) { ?>
            <?php echo $row4['matricula'] . ' - ' . $row4['nombre'] ?></p>
          <?php }
        ?>
        <p><b>Material requerido: </b></p>
        <?php 
          $query3 = "SELECT * FROM solicitud INNER JOIN articulos_solicitud ON solicitud.id = articulos_solicitud.solicitud 
          INNER JOIN articulos ON articulos.id_articulo = articulos_solicitud.articulo
          WHERE solicitud.id =  $id_solicitud ";
          $result3 = $con->query($query3);
          while ($row3 = $result3->fetch_assoc()) { ?>
            <p><?php echo $row3['cantidad_articulo'] . ' - ' . $row3['nombre'] ?></p>
          <?php }
        ?>
        <p><b>Equipo: </b></p>
        <?php 
          $query5 = "SELECT * FROM solicitud INNER JOIN num_equipo ON solicitud.equipo = num_equipo.id
          INNER JOIN integrantes_equipo ON num_equipo.id = integrantes_equipo.num_equipo
          INNER JOIN usuarios ON integrantes_equipo.alumno = usuarios.id 
          WHERE solicitud.id =  $id_solicitud ";
          $result5 = $con->query($query5);
          while ($row5 = $result5->fetch_assoc()) { ?>
            <p><?php echo $row5['matricula'] . ' - ' . $row5['nombre'] ?></p>
          <?php }
        ?>
        <p><b>Asignatura: </b></p>
        <?php 
          $queryAsignatura = "SELECT * FROM solicitud INNER JOIN materias ON solicitud.asignatura = materias.id_materia
          WHERE solicitud.id =  $id_solicitud ";
          $resultAsignatura = $con->query($queryAsignatura);
          while ($rowAsignatura = $resultAsignatura->fetch_assoc()) { ?>
            <p><?php echo $rowAsignatura['materia'] ?></p>
          <?php }
        ?>
        <p><b>Profesor encargado de la práctica:</b></p>
        <?php 
          $queryProfesor = "SELECT * FROM solicitud INNER JOIN profesores ON solicitud.profesor = profesores.id_profesor
          WHERE solicitud.id =  $id_solicitud ";
          $resultProfesor = $con->query($queryProfesor);
          while ($rowProfesor = $resultProfesor->fetch_assoc()) { ?>
            <p><?php echo $rowProfesor['nombre'] ?></p>
          <?php }
        ?>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal"><i class="fa-solid fa-circle-check"></i> Ok</button>
      </div>
    </div>
  </div>
</div>
<?php 
if ($row2['observaciones'] == null){ ?>
<button type="button" class="btn btn-outline-info mt-4" data-toggle="modal" data-target="#exampleModal_obs_<?php echo $i ?>">Agregar observaciones</button>
<!--Modal agregar observaciones-->
<div class="modal fade" id="exampleModal_obs_<?php echo $i ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar observaciones</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form class="p-4" action="php_action/agregar_observacion.php" method="POST">

  <div class="form-group">
    
    <label for="observaciones">En caso de recibir material dañado, escribe las observaciones</label>
    <textarea class="form-control" id="observaciones" name="observaciones" rows="3" required></textarea>
  </div>
   
<br>
<input type="hidden" name="id" value="<?php echo $row2['id']?>"/>       
  <button type="submit" name="submit" class="btn btn-danger btn-block">Enviar observaciones</button>
</form>
      </div>
      <div class="modal-footer p-4">
        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal"><i class="fa-regular fa-circle-xmark"></i> Cancelar</button>
      </div>
    </div>
  </div>
</div>
<?php } else { ?>
<button type="button" class="btn btn-outline-info mt-4 disabled">Agregar observaciones</button>
<?php }
?>


      </div>
    </div> 
  </div>
    <?php $i++; } ?>
    </div>
      <?php } else { ?>
        <div class="card-body lead">
        No existen requisiciones en préstamo.
      </div>
      <?php }
      
  ?>
      </div>
    </div>
  </div>
  <div class="card" style="border-left: none; border-right: none; background-color:#e9ecef;">
    <div class="card-header p-4" id="headingThree" style="background-color:#e9ecef;">
      <div class="d-flex align-items-center justify-content-between">
      <h5 class="mb-0"  data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree" style="cursor: pointer;"> Requisiciones con faltantes&nbsp;&nbsp; 
      <span class="badge badge-pill badge-danger">
        <?php 
          $query = " SELECT COUNT(DISTINCT solicitud.id) as total_enviadas FROM solicitud
          INNER JOIN num_equipo ON solicitud.equipo = num_equipo.id
          INNER JOIN integrantes_equipo ON num_equipo.id = integrantes_equipo.num_equipo
          INNER JOIN usuarios ON integrantes_equipo.alumno = usuarios.id WHERE (solicitud.solicitante = $id OR integrantes_equipo.alumno = $id) AND solicitud.estatus = 'faltantes' ";
          $result_t = $con -> query($query);
          $row_t = $result_t->fetch_assoc();
          echo $row_t['total_enviadas'];
        ?></h5>
      <h5><i class="fa-solid fa-chevron-down" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree" style="cursor: pointer;"></i> </h5>
        </div>
    </div>
    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
      <div class="card-body">

        <div class="row row-cols-1 row-cols-md-3">
          <?php
          include '../conf/config.php';
          $query2 = "SELECT DISTINCT solicitud.* FROM solicitud 
          INNER JOIN num_equipo ON solicitud.equipo = num_equipo.id
          INNER JOIN integrantes_equipo ON num_equipo.id = integrantes_equipo.num_equipo
          WHERE (solicitud.solicitante = $id OR integrantes_equipo.alumno = $id) AND solicitud.estatus = 'faltantes' 
          ORDER BY id DESC";

          $result2 = $con->query($query2);
          $i=0;
          if ($result2->num_rows > 0) {
            while($row2 = $result2->fetch_assoc()) { 
              $id_solicitud = $row2['id'];
        ?>
          <div class="col mb-4">
    <div class="card h-100">
      <div class="card-body" style="display: flex; height: 100%; flex-direction: column;">
        <h5 class="card-title">Requisición # <?php echo $row2['id']?></h5>
        <p class="card-text" style="flex-grow: 1;">
          <span class="text-primary">Fecha de envío:</span> 
          <?php setlocale(LC_TIME, 'es_ES', 'Spanish_Spain', 'Spanish'); 
                  echo strftime("%d de %B de %Y", strtotime($row2['fecha'])); ?> 
              </p>
           <p class="card-text" style="flex-grow: 1;">
            <span class="text-primary">Fecha en que se requirió:</span> 
            <?php setlocale(LC_TIME, 'es_ES', 'Spanish_Spain', 'Spanish'); 
              echo strftime("%d de %B de %Y", strtotime($row2['fecha_solicitud'])); ?> 
            </p>
            <p class="card-text" style="flex-grow: 1;">
            <span class="text-primary">Fecha de reposición:</span> 
            <?php setlocale(LC_TIME, 'es_ES', 'Spanish_Spain', 'Spanish'); 
              echo strftime("%d de %B de %Y", strtotime($row2['fecha_reposicion'])); ?> 
            </p>
            <p class="card-text" style="flex-grow: 1;">
              <span class="text-primary">Total de materiales:</span> 
              <?php echo $row2['total']?> </p>
        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal2_<?php echo $i ?>">Ver detalles</button>
        <!-- Modal -->
  <div class="modal fade" id="exampleModal2_<?php echo $i ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Requisición # <?php echo $row2['id']?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p><b>Solicitante: </b>
        <?php 
          $query4 = "SELECT * FROM solicitud INNER JOIN usuarios ON solicitud.solicitante = usuarios.id WHERE solicitud.id =  $id_solicitud ";
          $result4 = $con->query($query4);
          while ($row4 = $result4->fetch_assoc()) { ?>
            <?php echo $row4['matricula'] . ' - ' . $row4['nombre'] ?></p>
          <?php }
        ?>
        <p><b>Material requerido: </b></p>
        <?php 
          $query3 = "SELECT * FROM solicitud INNER JOIN articulos_solicitud ON solicitud.id = articulos_solicitud.solicitud 
          INNER JOIN articulos ON articulos.id_articulo = articulos_solicitud.articulo
          WHERE solicitud.id =  $id_solicitud ";
          $result3 = $con->query($query3);
          while ($row3 = $result3->fetch_assoc()) { ?>
            <p><?php echo $row3['cantidad_articulo'] . ' - ' . $row3['nombre'] ?></p>
          <?php }
        ?>
        <p><b>Equipo: </b></p>
        <?php 
          $query5 = "SELECT * FROM solicitud INNER JOIN num_equipo ON solicitud.equipo = num_equipo.id
          INNER JOIN integrantes_equipo ON num_equipo.id = integrantes_equipo.num_equipo
          INNER JOIN usuarios ON integrantes_equipo.alumno = usuarios.id 
          WHERE solicitud.id =  $id_solicitud ";
          $result5 = $con->query($query5);
          while ($row5 = $result5->fetch_assoc()) { ?>
            <p><?php echo $row5['matricula'] . ' - ' . $row5['nombre'] ?></p>
          <?php }
        ?>
        <p><b>Asignatura: </b></p>
        <?php 
          $queryAsignatura = "SELECT * FROM solicitud INNER JOIN materias ON solicitud.asignatura = materias.id_materia
          WHERE solicitud.id =  $id_solicitud ";
          $resultAsignatura = $con->query($queryAsignatura);
          while ($rowAsignatura = $resultAsignatura->fetch_assoc()) { ?>
            <p><?php echo $rowAsignatura['materia'] ?></p>
          <?php }
        ?>
        <p><b>Profesor encargado de la práctica:</b></p>
        <?php 
          $queryProfesor = "SELECT * FROM solicitud INNER JOIN profesores ON solicitud.profesor = profesores.id_profesor
          WHERE solicitud.id =  $id_solicitud ";
          $resultProfesor = $con->query($queryProfesor);
          while ($rowProfesor = $resultProfesor->fetch_assoc()) { ?>
            <p><?php echo $rowProfesor['nombre'] ?></p>
          <?php }
        ?>
          <p><b>Materiales faltante a entregar: </b></p>
          <?php 
          $queryMaterialEntregar = "SELECT articulos_perdidos.cantidad AS cantidadE, articulos.nombre AS nombre 
          FROM articulos_perdidos INNER JOIN articulos ON articulos_perdidos.articulo_perdido = articulos.id_articulo 
          WHERE articulos_perdidos.solicitud =  $id_solicitud ";
          $resultMatEnt = $con->query($queryMaterialEntregar);
          while ($rowMatEnt = $resultMatEnt->fetch_assoc()) { ?>
            <p><?php echo $rowMatEnt['cantidadE'] . ' - ' . $rowMatEnt['nombre'] ?></p>
          <?php }
        ?>
        <p><b>Fecha para la reposición: </b></p>
        <p><?php setlocale(LC_TIME, 'es_ES', 'Spanish_Spain', 'Spanish'); 
              echo strftime("%d de %B de %Y", strtotime($row2['fecha_reposicion'])); ?></p>
        

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal"><i class="fa-solid fa-circle-check"></i> Ok</button>
      </div>
    </div>
  </div>
</div>

      </div>
    </div> 
  </div>


    
    <?php $i++; } ?>
    </div>
      <?php } else { ?>
        <div class="card-body lead">
        No existen requisiciones con faltantes.
      </div>
      <?php }
      
  ?>


      </div>
    </div>
  </div>
  <div class="card" style="border-left: none; border-right: none; background-color:#e9ecef;">
    <div class="card-header p-4" id="heading4" style="background-color:#e9ecef;">
      
       <div class="d-flex align-items-center justify-content-between">
        <h5 class="mb-0" data-toggle="collapse" data-target="#collapse4" aria-expanded="false" aria-controls="collapse4" style="cursor: pointer;"> Requisiciones finalizadas&nbsp;&nbsp; 
      <span class="badge badge-pill badge-danger">
        <?php 
          $query = " SELECT COUNT(DISTINCT solicitud.id) as total_enviadas FROM solicitud
          INNER JOIN num_equipo ON solicitud.equipo = num_equipo.id
          INNER JOIN integrantes_equipo ON num_equipo.id = integrantes_equipo.num_equipo
          INNER JOIN usuarios ON integrantes_equipo.alumno = usuarios.id WHERE (solicitud.solicitante = $id OR integrantes_equipo.alumno = $id) AND solicitud.estatus = 'finalizada' ";
          $result_t = $con -> query($query);
          $row_t = $result_t->fetch_assoc();
          echo $row_t['total_enviadas'];
        ?> </h5>
        <h5><i class="fa-solid fa-chevron-down" data-toggle="collapse" data-target="#collapse4" aria-expanded="false" aria-controls="collapse4" style="cursor: pointer;"></i> </h5>
        </div>
     
    </div>
    <div id="collapse4" class="collapse" aria-labelledby="heading4" data-parent="#accordionExample">
      <div class="card-body">
        
        <div class="row row-cols-1 row-cols-md-3">
          <?php
          include '../conf/config.php';
          $query2 = "SELECT DISTINCT solicitud.* FROM solicitud 
          INNER JOIN num_equipo ON solicitud.equipo = num_equipo.id
          INNER JOIN integrantes_equipo ON num_equipo.id = integrantes_equipo.num_equipo
          WHERE (solicitud.solicitante = $id OR integrantes_equipo.alumno = $id) AND solicitud.estatus = 'finalizada' 
          ORDER BY id DESC";

          $result2 = $con->query($query2);
          $i=0;
          if ($result2->num_rows > 0) {
            while($row2 = $result2->fetch_assoc()) { 
              $id_solicitud = $row2['id'];
        ?>
          <div class="col mb-4">
    <div class="card h-100">
      <div class="card-body" style="display: flex; height: 100%; flex-direction: column;">
        <h5 class="card-title">Requisición # <?php echo $row2['id']?></h5>
        <p class="card-text" style="flex-grow: 1;">
          <span class="text-primary">Fecha de envío:</span> 
          <?php setlocale(LC_TIME, 'es_ES', 'Spanish_Spain', 'Spanish'); 
                  echo strftime("%d de %B de %Y", strtotime($row2['fecha'])); ?> 
              </p>
           <p class="card-text" style="flex-grow: 1;">
            <span class="text-primary">Fecha en que se requiere:</span> 
            <?php setlocale(LC_TIME, 'es_ES', 'Spanish_Spain', 'Spanish'); 
              echo strftime("%d de %B de %Y", strtotime($row2['fecha_solicitud'])); ?> 
            </p>
            <p class="card-text" style="flex-grow: 1;">
            <span class="text-primary">Fecha de entrega de material:</span> 
            <?php setlocale(LC_TIME, 'es_ES', 'Spanish_Spain', 'Spanish'); 
              echo strftime("%d de %B de %Y", strtotime($row2['fecha_entrega'])); ?> 
            </p>
            <p class="card-text" style="flex-grow: 1;">
              <span class="text-primary">Total de materiales:</span> 
              <?php echo $row2['total']?> </p>
              <li style="list-style-type:none">
        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal3_<?php echo $i ?>">Ver detalles</button>
<!-- Botón que llama a la función pasando el número de la reposición -->
<button type="button" class="btn btn-info" onclick="redirectToPDF(<?php echo $row2['id']; ?>)">
    Ver en PDF
</button>

<script>
    function redirectToPDF(reposicionId) {
        // Redirige al script PHP con el ID de reposición en la URL
        const url = `../encargado/fpdf186/requi_alumno.php?id_reposicion=${reposicionId}`;
        window.location.href = url;
    }
</script>

        </li>
        <!-- Modal -->
  <div class="modal fade" id="exampleModal3_<?php echo $i ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Requisición # <?php echo $row2['id']?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p><b>Solicitante: </b>
        <?php 
          $query4 = "SELECT * FROM solicitud INNER JOIN usuarios ON solicitud.solicitante = usuarios.id WHERE solicitud.id =  $id_solicitud ";
          $result4 = $con->query($query4);
          while ($row4 = $result4->fetch_assoc()) { ?>
            <?php echo $row4['matricula'] . ' - ' . $row4['nombre'] ?></p>
          <?php }
        ?>
        <p><b>Material: </b></p>
        <?php 
          $query3 = "SELECT * FROM solicitud INNER JOIN articulos_solicitud ON solicitud.id = articulos_solicitud.solicitud 
          INNER JOIN articulos ON articulos.id_articulo = articulos_solicitud.articulo
          WHERE solicitud.id =  $id_solicitud ";
          $result3 = $con->query($query3);
          while ($row3 = $result3->fetch_assoc()) { ?>
            <p><?php echo $row3['cantidad_articulo'] . ' - ' . $row3['nombre'] ?></p>
          <?php }
        ?>
        <p><b>Equipo: </b></p>
        <?php 
          $query5 = "SELECT * FROM solicitud INNER JOIN num_equipo ON solicitud.equipo = num_equipo.id
          INNER JOIN integrantes_equipo ON num_equipo.id = integrantes_equipo.num_equipo
          INNER JOIN usuarios ON integrantes_equipo.alumno = usuarios.id 
          WHERE solicitud.id =  $id_solicitud ";
          $result5 = $con->query($query5);
          while ($row5 = $result5->fetch_assoc()) { ?>
            <p><?php echo $row5['matricula'] . ' - ' . $row5['nombre'] ?></p>
          <?php }
        ?>
        <p><b>Asignatura: </b></p>
        <?php 
          $queryAsignatura = "SELECT * FROM solicitud INNER JOIN materias ON solicitud.asignatura = materias.id_materia
          WHERE solicitud.id =  $id_solicitud ";
          $resultAsignatura = $con->query($queryAsignatura);
          while ($rowAsignatura = $resultAsignatura->fetch_assoc()) { ?>
            <p><?php echo $rowAsignatura['materia'] ?></p>
          <?php }
        ?>
        <p><b>Profesor encargado de la práctica:</b></p>
        <?php 
          $queryProfesor = "SELECT * FROM solicitud INNER JOIN profesores ON solicitud.profesor = profesores.id_profesor
          WHERE solicitud.id =  $id_solicitud ";
          $resultProfesor = $con->query($queryProfesor);
          while ($rowProfesor = $resultProfesor->fetch_assoc()) { ?>
            <p><?php echo $rowProfesor['nombre'] ?></p>
          <?php }
        ?>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal"><i class="fa-solid fa-circle-check"></i> Ok</button>
      </div>
    </div>
  </div>
</div>

      </div>
    </div> 
  </div>
    <?php $i++; } ?>
    </div>
      <?php } else { ?>
        <div class="card-body lead">
        No existen requisiciones finalizadas.
      </div>
      </div>
</div>
</div>
      <?php }
      
  ?>


      </div>
    </div>
  </div>
 
</div>
  </div>
</div>
      </div>


</div>
      </div>

<?php
		include_once("pie.php");
	?>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
<script>
  $(document).ready(function(){
    $('#exampleModal123').modal('show');
  });
</script>
</body>
</html>
