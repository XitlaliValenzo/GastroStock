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
        <h5 class='modal-title' id='exampleModalLabel'>Cuenta creada</h5>
        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>
      <div class='modal-body'>
        <center><p class='lead'>¡La cuenta ha sido creada exitosamente!</p>
     
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
        <h5 class='modal-title' id='exampleModalLabel'>Alumno actualizado</h5>
        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>
      <div class='modal-body'>
        <center><p class='lead'>¡Alumno actualizado correctamente!</p>
     
        <i class='fa-regular fa-circle-check fa-3xl' style='font-size:50px'></i> </center>
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
        <h5 class='modal-title' id='exampleModalLabel'>Matricula existente</h5>
        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>
      <div class='modal-body'>
        <center><p class='lead'>¡La matricula ingresada ya existe!</p>
     
        <i class='fa-regular fa-circle-xmark fa-3xl' style='font-size:50px'></i> </center>
      </div>
      <div class='modal-footer'>
        <button type='button' class='btn btn-success' data-dismiss='modal'><i class='fa-solid fa-circle-check'></i> Ok</button>
      </div>
    </div>
  </div>
</div>";
        break;
        case '4':
          echo "<div class='modal fade' id='exampleModal' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
  <div class='modal-dialog'>
    <div class='modal-content'>
      <div class='modal-header'>
        <h5 class='modal-title' id='exampleModalLabel'>Alumno eliminado</h5>
        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>
      <div class='modal-body'>
        <center><p class='lead'>¡Alumno eliminado correctamente!</p>
     
        <i class='fa-regular fa-circle-check fa-3xl' style='font-size:50px'></i> </center>
      </div>
      <div class='modal-footer'>
        <button type='button' class='btn btn-success' data-dismiss='modal'><i class='fa-solid fa-circle-check'></i> Ok</button>
      </div>
    </div>
  </div>
</div>";
          break;
          case '5':
          echo "<div class='modal fade' id='exampleModal' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
  <div class='modal-dialog'>
    <div class='modal-content'>
      <div class='modal-header'>
        <h5 class='modal-title' id='exampleModalLabel'>Contraseña restablecida</h5>
        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>
      <div class='modal-body'>
        <center><p class='lead'>¡Contraseña restablecida correctamente!</p>
     
        <i class='fa-solid fa-lock fa-3xl' style='font-size:50px'></i> </center>
      </div>
      <div class='modal-footer'>
        <button type='button' class='btn btn-success' data-dismiss='modal'><i class='fa-solid fa-circle-check'></i> Ok</button>
      </div>
    </div>
  </div>
