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
        <h5 class='modal-title' id='exampleModalLabel'>Material eliminado</h5>
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
        <h5 class='modal-title' id='exampleModalLabel'>Cantidad dada de baja</h5>
        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>
      <div class='modal-body'>
        <center><p class='lead'>¡La cantidad del material ha sido dada de baja correctamente!</p>
     
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
        <h5 class='modal-title' id='exampleModalLabel'>Cantidad perdida añadida</h5>
        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>
      <div class='modal-body'>
        <center><p class='lead'>¡La cantidad del material perdido ha sido añadida correctamente!</p>
     
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
        <center><p class='lead'>¡La cantidad debe ser igual o menor a la cantidad de stock del material!</p>
     
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
        <center><p class='lead'>¡La cantidad a eliminar debe ser mayor a 0!</p>
     
        <i class='fa-regular fa-circle-xmark fa-3xl' style='font-size:50px'></i> </center>
      </div>
      <div class='modal-footer'>
        <button type='button' class='btn btn-success' data-dismiss='modal'><i class='fa-solid fa-circle-check'></i> Ok</button>
      </div>
    </div>
  </div>
</div>";
          break;
          case '13':
          echo "<div class='modal fade' id='exampleModal' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
  <div class='modal-dialog'>
    <div class='modal-content'>
      <div class='modal-header'>
        <h5 class='modal-title' id='exampleModalLabel'>Material reañadido</h5>
        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>
      <div class='modal-body'>
        <center><p class='lead'>¡El utensilio ha sido reañadido exitosamente!</p>
     
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
    <title>Material Perdido</title>
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
   #icono_plus{
     color: #405D72;
     cursor: pointer;
}
#icono_plus:hover{
  color: #5bc0de;
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
                        <h1 class="mt-4">Inventario de material perdido</h1>
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
                                              <th>Añadir</th>
                                                <th>Imagen</th>
                                                <th>Nombre</th>
                                                <th>Descripción</th>
                                                <th>Cantidad</th>
                                                <th>Comentarios</th>
                                                <th>Reañadir</th>
                                                <th>Baja</th>
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                            <?php
          $sql = "SELECT articulos.*,articulos.cantidad as cantidad_articulos,articulos_perdidos.cantidad as cantidad_perdida, articulos_perdidos.* FROM articulos INNER JOIN articulos_perdidos ON articulos.id_articulo = articulos_perdidos.articulo_perdido WHERE articulos.estatus = 'activo'";
          $result = $con -> query($sql);
          $i = 1;
          if($result ->num_rows > 0){
            
            while($row = $result ->fetch_assoc()) { ?>
              <tr>
                <td style="vertical-align:middle;text-align: center;">
                    
  <i id="icono_plus" class="fa-solid fa-circle-plus fa-lg" data-toggle="modal" data-target="#exampleModal3_<?php echo $i ?>"></i>

<!-- Modal -->
<div class="modal fade text-justify" id="exampleModal3_<?php echo $i ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tituloModal">Añadir cantidad perdida</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">


        <form action="php_action/agregar_cantidad_perdida.php" method="POST">
    <div class="form-group">
      <label for="cantidad_agregar">Cantidad</label>
      <input type="number" class="form-control" id="cantidad_agregar" name="cantidad_agregar" value="1" min="1" required>
    </div>
    
    <div class="form-group">
      <label for="comentario">Comentario</label>
      <textarea class="form-control" id="comentario" name="comentario" rows="3" placeholder="Ingresa los comentarios u observaciones necesarias"></textarea>
    </div>

    </div>
      <div class="modal-footer">
      
      <input type="hidden" name="id_articulo" value="<?php echo $row['id_articulo'] ?>">
      <input type="hidden" name="cantidad_stock" value="<?php echo $row['cantidad_articulos']?>">
      <input type="hidden" name="cantidad_perdidos" value="<?php echo $row['cantidad_perdida']?>">
      <button type="submit" class="btn btn-danger">Añadir cantidad</button>
      </form>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>
                  </td>

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
                   <td class="text-center"><?php echo $row['cantidad_perdida'] ?></td>
                   <td>
                    <!-- Button trigger modal -->
                    <a href=# class="text-danger" data-toggle="modal" data-target="#modal2_<?php echo $i?>">
                        Ver comentarios...</a>
                                                </td>

                                                <!-- Modal -->
<div class="modal fade" id="modal2_<?php echo $i ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <div class="row align-items-center">
        <img src="../img/icono.png" alt="chef" width="60px" height="60px">
        <h5 class="modal-title" id="exampleModalLabel">Comentarios</h5>
</div>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-justify">
        <ul>
            <?php 
              $id_articulo = $row['id_articulo'];
              $sqlComentario = "SELECT * FROM comentarios_perdidos WHERE articulo_perdido = $id_articulo ";
              $resultComent = $con -> query($sqlComentario);
              setlocale(LC_TIME, 'es_ES', 'Spanish_Spain', 'Spanish');

              if($resultComent ->num_rows > 0){
                while ($rowComent = $resultComent ->fetch_assoc()) { ?>
                  <li><?php echo strftime("%d de %B de %Y", strtotime($rowComent['fecha'])); ?></li>
                  <li style="list-style-type: none;">Cantidad perdida: <?php echo $rowComent['cantidad'] ?></li>
                  <li style="list-style-type: none;"><?php echo $rowComent['comentario'] ?></li>  
                     
                <?php }
              }
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


        <form action="php_action/reanadir_cantidad.php" method="POST">
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
      <input type="number" class="form-control" id="cantidad_agregar" name="cantidad_agregar" value="1" min="1" required>
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
      <input type="hidden" name="cantidad_stock" value="<?php echo $row['cantidad_perdida']?>">
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
        <h5 class="modal-title" id="exampleModalLabel">Confirmar baja</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ¿Realmente deseas dar de baja este material?

        <form action="php_action/eliminar_inv_perdido.php" method="POST">

        <div class="form-group">
      <label for="opc_eliminar">Selecciona una opción</label>
      <select class="custom-select" id="opc_eliminar_<?php echo $i ?>" name="opc_eliminar" required>
        <option selected>Selecciona...</option>
        <option value="elim_cantidad">Baja de cierta cantidad</option>
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

      <button type="submit" class="btn btn-danger">Realizar</button>
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
            echo "<tr> <td colspan='8'> <center>No existen materiales perdidos</center></td></tr>";
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
        <a href="fpdf186/inv_perdido.php"><button type="button" class="btn btn-primary shadow " style="border-radius: 50px;"><i class="fa-solid fa-download"></i> Descargar</button></a>

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