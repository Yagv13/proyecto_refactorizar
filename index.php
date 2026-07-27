<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Globxel</title>
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
    html {
      scroll-behavior: smooth;
      scroll-padding-top: 75px;
    }

    /* Tamaño fijo para cada slide */
    .swiper-slide {
      height: 480px;
      /* AJUSTA ESTE VALOR A COMO LO QUIERAS */
      position: relative;
      overflow: hidden;
      /* ocultar partes que sobresalgan */
      border-radius: 25px;
      /* esquinas redondeadas */
    }

    /* La imagen dentro del slide */
    .swiper-slide img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      /* recorta sin deformar */
      object-position: center;
    }
  </style>

<body id="top">
  <div class="preloader" data-preloader>
    <div class="circle"></div>
  </div>

  <?php include 'header.php'; ?>

  <main>
    <section class="global-container hero-section">
      <img src="assets/images/assets-index/Imagenes/hero.png" alt="Hero image">
      <div class="container">
        <img class="logo-hero" src="assets/images/logos/logo_principal.svg" alt="Logo Hero Banner">
      </div>
    </section>

    <section class="global-container transformamos-section">
      <div class="container">
        <div class="text-side flex flex-col justify-end py-28">
          <h2 class="text-7xl font-bold">Transformamos más
            de 50 años de experiencia
            textil en innovación</h2>
          <a href="#">ABOUT US</a>
          <img src="assets/images/logos/logo.svg" alt="Logo Globxel">
        </div>
        <div class="image-side">
          <img src="assets/images/logos/isotipo.svg" alt="Globxel ícono">
        </div>
      </div>
    </section>

    <section class="global-container numeros-section">
      <div>
        <div class="card">
          <p class="counter"><span class="counter-number">50</span>+</p>
          <h2>Años de experiencia.</h2>
          <p>
            Más de una década de experiencia
            nos permite entender a detalle cada
            necesidad de nuestros clientes.
          </p>
        </div>
        <div class="card">
          <p class="counter"><span class="counter-number">900</span>+</p>
          <h2>Clientes.</h2>
          <p>
            Respaldados por más de 50 años
            de experiencia en soluciones textiles.
          </p>
        </div>
        <div class="card">
          <p class="counter"><span class="counter-number">100</span>%</p>
          <h2>Compromiso.</h2>
          <p>
            Garantizando calidad certificada
            en cada proyecto que entregamos.
          </p>
        </div>
      </div>
    </section>

    <section id="servicios" class="global-container servicios-section rounded-3xl py-44">
      <div class="container">
        <h2 class="text-8xl text-center">Nuestros servicios</h2>
        <img class="absolute w-28 top-44 isotipo-servicios" src="assets/images/logos/isotipo_1.svg"
          alt="Isotipo Globxel">

        <!-- Slider main container -->
        <div class="swiper mt-28">
          <!-- Additional required wrapper -->
          <div id="swiperServicios" class="swiper-wrapper">
            <!-- Slides -->

          </div>

          <!-- If we need pagination -->
          <div class="swiper-pagination"></div>


        </div>
        <!-- If we need navigation buttons -->
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
      </div>
    </section>

    <section class="global-container opiniones-section py-40 mt-8 rounded-3xl px-16">
      <div class="tarjetas-opinion-container flex gap-8">
        <div class="tarjeta-opinion flex bg-white overflow-hidden w-1/3 gap-4 items-center h-80">
          <div class="image-side-opinion w-1/3 h-full">
            <img class="w-full h-full object-cover" src="assets/images/assets-index/Imagenes/alejandro_gomez.png"
              alt="Alejandro Gómez">
          </div>
          <div class="text-side-opinion w-2/3">
            <h3 class="text-4xl font-bold">Alejandro Gómez</h3>
            <p class="text-justify justify-normal text-base mt-4 font-semibold w-5/6">El curso me ayudó a
              entender cómo
              liderar desde la empatía y no solo
              desde la autoridad. Ahora mi equipo
              está más motivado y los resultados se
              notan cada semana. 100% recomendado.
            </p>
            <div class="stars-redes-opinion-container flex w-4/5 mt-4 justify-between">
              <div class="stars-opinion-container flex gap-2">
                <img class="w-6" src="assets/images/assets-index/iconos/estrella_naranja.svg" alt="Estrella naranja">
                <img class="w-6" src="assets/images/assets-index/iconos/estrella_naranja.svg" alt="Estrella naranja">
                <img class="w-6" src="assets/images/assets-index/iconos/estrella_naranja.svg" alt="Estrella naranja">
                <img class="w-6" src="assets/images/assets-index/iconos/estrella_naranja.svg" alt="Estrella naranja">
                <img class="w-6" src="assets/images/assets-index/iconos/estrella_gris.svg" alt="Estrella gris">
              </div>
              <p class="redes text-base font-semibold">@ale_gomez92</p>
            </div>
          </div>
        </div>
        <div class="tarjeta-opinion flex bg-white overflow-hidden w-1/3 gap-4 items-center h-80">
          <div class="image-side-opinion w-1/3 h-full">
            <img class="w-full h-full object-cover" src="assets/images/assets-index/Imagenes/daniel_herrera.png"
              alt="Daniel Herrera">
          </div>
          <div class="text-side-opinion w-2/3">
            <h3 class="text-4xl font-bold">Daniel Herrera</h3>
            <p class="text-justify text-base mt-4 font-semibold w-5/6">Siempre pensé que el liderazgo
              era innato, pero descubrí que se puede
              aprender y practicar. Con la
              metodología de Globxel, logré mejorar
              mi comunicación y gané seguridad
              como líder.
            </p>
            <div class="stars-redes-opinion-container flex w-4/5 mt-4 justify-between">
              <div class="stars-opinion-container flex gap-2">
                <img class="w-6" src="assets/images/assets-index/iconos/estrella_naranja.svg" alt="Estrella naranja">
                <img class="w-6" src="assets/images/assets-index/iconos/estrella_naranja.svg" alt="Estrella naranja">
                <img class="w-6" src="assets/images/assets-index/iconos/estrella_naranja.svg" alt="Estrella naranja">
                <img class="w-6" src="assets/images/assets-index/iconos/estrella_naranja.svg" alt="Estrella naranja">
                <img class="w-6" src="assets/images/assets-index/iconos/estrella_gris.svg" alt="Estrella gris">
              </div>
              <p class="redes text-base font-semibold">@DanielHerrera21</p>
            </div>
          </div>
        </div>
        <div class="tarjeta-opinion flex bg-white overflow-hidden w-1/3 gap-4 items-center h-80">
          <div class="image-side-opinion w-1/3 h-full">
            <img class="w-full h-full object-cover" src="assets/images/assets-index/Imagenes/sergio_ramirez.png"
              alt="Sergio Ramírez">
          </div>
          <div class="text-side-opinion w-2/3">
            <h3 class="text-4xl font-bold">Sergio Ramírez</h3>
            <p class="text-justify text-base mt-4 font-semibold w-5/6">Lo que más valoro es que los
              ejemplos son reales y aplicables al día a día.
              No son solo teorías: son herramientas que
              ya estoy usando en mi empresa con
              excelentes resultados.
            </p>
            <div class="stars-redes-opinion-container flex w-4/5 mt-4 justify-between">
              <div class="stars-opinion-container flex gap-2">
                <img class="w-6" src="assets/images/assets-index/iconos/estrella_naranja.svg" alt="Estrella naranja">
                <img class="w-6" src="assets/images/assets-index/iconos/estrella_naranja.svg" alt="Estrella naranja">
                <img class="w-6" src="assets/images/assets-index/iconos/estrella_naranja.svg" alt="Estrella naranja">
                <img class="w-6" src="assets/images/assets-index/iconos/estrella_naranja.svg" alt="Estrella naranja">
                <img class="w-6" src="assets/images/assets-index/iconos/estrella_gris.svg" alt="Estrella gris">
              </div>
              <p class="redes text-base font-semibold">@Serg_Ram95</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="global-container ubicacion-section p-24 flex justify-between rounded-3xl mt-8">
      <div class="text-side-ubicacion w-2/5">
        <img class="w-3/4" src="assets/images/logos/logo_blanco.svg" alt="">
        <h2 class="whitespace-pre-line text-white font-bold text-8xl leading-tight mt-32">Nuestra
          Ubicación</h2>
        <p class="texto-ubicacion whitespace-pre-line font-bold text-4xl text-white mt-32">Prolongación la merced #1702
          Colonia Santa Rita CP 37450
          León Guanajuato México.</p>
      </div>
      <div class="mapa-side-ubicacion w-3/5">
        <iframe class="w-full rounded-3xl"
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1113.883092570549!2d-101.70054441394454!3d21.10487562569275!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x842bbf85e658010f%3A0x8923406c6f4308c2!2sAv%20La%20Merced%201702%2C%20Centro%20Bodeguero%20Robles%2C%2037450%20Le%C3%B3n%20de%20los%20Aldama%2C%20Gto.!5e0!3m2!1ses-419!2smx!4v1763749345984!5m2!1ses-419!2smx"
          width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
          referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>
    </section>

    <section class="contacto-section global-container p-24 mt-8 rounded-3xl">
      <div class="border-white rounded-3xl border flex p-32 justify-around">
        <div class="text-side-contacto">
          <h2 class="text-white text-8xl font-bold">Contáctanos</h2>
          <p class="text-white mt-20 text-4xl font-light">Déjanos ser tu aliado, contáctanos con toda <br>
            la experiencia necesaria para brindarte el <br>
            mejor servcio.</p>
          <img class="w-8/12 mt-96" src="assets/images/logos/logo.svg" alt="Logo Globxel">
        </div>
        <div class="line-separacion-contacto"></div>
        <form class="my-auto" action="">
          <input class="text-4xl focus:outline-none px-8 font-bold text-white placeholder:text-white" type="text"
            name="nombre" placeholder="Nombre">
          <div class="w-full h-px bg-zinc-500 mt-4 mb-8"></div>
          <input class="text-4xl focus:outline-none px-8 font-bold text-white placeholder:text-white" type="email"
            name="email" placeholder="E-mail">
          <div class="w-full h-px bg-zinc-500 mt-4 mb-8"></div>
          <input class="text-4xl focus:outline-none px-8 font-bold text-white placeholder:text-white" type="tel"
            name="telefono" placeholder="Teléfono">
          <div class="w-full h-px bg-zinc-500 mt-4 mb-8"></div>
          <textarea
            class="text-4xl focus:outline-none px-8 font-bold text-white placeholder:text-white bg-transparent resize-none h-1/5"
            name="mensaje" placeholder="Escribe tu mensaje aquí..."></textarea>

          <button type="submit" class="contacto-submit-btn mt-12">
            ENVIAR
          </button>
        </form>
      </div>
    </section>

    <section class="global-container info-section mt-8 flex gap-8 relative">
      <img class="absolute top-0 bottom-0 left-0 right-0 m-auto w-4/5"
        src="assets/images/assets-index/iconos/logo_fondo.svg" alt="Globxel">
      <div class="p-16 rounded-3xl image-side-info">
        <div class="border border-solid border-white p-16 rounded-3xl">
          <img class="mx-auto w-1/3" src="/assets/images/assets-index/Imagenes/tuv.png" alt="tuv">
        </div>
      </div>

      <div class="p-16 rounded-3xl text-side-info">
        <div class="border border-solid border-white p-16 rounded-3xl h-full flex justify-around">
          <div class="telefonos-horarios">
            <h3 class="text-white text-center text-4xl font-bold">NUESTROS TELÉFONOS:</h3>
            <p class="text-white flex gap-4 text-4xl text-center mx-auto w-fit mt-10"><img class="w-7"
                src="/assets/images/assets-index/iconos/punto_naranja.svg" alt="Punto Naranja">477 711
              54 30</p>
            <p class="text-white flex gap-4 text-4xl text-center mx-auto w-fit mt-5">
              <img class="w-7" src="/assets/images/assets-index/iconos/punto_naranja.svg" alt="Punto Naranja">
              477 772 56 38
            </p>
          </div>
          <div class="linea-divisoria-horario bg-white w-px h-auto"></div>
          <div class="horas-horarios">
            <h3 class="text-white text-center text-4xl font-bold">LUNES A VIERNES</h3>
            <p class="text-white flex gap-4 text-4xl text-center mx-auto w-fit mt-10"><img class="w-7"
                src="/assets/images/assets-index/iconos/punto_naranja.svg" alt="Punto Naranja">9:00 - 18:00</p>
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
      <div class="footer-social-links-container flex gap-5 items-center">
        <a href="#"><img class="w-14" src="assets/images/assets-index/iconos/linkedin.svg" alt="Linkedin"></a>
        <a href="#"><img class="w-14" src="assets/images/assets-index/iconos/alibaba.svg" alt="Alibaba"></a>
        <a href="https://www.instagram.com/globxel?igsh=MXIzbDRmY3puZjNteA=="><img class="w-14" src="assets/images/assets-index/iconos/instagram.svg" alt="Instagram"></a>
        <a href="#"><img class="w-14" src="assets/images/assets-index/iconos/correo.svg" alt="Correo"></a>
      </div>
    </div>
  </footer>

  <script src="./assets/js/script.js?v=<?php echo time(); ?>"></script>

  <!-- JQUERY -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <!-- Ionicons -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

  <!-- Slider -->
  <script src="assets/js/index.js?v=<?php echo time(); ?>"></script>



  <!-- <script>
    const swiper = new Swiper('.swiper', {
      // Optional parameters
      direction: 'horizontal',
      loop: false,
      slidesPerView: 3,
      centeredSlides: true,
      spaceBetween: 30,

      // If we need pagination
      pagination: {
        el: '.swiper-pagination',
      },

      // Navigation arrows
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
    });

  </script> -->




</body>

</html>