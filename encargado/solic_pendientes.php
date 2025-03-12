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
        <h5 class='modal-title' id='exampleModalLabel'>Estatus editado</h5>
        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>
      <div class='modal-body'>
        <center><p class='lead'>¡El estatus ha sido editado exitosamente!</p>
     
        <i class='fa-regular fa-circle-check fa-3xl' style='font-size:50px'></i> </center>
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
            <h5 class='modal-title' id='exampleModalLabel'>Error al editar Estatus</h5>
            <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
            </button>
          </div>
          <div class='modal-body'>
            <center><p class='lead'>¡Se ha producido un error al editar el Estatus!</p>
         
            <i class='fa-solid fa-envelope fa-3xl' style='font-size:50px'></i> </center>
          </div>
          <div class='modal-footer'>
            <button type='button' class='btn btn-success' data-dismiss='modal'><i class='fa-solid fa-triangle-exclamation'></i> Ok</button>
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
    <title>Requisiciones pendientes</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
        <link href="../css/styles.css" rel="stylesheet" />
        <link rel="stylesheet" href="../css/estilo-nav.css">
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <!-- CDN FontAwesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
                        <h1 class="mt-4">Requisiciones pendientes</h1>
                        <br>
                        <hr>
                        <br>
      
                        <div class="card mb-4" style="border: none">
                            <!--<div class="card-header"><i class="fa-solid fa-briefcase"></i> Vacantes</div>-->
                            <div class="card-body">
                                <div class="table-responsive">
                                    
                                    <table class="table table-hover table-striped" id="dataTable" width="100%" cellspacing="0">

                                        <thead style="background-color:#5C9287 ;color: #fff;">
                                            <tr>
                                                <th>No.</th>
                                                <th>Equipo</th>
                                                <th>Materiales</th>
                                                <th>Fecha de realización</th>
                                                <th>Fecha de requisición</th>
                                                <th>Total requerido</th>
                                                <th>Asignatura</th>
                                                <th>Profesor</th>
                                                <th>Estatus</th>
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                        <?php
          $sql = "SELECT solicitud.* FROM solicitud  
          WHERE solicitud.estatus = 'pendiente'
          ORDER BY id DESC";
          $result = $con -> query($sql);
          $i_equipo=1;
          if($result ->num_rows > 0){
            while($row = $result ->fetch_assoc()) { 
                $id_solicitud = $row['id'];
                ?>
                                            <tr>
                                                <td><?php echo $row['id']?></td>
                                                <td>
                                                    <!-- Button trigger modal -->
                    <a href=# class="text-danger" data-toggle="modal" data-target="#modal1_<?php echo $i_equipo ?>">
                        Equipo <?php echo $row['equipo']?></a>
                                                </td>

                                                <!-- Modal -->
<div class="modal fade" id="modal1_<?php echo $i_equipo ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <div class="row align-items-center">
        <img src="../img/icono.png" alt="chef" width="60px" height="60px">
        <h5 class="modal-title" id="exampleModalLabel">Equipo <?php echo $row['equipo']?></h5>
</div>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-justify">
        <ul>
            <?php
                $querySolicitante = "SELECT solicitante,usuarios.nombre,usuarios.matricula FROM solicitud INNER JOIN usuarios ON solicitud.solicitante = usuarios.id WHERE solicitud.id = '$id_solicitud' ";
                $resultS = $con->query($querySolicitante);
                $rowS = $resultS->fetch_assoc();
            ?>
            <li>Solicitante: <?php echo $rowS['matricula'] . ' - ' . $rowS['nombre'] ?></li>
            <?php 
          $query2 = "SELECT * FROM solicitud INNER JOIN num_equipo ON solicitud.equipo = num_equipo.id
          INNER JOIN integrantes_equipo ON num_equipo.id = integrantes_equipo.num_equipo
          INNER JOIN usuarios ON integrantes_equipo.alumno = usuarios.id 
          WHERE solicitud.id =  '$id_solicitud' ";
          $result2 = $con->query($query2);
          while ($row2 = $result2->fetch_assoc()) { ?>
            <li><?php echo $row2['matricula'] . ' - ' . $row2['nombre'] ?></li>
          <?php }
        ?>
        </ul>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal"><i class="fa-solid fa-circle-check"></i> Ok</button>
      </div>
    </div>
  </div>
</div>
                                                <td>
                                                    <!-- Button trigger modal -->
                    <a href=# class="text-danger" data-toggle="modal" data-target="#modal2_<?php echo $i_equipo ?>" style="color: red">
                        Ver materiales...</a>
                                                </td>
                            <!-- Modal -->
<div class="modal fade" id="modal2_<?php echo $i_equipo ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <div class="row align-items-center">
        <img src="../img/icono.png" alt="chef" width="60px" height="60px">
        <h5 class="modal-title" id="exampleModalLabel">Material</h5>
</div>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-justify">
        <ul>
            <?php 
          $query3 = "SELECT * FROM solicitud INNER JOIN articulos_solicitud ON solicitud.id = articulos_solicitud.solicitud 
          INNER JOIN articulos ON articulos.id_articulo = articulos_solicitud.articulo
          WHERE solicitud.id =  $id_solicitud ";
          $result3 = $con->query($query3);
          while ($row3 = $result3->fetch_assoc()) { ?>
            <li><?php echo $row3['cantidad_articulo'] . ' - ' . $row3['nombre'] ?></li>
          <?php }
        ?>
        </ul>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal"><i class="fa-solid fa-circle-check"></i> Ok</button>
      </div>
    </div>
  </div>
</div>
<td>
                                                    <?php setlocale(LC_TIME, 'es_ES', 'Spanish_Spain', 'Spanish'); 
              echo strftime("%d de %B de %Y", strtotime($row['fecha'])); ?>
                                                </td>
                                                  <td>
                                                    <?php setlocale(LC_TIME, 'es_ES', 'Spanish_Spain', 'Spanish'); 
              echo strftime("%d de %B de %Y", strtotime($row['fecha_solicitud'])); ?>
                                                </td>
                                                <td><?php echo $row['total'] ?></td>
                                                <td>
                                                <?php 
          $query4 = "SELECT solicitud.asignatura, materias.materia AS materia FROM solicitud INNER JOIN materias ON solicitud.asignatura = materias.id_materia 
          WHERE solicitud.id =  $id_solicitud ";
          $result4 = $con->query($query4);
          $row4 = $result4->fetch_assoc(); 
          echo $row4['materia'];
          ?>
                                                </td>
                                                <td>
                                                <?php 
          $query5 = "SELECT solicitud.profesor, profesores.nombre AS profesor FROM solicitud INNER JOIN profesores ON solicitud.profesor = profesores.id_profesor 
          WHERE solicitud.id =  $id_solicitud ";
          $result5 = $con->query($query5);
          $row5 = $result5->fetch_assoc(); 
          echo $row5['profesor'];
          ?>
                                                </td>
                                                <td>
                                                <div class="container-fluid text-center">
        <button type="button" class="btn btn-outline-primary cambiar-estatus" data-toggle="modal" data-target="#cambiarEstatusModal_<?php echo $i_equipo ?>"><i class="fa-solid fa-pencil"></i> Cambiar estatus</button>
    </div>
                                                </td>
                                                 <!-- Modal -->
<div class="modal fade" id="cambiarEstatusModal_<?php echo $i_equipo ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <div class="row align-items-center">
        <h5 class="modal-title ml-3" id="exampleModalLabel">Material</h5>
</div>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="actualizar_estatus_pendientes.php" method="POST">
      <div class="modal-body text-justify">
      <div class="form-group">
      <label for="estatus">Selecciona el estatus</label>
      <select id="nuevoEstatus" class="form-control" name="nuevoEstatus">
        <option selected>Selecciona</option>
        <option value="prestamo">Préstamo</option>
      </select>
    </div>
    <input type="hidden" name="id" value="<?php echo $id_solicitud ?>">
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-danger">Actualizar</button>
        </form>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>
    
                                            </tr>
                        <?php 

                        $i_equipo++; 
                    }
          } else{
            echo "<tr> <td colspan='6'> <center>Aún no se han realizado requisiciones</center></td></tr>";
          }
        ?>  
                                        

                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            
          </div>
          <br>
          <br>
          <br>
        </main>
        <?php include_once('footer.php'); ?>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="../assets/demo/datatables-demo.js"></script>
        <script>
