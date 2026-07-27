'use strict';

/* OBTENER ID DEL PRODUCTO DESDE LA URL */
const url = new URL(window.location.href);
const id = url.searchParams.get("id");

if (!id) {
    console.error("No se recibió ID del producto.");
}

/* FUNCIÓN PRINCIPAL: CARGAR DATOS DEL PRODUCTO */
async function cargarProducto() {
    try {
        const urlProducto = new URL(`get_product_detalles.php?id=${id}`, window.location.href).href;
        const response = await fetch(urlProducto);
        const data = await response.json();


        if (!data || data.error) {
            console.error("Error al cargar producto:", data);
            return;
        }

        const producto = data.producto;
        const imagenes = producto.imagenes;

        llenarDatosProducto(producto);
        inicializarSlider(imagenes);

    } catch (error) {
        console.error("Error fetch producto:", error);
    }
}

/* LLENAR DATOS TEXTUALES DEL PRODUCTO */
function llenarDatosProducto(p) {
    document.querySelector(".categoria-producto").textContent = p.categoria_nombre;
    document.querySelector(".subcategoria-producto").textContent = p.subcategoria_nombre;

    document.querySelector(".nombre-producto").innerHTML = `
        <img class="w-28" src="assets/images/logos/isotipo_1.svg" alt="">
        ${p.nombre}
    `;

    document.querySelector(".resumen-producto").textContent = p.resumen;
    document.querySelector(".material-producto").textContent = p.material;
    document.querySelector(".color-producto").textContent = p.color;
    document.querySelector(".precio-producto").textContent = p.precio;
    document.querySelector(".desc-producto").textContent = p.descripcion;

    document.querySelector(".detalles-producto").innerHTML = `
        <p class="whitespace-pre-line">${p.detalles}</p>
    `;
}

/* SLIDER + MINIATURAS */
function inicializarSlider(imagenes) {

    const dir = new URL(`assets/products/${id}/`, window.location.href).href;

    // Elementos HTML
    const miniaturas = document.querySelectorAll(".img-slider");
    const swiperSlides = document.querySelectorAll(".swiper-slide");

    /* --- A) Insertar imágenes reales en miniaturas --- */
    miniaturas.forEach((btn, i) => {
        if (imagenes[i]) {
            btn.style.backgroundImage = `url("${dir}${imagenes[i]}")`;
            btn.setAttribute("data-img-index", i);
        } else {
            btn.style.display = "none"; // si hay menos imagenes que botones -> ocultar
        }
    });


    /* Insertar imágenes reales en el Swiper */
    swiperSlides.forEach((slide, i) => {
        if (imagenes[i]) {
            slide.style.backgroundImage = `url("${dir}${imagenes[i]}")`;
        } else {
            slide.style.display = "none";
        }
    });

    /* Inicializar Swiper (manteniendo tu versión) */
    const swiper = new Swiper('.swiper', {
        direction: 'horizontal',
        loop: true,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        pagination: {
            el: ".swiper-pagination",
        }
    });

    swiper.slideTo(0);

    /* Lógica de selección miniaturas */

    const limpiarSeleccion = () => {
        miniaturas.forEach(img => img.classList.remove("img-selected"));
    };

    miniaturas[0].classList.add("img-selected");

    miniaturas.forEach((btn, index) => {
        btn.addEventListener("click", () => {
            limpiarSeleccion();
            btn.classList.add("img-selected");
            swiper.slideTo(index);
        });
    });

    swiper.on("slideChange", () => {
        limpiarSeleccion();
        miniaturas[swiper.activeIndex].classList.add("img-selected");
    });
}

/* INICIAR TODO */
document.addEventListener("DOMContentLoaded", cargarProducto);
