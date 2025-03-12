<?php

  if (!isset($_SESSION['ID'])){
    header("Location: ../index.php");
    exit();
  }

  //No tenemos la contraseña o la información del email almacenado en las sesiones,por lo que podemos obtener resultados desde la BD.
  $id = $_SESSION['ID'];
  $sql = "SELECT * FROM usuarios WHERE id = '$id'";

  //En este caso podemos identificar el id de la cuenta para obtener su información.
  $result = $con->query($sql);
  $row = $result->fetch_assoc();
  
?>

<nav class="sb-topnav navbar navbar-expand navbar-dark" id="nav">
            
            <a class="navbar-brand" href="../home.php">
               
    
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

                        <form action="cambiar_password.php" method="POST">
    <input type="hidden" name="id" value="<?php echo $row['id'];?>">
    <a class="dropdown-item"><button type="submit" class="dropdown-item" style="margin: 0;padding: 0;"><i class="fa-solid fa-lock"></i> Cambiar contraseña</button></a>

</form>





                        
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="../logout.php"><i class="fa-solid fa-right-from-bracket"></i> Cerrar sesión</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" target="_blank" href="../manual_de_usuario.pdf"><i class="fa-solid fa-circle-info"></i> Ayuda</a>
                    </div>
                </li>
            </ul>
        </nav>

        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion" style="background-image: url('../img/fondo-menu.jpg');background-repeat: no-repeat;background-size: cover;background-position: center center;margin: 0px;position: relative;">
                    <div class="sb-sidenav-menu">
                        <div class="container" id="container-img">
                        <img src="../img/img_inicio_2.png" alt="utensilios" id="img-utensilios">

                        </div>

                        <div class="nav" >
                            <div class="container" id="container-usr">
                            <p style="color: #fff"><b><?php echo strtoupper($tipo_usuario) ?></b>
                            <br>
                            <?php echo $nombre ?></p>
                            
                            </div>
                        
                            <a class="nav-link" href="../home.php" id="nav-link">

                                <div class="sb-nav-link-icon"><i class="fa-solid fa-house"></i></div>Inicio


                            </a>
                                                       
                                
                                <a class="nav-link" href="encargados.php" id="nav-link">
                                    <div class="sb-nav-link-icon"><i class="fa-solid fa-user" style="color: #ffffff;"></i> </div>
                                    Encargados&nbsp;&nbsp;
                                            <span class="badge badge-pill badge-danger">
                                                <?php
                            $query = "SELECT COUNT(id) as total FROM usuarios WHERE role = 'encargado' AND activo=1";
                            $result = $con -> query($query);
                            $row = $result->fetch_assoc();
                            echo "" . $row['total'] . "";
                        ?>
                                            </span></a>

                                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayoutsGrupos" aria-expanded="false" aria-controls="collapseLayouts" id="nav-link">
                                    <div class="sb-nav-link-icon"><i class="fa-solid fa-graduation-cap" style="color: #ffffff;"></i></div>
                                    Datos académicos
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
                                    ></a>
                                    <div class="collapse" id="collapseLayoutsGrupos" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="grupos.php">Grupos&nbsp;&nbsp;
                                            <span class="badge badge-pill badge-danger">
                                                <?php
                            $query = "SELECT COUNT(id_grupo) as total FROM grupo WHERE estatus = 1";
                            $result = $con -> query($query);
                            $row = $result->fetch_assoc();
                            echo "" . $row['total'] . "";
                        ?>
                                            </span></a>
                                            <a class="nav-link" href="profesores.php">Profesores&nbsp;&nbsp;
                                            <span class="badge badge-pill badge-danger">
                                                <?php
                            $query = "SELECT COUNT(id_profesor) as total FROM profesores WHERE activo = 1 "; 
                            $result = $con -> query($query);
                            $row = $result->fetch_assoc();
                            echo "" . $row['total'] . "";
                        ?>
                                            </span></a>
                                            <a class="nav-link" href="materias.php">Materias&nbsp;&nbsp;
                                            <span class="badge badge-pill badge-danger">
                                                <?php
                            $query = "SELECT COUNT(id_materia) as total FROM materias WHERE activo = 1 ";

                            $result = $con -> query($query);
                            $row = $result->fetch_assoc();
                            echo "" . $row['total'] . "";
                        ?>
                                            </span></a>
                                            </div>

                                            
                                <a class="nav-link" href="alumnos.php" id="nav-link">
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

                                <a class="nav-link" href="solicitudes.php" id="nav-link">
                                    <div class="sb-nav-link-icon"><i class="fa-solid fa-clock-rotate-left" style="color: #ffffff;"></i> </div>
                                    Historial de requisiciones&nbsp;&nbsp;
                                            <span class="badge badge-pill badge-danger">
                                                <?php
                            $query = "SELECT COUNT(id) as total FROM solicitud";
                            $result = $con -> query($query);
                            $row = $result->fetch_assoc();
                            echo "" . $row['total'] . "";
                        ?>
                                            </span></a>
                                            
                                <a class="nav-link" href="materiales.php" id="nav-link">
                                    <div class="sb-nav-link-icon"><i class="fa-solid fa-utensils" style="color: #ffffff;"></i></div>
                                    Materiales&nbsp;&nbsp;
                                            <span class="badge badge-pill badge-danger">
                                                 <?php
                            $query = "SELECT COUNT(id_articulo) as total FROM articulos WHERE estatus ='activo'";
                            $result = $con -> query($query);
                            $row = $result->fetch_assoc();
                            echo "" . $row['total'] . "";
                        ?>
                                            </span></a>
                                    
                                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts" id="nav-link">
                                    <div class="sb-nav-link-icon"><i class="fa-solid fa-store" style="color: #ffffff;"></i></div>
                                    Inventarios
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
                                    ></a>
                                    <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="inv_actual.php">Actual&nbsp;&nbsp;
                                            <span class="badge badge-pill badge-danger">
                                                <?php
                            $query = "SELECT COUNT(id_articulo) as total FROM articulos WHERE estatus ='activo'";
                            $result = $con -> query($query);
                            $row = $result->fetch_assoc();
                            echo "" . $row['total'] . "";
                        ?>
                                            </span></a>
                                            <a class="nav-link" href="inv_donado.php">Material donado&nbsp;&nbsp;
                                            <span class="badge badge-pill badge-danger">
                                                <?php
                            $query = "SELECT COUNT(id_articulo) as total FROM articulos INNER JOIN articulos_donados ON articulos.id_articulo = articulos_donados.articulo_donado WHERE articulos.estatus = 'activo' ";
                            $result = $con -> query($query);
                            $row = $result->fetch_assoc();
                            echo "" . $row['total'] . "";
                        ?>
                                            </span></a>
                                            <a class="nav-link" href="inv_perdido.php">Material perdido&nbsp;&nbsp;
                                            <span class="badge badge-pill badge-danger">
                                                <?php
                            $query = "SELECT COUNT(id_articulo) as total FROM articulos INNER JOIN articulos_perdidos ON articulos.id_articulo = articulos_perdidos.articulo_perdido WHERE articulos.estatus = 'activo'";
                            $result = $con -> query($query);
                            $row = $result->fetch_assoc();
                            echo "" . $row['total'] . "";
                        ?>
                                            </span></a>
                                            <a class="nav-link" href="inv_danado.php">Material dañado&nbsp;&nbsp;
                                            <span class="badge badge-pill badge-danger">
                                                <?php
                            $query = "SELECT COUNT(id_articulo) as total FROM articulos INNER JOIN articulos_danados ON articulos.id_articulo = articulos_danados.articulo_danado WHERE articulos.estatus = 'activo'";
                            $result = $con -> query($query);
                            $row = $result->fetch_assoc();
                            echo "" . $row['total'] . "";
                        ?>
                                            </span></a>
                                            <a class="nav-link" href="inv_equipo.php">Equipo&nbsp;&nbsp;
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
                                            <a class="nav-link" href="inv_mantenimiento.php">Mantenimiento / Reparación&nbsp;&nbsp;
                                            <span class="badge badge-pill badge-danger">
                                                <?php
                            $query = "SELECT COUNT(id_articulo) as total FROM articulos_reparacion INNER JOIN articulos ON articulos_reparacion.articulo_reparacion = articulos.id_articulo WHERE articulos.estatus ='activo' ";
                            $result = $con -> query($query);
                            $row = $result->fetch_assoc();
                            echo "" . $row['total'] . "";
                        ?>
                                            </span></a>
                                            <a class="nav-link" href="inv_eliminado.php">Baja de material&nbsp;&nbsp;
                                            <span class="badge badge-pill badge-danger">
                                                <?php
                           $query = "SELECT COUNT(id_articulo) as total FROM articulos INNER JOIN articulos_eliminados ON articulos.id_articulo = articulos_eliminados.articulo_eliminado ";
                            $result = $con -> query($query);
                            $row = $result->fetch_assoc();
                            echo "" . $row['total'] . "";
                        ?>
                                            </span></a>
                                        </nav>
                                    </div>
                                    <a class="nav-link" href="reportes.php" id="nav-link">
                                    <div class="sb-nav-link-icon"><i class="fa-solid fa-file" style="color: #ffffff;"></i> </div>
                                    Reportes&nbsp;&nbsp;</a>
 
                            </div>
                    </div>
                    
                </nav>
      </div>
