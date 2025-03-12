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
    <title>Historial de requisiciones</title>
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
                        <h1 class="mt-4">Historial de requisiciones</h1>
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
                                                <th>Fecha de requisición</th>
                                                <th>Observaciones</th>
                                                <th>Estatus</th>
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                            <?php
          $sql = "SELECT DISTINCT solicitud.* FROM solicitud 
          INNER JOIN num_equipo ON solicitud.equipo = num_equipo.id
          INNER JOIN integrantes_equipo ON num_equipo.id = integrantes_equipo.num_equipo 
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
                                                <td><?php echo $row['observaciones'] ?></td>
                                                <td><?php echo $row['estatus'] ?></td>
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
                        <div class="d-flex container-fluid justify-content-end fixed-bottom p-5">
        <ul class="custom-list">
        <div class="container mt-3 d-flex justify-content-center">
    <div class="d-flex align-items-center bg-light p-2 rounded shadow-sm" style="max-width: 600px;">
        <!-- Selector de rango -->
        <select id="timeRangeSelect" class="form-control form-control-sm mr-2" style="width: auto;">
            <option value="#">Generar PDF</option>
            <option value="7">Última semana</option>
            <option value="14">Últimas 2 semanas</option>
            <option value="30">Último mes</option>
            <option value="60">Últimos 2 meses</option>
            <option value="120">Último cuatrimestre</option>
            <option value="240">Últimos 2 cuatrimestres</option>
            <option value="365">Último año escolar</option>
        </select>
        <!-- Botón Aceptar -->
        <button type="button" class="btn btn-sm btn-primary" onclick="generatePDF()">Aceptar</button>
    </div>
</div>

<script>
// Función para manejar la acción del botón "Generar PDF"
function generatePDF() {
    const timeRange = document.getElementById('timeRangeSelect').value; // Obtiene el valor seleccionado
    const url = `../encargado/fpdf186/requisiciones_total.php?dias=${timeRange}`; // Crea la URL con el rango de tiempo
    window.open(url, '_blank'); // Abre el PDF en una nueva pestaña
}

// Función para resetear el formulario
function resetForm() {
    document.getElementById('timeRangeSelect').selectedIndex = 0; // Reinicia el selector al primer valor
}
</script>
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
        <script src="../assets/demo/chart-area-demo.js"></script>
        <script src="../assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="../assets/demo/datatables-demo.js"></script>
</body>
</html>