</div>";
          break;
          case '6':
            echo "<div class='modal fade' id='exampleModal' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
    <div class='modal-dialog'>
      <div class='modal-content'>
        <div class='modal-header'>
          <h5 class='modal-title' id='exampleModalLabel'>Cuentas creadas</h5>
          <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
            <span aria-hidden='true'>&times;</span>
          </button>
        </div>
        <div class='modal-body'>
          <center><p class='lead'>¡Registros insertados exitosamente!</p>
       
          <i class='fa-regular fa-circle-check fa-3xl' style='font-size:50px'></i> </center>
        </div>
        <div class='modal-footer'>
          <button type='button' class='btn btn-success' data-dismiss='modal'><i class='fa-solid fa-circle-check'></i> Ok</button>
        </div>
      </div>
    </div>
  </div>";
            break;
            case '7':
            echo "<div class='modal fade' id='exampleModal' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
    <div class='modal-dialog'>
      <div class='modal-content'>
        <div class='modal-header'>
          <h5 class='modal-title' id='exampleModalLabel'>Registros duplicados</h5>
          <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
            <span aria-hidden='true'>&times;</span>
          </button>
        </div>
        <div class='modal-body'>
          <center><p class='lead'>¡Lo sentimos, existen registros duplicados!</p>
       
          <i class='fa-regular fa-circle-xmark fa-3xl' style='font-size:50px'></i> </center>
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
	<title>Alumnos</title>
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
                        <h1 class="mt-4">Alumnos</h1>
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
                                                <th>Nombre</th>
                                                <th>Correo electrónico</th>
                                                <th>Matrícula</th>
                                                <th>Cuatrimestre</th>
                                                <th>Grupo</th>
                                                <th>Requisiciones</th>
                                                <th>Editar</th>
                                                <th>Eliminar</th>
                                                <th>Restablecer</th>
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                        	
                                          <?php
          $sql = "SELECT * FROM usuarios 
          LEFT JOIN grupo ON usuarios.grupo = grupo.id_grupo 
          WHERE role = 'alumno' and activo = 1
          ORDER BY usuarios.id";
          $result = $con -> query($sql);
            $i=1;
          if($result ->num_rows > 0){
            while($row = $result ->fetch_assoc()) { 
              $grupo = $row['grupo'] ?: 'Sin grupo asignado'; ?>
              <tr>
                  <td><?php echo $row['nombre'] ?></td>
                  <td><?php echo $row['email'] ?></td>
                  <td><?php echo $row['matricula'] ?></td>
                  <td><?php echo $row['cuatrimestre'] ?></td>
                   <td><?php echo $grupo ?></td>
                   <?php 
                    $id_alumno = $row['id'];
                    $sqlSolicitudes = "SELECT solicitante FROM solicitud WHERE solicitante = '$id_alumno' ";
                    $resultSolicitudes = $con -> query($sqlSolicitudes);
                    if ($resultSolicitudes ->num_rows > 0) { ?>
                      <td>
                    <div class="container-fluid text-center">
                    <a href="fpdf186/requisicion_alumno.php?id=<?php echo $row['id'] ?>" class="btn btn-outline-success" role="button"><i class="fa-solid fa-file"></i> </a>
                    </div>
                  </td>
                      
                    <?php } else{ ?>

                        <td class="text-center"><i class="fa-solid fa-ban"></i></td>
                    <?php }
                   ?>
                  
                  <td>
                    <div class="container-fluid text-center">
                    <a href="editar_alumno.php?id=<?php echo $row['id'] ?>" class="btn btn-outline-primary" role="button"><i class="fa-solid fa-pencil"></i> </a>
                    </div>
                  </td>
                  <td class="text-center">
                    <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#exampleModal1_<?php echo $i ?>">
  <i class="fa-solid fa-trash"></i>
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal1_<?php echo $i ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirmar eliminación</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ¿Realmente deseas eliminar este alumno?
      </div>
      <div class="modal-footer">
      <form action="php_action/eliminar_alumno.php" method="POST">
      <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
      <button type="submit" class="btn btn-danger">Eliminar</button>
      </form>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>
                  </td>

                  <td class="text-center">
<button type="button" class="btn btn-outline-dark" data-toggle="modal" data-target="#exampleModal2_<?php echo $i ?>">
  <i class="fa-solid fa-lock"></i>
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal2_<?php echo $i ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Restablecer contraseña</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ¿Realmente deseas restablecer la contraseña de esta cuenta?
        <p class="font-italic">La contraseña de este usuario ahora será la predeterminada '12345678'</p>
      </div>
      <div class="modal-footer">
      <form action="php_action/restablecer_password_alumno.php" method="POST">
      <input type="hidden" name="id" value="<?php echo $row['id'] ?>" >
      <button type="submit" class="btn btn-danger">Restablecer</button>
      </form>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>
                  </td>
              </tr>
              <?php $i++;
            }
          } else{
            echo "<tr> <td colspan='9'> <center>Aún no se han registrado alumnos</center></td></tr>";
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
          <br>
          <br>
         
      <style>
        .custom-list {
            list-style-type: none;
            padding: 0;
        }
        .custom-list li {
            margin-bottom: 10px;
        }
    </style>
         
      <div class="d-flex container-fluid justify-content-end fixed-bottom p-5">
        <ul class="custom-list">
            <li>
                <a href="form_alumnos.php"><button type="button" class="btn shadow " style="border-radius: 50px;background-color: #2FC463;color:#fff;"><i class="fa-solid fa-circle-plus"></i> Añadir alumno</button></a>
            </li>
            <li>
                <a href="php_action/csv_alumnos.php"><button type="button" class="btn btn-primary shadow " style="border-radius: 50px;color:#fff;"><i class="fa-solid fa-download"></i> Descargar CSV</button></a>
            </li>
            <li>
               <button type="button" class="btn btn-danger shadow " style="border-radius: 50px;color:#fff;" data-toggle="modal" data-target="#importModal"><i class="fa-solid fa-users"></i> Carga masiva</button>
            </li>
        </ul>
    </div>
      <br>
      <!-- Modal para añadir varios alumnos -->
          <div class="modal fade" id="importModal" tabindex="-1" aria-labelledby="importModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="importModalLabel">Importar Varios Alumnos</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="php_action/importar_multiples_datos.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="excelFile">Selecciona el archivo Excel:</label>
                            <input type="file" accept=".xlsx" id="excelFile" name="excel" class="form-control" required >
                        </div>
                        <button type="submit" name="import" class="btn btn-primary">Importar Alumnos</button>
                    </form>
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