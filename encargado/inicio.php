<?php	
	
    include_once('conf/config.php');
    if(!isset($_SESSION['ID'])){
		header("Location: index.php");
	}
	
	$nombre = $_SESSION['NAME'];
	$tipo_usuario = $_SESSION['ROLE'];	
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
        <h5 class='modal-title' id='exampleModalLabel'>Contraseña actualizada</h5>
        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>
      <div class='modal-body'>
        <center><p class='lead'>¡La contraseña ha sido actualizada exitosamente!</p>
     
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
<html lang="es-mx">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>Dashboard</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
        
        <link href="css/styles.css" rel="stylesheet" />
        <link rel="stylesheet" href="css/estilo-nav.css">
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
        <nav class="sb-topnav navbar navbar-expand navbar-dark" id="nav">
            
            <a class="navbar-brand" href="home.php">
               
    
     Gastro-Stock
     <!--<img src="img/icono.png" width="auto" height="70" class="d-inline-block align-center" alt="Gastro">-->
  </a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#">
                <i class="fas fa-bars"></i>
            </button
            >
            <ul class="navbar-nav ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i> <?php echo $nombre; ?>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <form action="encargado/cambiar_password.php" method="POST">
    <input type="hidden" name="id" value="<?php echo $row['id'];?>">
    <a class="dropdown-item"><button type="submit" class="dropdown-item" style="margin: 0;padding: 0;"><i class="fa-solid fa-lock"></i> Cambiar contraseña</button></a>

