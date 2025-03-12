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
        <h5 class='modal-title' id='exampleModalLabel'>Grupos añadidos</h5>
        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>
      <div class='modal-body'>
        <center><p class='lead'>¡Los grupos se han añadido exitosamente!</p>
     
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
        <h5 class='modal-title' id='exampleModalLabel'>Grupo actualizado</h5>
        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>
      <div class='modal-body'>
        <center><p class='lead'>¡Grupo actualizado correctamente!</p>
     
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
        <h5 class='modal-title' id='exampleModalLabel'>Grupo elimiando</h5>
        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>
      <div class='modal-body'>
        <center><p class='lead'>¡Grupo eliminado exitosamente!</p>
     
        <i class='fa-regular fa-circle-check fa-3xl' style='font-size:50px'></i> </center>
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
        <h5 class='modal-title' id='exampleModalLabel'>Alumnos asignados</h5>
        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>
      <div class='modal-body'>
        <center><p class='lead'>¡Alumnos asignados exitosamente!</p>
     
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
        <h5 class='modal-title' id='exampleModalLabel'>Cambio de grupo</h5>
        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>
      <div class='modal-body'>
        <center><p class='lead'>¡Cambio de grupo realizado exitosamente!</p>
     
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
	<title>Grupos</title>
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
                        <h1 class="mt-4">Grupos</h1>
                        <br>
                        <hr>
                        <br>                        
                        <div class="card mb-4" style="border: none">
                            <div class="card-body">
                                <div class="table-responsive">
                                	
                                    <table class="table table-hover table-striped" id="dataTable" width="100%" cellspacing="0">

                                        <thead style="background-color:#5C9287 ;color: #fff;">
                                            <tr>
                                                <th>Grupo</th>
                                                <th>Cuatrimestre</th>
                                                <th>Nivel</th>
                                                <th>Asignar</th>
                                                <th>Cambiar</th>
                                                <th>Editar</th>
                                                <th>Eliminar</th>
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                        	
                                          <?php
          $sql = "SELECT * FROM grupo WHERE estatus = 1";
          $result = $con -> query($sql);
            $i=1;
          if($result ->num_rows > 0){
            while($row = $result ->fetch_assoc()) { ?>
              <tr>
                  <td><?php echo strtoupper($row['grupo']) ?></td>
                  <td class="text-center"><?php echo ucfirst($row['cuatrimestre']) ?></td>
                  <td><?php echo ucfirst($row['nivel']) ?></td>
                  <td>
                    <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#exampleModal3_<?php echo $i ?>">
                    <i class="fa-solid fa-users"></i>
</button>
<!-- Modal -->
<div class="modal fade" id="exampleModal3_<?php echo $i ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Asignar alumnos ( <?php echo $row['grupo'] ?> )</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="php_action/grupos.php" method="POST">

      <div class="form-group">
        <label for="alumnos">Alumnos</label>
        <input type="text" class="form-control" placeholder="Buscar..." id="buscador">

      </div>
      
        <?php 
        $alumnos = "SELECT * FROM usuarios WHERE role = 'alumno' and activo = 1";
        $resultAlumnos = $con -> query($alumnos);
        if($resultAlumnos ->num_rows > 0){
          while($check = $resultAlumnos ->fetch_assoc()){ ?>
          <div class="form-check">
          <input class="form-check-input" type="checkbox" value="<?php echo $check['id'] ?>" id="alumnos" name="alumnos[]">
        <label class="form-check-label" for="defaultCheck1">
        <?php echo $check['matricula'] . ' - ' . $check['nombre'] ?>
        </label>
        </div>
          <?php }
        }
        ?>  
      <input type="hidden" name="id_grupo" value="<?php echo $row['id_grupo'] ?>">
      <input type="hidden" name="asignar" value="asignar">
      </div>
      <div class="modal-footer">
      <button type="submit" class="btn btn-danger">Asignar</button>
      </form>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>
                  </td>
                  
                    <?php 
                  $id_grupo = $row['id_grupo'];
        $alumnos = "SELECT * FROM usuarios WHERE role = 'alumno' and activo = 1 and grupo = '$id_grupo'  ";
        $resultAlumnos = $con -> query($alumnos);
        if($resultAlumnos ->num_rows > 0){ ?>
        <td>
                    <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#exampleModal4_<?php echo $i ?>">
                    <i class="fa-solid fa-arrows-rotate"></i>
</button>
<!-- Modal -->
<div class="modal fade" id="exampleModal4_<?php echo $i ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cambiar alumnos a un nuevo grupo ( <?php echo $row['grupo'] ?> )</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="php_action/grupos.php" method="POST" id="formNuevoGrupo">

      <div class="form-group">
        <label for="alumnos">Alumnos</label>
        <input type="text" class="form-control" placeholder="Buscar..." id="buscador">

      </div>
      <div class="form-check">
          <input class="form-check-input" type="checkbox" id="selecTodo">
        <label class="form-check-label" for="defaultCheck1">
        Selecciona todo
        </label>
        </div>
        <?php 
          while($check = $resultAlumnos ->fetch_assoc()){ ?>
          <div class="form-check">
          <input class="form-check-input alumno-checkbox" type="checkbox" value="<?php echo $check['id'] ?>" id="alumnos" name="alumnos[]">
        <label class="form-check-label" for="defaultCheck1">
        <?php echo $check['matricula'] . ' - ' . $check['nombre'] ?>
        </label>
        </div>
          <?php } ?> 
        <br>
        <div class="form-group">
        <label for="grupoNuevo">Nuevo grupo</label>
      <select id="grupo_nuevo" class="form-control" name="grupo_nuevo">
        <option selected>Selecciona el nuevo grupo...</option> 
        <?php 
        $sqlGrupo = "SELECT * FROM grupo WHERE estatus = 1 ";
        $resultGrupo = $con -> query($sqlGrupo);
        if($resultGrupo ->num_rows > 0){
          while($nuevoGrupo = $resultGrupo ->fetch_assoc()){ ?>
        <option value="<?php echo $nuevoGrupo['id_grupo'] ?>"><?php echo $nuevoGrupo['grupo'] ?></option>
          <?php }
        }
        ?> 
        </select>
        </div>
      <input type="hidden" name="cambiar" value="cambiar">
      </div>
      <div class="modal-footer">
      <button type="submit" class="btn btn-danger">Cambiar</button>
      </form>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>
                  </td>
                  <?php 
} else { ?>
  <td><i class="fa-solid fa-ban"></i></td>
<?php } ?>
                  <td>
                    <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#exampleModal1_<?php echo $i ?>">
                    <i class="fa-solid fa-pencil"></i>
</button>
<!-- Modal -->
<div class="modal fade" id="exampleModal1_<?php echo $i ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="php_action/grupos.php" method="POST">
        <div class="form-group">
            <label for="grupo">Grupo</label>
            <input type="text" class="form-control" id="grupo" name="grupo" value="<?php echo $row['grupo']?>">
        </div>
        <div class="form-group">
        <label for="cuatrimestre">Cuatrimestre</label>
        <select id="cuatrimestre" class="form-control" name="cuatrimestre">
        <option selected><?php echo $row['cuatrimestre']?></option>
        <option value="1">1er cuatrimestre</option>
        <option value="2">2do cuatrimestre</option>
        <option value="3">3er cuatrimestre</option>
        <option value="4">4to cuatrimestre</option>
        <option value="5">5to cuatrimestre</option>
        <option value="6">6to cuatrimestre</option>
        <option value="7">7mo cuatrimestre</option>
        <option value="8">8vo cuatrimestre</option>
        <option value="9">9no cuatrimestre</option>
        <option value="10">10mo cuatrimestre</option>
      </select>
        </div>
        <div class="form-group">
      <label for="nivel">Nivel</label>
      <select id="nivel" class="form-control" name="nivel">
        <option selected><?php echo $row['nivel']?></option>
        <?php
            if ($row['nivel'] == 'ingeniería'){ ?>
                <option value="TSU">TSU</option>
            <?php } else { ?>
                <option value="ingeniería">Ingeniería</option>
            <?php }
        ?>
      </select>
    </div>
      <input type="hidden" name="id" value="<?php echo $row['id_grupo'] ?>">
      <input type="hidden" name="editar" value="editar">
      </div>
      <div class="modal-footer">
      <button type="submit" class="btn btn-danger">Actualizar</button>
      </form>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>
                  </td>
                  <td>
                    <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#exampleModal2_<?php echo $i ?>">
  <i class="fa-solid fa-trash"></i>
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal2_<?php echo $i ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirmar eliminación</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ¿Realmente deseas eliminar este grupo?
      </div>
      <div class="modal-footer">
      <form action="php_action/grupos.php" method="POST">
      <input type="hidden" name="id" value="<?php echo $row['id_grupo'] ?>">
      <input type="hidden" name="eliminar" value="eliminar">
      <button type="submit" class="btn btn-danger">Eliminar</button>
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
            echo "<tr> <td colspan='4'> <center>Aún no se han registrado alumnos</center></td></tr>";
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
                <button type="button" class="btn shadow " style="border-radius: 50px;background-color: #2FC463;color:#fff;" data-toggle="modal" data-target="#grupoModal"><i class="fa-solid fa-circle-plus"></i> Añadir grupos</button>
            </li>
            
        </ul>
        

    </div>
    <!-- Modal -->
<div class="modal fade" id="grupoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  
  <div class="modal-dialog modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Añadir grupos</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form action="php_action/grupos.php" method="POST" id="form_grupos">
        <div class="form-group">
        <label for="nivel">Nivel</label>
        <select id="nivel" class="form-control" name='nivel'>
          <option selected>Ingresa el nivel</option>
          <option value="TSU">TSU</option>
          <option value="ingeniería">Ingeniería</option>
        </select>
      </div>
  
      <div class="form-group">
              <label for="cantidad_grupo2" id="cantidad_grupo2">Cantidad de grupos a añadir</label>
              <input type="number" class="form-control" id="cantidad_grupo" name="cantidad_grupo" placeholder="Ingresa la cantidad de grupos">
          </div>
          <div id="contenedorCampos"></div>
        <input type="hidden" name="agregar" value="agregar">
        </div>
        <div class="modal-footer">
        <button type="submit" class="btn btn-danger">Añadir</button>
        </form>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        </div>
      </div>
    </div>
  </div>
        </main>
        <script>
          document.addEventListener('DOMContentLoaded', function() {
            
            document.getElementById('cantidad_grupo').addEventListener('input', function() {
                generarCampos();
            });

            function seleccionarTodo(selecTodoCheckbox) {
              const modal = selecTodoCheckbox.closest('.modal');
              modal.querySelectorAll('.alumno-checkbox').forEach(function(checkElement) {
                checkElement.checked = selecTodoCheckbox.checked;
              });
            }

            document.querySelectorAll('[id^=selecTodo]').forEach(function(selecTodoCheckbox) {
              selecTodoCheckbox.addEventListener('change', function() {
                seleccionarTodo(selecTodoCheckbox);
              });
            });

            document.addEventListener('keyup', e=> {
              if (e.target.matches('#buscador')){
                document.querySelectorAll(".form-check").forEach(alumno=>{
                  alumno.textContent.toLowerCase().includes(e.target.value.toLowerCase())
                  ?alumno.style.display = 'block'
                  :alumno.style.display = 'none';
                })
              }
            });
        });

        function generarCampos() {
            const contenedor = document.getElementById('contenedorCampos');
            const numeroCampos = parseInt(document.getElementById('cantidad_grupo').value);

            contenedor.innerHTML = '';

            if (isNaN(numeroCampos) || numeroCampos <= 0) {
                return; 
            }

            for (let i = 1; i <= numeroCampos; i++) {
                const div_grupo = document.createElement('div');
                const label_grupo = document.createElement('label');
                const nombre_grupo = document.createElement('input');
                const cuatrimestre = document.createElement('select');
                const div_cuatrimestre = document.createElement('div');
                const label_cuatrimestre = document.createElement('label');

                div_grupo.className = 'form-group';
                label_grupo.textContent = `Nombre del grupo ${i}:`;
                nombre_grupo.type = 'text';
                nombre_grupo.placeholder = `Ingresa el nombre del grupo ${i}`;
                nombre_grupo.name = `nombre_grupo${i}`;
                nombre_grupo.className = 'form-control';

                div_cuatrimestre.className = 'form-group';
                label_cuatrimestre.textContent = `Cuatrimestre:`;
                cuatrimestre.className = 'form-control';
                cuatrimestre.name = `cuatrimestre${i}`;

                const opcionesCuatrimestre = [
                  { valor: '1', texto: '1er cuatrimestre' },
                  { valor: '2', texto: '2do cuatrimestre' },
                  { valor: '3', texto: '3er cuatrimestre' },
                  { valor: '4', texto: '4to cuatrimestre' },
                  { valor: '5', texto: '5to cuatrimestre' },
                  { valor: '6', texto: '6to cuatrimestre' },
                  { valor: '7', texto: '7mo cuatrimestre' },
                  { valor: '8', texto: '8vo cuatrimestre' },
                  { valor: '9', texto: '9no cuatrimestre' },
                  { valor: '10', texto: '10mo cuatrimestre' }
                ];
                
                opcionesCuatrimestre.forEach(opcionData => {
                  const opcion = document.createElement('option');
                  opcion.value = opcionData.valor;
                  opcion.textContent = opcionData.texto;
                  cuatrimestre.appendChild(opcion);
                });

                contenedor.appendChild(div_grupo);
                contenedor.appendChild(label_grupo);
                contenedor.appendChild(nombre_grupo);
                contenedor.appendChild(div_cuatrimestre);
                contenedor.appendChild(label_cuatrimestre);
                contenedor.appendChild(cuatrimestre);
            }
        }

            </script>
   
        <?php include_once('footer.php'); ?>
	<script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../js/scripts.js"></script>
        
      
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="../assets/demo/datatables-demo.js"></script>
</body>
</html>