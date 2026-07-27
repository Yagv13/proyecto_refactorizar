"use strict";

/* OBTENER CATEGORÍAS */
async function getCategories() {
    const categoriaSelect = document.querySelector(".categoria-select");
    try {
        const response = await fetch("./php-fetching/get_categorias.php");
        const data = await response.json();

        data.categorias.forEach(cat => {
            const option = document.createElement("option");
            option.text = cat.nombre;
            option.value = cat.id;
            categoriaSelect.appendChild(option);
        });

    } catch (e) {
        console.error("❌ Error cargando categorías:", e);
    }
}

/* OBTENER SUBCATEGORÍAS */
async function getSubcategories(categoriaID) {
    const subcategoriaSelect = document.querySelector(".subcategoria-select");
    try {
        const response = await fetch(`./php-fetching/get_subcategorias.php?categoria=${categoriaID}`);
        const data = await response.json();

        subcategoriaSelect.innerHTML = `
            <option value="" disabled selected hidden>Tipo</option>
        `;

        data.subcategorias.forEach(sub => {
            const option = document.createElement("option");
            option.text = sub.nombre;
            option.value = sub.id;
            subcategoriaSelect.appendChild(option);
        });

    } catch (e) {
        console.error("❌ Error cargando subcategorías:", e);
    }
}

/*  CARGAR PRODUCTOS DINÁMICOS */
async function cargarProductos(page = 1) {
    const contenedor = document.querySelector(".rendering-products-section");
    contenedor.innerHTML = "<p class='text-center col-span-3 text-4xl'>Cargando...</p>";
    const categoria = document.querySelector(".categoria-select").value;
    const subcategoria = document.querySelector(".subcategoria-select").value;

    let url = `./php-fetching/get_full_products_catalogo.php?page=${page}&per_page=9`;

    if (categoria !== "") url += `&categoria=${categoria}`;
    if (subcategoria !== "") url += `&subcategoria=${subcategoria}`;

    try {
        const response = await fetch(url);
        const data = await response.json();

        contenedor.innerHTML = "";

        if (!data.products || data.products.length === 0) {
            contenedor.innerHTML = `
                <p class="col-span-3 text-center text-5xl font-bold py-32">
                    No se encontraron productos
                </p>
            `;
            return;
        }

        /* Renderizar productos */
        data.products.forEach(prod => {
            const imagen = prod.imagen_principal
                ? `assets/products/${prod.id}/${prod.imagen_principal}`
                : "assets/images/default.png";
            const card = document.createElement("a");
            card.className = "producto-catalogo overflow-hidden rounded-3xl relative";
            card.href = `producto.php?id=${prod.id}`;
            card.style.backgroundImage = `url('${imagen}')`;

            card.innerHTML = `
                <div class="nombre-producto-catalogo-container absolute flex justify-between px-9 py-5 items-center rounded-3xl">
                    <p class="nombre-producto-catalogo uppercase text-4xl font-bold">
                        ${prod.nombre}
                    </p>
                    <div class="flecha-nombre-producto-catalogo-container py-5 px-8 rounded-3xl">
                        <svg class="flecha-nombre-producto-catalogo w-10 h-10" xmlns="http://www.w3.org/2000/svg">
                            <path fill="#fff"
                                d="M1.02,0l11.32,8.85v2.3L1.02,19.95l-1.02-2.7,9.02-7.25L0,2.7,1.02,0Z" />
                        </svg>
                    </div>
                </div>
            `;

            contenedor.appendChild(card);
        });

        renderPaginacion(data.total_pages, page);

    } catch (e) {
        console.error("❌ ERROR fetch productos:", e);
    }
}

/* PAGINACIÓN */
function renderPaginacion(totalPages, currentPage) {
    const pagContainer = document.querySelector(".paginacion-numeros");
    pagContainer.innerHTML = "";

    for (let i = 1; i <= totalPages; i++) {
        const btn = document.createElement("button");
        btn.className = `numero-pagina-catalogo ${i === currentPage ? "pagina-selected" : ""}`;
        btn.textContent = i;

        btn.addEventListener("click", () => {
            cargarProductos(i);
        });

        pagContainer.appendChild(btn);
    }
}

/* Mostrar u ocultar botón de limpiar */
function actualizarBotonLimpiar() {
    const cleanFiltersBtn = document.querySelector(".clean-filters-btn");
    const subcategoriaSelectContainer = document.querySelector(".filter-tipo-container");
    const categoria = document.querySelector(".categoria-select").value;
    const subcategoria = document.querySelector(".subcategoria-select").value;

    if (categoria !== "" || subcategoria !== "") {
        cleanFiltersBtn.style.display = "block";
        subcategoriaSelectContainer.style.display = 'block';
    } else {
        cleanFiltersBtn.style.display = "none";
    }
}

/* FUNCIÓN PARA PROCESAR PARÁMETROS DE LA URL */
async function getProductosURL() {
    const url = new URL(window.location.href);
    const parametros = new URLSearchParams(url.search);

    const categoriaID = parametros.get('servicio');
    const subcategoriaID = parametros.get('tipo');

    if (!categoriaID) return;

    const selecCate = document.querySelector(".categoria-select");
    const selecSub = document.querySelector(".subcategoria-select");
    const filtroTipo = document.querySelector(".filter-tipo-container");

    // Seleccionar la categoría
    selecCate.value = categoriaID;

    // Mostrar el contenedor de subcategorías
    filtroTipo?.classList.remove("filter-tipo");
    filtroTipo.style.display = 'block';

    // Cargar subcategorías
    await getSubcategories(categoriaID);

    // Si hay subcategoría en la URL, seleccionarla
    if (subcategoriaID) {
        selecSub.value = subcategoriaID;
    }

    // Cargar productos con los filtros aplicados
    cargarProductos(1);

    // Actualizar botón de limpiar
    actualizarBotonLimpiar();
}

/* LISTENERS DE FILTROS */
document.querySelector(".categoria-select").addEventListener("change", (e) => {
    const categoriaID = e.target.value;

    if (categoriaID === "") return;

    const filtroTipo = document.querySelector(".filter-tipo-container");

    // MOSTRAR SELECT DE SUBCATEGORÍAS
    filtroTipo?.classList.remove("filter-tipo");

    // LLENAR SUBCATEGORÍAS
    getSubcategories(categoriaID);

    // RECARGAR PRODUCTOS
    cargarProductos(1);

    // ACTUALIZAR BOTÓN
    actualizarBotonLimpiar();
});

document.querySelector(".subcategoria-select").addEventListener("change", () => {
    cargarProductos(1);
    actualizarBotonLimpiar();
});

document.querySelector(".clean-filters-btn").addEventListener("click", () => {
    document.querySelector(".categoria-select").value = "";
    document.querySelector(".subcategoria-select").innerHTML = `
        <option value="" disabled selected hidden>Tipo</option>
    `;

    const subcategoriaSelectContainer = document.querySelector(".filter-tipo-container");
    subcategoriaSelectContainer.style.display = 'none';

    cargarProductos(1);
    actualizarBotonLimpiar();
});

/* INICIO - ORDEN CORRECTO */
(async function init() {
    await getCategories();
    await getProductosURL();

    if (!new URLSearchParams(window.location.search).has('servicio')) {
        cargarProductos();
    }
})();