</form>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="logout.php"><i class="fa-solid fa-right-from-bracket"></i> Cerrar sesión</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" target="_blank" href="manual_de_usuario.pdf"><i class="fa-solid fa-circle-info"></i> Ayuda</a>
                    </div>
                </li>
            </ul>
        </nav>

        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion" style="background-image: url('img/fondo-menu.jpg');background-repeat: no-repeat;background-size: cover;background-position: center center;margin: 0px;position: relative;">
                    <div class="sb-sidenav-menu">
                        <div class="container" id="container-img">
                        <img src="img/img_inicio_2.png" alt="utensilios" id="img-utensilios">

                        </div>

                        <div class="nav" >
                            <div class="container-fluid" id="container-usr">
                            <p style="color: #fff"><b><?php echo strtoupper($tipo_usuario) ?></b>
                            <br>
                            <?php echo $nombre ?></p>
                            
                            </div>
                        
                            <a class="nav-link" href="home.php" id="nav-link">

                                <div class="sb-nav-link-icon"><i class="fa-solid fa-house" style="color: #ffffff;"></i></div>Inicio


                            </a>
                                                       
                                
                               <!-- <a class="nav-link" href="encargado/encargados.php" id="nav-link">
                                    <div class="sb-nav-link-icon"><i class="fa-solid fa-user" style="color: #ffffff;"></i> </div>
                                    Encargados&nbsp;&nbsp;
                                            <span class="badge badge-pill badge-danger">1</span></a>-->
                                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayoutsGrupos" aria-expanded="false" aria-controls="collapseLayouts" id="nav-link">
                                    <div class="sb-nav-link-icon"><i class="fa-solid fa-graduation-cap" style="color: #ffffff;"></i></div>
                                    Datos académicos
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
                                    ></a>
                                    <div class="collapse" id="collapseLayoutsGrupos" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="encargado/grupos.php">Grupos&nbsp;&nbsp;
                                            <span class="badge badge-pill badge-danger">
                                                <?php
                            $query = "SELECT COUNT(id_grupo) as total FROM grupo WHERE estatus = 1";
                            $result = $con -> query($query);
                            $row = $result->fetch_assoc();
                            echo "" . $row['total'] . "";
                        ?>
                                            </span></a>
                                            <a class="nav-link" href="encargado/profesores.php">Profesores&nbsp;&nbsp;
                                            <span class="badge badge-pill badge-danger">
                                                <?php
                            $query = "SELECT COUNT(id_profesor) as total FROM profesores WHERE activo = 1 "; 
                            $result = $con -> query($query);
                            $row = $result->fetch_assoc();
                            echo "" . $row['total'] . "";
                        ?>
                                            </span></a>
                                            <a class="nav-link" href="encargado/materias.php">Materias&nbsp;&nbsp;
                                            <span class="badge badge-pill badge-danger">
                                                <?php
                            $query = "SELECT COUNT(id_materia) as total FROM materias WHERE activo = 1 ";

                            $result = $con -> query($query);
                            $row = $result->fetch_assoc();
                            echo "" . $row['total'] . "";
                        ?>
                                            </span></a>
                                            </div>

                                            
                                <a class="nav-link" href="encargado/alumnos.php" id="nav-link">
                                    <div class="sb-nav-link-icon"><i class="fa-solid fa-users" style="color: #ffffff;"></i> </div>
                                    Alumnos&nbsp;&nbsp;
                                            <span class="badge badge-pill badge-danger">
                                                <?php
                            $query = "SELECT COUNT(id) as total FROM usuarios WHERE role = 'alumno' AND activo=1";
                            $result = $con -> query($query);
                            $row = $result->fetch_assoc();
                            echo "" . $row['total'] . "";
                        ?>
                                            </span></a>

                                <!--<a class="nav-link" href="encargado/solicitudes.php" id="nav-link">
                                    <div class="sb-nav-link-icon"><i class="fa-solid fa-clock-rotate-left" style="color: #ffffff;"></i> </div>
                                    Historial de solicitudes&nbsp;&nbsp;
                                            <span class="badge badge-pill badge-danger">1</span></a>-->
                                            
                                <a class="nav-link" href="encargado/materiales.php" id="nav-link">
                                    <div class="sb-nav-link-icon"><i class="fa-solid fa-utensils" style="color: #ffffff;"></i></div>
                                    Materiales&nbsp;&nbsp;
                                            <span class="badge badge-pill badge-danger">
                                                <?php
                            $query = "SELECT COUNT(id_articulo) as total FROM articulos WHERE estatus != 'eliminado'";
                            $result = $con -> query($query);
                            $row = $result->fetch_assoc();
                            echo "" . $row['total'] . "";
                        ?>
                                            </span></a>



                                 <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts2" aria-expanded="false" aria-controls="collapseLayouts" id="nav-link">
                                    <div class="sb-nav-link-icon"><i class="fa-solid fa-bell" style="color: #ffffff;"></i></div>
                                    Requisiciones
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
                                    ></a>
                                    <div class="collapse" id="collapseLayouts2" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="encargado/solic_pendientes.php">Pendientes&nbsp;&nbsp;
                                            <span class="badge badge-pill badge-danger">
                                                <?php
                            $query = "SELECT COUNT(id) as total FROM solicitud WHERE estatus = 'pendiente' ";
                            $result = $con -> query($query);
                            $row = $result->fetch_assoc();
                            echo "" . $row['total'] . "";
                        ?>
                                            </span></a>
                                            <a class="nav-link" href="encargado/solic_prestamo.php">En préstamo&nbsp;&nbsp;
                                            <span class="badge badge-pill badge-danger">
                                                <?php
                            $query = "SELECT COUNT(id) as total FROM solicitud WHERE estatus = 'prestamo' ";
                            $result = $con -> query($query);
                            $row = $result->fetch_assoc();
                            echo "" . $row['total'] . "";
                        ?>
                                            </span></a>
                                            <a class="nav-link" href="encargado/solic_faltantes.php">Con faltantes&nbsp;&nbsp;
                                            <span class="badge badge-pill badge-danger">
                                                <?php
                            $query = "SELECT COUNT(id) as total FROM solicitud WHERE estatus = 'faltantes' ";
                            $result = $con -> query($query);
                            $row = $result->fetch_assoc();
                            echo "" . $row['total'] . "";
                        ?>
                                            </span></a>
                                            <a class="nav-link" href="encargado/solic_finalizadas.php">Finalizadas&nbsp;&nbsp;
                                            <span class="badge badge-pill badge-danger">
                                                <?php
                            $query = "SELECT COUNT(id) as total FROM solicitud WHERE estatus = 'finalizada' ";
                            $result = $con -> query($query);
                            $row = $result->fetch_assoc();
                            echo "" . $row['total'] . "";
                        ?>
                                            </span></a>
                                            <a class="nav-link" href="encargado/solicitudes_totales.php">Historial de requisiciones&nbsp;&nbsp;
                                            <span class="badge badge-pill badge-danger">
                                                <?php
                            $query = "SELECT COUNT(id) as total FROM solicitud";
                            $result = $con -> query($query);
                            $row = $result->fetch_assoc();
                            echo "" . $row['total'] . "";
                        ?>
                                            </span></a>
                                        </nav>
                                    </div>



                                    
                                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts" id="nav-link">
                                    <div class="sb-nav-link-icon"><i class="fa-solid fa-store" style="color: #ffffff;"></i></div>
                                    Inventarios
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
                                    ></a>
                                    <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="encargado/inv_actual.php">Actual&nbsp;&nbsp;
                                            <span class="badge badge-pill badge-danger">
                                                <?php
                            $query = "SELECT COUNT(id_articulo) as total FROM articulos WHERE estatus ='activo'";
                            $result = $con -> query($query);
                            $row = $result->fetch_assoc();
                            echo "" . $row['total'] . "";
                        ?>
                                            </span></a>
                                            <a class="nav-link" href="encargado/inv_donado.php">Material donado&nbsp;&nbsp;
                                            <span class="badge badge-pill badge-danger">
                                                <?php
                            $query = "SELECT COUNT(id_articulo) as total FROM articulos INNER JOIN articulos_donados ON articulos.id_articulo = articulos_donados.articulo_donado WHERE articulos.estatus = 'activo' ";
                            $result = $con -> query($query);
                            $row = $result->fetch_assoc();
                            echo "" . $row['total'] . "";
                        ?>
                                            </span></a>
                                            <a class="nav-link" href="encargado/inv_perdido.php">Material perdido&nbsp;&nbsp;
                                            <span class="badge badge-pill badge-danger">
                                                <?php
                            $query = "SELECT COUNT(id_articulo) as total FROM articulos INNER JOIN articulos_perdidos ON articulos.id_articulo = articulos_perdidos.articulo_perdido WHERE articulos.estatus = 'activo'";
                            $result = $con -> query($query);
                            $row = $result->fetch_assoc();
                            echo "" . $row['total'] . "";
                        ?>
                                            </span></a>
                                            <a class="nav-link" href="encargado/inv_danado.php">Material dañado&nbsp;&nbsp;
                                            <span class="badge badge-pill badge-danger">
                                                <?php
                            $query = "SELECT COUNT(id_articulo) as total FROM articulos INNER JOIN articulos_danados ON articulos.id_articulo = articulos_danados.articulo_danado WHERE articulos.estatus = 'activo'";
                            $result = $con -> query($query);
                            $row = $result->fetch_assoc();
                            echo "" . $row['total'] . "";
                        ?>
                                            </span></a>
                                            <a class="nav-link" href="encargado/inv_equipo.php">Equipo&nbsp;&nbsp;
                                            <span class="badge badge-pill badge-danger">
                                                <?php
                            $query = "SELECT COUNT(*) AS total
                            FROM (SELECT id_articulo,imagen,nombre,descripcion,estatus, articulos.cantidad as cantidad_articulos,tipo_material FROM articulos 
                  INNER JOIN articulos_adquiridos ON articulos.id_articulo = articulos_adquiridos.articulo_adquirido
                  WHERE tipo_material = 'equipo' AND estatus = 'activo'
                  UNION
                  SELECT id_articulo,imagen,nombre,descripcion,estatus, articulos.cantidad as cantidad_articulos,tipo_material FROM articulos 
                  INNER JOIN articulos_donados ON articulos.id_articulo = articulos_donados.articulo_donado
                  WHERE tipo_material = 'equipo' AND estatus = 'activo'
                  ORDER BY id_articulo) AS union_table";
                            $result = $con -> query($query);
                            $row = $result->fetch_assoc();
                            echo "" . $row['total'] . "";
                        ?>
                                            </span></a>
                                            <a class="nav-link" href="encargado/inv_mantenimiento.php">Mantenimiento / Reparación&nbsp;&nbsp;
                                            <span class="badge badge-pill badge-danger">
                                                <?php
                            $query = "SELECT COUNT(id_articulo) as total FROM articulos_reparacion INNER JOIN articulos ON articulos_reparacion.articulo_reparacion = articulos.id_articulo WHERE articulos.estatus ='activo' ";
                            $result = $con -> query($query);
                            $row = $result->fetch_assoc();
                            echo "" . $row['total'] . "";
                        ?>
                                            </span></a>
                                            <a class="nav-link" href="encargado/inv_eliminado.php">Baja de material&nbsp;&nbsp;
                                            <span class="badge badge-pill badge-danger">
                                                <?php
                            $query = "SELECT COUNT(id_articulo) as total FROM articulos WHERE  estatus = 'eliminado' ";
                            $result = $con -> query($query);
                            $row = $result->fetch_assoc();
                            echo "" . $row['total'] . "";
                        ?>
                                            </span></a>
                                        </nav>
                                    </div>
                                    
                              <a class="nav-link" href="administrador/reportes.php" id="nav-link">
                                    <div class="sb-nav-link-icon"><i class="fa-solid fa-file" style="color: #ffffff;"></i> </div>
                                    Reportes&nbsp;&nbsp;</a>      
                                    
                                    
                            
                            </div>
                    </div>
                    
                </nav>
      </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Gastro-Stock</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Administración de Sistema de Gestión de Inventario</li>
                        </ol>
                        
                        
                        <div class="row">
                            <div class="col-xl-4 col-md-6">
                                <div class="card shadow rounded text-white mb-4" style="background-color: #5C9287;">
                                    <div class="card-body"><i class="fa-solid fa-users" style="color: #ffffff;"></i> Alumnos&nbsp;&nbsp;
                                            <span class="badge badge-pill badge-light">
                                                <?php
                            $query = "SELECT COUNT(id) as total FROM usuarios WHERE role = 'alumno' AND activo=1";
                            $result = $con -> query($query);
                            $row = $result->fetch_assoc();
                            echo "" . $row['total'] . "";
                        ?>
                                            </span></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="encargado/alumnos.php">Ver detalles</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
									</div>
								</div>
							</div>
                            <div class="col-xl-4 col-md-6">
                                <div class="card text-white mb-4 shadow rounded" style="background-color: #5C9287">
                                    <div class="card-body"><i class="fa-solid fa-store" style="color: #ffffff;"></i> Inventario actual&nbsp;&nbsp;
                                            <span class="badge badge-pill badge-light">
                                                <?php
                            $query = "SELECT COUNT(id_articulo) as total FROM articulos WHERE estatus != 'eliminado'";
                            $result = $con -> query($query);
                            $row = $result->fetch_assoc();
                            echo "" . $row['total'] . "";
                        ?>
                                            </span></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="encargado/inv_actual.php">Ver detalles</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
									</div>
								</div>
							</div>
                            <div class="col-xl-4 col-md-6">
                                <div class="card text-white mb-4 shadow rounded" style="background-color: #5C9287">
                                    <div class="card-body"><i class="fa-solid fa-bell" style="color: #ffffff;"></i> Requisiciones pendientes&nbsp;&nbsp;
                                            <span class="badge badge-pill badge-light">
                                                <?php
                            $query = "SELECT COUNT(id) as total FROM solicitud WHERE estatus = 'pendiente' ";
                            $result = $con -> query($query);
                            $row = $result->fetch_assoc();
                            echo "" . $row['total'] . "";
                        ?>
                                            </span></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="encargado/solic_pendientes.php">Ver detalles</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
									</div>
								</div>
							</div>
                            
						</div>
                        <br><br>
                        <div class="card mb-4">
                            <div class="card-header"><i class="fa-solid fa-bell fa-xl"></i> Requisiciones&nbsp;<span class="badge badge-pill badge-danger lead">
                                <?php
                            $query = "SELECT COUNT(id) as total FROM solicitud ";
                            $result = $con -> query($query);
                            $row = $result->fetch_assoc();
                            echo "" . $row['total'] . "";
                        ?>
                            </span></a></div>
                            <div class="card-body">
                                <div class="row row-cols-1 row-cols-md-2">
                                    <div class="col mb-4">
    <div class="card text-center shadow p-3 mb-5 bg-white rounded" style="border: none">
      <div class="card-body">
        <h5 class="card-title">Requisiciones pendientes</h5>
        <p class="card-text" style="font-size: 30px; color: #FD2933; font-weight: bold;">
            <?php
                            $query = "SELECT COUNT(id) as total FROM solicitud WHERE estatus = 'pendiente' ";
                            $result = $con -> query($query);
                            $row = $result->fetch_assoc();
                            echo "" . $row['total'] . "";
                        ?>
        </p>
        <a href="encargado/solic_pendientes.php" class="btn btn-outline-danger">Ver requisiciones</a>
      </div>
    </div>
  </div>
  <div class="col mb-4">
    <div class="card text-center shadow p-3 mb-5 bg-white rounded" style="border: none">
      <div class="card-body">
        <h5 class="card-title">Requisiones en préstamo</h5>
        <p class="card-text" style="font-size: 30px; color: #FD2933; font-weight: bold;">
            <?php
                            $query = "SELECT COUNT(id) as total FROM solicitud WHERE estatus = 'prestamo' ";
                            $result = $con -> query($query);
                            $row = $result->fetch_assoc();
                            echo "" . $row['total'] . "";
                        ?>
        </p>
        <a href="encargado/solic_prestamo.php" class="btn btn-outline-danger">Ver requisiciones</a>
      </div>
    </div>
  </div>
  
    </div>
    <div class="row row-cols-1 row-cols-md-2">
    <div class="col mb-4">
    <div class="card text-center shadow p-3 mb-5 bg-white rounded" style="border: none">
      <div class="card-body">
        <h5 class="card-title">Requisiciones con faltantes</h5>
        <p class="card-text" style="font-size: 30px; color: #FD2933; font-weight: bold;">
           <?php
                            $query = "SELECT COUNT(id) as total FROM solicitud WHERE estatus = 'faltantes' ";
                            $result = $con -> query($query);
                            $row = $result->fetch_assoc();
                            echo "" . $row['total'] . "";
                        ?>
        </p>
        <a href="encargado/solic_faltantes.php" class="btn btn-outline-danger">Ver requisiciones</a>
      </div>
    </div>
  </div>
  <div class="col mb-4">
    <div class="card text-center shadow p-3 mb-5 bg-white rounded" style="border: none">
      <div class="card-body">
        <h5 class="card-title">Requisiciones finalizadas</h5>
        <p class="card-text" style="font-size: 30px; color: #FD2933; font-weight: bold;">
            <?php
                            $query = "SELECT COUNT(id) as total FROM solicitud WHERE estatus = 'finalizada' ";
                            $result = $con -> query($query);
                            $row = $result->fetch_assoc();
                            echo "" . $row['total'] . "";
                        ?>
        </p>
        <a href="encargado/solic_finalizadas.php" class="btn btn-outline-danger">Ver requisiciones</a>
      </div>
    </div>
  </div>
  
                        </div>
                    </div>
				</main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">&copy; UTCGG Gastronomía 2024</div>
                            <div>
                                <a href="politica.php">Política de privacidad</a>
                                &middot;
                                <a href="terminos.php">Términos y condiciones</a>
							</div>
						</div>
					</div>
				</footer>
			</div>
		</div>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>

        
	</body>
</html>