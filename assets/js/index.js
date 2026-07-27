function cargarSliderServicios() {
    // Construir ruta relativa robusta
    const urlCategorias = new URL("app/get_categorias.php", window.location.href).href;
    console.log("URL usada:", urlCategorias); // Para depuración

    $.getJSON(urlCategorias, function (data) {
        console.log("Respuesta del servidor:", data); // Ver qué llega

        const contenedor = $("#swiperServicios");
        contenedor.empty();

        if (!data.categorias || data.categorias.length === 0) {
            contenedor.html("<p>No hay categorías para mostrar.</p>");
            return;
        }

        data.categorias.forEach(cat => {
            const base = "assets/categorias/" + cat.id + "/";
            const img = cat.miniatura ? base + cat.miniatura : "assets/images/default.png";

            const slide = `
                <div class="swiper-slide">
                    <img src="${img}" alt="${cat.nombre}">
                    <div class="w-full h-fit absolute p-6 bottom-5"> 
                        <a class="link-servicio mx-auto w-full rounded-3xl text-white text-4xl text-center uppercase font-bold px-12 py-7"
                           href="servicios.php?id=${cat.id}">
                            ${cat.nombre}
                            <svg class="arrow-servicio w-14 absolute top-0 bottom-0 my-auto"
                                 xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32.39 21.94">
                                <path fill="#fff"
                                 d="M22.05,21.78l10.09-10.08c.33-.4.33-1.06-.01-1.44L22.06.19c-.59-.36-1.16-.15-1.45.15-.3.31-.5.91-.06,1.55l7.51,7.54c.07.07.09.18.05.27-.04.09-.13.15-.23.15H.89c-.09.04-.33.15-.37.18C.2,10.24,0,10.59,0,10.97c0,.38.17.72.48.93h26.99c.1,0,.19.05.23.15.04.09.02.2-.05.27l-7.54,7.58c-.39.59-.22,1.17.06,1.48.27.3.81.53,1.46.2Z"/>
                            </svg>
                        </a>
                    </div>
                </div>`;
            contenedor.append(slide);
        });

        // Inicializar Swiper según ancho
        if (window.innerWidth < 1200) {
            const swiper = new Swiper(".swiper", {
                direction: 'horizontal',
                loop: true,
                slidesPerView: 1,
                centeredSlides: true,
                spaceBetween: 0,
                pagination: { el: ".swiper-pagination", clickable: true },
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
            });
            swiper.slideTo(0);
        } else {
            const swiper = new Swiper(".swiper", {
                direction: 'horizontal',
                loop: false,
                slidesPerView: 3,
                centeredSlides: true,
                spaceBetween: 30,
                pagination: { el: ".swiper-pagination", clickable: true },
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
            });
            swiper.slideTo(1);
        }
    });
}

$(document).ready(function () {
    cargarSliderServicios();
});