document.addEventListener('DOMContentLoaded', function() {
  // Obtener los elementos con la clase 'btn-equipo' y 'btn-total'
  var btnEquipos = document.querySelectorAll('.btn-equipo');
  var btnTotales = document.querySelectorAll('.btn-total');
  
  // Agregar un evento clic a cada botón de equipo para mostrar un popup con el texto correspondiente
  btnEquipos.forEach(function(btnEquipo) {
    btnEquipo.addEventListener('click', function() {
      var equipo = this.dataset.equipo;
      alert(equipo);
    });
  });
  
  // Agregar un evento clic a cada botón de total para mostrar un popup con el total correspondiente
  btnTotales.forEach(function(btnTotal) {
    btnTotal.addEventListener('click', function() {
      var total = this.dataset.total;
      alert('Total: ' + total);
    });
  });
});
</script>
<script>
    // Script para manejar el cambio de estatus
    $('#cambiarEstatusModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Botón que activó el modal
        var idSolicitud = button.data('id'); // Extraer el ID de los datos del botón
        var modal = $(this);
        modal.find('#idSolicitud').val(idSolicitud); // Asignar el ID al campo oculto del formulario
    });

    // Script para enviar el formulario al hacer clic en el botón Guardar
    $('#guardarEstatus').click(function() {
        $('#cambiarEstatusForm').submit(); // Enviar el formulario
    });
</script>

</body>
</html>