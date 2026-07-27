<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Globxel - Servicios</title>
  <meta name="title" content="titulo">
  <meta name="description" content="descripcion">
  <link rel="shortcut icon" href="./assets/images/logos/isotipo_1.svg" type="image/svg+xml">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@500;700&family=Rubik:wght@400;500;700&display=swap"
    rel="stylesheet">
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="./assets/css/style.css?v=<?php echo time(); ?>">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.css" />

  <script src="https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.js"></script>

  <style>
    .hero-section {
      position: relative;
      height: 100vh;
      overflow: hidden;
      border-radius: 24px;
    }

    .img-hero-servicio {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      object-fit: cover;
      z-index: -1;
      border-radius: 24px;
    }

    .name-servicio-desc img {
      width: 80px;
      /* antes era w-32 (128px) */
      height: auto;
      left: 0px;
      /* separas la imagen del texto */
    }
  </style>


</head>

<?php
$idCategoria = $_GET['id'] ?? 0;
/* echo "<script>console.log('ID recibido: " . $idCategoria . "');</script>"; */
?>

<body id="top">
  <div class="preloader" data-preloader>
    <div class="circle"></div>
  </div>

  <?php include 'header.php'; ?>

  <main>
    <section class="global-container hero-section relative" data-reveal="bottom">
      <img class="img-hero-servicio" src="assets/images/assets-servicios/imagenes/hero_servicios.png" alt="Hero image">
      <div class="container">
        <img class="logo-hero" src="assets/images/logos/logo_principal.svg" alt="Logo Hero Banner">
      </div>
      <h1 class="name-servicio absolute text-white left-0 right-0 mx-auto w-fit text-7xl font-bold">Calzado</h1>
    </section>

    <section
      class="global-container descripcion-servicio-section mt-8 bg-white rounded-3xl p-16 relative overflow-hidden flex gap-10 items-center">
      <svg class="absolute isotipo-nosotros-negro -top-3/4 bottom-0 -left-5 right-0 m-auto" id="Capa_2"
        data-name="Capa 2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1348.99 1298.41">
        <defs>
          <style>
            .isotipo-nosotros-negro .cls-1 {
              fill: none;
              stroke: #222426 !important;
              stroke-miterlimit: 10;
              stroke-width: .5px;
            }
          </style>
        </defs>
        <g id="Capa_1-2" data-name="Capa 1">
          <g>
            <line class="cls-1" x1="918.64" y1="695" x2="918.64" y2="695" />
            <line class="cls-1" x1="920.01" y1="711.76" x2="920.01" y2="711.76" />
            <path class="cls-1" d="M342.18,465.31l-4.78,4.81c0-.44,2.18-2.62,4.78-4.81" />
            <line class="cls-1" x1="758.75" y1="730.78" x2="758.75" y2="730.78" />
            <path class="cls-1"
              d="M748.69,1095.54L.12,983.8v314.46l872.52-112.39-9.52-16.62c-27.8-44.19-61.33-63.99-114.44-73.72Z" />
            <path class="cls-1"
              d="M535.75,918.01l-.74-7.3c-4.39-44.88-29.32-84.31-68.36-108.19L.12,493.98v322.56l528.33,100.08,7.3,1.39Z" />
            <path class="cls-1"
              d="M628.09,885.58l1.87,11.27,167.6-183.62c17.76-19.43,25.45-46.38,20.54-72.1L696.18,4.58l-.87-4.46-402.47.17,323.51,841.09c5.26,14.24,9.21,29.13,11.73,44.19Z" />
            <path class="cls-1"
              d="M1348.85.13h-485.73l134.81,1054.05c2.74,22.96,3.13,49.44,1.17,78.68l-.87,13.45,208.08-184.47c22.58-17.78,35.18-43.8,34.57-71.44l-.09-.64L1348.11,6.25l.74-6.13Z" />
          </g>
        </g>
      </svg>
      <div class="text-side-desc-servicio w-1/2 h-fit" data-reveal="left">
        <h2 class="name-servicio-desc font-bold text-9xl text-center relative">
          <img class="absolute w-32 h-full top-0 bottom-0 my-auto" src="assets/images/logos/isotipo_1.svg"
            alt="Isotipo Globxel">
          Calzado
        </h2>
        <p class="texto-desc-servicio whitespace-pre-line mt-24 font-normal">
          Desarrollamos materiales especializados
          para la industria del calzado que garantizan
          resistencia, confort y durabilidad.

          Nuestros wovens y non-wovens ofrecen
          soluciones de alto desempeño para forros,
          plantillas, refuerzos y componentes estruc-
          turales, adaptándose a las necesidades de
          cada proceso productivo.
        </p>
      </div>
      <div class="image-side-desc-servicio w-1/2 relative" data-reveal="right">
        <img class="img-servicio w-full h-full" src="assets/images/assets-servicios/imagenes/calzado_1.png" alt="">
      </div>
    </section>

    <section class="global-container nuestros-productos-section mt-8 rounded-3xl px-36 py-44">

      <!-- Título -->
      <h2 class="text-9xl text-white font-bold flex items-center gap-9" data-reveal="left">
        <svg class="w-28" id="Capa_2" data-name="Capa 2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 59.43 43.75">
          <defs>
            <style>
              .cls-1 {
                fill: #fff;
              }
            </style>
          </defs>
          <g id="Capa_1-2" data-name="Capa 1">
            <path class="cls-1" d="M29.71,0C13.33,0,0,9.81,0,21.87s13.33,21.87,29.71,21.87,29.71-9.81,29.71-21.87S46.1,0,29.71,0ZM20.27,39.05c-8.55-2.54-14.71-8.51-15.7-15.2l6.33-.02c.21,0,.38-.16.38-.36v-3.19c0-.2-.17-.36-.38-.36l-6.33-.02c.99-6.69,7.15-12.65,15.7-15.2l.78-.23-.47.63c-3.39,4.5-5.34,10.62-5.34,16.78s1.95,12.27,5.34,16.78l.47.63-.78-.23ZM54.85,23.85c-.99,6.69-7.15,12.66-15.7,15.2l-.78.23.47-.63c3.28-4.36,5.17-10.44,5.19-16.71v-.23l-.02-1.4c0-.19-.17-.35-.37-.35-4.16-.05-16.9-.06-19.1,0-.21,0-.37.16-.37.36v3.16c0,.2.17.36.38.36h14.62-.02c-.58,9.91-5.34,16.57-9.43,16.57-5.43,0-9.84-9.78-9.84-18.52S24.28,3.36,29.71,3.36c3.82,0,7.64,5.53,8.97,12.78.03.17.19.3.37.3h3.7c.24,0,.42-.2.38-.42-.72-4.33-2.19-8.09-4.31-10.92l-.47-.63.78.23c8.55,2.54,14.72,8.51,15.71,15.2l-6.64.03c-.21,0-.38.16-.38.36v3.18c0,.2.17.36.38.36h6.68l-.04.02Z" />
          </g>
        </svg>
        Nuestros Productos
      </h2>

      <!-- Contenedor dinámico -->
      <div class="subcategorias-servicios-container mt-44 grid grid-cols-2 gap-10"></div>

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

  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <!-- Tu script general -->
  <script src="./assets/js/script.js?v=<?php echo time(); ?>"></script>

  <!-- Ionicons  -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

  <!-- Swiper -->
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

  <!-- Carga dinámicamente la página de servicios -->
  <script src="assets/js/servicios.js?v=<?php echo time(); ?>"></script>


</body>

</html>