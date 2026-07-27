<?php include 'check_session.php'; ?>
<?php include __DIR__ . '/../db.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <title>Globxel | Nuevo producto</title>
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

  <style>
    #editor-container {
      height: 300px;
      margin-bottom: 20px;
    }
  </style>

  <!-- CSS Files -->
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/plugins.min.css">
  <link rel="stylesheet" href="assets/css/kaiadmin.min.css">

  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link rel="stylesheet" href="assets/css/demo.css">

  <link href="https://cdn.quilljs.com/1.3.7/quill.snow.css" rel="stylesheet">
  <script src="https://cdn.quilljs.com/1.3.7/quill.min.js"></script>

  <!-- DropZone -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.js"></script>

</head>

<body>
  <div class="wrapper sidebar_minimize">
    <?php include 'sidebar.php'; ?>
    <div class="main-panel">
      <?php include 'navbar.php'; ?>
      <div class="container">
        <div class="page-inner">
          <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
            <h3 class="fw-bold mb-3">Productos</h3>
            <ul class="breadcrumbs mb-3">
              <li class="nav-home">
                <a href="index.php">
                  <i class="icon-home"></i>
                </a>
              </li>
              <li class="separator">
                <i class="icon-arrow-right"></i>
              </li>
              <li class="nav-item">
                <a href="products.php">Productos</a>
              </li>
              <li class="separator">
                <i class="icon-arrow-right"></i>
              </li>
              <li class="nav-item">
                <a href="#">Agregar producto</a>
              </li>
            </ul>
          </div>

          <div id="form-disc" class="container-sm w-50 form-control p-5 mt-5">

            <form id="formProduct">

              <div class="mb-3">
                <input type="text" class="form-control mt-0 p-3 bg-body-secondary" name="nombre" placeholder="Nombre del producto..." required>
              </div>

              <div class="mb-3">
                <select class="form-control mt-0 p-3 bg-body-secondary" name="sub_categoria_id" required>
                  <option value="" Selected>Seleccione la subcategoría...</option>
                  <?php
                  $stmt = $conn->prepare("SELECT id, nombre FROM sub_categorias ORDER BY id ASC");
                  if ($stmt) {
                    $stmt->execute();
                    $result = $stmt->get_result();
                    while ($sub = $result->fetch_assoc()) {
                      $selected = ($sub['id'] == ($idsubcategoria ?? "")) ? 'selected' : '';
                      echo "<option value='{$sub['id']}' $selected>{$sub['nombre']}</option>";
                    }
                    $stmt->close();
                  } else {
                    echo "<option value=''>Error al cargar Categorías</option>";
                  }
                  ?>
                </select>
              </div>

              <div class="mb-3">
                <input type="text" class="form-control mt-0 p-3 bg-body-secondary" name="resumen" placeholder="Ingresa una breve descripcion del producto..." required>
              </div>

              <div class="d-flex gap-3 mb-3">
                <input type="text" class="form-control mt-0 p-3 bg-body-secondary" name="material" placeholder="Material">
                <input type="text" class="form-control mt-0 p-3 bg-body-secondary" name="color" placeholder="Color">
                <input type="number" class="form-control mt-0 p-3 bg-body-secondary" name="precio" placeholder="Precio">
              </div>

              <div class="mb-3">
                <textarea class="form-control mt-0 p-3 bg-body-secondary" name="descripcion" placeholder="Ingresa la descripción completa del producto..."></textarea>
              </div>

              <input type="hidden" id="detalles" name="detalles" rows="4" required>
              <div id="editor-container"></div>

              <label class="my-3">SUBE IMÁGENES PARA EL PRODUCTO</label>
              <div id="dropzone" class="dropzone"></div>

              <div class="d-flex justify-content-center">
                <img id="vistaPrevia" style="max-width: 50%; margin-top: 20px; border-radius: 15px; box-shadow: 1px 5px 12px #00000054;">
              </div>

              <div class="d-flex justify-content-center mt-3">
                <button type="submit" class="btn btn-primary px-5">Agregar producto</button>
              </div>
            </form>

          </div>

        </div>
      </div>
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
  <script src="assets/js/dropzone.js"></script>
  <script src="assets/js/products.js"></script>

</body>

</html>