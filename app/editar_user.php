<?php include 'check_session.php'; ?>
<?php include __DIR__ . '/../db.php';

// Recibir el id por GET
$id = $_GET['id'];

// Consulta para traer los datos del usuario
$stmt = $conn->prepare("SELECT nombre, apellido, email, telefono, rol, pass FROM usuarios WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

// Validar que exista el usuario
if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
} else {
    echo "Usuario no encontrado";
    exit;
}
?>

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
                                <a href="#">Editar usuario</a>
                            </li>
                        </ul>
                    </div>

                    <div id="form-disc" class="container-sm w-50 p-5 mt-5 bg-white rounded shadow">
                        <form id="formUser" class="d-flex flex-column gap-3">

                            <input type="hidden" name="id" value="<?php echo $id; ?>">

                            <div class="row">
                                <div class="col">
                                    <label for="nombre" class="form-label">Nombre</label>
                                    <input type="text" class="form-control mt-0 p-2 bg-body-secondary" id="nombre" name="nombre" placeholder="Nombre"
                                        value="<?php echo htmlspecialchars($user['nombre']); ?>" required>
                                </div>
                                <div class="col">
                                    <label for="apellido" class="form-label">Apellido</label>
                                    <input type="text" class="form-control mt-0 p-2 bg-body-secondary" id="apellido" name="apellido" placeholder="Apellido"
                                        value="<?php echo htmlspecialchars($user['apellido']); ?>" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="text" class="form-control mt-0 p-2 bg-body-secondary" id="email" name="email" placeholder="Email"
                                        value="<?php echo htmlspecialchars($user['email']); ?>" required>
                                </div>
                                <div class="col">
                                    <label for="telefono" class="form-label">Teléfono</label>
                                    <input type="text" class="form-control mt-0 p-2 bg-body-secondary" id="telefono" name="telefono" placeholder="Telefono"
                                        value="<?php echo htmlspecialchars($user['telefono']); ?>" required>
                                </div>
                            </div>

                            <div>
                                <label for="rol" class="form-label">Rol</label>
                                <select id="rol" name="rol" class="form-select bg-body-secondary" required>
                                    <option value="">Seleccione un rol...</option>
                                    <option value="Admin" <?php echo ($user['rol'] === 'Admin') ? 'selected' : ''; ?>>Admin</option>
                                    <!-- <option value="Leads" <?php echo ($user['rol'] === 'Leads') ? 'selected' : ''; ?>>Leads</option>
                                    <option value="Products" <?php echo ($user['rol'] === 'Products') ? 'selected' : ''; ?>>Products</option> -->
                                </select>
                            </div>

                            <div>
                                <label for="password" class="form-label">Contraseña</label>
                                <input type="password" id="pass" class="form-control bg-body-secondary" name="pass"
                                    placeholder="<?php echo !empty($user['pass']) ? '••••••' : 'Contraseña'; ?>">
                                <small class="text-muted">Deja vacío si no deseas cambiar la contraseña</small>
                            </div>

                            <div class="d-flex justify-content gap-3 mt-3">
                                <button type="submit" class="btn btn-primary">Guardar edición</button>
                                <button type="button" class="btn btn-danger" onclick="deleteUser(<?php echo $id; ?>)">Eliminar</button>
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

    <script>
        function deleteUser(id) {
            if (!confirm("¿Seguro que quieres eliminar este usuario?")) return;

            fetch('eliminar_user.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: 'id=' + encodeURIComponent(id)
                })
                .then(response => response.text())
                .then(data => {
                    if (data.trim() === 'success') {
                        window.location.href = 'users.php';
                    } else {
                        alert('Error al eliminar el usuario: ' + data);
                    }
                })
                .catch(error => {
                    console.error('Error en la solicitud:', error);
                    alert('Ocurrió un error al enviar la solicitud.');
                });
        }

        function mostrarVistaPrevia(event) {
            const img = document.getElementById('vistaPrevia');
            img.src = URL.createObjectURL(event.target.files[0]);
        }
    </script>

</body>

</html>