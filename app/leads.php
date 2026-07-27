<?php include 'check_session.php'; ?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <title>Globxel | Contacto</title>
  <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
  <link rel="shortcut icon" href="../assets/images/logos/isotipo_1.svg" type="image/svg+xml">

  <!-- Fonts and icons -->
  <script src="assets/js/plugin/webfont/webfont.min.js"></script>
  <script>
    WebFont.load({
      google: {
        "families": ["Public Sans:300,400,500,600,700"]
      },
      custom: {
        "families": ["Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"],
        urls: ['assets/css/fonts.min.css']
      },
      active: function() {
        sessionStorage.fonts = true;
      }
    });
  </script>

  <!-- CSS Files -->
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/plugins.min.css">
  <link rel="stylesheet" href="assets/css/kaiadmin.min.css">

  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link rel="stylesheet" href="assets/css/demo.css">
</head>

<body>
  <div class="wrapper sidebar_minimize">
    <?php include 'sidebar.php'; ?>
    <div class="main-panel">
      <?php include 'navbar.php'; ?>

      <div class="container">
        <div class="page-inner">
          <h3 class="fw-bold mb-3">Leads</h3>
          <div class="card">
            <div class="card-body">
              <div class="table-responsive">
                <table id="tabla-leads" class="display table table-striped table-hover">
                  <thead>
                    <tr>
                      <th style="width:23%">Nombre</th>
                      <th style="width:23%">Empresa</th>
                      <th style="width:22%">Email</th>
                      <th style="width:22%">Teléfono</th>
                      <th style="width:10%">Mensaje</th>
                    </tr>
                  </thead>
                  <tbody id="body-leads"></tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="modal fade" id="modalMensaje" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Mensaje</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body" id="mensajeContenido"></div>
          </div>
        </div>
      </div>

      <!-- Footer -->
      <footer class="footer">
        <div class="container-fluid">
          <div class="copyright ms-auto">
            2025, Powered by <a href="http://www.nexxu.mx">Nexxu Mx</a>
          </div>
        </div>
      </footer>

    </div>
  </div>

  <?php include 'scripts.php'; ?>
  <script src="assets/js/leads.js"></script>



</body>

</html>