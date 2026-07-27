<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Globxel | Catálogo</title>
    <meta name="title" content="Catálogo">
    <meta name="description" content="descripcion">
    <link rel="shortcut icon" href="./assets/images/logos/isotipo_1.svg" type="image/svg+xml">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@500;700&family=Rubik:wght@400;500;700&display=swap"
        rel="stylesheet">

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.css" />
    <link rel="stylesheet" href="assets/css/style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="assets/css/perfil_producto.css?v=<?php echo time(); ?>">


</head>

<body id="top">
    <div class="preloader" data-preloader>
        <div class="circle"></div>
    </div>

    <?php include 'header.php'; ?>

    <main>
        <section class="global-container producto-container bg-white rounded-3xl mt-8 p-16">
            <!-- !seccion de los filtros zona arriba -->
            <div
                class="filters-top-section flex w-fit justify-between items-center gap-8 text-4xl font-bold p-8 rounded-3xl">
                <p class="productos-filter uppercase">productos</p>
                <p>></p>
                <p class="categoria-producto uppercase">Tela</p>
                <p>></p>
                <p class="subcategoria-producto uppercase">tela no tejida</p>
            </div>
            <!-- !nombre del producto -->
            <h1 class="nombre-producto font-bold text-9xl flex w-fit items-center justify-center gap-11 mt-8">
                <img class="w-28" src="assets/images/logos/isotipo_1.svg"
                    alt="Isotipo Globxel">
                BASE 150 NEGRO
            </h1>
            <!-- !Resumen del producto -->
            <p class="resumen-producto text-4xl font-extrabold mt-24">
                Tela no tejida spunlace 100% PET resistente al desgarro sostenible de peso
                pesado para tapicería y automóviles.
            </p>
            <div class="slider-desc-container mt-24 flex gap-12 justify-center">
                <!-- !slider side -->
                <div class="slider-side-container w-6/12 rounded-3xl py-12 px-9 flex gap-2 relative">
                    <!-- !imagenes producto container -->
                    <div class="img-producto-container w-2/12 h-full overflow-y-scroll">
                        <!-- plantilla img slider lateral -->
                        <button class="img-slider w-full rounded-3xl border-4 border-white border-solid"></button>
                        <button class="img-slider w-full rounded-3xl border-4 border-white border-solid"></button>
                        <button class="img-slider w-full rounded-3xl border-4 border-white border-solid"></button>
                        <button class="img-slider w-full rounded-3xl border-4 border-white border-solid"></button>
                        <button class="img-slider w-full rounded-3xl border-4 border-white border-solid"></button>
                    </div>
                    <!-- !slider slider container -->
                    <div class="swiper w-8/12">
                        <!-- Additional required wrapper -->
                        <div class="swiper-wrapper">
                            <!-- Slides -->
                            <div class="swiper-slide rounded-3xl border-4 border-white border-solid"></div>
                            <div class="swiper-slide rounded-3xl border-4 border-white border-solid"></div>
                            <div class="swiper-slide rounded-3xl border-4 border-white border-solid"></div>
                            <div class="swiper-slide rounded-3xl border-4 border-white border-solid"></div>
                            <div class="swiper-slide rounded-3xl border-4 border-white border-solid"></div>
                        </div>
                    </div>
                    <!-- If we need navigation buttons -->
                    <div class="swiper-button-prev producto-prev"></div>
                    <div class="swiper-button-next producto-next"></div>

                </div>
                <div class="desc-side-container rounded-3xl p-12 w-5/12 h-fit bg-white">
                    <!-- Material y Color-->
                    <div class="mate_color_producto"> 
                        <h3 class="shadow-lg material-producto">Material</h3>
                        <h3 class="shadow-lg color-producto">Color</h3>
                    </div>
                    <!-- !Precio del producto -->
                    <h2 class="text-7xl font-extrabold precio-producto-container">MX $<span
                            class="precio-producto">300</span></h2>
                    <div class="linea-divisora h-px w-full my-10"></div>
                    <!-- !Descripcion del producto -->
                    <p class="desc-producto font-semibold w-11/12">
                        Tejido ﬁltrante de polipropileno de 1 μm,
                        resistente y duradero, ideal para ﬁltración
                        de agua y separación sólido-líquido. Ofrece
                        alta permeabilidad, resistencia química y
                        certiﬁcación CE para uso industrial.
                    </p>
                    <div class="btns-producto-container flex justify-between items-center gap-5 mt-20">
                        <a class="py-5 text-white btn-cotizar w-1/2 text-center rounded-3xl text-3xl font-bold shadow-lg"
                            href="contacto.html">Cotizar</a>
                        <a class="py-5 w-1/2 btn-chatear text-center rounded-3xl text-3xl font-bold shadow-lg"
                            href="#">Chatear</a>
                    </div>
                    <div class="linea-divisora h-px w-full my-10"></div>
                    <h3 class="font-bold text-3xl">DETALLES DEL PRODUCTO</h3>
                    <!-- !Detalles del producto -->
                    <div class="detalles-producto">
                        <p class="whitespace-pre-line">
                            -Largo: 50cm
                            -Ancho: 1.38 cm
                            -Color: Gris
                            -Peso: 160 g/m2
                            -Calibre: o.5 mm
                        </p>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <footer class="footer global-container relative p-64 mt-8 rounded-3xl mb-8">
        <img class="w-1/2 m-auto" src="assets/images/logos/logo_blanco.svg" alt="Logo Globxel">
        <div class="flex justify-between items-center absolute w-11/12 left-0 right-0 bottom-20 mx-auto">
            <div>
                <a class="text-white font-bold" href="terminos.php">TÉRMINOS DE USO</a>
                <a class="text-white font-bold" href="aviso.php">POLÍTICA DE PRIVACIDAD</a>
            </div>
            <div>
                <p class="flex text-white uppercase gap-3 font-bold">powered by <img class="w-24"
                        src="assets/images/assets-index/iconos/recurso_27.svg" alt="LAUD">
                </p>
            </div>
            <div class="flex gap-5 items-center">
                <a href="#"><img class="w-14" src="assets/images/assets-index/iconos/linkedin.svg" alt="Linkedin"></a>
                <a href="#"><img class="w-14" src="assets/images/assets-index/iconos/tiktok.svg" alt="Tiktok"></a>
                <a href="#"><img class="w-14" src="assets/images/assets-index/iconos/instagram.svg" alt="Instagram"></a>
                <a href="#"><img class="w-14" src="assets/images/assets-index/iconos/correo.svg" alt="Correo"></a>
            </div>
        </div>
    </footer>
    <script src="./assets/js/script.js?v=<?php echo time(); ?>"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.js"></script>
    <script src="assets/js/perfil_producto.js?v=<?php echo time(); ?>"></script>


</body>

</html>