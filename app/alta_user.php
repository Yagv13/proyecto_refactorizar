<?php include __DIR__ . '/../db.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Globxel | Nuevo usuario</title>
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



</head>

<body>
    <div class="wrapper sidebar_minimize">
        <?php include 'sidebar.php'; ?>
        <div class="main-panel">
            <?php include 'navbar.php'; ?>
            <div class="container">
                <div class="page-inner">
                    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
                        <h3 class="fw-bold mb-3">Usuarios</h3>
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
                                <a href="users.php">Usuarios</a>
                            </li>
                            <li class="separator">
                                <i class="icon-arrow-right"></i>
                            </li>
                            <li class="nav-item">
                                <a href="#">Agregar usuario</a>
                            </li>
                        </ul>
                    </div>

                    <div id="form-disc" class="container-sm w-50 p-5 mt-5 bg-white rounded shadow">
                        <form id="formUser" class="d-flex flex-column gap-3">

                            <div class="row">
                                <div class="col">
                                    <label for="nombre" class="form-label">Nombre</label>
                                    <input type="text" id="nombre" class="form-control bg-body-secondary" name="nombre" placeholder="Nombre" required>
                                </div>
                                <div class="col">
                                    <label for="apellido" class="form-label">Apellido</label>
                                    <input type="text" id="apellido" class="form-control bg-body-secondary" name="apellido" placeholder="Apellido" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" id="email" class="form-control bg-body-secondary" name="email" placeholder="Email" required>
                                </div>
                                <div class="col">
                                    <label for="telefono" class="form-label">Teléfono</label>
                                    <input type="text" id="telefono" class="form-control bg-body-secondary" name="telefono" placeholder="Teléfono" required>
                                </div>
                            </div>

                            <div>
                                <label for="rol" class="form-label">Rol</label>
                                <select id="rol" name="rol" class="form-select bg-body-secondary" required>
                                    <option value="">Seleccione un rol...</option>
                                    <option value="Admin">Admin</option>
                                    <!-- <option value="Leads">Leads</option>
                                        <option value="Products">Products</option> -->
                                </select>
                            </div>

                            <div>
                                <label for="password" class="form-label">Contraseña</label>
                                <input type="password" id="pass" class="form-control bg-body-secondary" name="pass" placeholder="Contraseña" required>
                            </div>

                            <div class="d-flex justify-content-center mt-3">
                                <button type="submit" class="btn btn-primary px-5">Agregar usuario</button>
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
    <script src="assets/js/products.js"></script>
    <script src="assets/js/users.js"></script>

</body>

</html>