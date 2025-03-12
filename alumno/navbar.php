<style>
   #nav {
  background: #870000;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #190A05, #870000);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #190A05, #870000); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
   }
    
</style>

<div class="sticky-top">
  <nav class="navbar navbar-expand-lg navbar-dark" id="nav">
  <a class="navbar-brand" href="alumno.php">
    <img src="../img/icono.png" width="70" height="70" class="d-inline-block align-center" alt="IoT">
    Gastro-Stock
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
        <a class="nav-link" href="../home.php"><i class="fa-solid fa-house"></i> Inicio<span class="sr-only">(current)</span></a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="historial.php"><i class="fa-solid fa-file-circle-check"></i> Mis requisiciones</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="perfil.php"><i class="fa-solid fa-user"></i> <?php echo $row['nombre'] ?></a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="../logout.php"><i class="fa-solid fa-right-from-bracket"></i> Cerrar sesión</a>
      </li>

      <li class="nav-item">
      <a class="nav-link" target="_blank" href="../manual_de_usuario.pdf"><i class="fa-solid fa-circle-info"></i> </a>
      </li>
    </ul>

  </div>
</nav>
</div>