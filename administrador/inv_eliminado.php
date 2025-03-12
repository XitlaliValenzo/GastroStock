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
        <h5 class='modal-title' id='exampleModalLabel'>Material agregado</h5>
        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>
      <div class='modal-body'>
        <center><p class='lead'>¡El utensilio ha sido agregado exitosamente!</p>
     
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
        <h5 class='modal-title' id='exampleModalLabel'>Material actualizado</h5>
        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>
      <div class='modal-body'>
        <center><p class='lead'>¡El utensilio ha sido actualizado exitosamente!</p>
     
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
        <h5 class='modal-title' id='exampleModalLabel'>Archivo</h5>
        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>
      <div class='modal-body'>
        <center><p class='lead'>¡Error al mover el archivo cargado!</p>
        <i class='fa-solid fa-file-image fa-3xl' style='font-size:50px'></i> </center>
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
        <h5 class='modal-title' id='exampleModalLabel'>Tamaño archivo</h5>
        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>
      <div class='modal-body'>
        <center><p class='lead'>¡El archivo excede el tamaño máximo permitido!</p>
        <i class='fa-solid fa-file-image fa-3xl' style='font-size:50px'></i> </center>
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
        <h5 class='modal-title' id='exampleModalLabel'>Tipo de archivo</h5>
        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>
      <div class='modal-body'>
        <center><p class='lead'>¡El tipo de archivo cargado no está permitido. Solo se admiten archivos .jpeg, .jpg, .png!</p>
        <i class='fa-solid fa-file-image fa-3xl' style='font-size:50px'></i> </center>
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
        <h5 class='modal-title' id='exampleModalLabel'>Seleccione un archivo</h5>
        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>
      <div class='modal-body'>
        <center><p class='lead'>¡Por favor, seleccione un archivo para cargar!</p>
        <i class='fa-solid fa-file-image fa-3xl' style='font-size:50px'></i> </center>
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
        <h5 class='modal-title' id='exampleModalLabel'>Utensilio eliminado</h5>
        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>
      <div class='modal-body'>
        <center><p class='lead'>¡Material eliminado correctamente!</p>
     
        <i class='fa-regular fa-circle-check fa-3xl' style='font-size:50px'></i> </center>
      </div>
      <div class='modal-footer'>
        <button type='button' class='btn btn-success' data-dismiss='modal'><i class='fa-solid fa-circle-check'></i> Ok</button>
      </div>
    </div>
  </div>
</div>";
          break;
          case '8':
          echo "<div class='modal fade' id='exampleModal' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
  <div class='modal-dialog'>
    <div class='modal-content'>
      <div class='modal-header'>
        <h5 class='modal-title' id='exampleModalLabel'>Estatus actualizado</h5>
        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>
      <div class='modal-body'>
        <center><p class='lead'>¡El estatus del material ha sido actualizado correctamente!</p>
     
        <i class='fa-regular fa-circle-check fa-3xl' style='font-size:50px'></i> </center>
      </div>
      <div class='modal-footer'>
        <button type='button' class='btn btn-success' data-dismiss='modal'><i class='fa-solid fa-circle-check'></i> Ok</button>
      </div>
    </div>
  </div>
</div>";
          break;
          case '9':
          echo "<div class='modal fade' id='exampleModal' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
  <div class='modal-dialog'>
    <div class='modal-content'>
      <div class='modal-header'>
        <h5 class='modal-title' id='exampleModalLabel'>Cantidad eliminada</h5>
        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>
      <div class='modal-body'>
        <center><p class='lead'>¡La cantidad del material ha sido eliminada correctamente!</p>
     
        <i class='fa-regular fa-circle-check fa-3xl' style='font-size:50px'></i> </center>
      </div>
      <div class='modal-footer'>
        <button type='button' class='btn btn-success' data-dismiss='modal'><i class='fa-solid fa-circle-check'></i> Ok</button>
      </div>
    </div>
  </div>
</div>";
          break;
          case '10':
          echo "<div class='modal fade' id='exampleModal' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
  <div class='modal-dialog'>
    <div class='modal-content'>
      <div class='modal-header'>
        <h5 class='modal-title' id='exampleModalLabel'>Cantidad añadida</h5>
        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>
      <div class='modal-body'>
        <center><p class='lead'>¡La cantidad ha sido añadida correctamente!</p>
     
        <i class='fa-regular fa-circle-check fa-3xl' style='font-size:50px'></i> </center>
      </div>
      <div class='modal-footer'>
        <button type='button' class='btn btn-success' data-dismiss='modal'><i class='fa-solid fa-circle-check'></i> Ok</button>
      </div>
    </div>
  </div>
