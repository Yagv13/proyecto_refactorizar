<?php include 'check_session.php'; ?>
<?php include __DIR__ . '/../db.php';

// Recibir el id por GET
$id = $_GET['id'];

// Consulta para traer los datos del usuario
$stmt = $conn->prepare("SELECT 
nombre, sub_categoria_id, resumen, material, color, precio, descripcion, detalles 
FROM productos 
WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();


// Validar que exista el producto
if ($result->num_rows > 0) {
    $producto = $result->fetch_assoc();
} else {
    echo "Producto no encontrado";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Globxel | Editar producto</title>
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
                                <a href="#">Editar producto</a>
                            </li>
                        </ul>
                    </div>

                    <div id="form-disc" class="container-sm w-50 form-control p-5 mt-5">

                        <?php
                        $imagenes = [];
                        $dir = "../assets/products/$id/";

                        if (is_dir($dir)) {
                            $files = glob($dir . $id . "_*.*");
                            foreach ($files as $file) {
                                $imagenes[] = basename($file);
                            }
                        }
                        ?>


                        <form id="formProduct">
                            <input type="hidden" name="id" value="<?php echo $id; ?>">

                            <div class="mb-3">
                                <input type="text" class="form-control mt-0 p-3 bg-body-secondary" name="nombre" placeholder="Nombre del producto..."
                                    value="<?php echo htmlspecialchars($producto['nombre']); ?>" required>
                            </div>

                            <div class="mb-3">
                                <select class="form-control mt-0 p-3 bg-body-secondary" name="sub_categoria_id" required>
                                    <option value="">Seleccione la subcategoría...</option>

                                    <?php
                                    // id seleccionado en edición
                                    $selected_id = $producto['sub_categoria_id'] ?? '';

                                    // cargar todas las subcategorías
                                    $stmt = $conn->prepare("SELECT id, nombre FROM sub_categorias ORDER BY id ASC");
                                    if ($stmt) {
                                        $stmt->execute();
                                        $result = $stmt->get_result();

                                        while ($sub = $result->fetch_assoc()) {
                                            $selected = ($sub['id'] == $selected_id) ? 'selected' : '';
                                            echo "<option value='{$sub['id']}' $selected>" . htmlspecialchars($sub['nombre']) . "</option>";
                                        }

                                        $stmt->close();
                                    } else {
                                        echo "<option value=''>Error al cargar subcategorías</option>";
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="mb-3">
                                <input type="text" class="form-control mt-0 p-3 bg-body-secondary" name="resumen" placeholder="Ingresa una breve descripcion del producto..."
                                    value="<?php echo htmlspecialchars($producto['resumen']); ?>" required>
                            </div>

                            <div class="d-flex gap-3 mb-3">
                                <input type="text" class="form-control mt-0 p-3 bg-body-secondary" name="material" placeholder="Material"
                                    value="<?php echo htmlspecialchars($producto['material']); ?>" required>
                                <input type="text" class="form-control mt-0 p-3 bg-body-secondary" name="color" placeholder="Color"
                                    value="<?php echo htmlspecialchars($producto['color']); ?>" required>
                                <input type="number" class="form-control mt-0 p-3 bg-body-secondary" name="precio" placeholder="Precio"
                                    value="<?php echo htmlspecialchars($producto['precio']); ?>" required>
                            </div>

                            <div class="mb-3">
                                <textarea class="form-control mt-0 p-3 bg-body-secondary" name="descripcion" placeholder="Ingresa la descripción completa del producto..." required><?php echo htmlspecialchars($producto['descripcion']); ?></textarea>
                            </div>

                            <input type="hidden" id="detalles" name="detalles" rows="4"
                                value="<?php echo htmlspecialchars($producto['detalles']); ?>" required>
                            <div id="editor-container"></div>

                            <label class="my-3">SUBE IMÁGENES PARA EL PRODUCTO</label>
                            <div id="dropzone" class="dropzone"></div>

                            <!-- <h5 class="mt-4">Imágenes actuales</h5>
                            <div id="existingImages" class="d-flex flex-wrap gap-3"></div> -->


                            <div class="d-flex justify-content-center">
                                <img id="vistaPrevia" style="max-width: 50%; margin-top: 20px; border-radius: 15px; box-shadow: 1px 5px 12px #00000054;">
                            </div>

                            <button type="submit" class="btn btn-primary">Guardar edición</button>
                            <button type="button" class="btn btn-danger" onclick="deleteProduct(<?php echo $id; ?>)">Eliminar</button>
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
    <script>
        const existingImages = <?php echo json_encode($imagenes); ?>;
        const productId = <?php echo json_encode($id); ?>;
    </script>
    <script src="assets/js/dropzone.js"></script>
    <script src="assets/js/products.js"></script>




    <script>
        function deleteProduct(id) {
            if (!confirm("¿Seguro que quieres eliminar este producto?")) return;

            fetch('eliminar_product.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: 'id=' + encodeURIComponent(id)
                })
                .then(response => response.text())
                .then(data => {
                    if (data.trim() === 'success') {
                        window.location.href = 'products.php';
                    } else {
                        alert('Error al eliminar el producto: ' + data);
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