<?php



?>





<style>
  /* Cambiar color de fondo de la barra superior */
  .navbar.navbar-header {
    background-color: #EA4F1B !important;
  }

  .logo-header .logo {
    width: 200px !important;
  }
</style>


<div class="main-header">
  <div class="main-header-logo">
    <!-- Logo Header -->
    <div class="logo-header" data-background-color="dark">
      <a href="index.php" class="logo">
        <img src="../assets/images/logos/logo.svg" alt="navbar brand" class="navbar-brand" height="20">
      </a>

      <div class="nav-toggle">
        <button class="btn btn-toggle toggle-sidebar"><i class="gg-menu-right"></i></button>
        <button class="btn btn-toggle sidenav-toggler"><i class="gg-menu-left"></i></button>
      </div>
      <button class="topbar-toggler more"><i class="gg-more-vertical-alt"></i></button>
    </div>
    <!-- End Logo Header -->
  </div>

  <!-- Navbar Header -->
  <nav class="navbar navbar-header navbar-header-transparent navbar-expand-lg border-bottom">
    <div class="container-fluid">
      <nav class="navbar navbar-header-left navbar-expand-lg navbar-form nav-search p-0 d-none d-lg-flex">
        <!-- Aquí puedes poner buscador o botones -->
      </nav>

      <ul class="navbar-nav topbar-nav ms-md-auto align-items-center">
        <li class="nav-item topbar-icon dropdown hidden-caret">
          <a class="nav-link dropdown-toggle" href="#" id="notifDropdown" role="button"
            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-bell"></i>
            <span class="notification">1</span>
          </a>
          <ul class="dropdown-menu notif-box animated fadeIn" aria-labelledby="notifDropdown">
            <li>
              <div class="dropdown-title">Tienes nuevas notificaciones</div>
            </li>
          </ul>
        </li>
        <li class="nav-item topbar-user dropdown hidden-caret">
          <a class="dropdown-toggle profile-pic" data-bs-toggle="dropdown" href="#" aria-expanded="false">
            <div class="avatar-sm">
              <img src="assets/img/profile.jpg" alt="..." class="avatar-img rounded-circle">
            </div>
            <span class="profile-username">
              <span class="op-7">Hola,</span> <span class="fw-bold"><?php echo $_SESSION['nombre']; ?></span>
            </span>
          </a>
          <ul class="dropdown-menu dropdown-user animated fadeIn">
            <li><a class="dropdown-item" href="logout.php">Cerrar sesión</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>
  <!-- End Navbar -->
</div>