</div>";
break;
case '11':
          echo "<div class='modal fade' id='exampleModal' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
  <div class='modal-dialog'>
    <div class='modal-content'>
      <div class='modal-header'>
        <h5 class='modal-title' id='exampleModalLabel'>Ups!</h5>
        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>
      <div class='modal-body'>
        <center><p class='lead'>¡La cantidad debe ser igual o menor a la cantidad ya eliminada!</p>
     
        <i class='fa-regular fa-circle-xmark fa-3xl' style='font-size:50px'></i> </center>
      </div>
      <div class='modal-footer'>
        <button type='button' class='btn btn-success' data-dismiss='modal'><i class='fa-solid fa-circle-check'></i> Ok</button>
      </div>
    </div>
  </div>
</div>";
          break;
case '12':
          echo "<div class='modal fade' id='exampleModal' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
  <div class='modal-dialog'>
    <div class='modal-content'>
      <div class='modal-header'>
        <h5 class='modal-title' id='exampleModalLabel'>Ups!</h5>
        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>
      <div class='modal-body'>
        <center><p class='lead'>¡La cantidad debe ser mayor a 0!</p>
     
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
	<title>Material Eliminado</title>
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
                        <h1 class="mt-4">Inventario de bajas</h1>
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
                                                <th>Imagen</th>
                                                <th>Nombre</th>
                                                <th>Descripción</th>
                                                <th>Cantidad</th>
                                                <th>Reañadir</th>
                                                <th>Eliminar</th>
                                                
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                            <?php
          $sql = "SELECT articulos.*, articulos.cantidad as cantidad_articulos,articulos_eliminados.cantidad AS cantidad_eliminados, articulos_eliminados.* FROM articulos INNER JOIN articulos_eliminados ON articulos.id_articulo = articulos_eliminados.articulo_eliminado ";
          $result = $con -> query($sql);
          $i = 1;
          if($result ->num_rows > 0){
            setlocale(LC_TIME, 'es_ES', 'Spanish_Spain', 'Spanish');
            while($row = $result ->fetch_assoc()) { ?>
              <tr>
                  <td>
    <?php
    // Definir posibles rutas
    $ruta1 = "php_action/" . htmlspecialchars($row['imagen']);
    $ruta2 = "../encargado/php_action/" . htmlspecialchars($row['imagen']);

    // Verificar cuál ruta contiene el archivo
    if (file_exists($ruta1)) {
        $rutaImagen = $ruta1;
    } elseif (file_exists($ruta2)) {
        $rutaImagen = $ruta2;
    }
    ?>
    <img src="<?php echo htmlspecialchars($rutaImagen); ?>" class="card-img-top" alt="Imagen" style="width: 90px; height: 90px; margin: auto;">
</td>
                  <td><?php echo ucfirst($row['nombre'])?></td>
                  <td><?php echo ucfirst($row['descripcion'])?></td>
                   <?php 
                  $id_articulo = $row['id_articulo'];
                  setlocale(LC_TIME, 'es_ES', 'Spanish_Spain', 'Spanish');
                  $sqlEliminado = "SELECT * FROM fecha_eliminados WHERE articulo_eliminado = '$id_articulo'";
                  $resultEliminado = $con->query($sqlEliminado);

                  if ($resultEliminado->num_rows > 0) { ?>
                    <td>
                    <div class="container-fluid text-center">
                      <a href="#" class="text-danger" data-toggle="modal" data-target="#exampleModal2_<?php echo $i ?>"><?php echo $row['cantidad_eliminados'] ?></a></div>
  <!-- Modal -->
<div class="modal fade" id="exampleModal2_<?php echo $i ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cantidad</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <ul>
                   <?php while ($rowD = $resultEliminado->fetch_assoc()) { ?>
                      <li><?php echo strftime("%d de %B de %Y", strtotime($rowD['fecha'])) ?></li>
                      <li style="list-style-type:none;">Cantidad eliminada: <?php echo $rowD['cantidad'] ?></li>
                    <?php } ?>
                    </ul>
    </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal"><i class="fa-solid fa-circle-check"></i> Ok</button>
      </div>
    </div>
  </div>
</div>                    
                   </td>
                  <?php } else { ?>
                    <td class="text-center"><?php echo $row['cantidad_eliminados'] ?></td>

                  <?php }

                  ?>
                   
<td>
  <div class="container-fluid text-center">
                    <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#exampleModal4_<?php echo $i ?>">
  <i class="fa-solid fa-arrows-rotate"></i>
</button></div>
                    
<!-- Modal -->
<div class="modal fade text-justify" id="exampleModal4_<?php echo $i ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tituloModal">Reañadir material </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">


        <form action="php_action/reanadir_cantidad_eliminada.php" method="POST">
        <div class="form-group">
        <label for="tipo">Tipo</label>
      <select class="custom-select" id="tipo_<?php echo $i ?>" name="tipo" required>
        <option selected disabled value="">Selecciona...</option>
        <option value="donativo">Donativo</option>
        <option value="adquirido">Adquirido (UTCGG)</option>
      </select>
        </div>
      
    <div class="form-group" id="campo_oculto_donacion_<?php echo $i?>" style="display: none;">
       <label for="tipo_donante">Tipo de donante</label>
    <select class="custom-select" id="tipo_donante" name="tipo_donante">
        <option selected disabled value="">Selecciona...</option>
        <option value="empresa">Empresa</option>
        <option value="alumno">Alumno</option>
        <option value="otro">Otro</option>
      </select>
    </div>
    <div class="form-group" id="campo_oculto_donante_<?php echo $i?>" style="display: none;">
       <label for="nombre_donante">Donante</label>
    <input type="text" class="form-control" id="nombre_donante" name="nombre_donante" placeholder="Ingresa el nombre del donante">
    </div>
    <div class="form-group">
      <label for="cantidad_agregar">Cantidad</label>
      <input type="number" class="form-control" id="cantidad_agregar" name="cantidad_agregar" value="0" required>
    </div>
    </div>
      <div class="modal-footer">
      
      <?php
      $id_articulo = $row['id_articulo'];
      if ($row['tipo'] == 'donativo') {
         $sqlDon = "SELECT * FROM articulos_donados WHERE articulo_donado = '$id_articulo' ";
        $resultDon = $con ->query($sqlDon);
        $data2 = $resultDon->fetch_assoc();
        $tipo_material = $data2['tipo_material']; 
       }  else {
         $sqlAdq = "SELECT * FROM articulos_adquiridos WHERE articulo_adquirido = '$id_articulo' ";
        $resultAdq = $con ->query($sqlAdq);
        $data2 = $resultAdq->fetch_assoc();
        $tipo_material = $data2['tipo_material'];
       }

      ?>
      <input type="hidden" name="id_articulo" value="<?php echo $row['id_articulo'] ?>">
      <input type="hidden" name="cantidad_stock" value="<?php echo $row['cantidad_eliminados']?>">
      <input type="hidden" name="cantidad_articulos" value="<?php echo $row['cantidad_articulos']?>">
      <input type="hidden" name="tipo_material" value="<?php echo $tipo_material ?>">
      
      <button type="submit" class="btn btn-danger">Añadir cantidad</button>
      </form>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
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
        ¿Realmente deseas eliminar este utensilio?

        <form action="php_action/eliminar_inv_eliminado.php" method="POST">

        <div class="form-group">
      <label for="opc_eliminar">Selecciona una opción</label>
      <select class="custom-select" id="opc_eliminar_<?php echo $i ?>" name="opc_eliminar" required>
        <option selected>Selecciona...</option>
        <option value="elim_cantidad">Eliminar cierta cantidad</option>
        <option value="elim_perm">Eliminar material permanentemente</option>
      </select>
    </div>

 <div class="form-group" id="campo_oculto_elim_cant_<?php echo $i ?>" style="display: none;">
    <label for="cantidad">Ingresa la cantidad a eliminar</label>
    <input type="number" class="form-control" id="cantidad" value="0" name="cantidad">
  </div>




      </div>
      <div class="modal-footer">
      
      <input type="hidden" name="id_articulo" value="<?php echo $row['id_articulo'] ?>">
      <input type="hidden" name="cantidad_stock" value="<?php echo $row['cantidad_perdida'] ?>">

      <button type="submit" class="btn btn-danger">Eliminar</button>
      </form>


        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>
                  </td>
              </tr>
              <script>
                document.addEventListener('DOMContentLoaded', function() {

                document.getElementById('tipo_<?php echo $i ?>').addEventListener('change', function() {
                  var campoOcultoDonacion = document.getElementById('campo_oculto_donacion_<?php echo $i ?>');
                  var campoOcultoDonante = document.getElementById('campo_oculto_donante_<?php echo $i ?>');
                  
                  if (this.value === 'donativo') {
                    campoOcultoDonacion.style.display = 'block';
                    campoOcultoDonante.style.display = 'block';
                  } else {
                    campoOcultoDonacion.style.display = 'none';
                    campoOcultoDonante.style.display = 'none';
                  }
                });

                document.getElementById('opc_eliminar_<?php echo $i ?>').addEventListener('change', function() {
                  var campoOcultoeliminar = document.getElementById('campo_oculto_elim_cant_<?php echo $i ?>');
                 
                  campoOcultoeliminar.style.display = 'none';
                  
                  if (this.value === 'elim_cantidad') {
                    campoOcultoeliminar.style.display = 'block';
                    
                  } 
                });
                 
              });
            </script>
             <?php  $i++;
            }
          } else{
            echo "<tr> <td colspan='8'> <center>Aún no se ha eliminado ningún material</center></td></tr>";
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
          <div class="d-flex container-fluid justify-content-end fixed-bottom p-5" >
        <a href="fpdf186/inv_eliminado.php"><button type="button" class="btn btn-primary shadow " style="border-radius: 50px;"><i class="fa-solid fa-download"></i> Descargar</button></a>

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