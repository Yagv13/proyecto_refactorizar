<?php
// Desactivar caché completamente
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Globxel - Nosotros</title>
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


</head>

<body id="top">
  <div class="preloader" data-preloader>
    <div class="circle"></div>
  </div>

  <?php include 'header.php'; ?>

  <main>

    <section class="aliado-section global-container mt-8 overflow-hidden">
      <div class="flex items-center h-full gap-4">
        <div class="text-side py-32 px-24 rounded-3xl w-1/2 h-full flex-col flex" data-reveal="left">
          <img src="assets/images/logos/logo_blanco.svg" alt="Logo Globxel" data-reveal="bottom">
          <h2 class="whitespace-pre-line text-white text-6xl leading-tight" data-reveal="bottom">
            <span class="font-bold text-white">Somos el aliado estratégico
              que impulsa el crecimiento
              industrial</span> con materiales que
            garantizan protección, fuerza
            y desempeño.
          </h2>
        </div>
        <div class="image-side w-1/2 h-full flex items-center justify-center rounded-3xl" data-reveal="right">
          <img src="assets/images/logos/logo_principal.svg" alt="Logo Globxel" data-reveal="bottom">
        </div>
      </div>
    </section>

    <section class="global-container transformamos-section overflow-hidden relative z-10" data-reveal="bottom">
      <div class="container">
        <div class="text-side flex flex-col justify-around" data-reveal="left">
          <h2 class="text-5xl whitespace-pre-line"><span class="font-bold text-white">
              Guiados por más de 50 años de experiencia
              en el sector textil,</span> trabajamos cada día
            para consolidar un legado que combina
            tradición, ingeniería y visión global.</h2>
          <img src="assets/images/logos/logo.svg" alt="Logo Globxel">
        </div>
        <div class="image-side" data-reveal="right">
          <img src="assets/images/logos/isotipo.svg" alt="Globxel ícono">
        </div>
      </div>
    </section>

    <section class="nuestra-meta-section global-container flex items-stretch mt-8 gap-4">
      <div class="orange-side rounded-3xl w-2/6 py-20 px-14 relative" data-reveal="bottom">
        <svg class="absolute isotipo-nosotros-blanco -top-7 bottom-0 -left-5 right-0 m-auto" id="Capa_2"
          data-name="Capa 2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1348.99 1298.41">
          <defs>
            <style>
              .cls-1 {
                fill: none;
                stroke: #fff !important;
                stroke-miterlimit: 10;
                stroke-width: 1px;
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
        <img class="absolute w-24 flecha-meta" src="assets/images/assets-nosotros/iconos/flecha_derecha.svg"
          alt="Flecha derecha">
        <h2 class="whitespace-pre-line text-white font-bold text-8xl" data-reveal="bottom">Nuestra
          Meta</h2>
      </div>
      <div class="white-side bg-white rounded-3xl w-4/6 relative py-64" data-reveal="bottom">
        <h2 class="whitespace-pre-line w-fit text-6xl mx-auto"><span class="font-bold">
            Seguir impulsando el desarrollo
            industrial</span> con materiales que
          inspiran seguridad, eficiencia y
          futuro.
        </h2>
        <img class="w-5/12 mx-auto absolute left-0 right-0 bottom-1/4"
          src="assets/images/assets-nosotros/iconos/linea.svg">
      </div>
    </section>

    <section class="somos-section global-container bg-white mt-8 rounded-3xl py-96 relative overflow-hidden">
      <svg class="absolute isotipo-nosotros-negro -top-0 bottom-0 -left-5 right-0 m-auto" id="Capa_2" data-name="Capa 2"
        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1348.99 1298.41">
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
      <img class="absolute w-2/6 left-0 right-0 mx-auto" src="assets/images/logos/logo_principal_negro.svg"
        alt="Logo Globxel" data-reveal="bottom">
      <p class="text-6xl text-center w-3/4 mx-auto leading-tight" data-reveal="bottom">
        Somos una <span class="font-bold">empresa productora y comercializadora
          especializada en wovens y non-wovens de alto
          desempeño</span>, diseñados para cumplir con los <span class="font-bold">más altos
          estándares de calidad</span> en industrias como la
        automotriz, aeronáutica, de empaque y calzado.
      </p>
    </section>

  </main>
  <footer class="footer global-container relative p-64 mt-8 rounded-3xl mb-8" data-reveal="bottom">
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
      <div class="footer-social-links-container flex gap-5 items-center">
        <a href="#"><img class="w-14" src="assets/images/assets-index/iconos/linkedin.svg" alt="Linkedin"></a>
        <a href="#"><img class="w-14" src="assets/images/assets-index/iconos/alibaba.svg" alt="Alibaba"></a>
        <a href="https://www.instagram.com/globxel?igsh=MXIzbDRmY3puZjNteA=="><img class="w-14" src="assets/images/assets-index/iconos/instagram.svg" alt="Instagram"></a>
        <a href="#"><img class="w-14" src="assets/images/assets-index/iconos/correo.svg" alt="Correo"></a>
      </div>
    </div>
    
  </footer>
  <script src="./assets/js/script.js?v=<?php echo time(); ?>"></script>
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>