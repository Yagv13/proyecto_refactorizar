<?php
// Desactivar caché completamente
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
?>

<?php
// Detectar página actual
$archivo = basename($_SERVER['PHP_SELF']);
?>

<header class="header global-container" style="padding-block: 15px;" data-header>
  <div class="container">

    <a href="index.php" class="logo logo-header">
      <img src="./assets/images/logos/logo_principal.svg" width="136" height="46" alt="">
    </a>

    <nav class="navbar" data-navbar>

      <div class="navbar-top">

        <a href="index.php" class="logo">
          <img src="./assets/images/logos/logo_principal.svg" width="136" height="46" alt="">
        </a>

        <button class="nav-close-btn" aria-label="clsoe menu" data-nav-toggler>
          <ion-icon name="close-outline" aria-hidden="true"></ion-icon>
        </button>

      </div>

      <ul class="navbar-list">

        <li class="navbar-item">
          <a href="index.php"
            class="navbar-link title-md <?= $archivo === 'index.php' ? 'current-tab' : '' ?>">
            INICIO
          </a>
        </li>

        <li class="navbar-item">
          <a href="nosotros.php"
            class="navbar-link title-md <?= $archivo === 'nosotros.php' ? 'current-tab' : '' ?>">
            NOSOTROS
          </a>
        </li>

        <li class="navbar-item">
          <!-- Caso especial: solo es ancla cuando estás en index -->
          <?php if ($archivo === 'index.php'): ?>
            <a href="#servicios" class="navbar-link title-md">SERVICIOS</a>
          <?php else: ?>
            <a href="index.php#servicios"
              class="navbar-link title-md <?= $archivo === 'servicios.php' ? 'current-tab' : '' ?>">
              SERVICIOS
            </a>
          <?php endif; ?>
        </li>

        <li class="navbar-item">
          <a href="catalogo.php"
            class="navbar-link title-md <?= $archivo === 'catalogo.php' ? 'current-tab' : '' ?>">
            CATÁLOGO
          </a>
        </li>

        <li class="navbar-item">
          <a href="contacto.php"
            class="navbar-link title-md <?= $archivo === 'contacto.php' ? 'current-tab' : '' ?>">
            CONTACTO
          </a>
        </li>

      </ul>

      <ul class="social-list">

        <li>
          <a href="#" class="social-link">
            <ion-icon name="logo-twitter"></ion-icon>
          </a>
        </li>

        <li>
          <a href="#" class="social-link">
            <ion-icon name="logo-facebook"></ion-icon>
          </a>
        </li>

        <li>
          <a href="#" class="social-link">
            <ion-icon name="logo-pinterest"></ion-icon>
          </a>
        </li>

        <li>
          <a href="#" class="social-link">
            <ion-icon name="logo-instagram"></ion-icon>
          </a>
        </li>

        <li>
          <a href="#" class="social-link">
            <ion-icon name="logo-youtube"></ion-icon>
          </a>
        </li>

      </ul>

    </nav>

    <button class="nav-open-btn" aria-label="open menu" data-nav-toggler>
      <ion-icon name="menu-outline"></ion-icon>
    </button>

    <div class="overlay" data-nav-toggler data-overlay></div>

  </div>
</header>