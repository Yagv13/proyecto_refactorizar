$(document).ready(function () {
    cargarProductos();

    // Cargar categorías al abrir modal
    $('#modalCategoria').on('show.bs.modal', function () {
        $.getJSON('get_categorias.php', function (data) {
            if (!data.categorias || data.categorias.length === 0) {
                $('#listaCategorias').html('<div class="alert alert-info">No hay categorías disponibles</div>');
                return;
            }

            let html = '<table class="table table-striped">';
            html += '<thead><tr><th>Nombre</th><th>Descripción</th><th></th></tr></thead><tbody>';

            data.categorias.forEach(function (cat) {
                html += `<tr>
                        <td>${cat.nombre}</td>
                        <td>${cat.descripcion}</td>
                        <td>
                            <button class="btn btn-info btn-sm btn-editar-categoria"
                                data-id="${cat.id}"
                                data-nombre="${cat.nombre}"
                                data-descripcion="${cat.descripcion}"
                                data-portada="${cat.portada ?? ''}"
                                data-miniatura="${cat.miniatura ?? ''}">
                                Editar
                            </button>
                        </td>
                     </tr>`;
            });

            html += '</tbody></table>';
            $('#listaCategorias').html(html);

        });
    });

    //Editar categoría
    function editarCategoria(id, nombre, descripcion, portada, miniatura) {
        id = parseInt(id);


        $('#editCatId').val(id);
        $('#editCatNombre').val(nombre);
        $('#editCatDescripcion').val(descripcion);

        const base = `/globxel/assets/categorias/${id}/`;

        // Mostrar portada
        if (portada) {
            $("#previewPortadaEditarCat")
                .attr("src", base + portada)
                .removeClass("d-none");
        }

        // Mostrar miniatura
        if (miniatura) {
            $("#previewMiniaturaEditarCat")
                .attr("src", base + miniatura)
                .removeClass("d-none");
        }

        $('#modalCategoria').modal('hide');
        $('#modalEditarCategoria').modal('show');
    }

    // Cargar subcategorías al abrir modal
    $('#modalSubcategoria').on('show.bs.modal', function () {
        $.getJSON('get_subcategorias.php', function (data) {
            if (!data.subcategorias || data.subcategorias.length === 0) {
                $('#listaSubcategorias').html('<div class="alert alert-info">No hay subcategorías disponibles</div>');
                return;
            }

            let html = '<table class="table table-striped">';
            html += '<thead><tr><th>Categoría</th><th>Nombre</th><th>Descripción</th><th>Activo</th></tr></thead><tbody>';

            data.subcategorias.forEach(function (sub) {
                html += `<tr>
                        <td>${sub.categoria_nombre}</td>
                        <td>${sub.nombre}</td>
                        <td>${sub.descripcion}</td>
                        <td>
                            <button class="btn btn-info btn-sm btn-editar-subcategoria"
                                data-id="${sub.id}"
                                data-nombre="${sub.nombre}"
                                data-descripcion="${sub.descripcion}"
                                data-categoria="${sub.categoria_id}"
                                data-portada="${sub.portada ?? ''}">
                                Editar
                            </button>
                        </td>
                     </tr>`;
            });

            html += '</tbody></table>';
            $('#listaSubcategorias').html(html);

        });
    });

    //Event listener para botones de editar categoría
    $(document).on('click', '.btn-editar-categoria', function () {
        /* console.log("= = = DATOS DEL BOTÓN EDITAR CATEGORÍA = = =");
        console.log("ID:", $(this).data('id'));
        console.log("Nombre:", $(this).data('nombre'));
        console.log("Descripción:", $(this).data('descripcion'));
        console.log("Portada:", $(this).data('portada'));
        console.log("Miniatura:", $(this).data('miniatura')); */

        const id = parseInt($(this).data('id'));
        const nombre = $(this).data('nombre');
        const descripcion = $(this).data('descripcion');
        const portada = $(this).data('portada');
        const miniatura = $(this).data('miniatura');

        /* console.log('Id convertido:', id, 'Tipo:', typeof id); */

        editarCategoria(id, nombre, descripcion, portada, miniatura);
    });

    //Editar subcategoría
    function editarSubCategoria(id, nombre, descripcion, categoria_id, portada) {

        $('#editSubId').val(id);
        $('#editSubNombre').val(nombre);
        $('#editSubDescripcion').val(descripcion);

        const base = `/globxel/assets/subcategorias/${id}/`;

        if (portada) {
            $("#previewPortadaEditarSub")
                .attr("src", base + portada)
                .removeClass("d-none");
        }

        // Cargar categorías en el select
        $.getJSON('get_categorias.php', function (data) {

            let select = $('#categoriaSelectEditarSub');
            select.empty();
            select.append('<option value="">Seleccione una categoría</option>');

            data.categorias.forEach(function (cat) {
                let selected = (cat.id == categoria_id) ? 'selected' : '';
                select.append(`<option value="${cat.id}" ${selected}>${cat.nombre}</option>`);
            });

            $('#modalSubcategoria').modal('hide');
            $('#modalEditarSubCategoria').modal('show');
        });
    }


    /* Categorias */

    //Botón para guardar categoría
    $('#btnNuevaCategoria').click(function () {
        $('#modalCategoria').modal('hide');
        $('#modalNuevaCategoria').modal('show');
    });

    // Guardar nueva categoría
    $('#formNuevaCategoria').submit(function (e) {
        e.preventDefault();

        let formData = new FormData(this);

        $.ajax({
            url: 'procesar_categoria.php',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            dataType: 'json',
            success: function (response) {
                if (response.success) {
                    alert(response.message);
                    $('#modalNuevaCategoria').modal('hide');
                    $('#modalCategoria').modal('show');
                } else {
                    alert("Error: " + response.message);
                }
            }
        });

    });

    // Guardar edición categoría
    $('#formEditarCategoria').submit(function (e) {
        e.preventDefault();

        let formData = new FormData(this);

        $.ajax({
            url: 'procesar_categoria.php',
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function (response) {
                if (response.success) {
                    alert(response.message);
                    $('#modalEditarCategoria').modal('hide');
                    $('#modalCategoria').modal('show');
                } else {
                    alert("Error: " + response.message);
                }
            }
        });
    });

    // Eliminar categoría
    $('#btnEliminarCategoria').click(function () {
        const id = $('#editCatId').val();
        /* console.log('ELIMINAR - ID obtenido:', id, 'Tipo:', typeof id); */

        if (confirm('¿Estas seguro de eliminar esta categoría?')) {
            /* console.log('Enviando eliminación con id:', id); */

            $.ajax({
                url: "eliminar_categoria.php",
                type: "POST",
                data: { id },
                dataType: "json",
                success: function (response) {
                    if (response.success) {
                        alert("Categoría eliminada");
                        cargarProductos();
                        $('#modalEditarCategoria').modal('hide');
                        $('#modalCategoria').modal('show');
                    } else {
                        alert("Error: " + response.message);
                    }
                }
            });

        }
    });

    /* SubCategorias */

    //Botón para guardar subcategoría
    $(document).on('click', '#btnNuevaSubCategoria', function () {
        /* console.log("Click detectado correctamente"); */
        $('#modalSubcategoria').modal('hide');
        $('#modalNuevaSubCategoria').modal('show');
    });

    // Guardar nueva Subcategoría
    $('#formNuevaSubCategoria').submit(function (e) {
        e.preventDefault();
        /* console.log("SUBMIT NUEVA SUBCATEGORÍA DETECTADO"); */

        let formData = new FormData(this);

        $.ajax({
            url: 'procesar_subcategoria.php',
            type: 'POST',
            data: formData,
            contentType: false,   // NECESARIO para enviar archivos
            processData: false,   // NECESARIO para enviar archivos
            dataType: 'json',
            success: function (response) {
                if (response.success) {
                    alert(response.message);
                    $('#modalNuevaSubCategoria').modal('hide');
                    $('#modalSubcategoria').modal('show');

                    if (typeof cargarSubcategorias === "function") {
                        cargarSubcategorias();
                    }
                } else {
                    alert("Error: " + response.message);
                }
            }
        });
    });

    // Guardar edición
    $('#formEditarSubcategoria').submit(function (e) {
        e.preventDefault();
        /* console.log("SUBMIT EDITAR SUBCATEGORÍA DETECTADO"); */

        let formData = new FormData(this);

        $.ajax({
            url: 'procesar_subcategoria.php',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            dataType: 'json',
            success: function (response) {
                if (response.success) {
                    alert(response.message);
                    $('#modalEditarSubCategoria').modal('hide');
                    $('#modalSubcategoria').modal('show');

                    if (typeof cargarSubcategorias === "function") {
                        cargarSubcategorias();
                    }
                } else {
                    alert("Error: " + response.message);
                }
            }
        });

    });

    // Eliminar Subcategoría
    $('#btnEliminarSubcategoria').click(function () {
        const id = $('#editSubId').val();
        /*  console.log('ELIMINAR - ID obtenido:', id, 'Tipo:', typeof id); */

        if (confirm('¿Estas seguro de eliminar esta subcategoría?')) {

            $.ajax({
                url: "eliminar_subcategoria.php",
                type: "POST",
                data: { id },
                dataType: "json",
                success: function (response) {
                    if (response.success) {
                        alert("Subcategoría eliminada");

                        if (typeof cargarSubcategorias === "function") {
                            cargarSubcategorias();
                        }

                        $('#modalEditarSubCategoria').modal('hide');
                        $('#modalSubcategoria').modal('show');
                    } else {
                        alert("Error: " + response.message);
                    }
                }
            });
        }
    });

    // Cargar categorias en modal subcategorias

    $('#modalNuevaSubCategoria').on('show.bs.modal', function () {
        $.getJSON('get_categorias.php', function (data) {

            let select = $('#categoriaSelectNuevaSub');
            select.empty();
            select.append('<option value="">Seleccione una categoría</option>');

            data.categorias.forEach(function (cat) {
                select.append(`<option value="${cat.id}">${cat.nombre}</option>`);
            });

        });
    });

    //Event listener para botones de editar categoría
    $(document).on('click', '.btn-editar-subcategoria', function () {
        const id = $(this).data('id');
        const nombre = $(this).data('nombre');
        const descripcion = $(this).data('descripcion');
        const categoria_id = $(this).data('categoria');
        const portada = $(this).data('portada');

        editarSubCategoria(id, nombre, descripcion, categoria_id, portada);
    });


    function mostrarVistaPrevia(event) {
        const img = document.getElementById('vistaPrevia');
        img.src = URL.createObjectURL(event.target.files[0]);
    }
    var toolbarOptions = [
        ['bold', 'italic', 'underline', 'strike'], // toggled buttons
        ['blockquote', 'code-block'],
        ['link', 'formula'],

        [{
            'header': 1
        }, {
            'header': 2
        }], // custom button values
        [{
            'list': 'ordered'
        }, {
            'list': 'bullet'
        }, {
            'list': 'check'
        }],
        [{
            'script': 'sub'
        }, {
            'script': 'super'
        }], // superscript/subscript
        [{
            'indent': '-1'
        }, {
            'indent': '+1'
        }], // outdent/indent
        [{
            'direction': 'rtl'
        }], // text direction

        [{
            'size': ['small', false, 'large', 'huge']
        }], // custom dropdown
        [{
            'header': [1, 2, 3, 4, 5, 6, false]
        }],

        [{
            'color': []
        }, {
            'background': []
        }], // dropdown with defaults from theme
        [{
            'font': []
        }],
        [{
            'align': []
        }],

        ['clean'] // remove formatting button
    ];

    if (document.getElementById('editor-container')) {

        var quill1 = new Quill('#editor-container', {
            placeholder: 'Detalles del Producto...',
            theme: 'snow',
            modules: {
                toolbar: toolbarOptions
            },
        });

        // Actualizar input oculto cuando el usuario escribe
        quill1.on('text-change', function () {
            document.querySelector('#detalles').value = quill1.root.innerHTML;
        });

        // CARGAR TEXTO EXISTENTE (EDICIÓN) 
        const contenidoExistente = document.querySelector('#detalles').value;

        if (contenidoExistente && contenidoExistente.trim() !== "") {
            quill1.root.innerHTML = contenidoExistente;
        }
    }



});

