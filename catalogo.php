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
  <title>Globxel | Catálogo</title>
  <meta name="title" content="Catálogo">
  <meta name="description" content="descripcion">
  <link rel="shortcut icon" href="./assets/images/logos/isotipo_1.svg" type="image/svg+xml">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@500;700&family=Rubik:wght@400;500;700&display=swap"
    rel="stylesheet">

  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="assets/css/style.css?v=<?php echo time(); ?>">


</head>

<body id="top">
  <div class="preloader" data-preloader>
    <div class="circle"></div>
  </div>

  <?php include 'header.php'; ?>

  <main>
    <h1 class="text-9xl font-bold flex items-center gap-8 text-center w-fit mx-auto my-52 titulo-catalogo">
      <img class="w-32" src="assets/images/logos/isotipo_1.svg" alt="Isotipo Globxel">
      Catálogo
    </h1>

    <section class="filtros-section global-container flex gap-9">
      <div class="relative inline-block">
        <select
          class="categoria-filter categoria-select bg-white p-8 text-4xl rounded-3xl text-center font-bold shadow-lg pr-20 appearance-none cursor-pointer"
          name="categoria-filter">
          <option value="" disabled selected hidden>Servicio</option>

        </select>
        <!-- Flecha personalizada -->
        <div class="absolute inset-y-0 right-8 flex items-center pointer-events-none">
          <svg class="w-8 h-8 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
          </svg>
        </div>
      </div>
      <div class="relative filter-tipo filter-tipo-container">
        <select
          class="categoria-filter subcategoria-select bg-white p-8 text-4xl rounded-3xl text-center font-bold shadow-lg pr-20 appearance-none cursor-pointer transition-all"
          name="categoria-filter">
          <option value="" disabled selected hidden>Tipo</option>
        </select>
        <!-- Flecha personalizada -->
        <div class="absolute inset-y-0 right-8 flex items-center pointer-events-none">
          <svg class="w-8 h-8 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
          </svg>
        </div>
      </div>
      <button class="clean-filters-btn bg-white text-4xl px-11 rounded-3xl shadow-lg hidden">Limpiar Filtros</button>
    </section>

    <section class="paginacion-section mt-20 global-container">
      <div class="rendering-products-section grid grid-cols-3 gap-8">

      </div>
      <div class="pagination-numbers-container my-20 flex justify-center gap-8">
        <img class="w-7" src="assets/images/assets-catalogo/iconos/flecha_gris_izq.svg" alt="Flecha prev paginación">
        <div class="paginacion-numeros flex justify-between gap-5">
          <button class="numero-pagina-catalogo text-4xl font-bold bg-white p-7 rounded-3xl">1</button>
        </div>
        <img class="w-7" src="assets/images/assets-catalogo/iconos/flecha_gris_dere.svg" alt="Flecha next paginación">
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
  <script src="assets/js/catalogo.js?v=<?php echo time(); ?>"></script>


</body>

</html>