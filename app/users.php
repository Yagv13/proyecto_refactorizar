<?php include 'check_session.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Globxel | Usuarios</title>
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
                                <a href="#">Usuarios</a>
                            </li>

                        </ul>
                    </div>

                    <div id="prod">
                        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
                            <div class="ms-md-auto py-2 py-md-0">
                                <a href="alta_user.php" class="btn btn-primary btn-round">
                                    <i class="fas fa-plus"></i> Agregar nuevo Usuario
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="tabla-users" class="display table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th style="width:18%">Nombre</th>
                                            <th style="width:18%">Apellidos</th>
                                            <th style="width:18%">Email</th>
                                            <th style="width:18%">Teléfono</th>
                                            <th style="width:18%">Rol</th>
                                            <th style="width:10%"></th>
                                        </tr>
                                    </thead>
                                    <tbody id="body-users"></tbody>
                                </table>
                            </div>
                        </div>
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
    <script src="assets/js/users.js"></script>



</body>

</html>