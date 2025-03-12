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
        <h5 class='modal-title' id='exampleModalLabel'>Materias añadidas</h5>
        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>
      <div class='modal-body'>
        <center><p class='lead'>¡Los materias se han añadido exitosamente!</p>
     
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
        <h5 class='modal-title' id='exampleModalLabel'>Materia actualizada</h5>
        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>
      <div class='modal-body'>
        <center><p class='lead'>¡Materia actualizada correctamente!</p>
     
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
        <h5 class='modal-title' id='exampleModalLabel'>Materia elimianda</h5>
        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>
      <div class='modal-body'>
        <center><p class='lead'>¡Materia eliminada exitosamente!</p>
     
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
        <h5 class='modal-title' id='exampleModalLabel'>Profesores asignados</h5>
        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>
      <div class='modal-body'>
        <center><p class='lead'>¡Profesores asignados exitosamente!</p>
     
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
	<title>Materias</title>
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
                        <h1 class="mt-4">Materias</h1>
                        <br>
                        <hr>
                        <br>                        
                        <div class="card mb-4" style="border: none">
                            <div class="card-body">
                                <div class="table-responsive">
                                	
                                    <table class="table table-hover table-striped" id="dataTable" width="100%" cellspacing="0">

                                        <thead style="background-color:#5C9287 ;color: #fff;">
                                            <tr>
                                                <th>Materia</th>
                                                <th>Cuatrimestre</th>
                                                <th>Nivel</th>
                                                <th>Asignar</th>
                                                <th>Editar</th>
                                                <th>Eliminar</th>
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                        	
                                          <?php
          $sql = "SELECT * FROM materias WHERE activo = 1";
          $result = $con -> query($sql);
            $i=1;
          if($result ->num_rows > 0){
            while($row = $result ->fetch_assoc()) { ?>
              <tr>
                  <td>
                    <a href="#" class="text-primary" data-toggle="modal" data-target="#exampleModal4_<?php echo $i ?>"><?php echo ucfirst($row['materia']) ?></a>
                    <!-- Modal -->
<div class="modal fade" id="exampleModal4_<?php echo $i ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Profesores asignados</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <ul>
        <?php 
        $id_materia = $row['id_materia'];
        $profesores = "SELECT * FROM profesores_materias 
        INNER JOIN materias ON materias.id_materia = profesores_materias.materia 
        INNER JOIN profesores ON profesores.id_profesor = profesores_materias.profesor
        WHERE materias.id_materia = '$id_materia' ";
        $resultProfesores = $con -> query($profesores);
        if($resultProfesores ->num_rows > 0){
          while($profesA = $resultProfesores ->fetch_assoc()){ ?>
          <li><?php echo $profesA['nombre'] ?></li>
          <?php } ?>
          </ul>
        <?php } else{ ?>
            <p>No existen profesores asignados a esta materia</p>
        <?php }
        ?>  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal"><i class="fa-solid fa-circle-check"></i> Ok</button>
      </div>
    </div>
  </div>
</div> 
                </td>
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
        <h5 class="modal-title" id="exampleModalLabel">Asignar profesores</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="php_action/materias.php" method="POST">

      <div class="form-group">
        <label for="alumnos">Profesores</label>
        <input type="text" class="form-control" placeholder="Buscar..." id="buscador">

      </div>
      <div class="form-check">
          <input class="form-check-input" type="checkbox" id="selecTodo">
        <label class="form-check-label" for="defaultCheck1">
        Selecciona todo
        </label>
        </div>
      
        <?php 
        $profesores = "SELECT * FROM profesores WHERE activo = 1";
        $resultProfesores = $con -> query($profesores);
        if($resultProfesores ->num_rows > 0){
          while($check = $resultProfesores ->fetch_assoc()){ ?>
          <div class="form-check">
          <input class="form-check-input profesor-checkbox" type="checkbox" value="<?php echo $check['id_profesor'] ?>" id="profesores" name="profesores[]">
        <label class="form-check-label" for="defaultCheck1">
        <?php echo $check['nombre'] ?>
        </label>
        </div>
          <?php }
        }
        ?>  
      <input type="hidden" name="id_materia" value="<?php echo $row['id_materia'] ?>">
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
      <form action="php_action/materias.php" method="POST">
        <div class="form-group">
            <label for="grupo">Materia</label>
            <input type="text" class="form-control" id="materia" name="materia" value="<?php echo $row['materia']?>">
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
      <input type="hidden" name="id_materia" value="<?php echo $row['id_materia'] ?>">
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
        ¿Realmente deseas eliminar esta materia?
      </div>
      <div class="modal-footer">
      <form action="php_action/materias.php" method="POST">
      <input type="hidden" name="id_materia" value="<?php echo $row['id_materia'] ?>">
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
            echo "<tr> <td colspan='6'> <center>Aún no se han registrado materias</center></td></tr>";
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
                <button type="button" class="btn shadow " style="border-radius: 50px;background-color: #2FC463;color:#fff;" data-toggle="modal" data-target="#grupoModal"><i class="fa-solid fa-circle-plus"></i> Añadir materias</button>
            </li>
            
        </ul>
        

    </div>
    <!-- Modal -->
<div class="modal fade" id="grupoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  
  <div class="modal-dialog modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Añadir materias</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form action="php_action/materias.php" method="POST" id="form_materias">
        <div class="form-group">
        <label for="nivel">Nivel</label>
        <select id="nivel" class="form-control" name='nivel'>
          <option selected>Ingresa el nivel</option>
          <option value="TSU">TSU</option>
          <option value="ingeniería">Ingeniería</option>
        </select>
      </div>
  
      <div class="form-group">
              <label for="cantidad_materia2" id="cantidad_materia2">Cantidad de materias a añadir</label>
              <input type="number" class="form-control" id="cantidad_materia" name="cantidad_materia" placeholder="Ingresa la cantidad de materias">
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
            
            document.getElementById('cantidad_materia').addEventListener('input', function() {
                generarCampos();
            });

            function seleccionarTodo(selecTodoCheckbox) {
              const modal = selecTodoCheckbox.closest('.modal');
              modal.querySelectorAll('.profesor-checkbox').forEach(function(checkElement) {
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
            const numeroCampos = parseInt(document.getElementById('cantidad_materia').value);

            contenedor.innerHTML = '';

            if (isNaN(numeroCampos) || numeroCampos <= 0) {
                return; 
            }

            for (let i = 1; i <= numeroCampos; i++) {
                const div_materia = document.createElement('div');
                const label_materia = document.createElement('label');
                const nombre_materia = document.createElement('input');
                const cuatrimestre = document.createElement('select');
                const div_cuatrimestre = document.createElement('div');
                const label_cuatrimestre = document.createElement('label');

                div_materia.className = 'form-group';
                label_materia.textContent = `Materia ${i}:`;
                nombre_materia.type = 'text';
                nombre_materia.placeholder = `Ingresa el nombre de la materia`;
                nombre_materia.name = `materia_${i}`;
                nombre_materia.className = 'form-control';

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



                contenedor.appendChild(div_materia);
                contenedor.appendChild(label_materia);
                contenedor.appendChild(nombre_materia);
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