// Función para cargar los productos en el Front

function cargarProductos() {

    $.ajax({
        url: 'get_products.php',
        type: 'GET',
        dataType: 'json',

        success: function (response) {

            if (response.error) {
                $('#productos').html(`
                    <div class="col-12">
                        <div class="alert alert-danger">${response.message}</div>
                    </div>
                `);
                return;
            }

            if (response.products.length === 0) {
                $('#productos').html(`
                    <div class="col-12">
                        <div class="alert alert-info">No hay productos disponibles</div>
                    </div>
                `);
                return;
            }

            let productsHTML = '';

            response.products.forEach(product => {

                productsHTML += `
                <div class="col-md-4 mb-4">
                    <div class="card h-100">

                        <img src="${product.imagen}"
                             class="card-img-top"
                             alt="${product.nombre}"
                             style="height: 250px; object-fit: cover;">

                        <div class="card-body text-center">
                            <h5 class="card-title fw-bold fs-3 text-danger">${product.nombre}</h5>
                            <p class="card-text desc mb-3">${product.resumen}</p>
                            <div class="text-muted small">$${product.precio}</div>
                        </div>

                        <div class="card-footer bg-transparent">
                            <a href="editar_product.php?id=${product.id}"
                               class="btn btn-primary w-100">
                               Editar
                            </a>
                        </div>

                    </div>
                </div>`;
            });

            $('#productos').html(productsHTML);
        },

        error: function () {
            $('#productos').html(`
                <div class="col-12">
                    <div class="alert alert-danger">Error al cargar los productos</div>
                </div>
            `);
        }
    });

}
