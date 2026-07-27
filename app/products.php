<?php include 'check_session.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Globxel | Productos</title>
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

    <!-- DropZone -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.js"></script> -->

    <style>
        .btn-secondary {
            background: #EA4F1B !important;
            border-color: #EA4F1B !important;
        }

        .btn-secondary:disabled,
        .btn-secondary:focus,
        .btn-secondary:hover {
            color: #fff !important;
            background: #FF5E23 !important;
            border-color: #FF5E23 !important;
        }

        /* Previsualizar Imagenes */

        .preview-img {
            width: 50%;
            max-width: 100px;
            height: 6rem;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
            object-fit: cover;
        }

        .preview-container {
            display: flex;
            justify-content: start;
        }
    </style>

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
                                <a href="#">Productos</a>
                            </li>

                        </ul>
                    </div>
                    <div id="prod">

                        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
                            <div class="btn-group">
                                <button class="btn btn-secondary btn-round me-2" data-bs-toggle="modal" data-bs-target="#modalCategoria">
                                    <i class="fas fa-tags"></i> Categoría
                                </button>
                                <button class="btn btn-secondary btn-round" data-bs-toggle="modal" data-bs-target="#modalSubcategoria">
                                    <i class="fas fa-layer-group"></i> Subcategoría
                                </button>
                            </div>

                            <div class="ms-md-auto py-2 py-md-0">
                                <a href="alta_product.php" class="btn btn-primary btn-round">
                                    <i class="fas fa-plus"></i> Agregar nuevo Producto
                                </a>
                            </div>
                        </div>

                        <!-- Lista de productos -->
                        <div class="row" id="productos">
                            <div class="col-12 text-center my-5">
                                <div class="spinner-border text-primary" role="status">
                                    <span class="visually-hidden">Cargando...</span>
                                </div>
                                <p>Cargando...</p>
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

    <!-- Modal Categoría -->
    <div class="modal fade" id="modalCategoria" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Categorías</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <!-- Aquí se listarán las categorías -->
                    <div id="listaCategorias"></div>
                    <div class="text-center mt-3">
                        <button class="btn btn-primary btn-round" id="btnNuevaCategoria">
                            <i class="fas fa-plus"></i> Agregar nueva categoria
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal para agregar nueva Categoría -->
    <div class="modal fade" id="modalNuevaCategoria" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Nueva Categoría</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="formNuevaCategoria" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label>Nombre</label>
                            <input type="text" class="form-control" name="nombre" required>
                        </div>
                        <div class="mb-3">
                            <label>Descripción</label>
                            <textarea class="form-control" name="descripcion"></textarea>
                        </div>

                        <div class="mb-3">
                            <label>Sube una imagen para la portada</label>
                            <input type="file" id="portadaNuevaCat" name="portada" accept="image/*" class="form-control p-3" required>
                            <div class="preview-container mt-2">
                                <img id="previewPortadaNuevaCat" class="preview-img d-none">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label>Sube una imagen para la miniatura</label>
                            <input type="file" id="miniaturaNuevaCat" name="miniatura" accept="image/*" class="form-control p-3" required>
                            <div class="preview-container mt-2">
                                <img id="previewMiniaturaNuevaCat" class="preview-img d-none">
                            </div>
                        </div>

                        <div class="text-end">
                            <button type="submit" class="btn btn-primary">Agregar categoría</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal para editar Categoría -->
    <div class="modal fade" id="modalEditarCategoria" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Editar Categoría</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="formEditarCategoria" enctype="multipart/form-data">
                        <input type="hidden" name="id" id="editCatId">
                        <div class="mb-3">
                            <label>Nombre</label>
                            <input type="text" class="form-control" name="nombre" id="editCatNombre" required>
                        </div>
                        <div class="mb-3">
                            <label>Descripción</label>
                            <textarea class="form-control" name="descripcion" id="editCatDescripcion"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="portadaEditarCategoria" class="my-3">Sube una imagen para la portada</label>
                            <input type="file" id="portadaEditarCat" name="portada" accept="image/*" class="form-control p-3">
                            <div class="preview-container mt-2">
                                <img id="previewPortadaEditarCat" class="preview-img d-none">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="miniaturaEditarCategoria" class="my-3">Sube una imagen para la miniatura</label>
                            <input type="file" id="miniaturaEditarCat" name="miniatura" accept="image/*" class="form-control p-3">
                            <div class="preview-container mt-2">
                                <img id="previewMiniaturaEditarCat" class="preview-img d-none">
                            </div>
                        </div>

                        <div class="d-flex justify-content-between">
                            <button type="button" class="btn btn-danger" id="btnEliminarCategoria">Eliminar</button>
                            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Subcategoría -->
    <div class="modal fade" id="modalSubcategoria" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Subcategorías</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <!-- Aquí se listarán las Subcategoría -->
                    <div id="listaSubcategorias"></div>
                    <div class="text-center mt-3">
                        <button class="btn btn-primary btn-round" id="btnNuevaSubCategoria">
                            <i class="fas fa-plus"></i> Agregar nueva Subcategoría
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <!-- Modal para agregar nueva Subcategoría -->
    <div class="modal fade" id="modalNuevaSubCategoria">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Nueva Subcategoría</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="formNuevaSubCategoria" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label>Categoría</label>
                            <select class="form-control" name="categoria_id" id="categoriaSelectNuevaSub" required>
                                <option value="">Seleccione una categoría</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label>Nombre</label>
                            <input type="text" class="form-control" name="nombre" required>
                        </div>
                        <div class="mb-3">
                            <label>Descripción</label>
                            <textarea class="form-control" name="descripcion"></textarea>
                        </div>

                        <div class="mb-3">
                            <label>Sube una imagen para la portada</label>
                            <input type="file" id="portadaNuevaSub" name="portada" accept="image/*" class="form-control p-3" required>
                            <div class="preview-container mt-2">
                                <img id="previewPortadaNuevaSub" class="preview-img d-none">
                            </div>
                        </div>

                        <div class="text-end">
                            <button type="submit" class="btn btn-primary">Agregar subcategoría</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Editar Subcategoría -->
    <div class="modal fade" id="modalEditarSubCategoria">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Editar Subcategoría</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="formEditarSubcategoria">
                        <input type="hidden" name="id" id="editSubId">
                        <label>Categoría</label>
                        <select class="form-control" name="categoria_id" id="categoriaSelectEditarSub" required>
                            <option value="">Seleccione una categoría</option>
                        </select>
                        <div class="mb-3">
                            <label>Nombre</label>
                            <input type="text" class="form-control" name="nombre" id="editSubNombre" required>
                        </div>
                        <div class="mb-3">
                            <label>Descripción</label>
                            <textarea class="form-control" name="descripcion" id="editSubDescripcion"></textarea>
                        </div>

                        <div class="mb-3">
                            <label>Sube una imagen para la portada</label>
                            <input type="file" id="portadaEditarSub" name="portada" accept="image/*" class="form-control p-3" required>
                            <div class="preview-container mt-2">
                                <img id="previewPortadaEditarSub" class="preview-img d-none">
                            </div>
                        </div>

                        <div class="d-flex justify-content-between">
                            <button type="button" class="btn btn-danger" id="btnEliminarSubcategoria">Eliminar</button>
                            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php include 'scripts.php'; ?>
    <!-- <script src="assets/js/dropzone.js?v=<?php echo time(); ?>"></script> -->
    <script src="assets/js/products.js?v=<?php echo time(); ?>"></script>

    <script>
        /* PREVISUALIZAR IMÁGENES UNIVERSAL */

        function agregarVistaPrevia(inputSelector, previewSelector) {
            $(document).on("change", inputSelector, function() {

                const input = this;
                const preview = $(previewSelector);

                if (input.files && input.files[0]) {
                    const reader = new FileReader();

                    reader.onload = function(e) {
                        preview.attr("src", e.target.result)
                            .removeClass("d-none");
                    };

                    reader.readAsDataURL(input.files[0]);
                } else {
                    preview.addClass("d-none").attr("src", "");
                }
            });
        }

        /* ASOCIAR CADA INPUT */

        // Categorías
        agregarVistaPrevia("#portadaNuevaCat", "#previewPortadaNuevaCat");
        agregarVistaPrevia("#miniaturaNuevaCat", "#previewMiniaturaNuevaCat");

        agregarVistaPrevia("#portadaEditarCat", "#previewPortadaEditarCat");
        agregarVistaPrevia("#miniaturaEditarCat", "#previewMiniaturaEditarCat");

        // Subcategorías
        agregarVistaPrevia("#portadaNuevaSub", "#previewPortadaNuevaSub");
        agregarVistaPrevia("#portadaEditarSub", "#previewPortadaEditarSub");
    </script>
</body>

</html>