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
	<title>Reportes</title>
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
                        <h1 class="mt-4">Reportes</h1>
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
                                                <th>Reporte</th>
                                                <th>Generar</th>
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                        <?php 
                     $reportes = ['Reporte de materiales adquiridos',
                                  'Reporte materiales donados',
                                  'Reporte materiales dañados',
                                  'Reporte materiales perdidos',
                                  'Reporte de materiales en mantenimiento',
                                  'Reporte de materiales dados de baja',
                                  'Reporte de reposiciones'];
                    $valor_reporte = ['adquiridos',
                                  'donados',
                                  'danados',
                                  'perdidos',
                                  'mantenimiento',
                                  'eliminados',
                                  'reposiciones'];
                     $i=1;
                     foreach ($reportes as $reporte) { ?>
                      <tr>
                        <td><?php echo $reporte ?></td>
                        <td>
                        <div class="container-fluid text-center">
                    <button type="button" class="btn btn-outline-dark" data-toggle="modal" data-target="#exampleModal1_<?php echo $i ?>"><i class="fa-solid fa-file"></i> </button>
                    </div>
                    <!-- Modal -->
<div class="modal fade text-justify" id="exampleModal1_<?php echo $i ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tituloModal"><?php echo $reporte ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="php_action/reportes.php" method="POST">
        <div class="form-group">
        <label for="tipo">Tipo de reporte</label>
      <select class="custom-select" id="tipo_<?php echo $i ?>" name="tipo" required>
        <option selected disabled value="">Selecciona...</option>
        <option value="mensual">Mensual</option>
        <option value="cuatrimestral">Cuatrimestral</option>
        <option value="anual">Anual</option>
        <option value="fechaEspecifica">Fecha específica</option>
      </select>
        </div>

        <div class="form-group" id="campo_oculto_mes_<?php echo $i ?>" style="display: none">
        <label for="mes">Mes</label>
      <select class="custom-select" id="mes" name="mes">
        <option selected disabled value="">Selecciona...</option>
        <option value="01">Enero</option>
        <option value="02">Febrero</option>
        <option value="03">Marzo</option>
        <option value="04">Abril</option>
        <option value="05">Mayo</option>
        <option value="06">Junio</option>
        <option value="07">Julio</option>
        <option value="08">Agosto</option>
        <option value="09">Septiembre</option>
        <option value="10">Octubre</option>
        <option value="11">Noviembre</option>
        <option value="12">Diciembre</option>
      </select>
        </div>

        <div class="form-group" id="campo_oculto_cuatrimestre_<?php echo $i ?>" style="display: none">
        <label for="cuatrimestre">Cuatrimestre</label>
      <select class="custom-select" id="cuatrimestre" name="cuatrimestre">
        <option selected disabled value="">Selecciona...</option>
        <option value="1">Septiembre - Diciembre</option>
        <option value="2">Enero -  Abril</option>
        <option value="3">Mayo - Agosto</option>
      </select>
        </div>
    
    <div class="form-group" id="campo_oculto_year_<?php echo $i ?>" style="display: none">
      <label for="year">Año</label>
      <input type="year" class="form-control" id="year" name="year" value="2024" min="2024">
    </div>

    <div class="form-group" id="campo_oculto_fecha_<?php echo $i ?>" style="display: none">
      <label for="fecha">Fecha</label>
      <input type="date" class="form-control" id="fecha" name="fecha">
    </div>

    </div>
      <div class="modal-footer">
      
      <input type="hidden" name="reporte" value="<?php echo $valor_reporte[$i - 1]; ?>">
      <button type="submit" class="btn btn-danger">Generar reporte</button>
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
                  var mensual = document.getElementById('campo_oculto_mes_<?php echo $i ?>');
                  var cuatrimestral = document.getElementById('campo_oculto_cuatrimestre_<?php echo $i ?>');
                  var year = document.getElementById('campo_oculto_year_<?php echo $i ?>');
                  var fecha = document.getElementById('campo_oculto_fecha_<?php echo $i ?>');

                  mensual.style.display = 'none';
                  cuatrimestral.style.display = 'none';
                  year.style.display = 'none';
                  fecha.style.display = 'none';
                  
                  if (this.value === 'mensual') {
                    mensual.style.display = 'block';
                    year.style.display = 'block';
                  } else if (this.value === 'cuatrimestral') {
                    cuatrimestral.style.display = 'block';
                    year.style.display = 'block';
                  } else if (this.value === 'fechaEspecifica'){
                    fecha.style.display='block';
                  } else if (this.value === 'anual'){
                    year.style.display = 'block';
                  }
                });
                 
              });
            </script>
                      <?php 
                      $i++;
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
        <a href="fpdf186/reporteGeneral.php" target="_blank"><button type="button" class="btn shadow " style="border-radius: 50px;background-color: #2FC463;color:#fff;"><i class="fa-solid fa-file"></i> Reporte General</button></a>


      </div>
     
        </main>
        <?php include_once('footer.php'); ?>
	<script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../js/scripts.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="../assets/demo/datatables-demo.js"></script>
</body>
</html>