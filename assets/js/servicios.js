$(document).ready(function () {

    /* Obtener id de la url */

    const url = new URL(window.location.href);
    const id = url.searchParams.get("id");

    if (!id) {
        console.error("No se recibió ID en la URL.");
        return;
    }

    /* Cargar datos de la categoría */

    $.getJSON("app/get_categorias.php", function (data) {

        const categoria = data.categorias.find(c => c.id == id);

        if (!categoria) {
            console.error("Categoría no encontrada");
            return;
        }

        const base = `/globxel/assets/categorias/${id}/`;

        // Hero
        $(".img-hero-servicio").attr("src", categoria.portada ? base + categoria.portada : "assets/images/default.png");
        $(".name-servicio").text(categoria.nombre);

        // Descripción
        $(".name-servicio-desc").html(`
            <img class="absolute w-32 h-full top-0 bottom-0 my-auto" src="assets/images/logos/isotipo_1.svg">
            ${categoria.nombre}
        `);

        $(".texto-desc-servicio").text(categoria.descripcion);

        $(".img-servicio").attr("src", categoria.miniatura ? base + categoria.miniatura : "assets/images/default.png");
    });

    /* Cargar subcategorías dinámicas */
    $.getJSON("app/get_subcategorias.php", function (data) {

        const container = $(".subcategorias-servicios-container");
        container.empty();

        const subcats = data.subcategorias.filter(s => s.categoria_id == id);

        if (subcats.length === 0) {
            container.html("<p class='text-white'>No hay subcategorías disponibles.</p>");
            return;
        }

        subcats.forEach(sub => {

            const base = `/globxel/assets/subcategorias/${sub.id}/`;
            const img = sub.portada ? base + sub.portada : "assets/images/default.png";
            console.log(subcats)
            const card = `
            <a href="catalogo.php?servicio=${subcats[0].categoria_id}&tipo=${sub.id}" class="subcategoria bg-white p-10 rounded-3xl shadow-lg">
                <img class="img-subcategoria w-full h-72 object-cover rounded-2xl" src="${img}">
                
                <h3 class="name-subcatedoria flex font-bold text-6xl gap-5 w-fit mx-auto mt-14">
                    <img class="w-14" src="assets/images/logos/isotipo_1.svg">
                    ${sub.nombre}
                </h3>

                <div class="texto-subcategoria text-center text-4xl mt-20 whitespace-pre-line">
                    ${sub.descripcion}
                </div>
            </a>
        `;

            container.append(card);
        });
    });


});
