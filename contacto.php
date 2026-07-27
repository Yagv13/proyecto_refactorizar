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

    <section class="global-container form-section-contacto mt-8 p-24 rounded-3xl" data-reveal="bottom">
      <div class="border border-white border-solid p-20 rounded-3xl flex items-center justify-between">
        <div class="text-side-form-contacto w-5/12">
          <div>
            <img class="w-2/3" src="assets/images/logos/logo.svg" alt="Logo Globxel">
            <p class="whitespace-pre-line text-5xl text-white">
              <span class="font-bold text-white">Estamos aquí para ayudarte.</span>
              Escríbenos y te responderemos
              a la brevedad.
            </p>
          </div>
          <p class="uppercase text-white border border-solid border-white w-fit rounded-xl mt-96 p-2 font-bold">
            contáctanos</p>
        </div>
        <div class="form-side-contacto w-6/12">

          <form id="formulario-contacto" action="procesar_contacto.php" method="POST">
            <div class="flex items-center justify-between gap-8">
              <div class="flex items-center gap-5 border-b border-b-white border-solid py-4 w-1/2">
                <label for="nombre" class="text-white text-4xl">Nombre: </label>
                <input type="text" name="nombre" id="nombre" class="text-white text-4xl focus:outline-none"
                  placeholder="Julio Diaz" required>
              </div>
              <div class="flex items-center gap-5 border-b border-b-white border-solid py-4 w-1/2">
                <label for="empresa" class="text-white text-4xl">Empresa: </label>
                <input type="text" name="empresa" id="empresa" class="text-white text-4xl focus:outline-none"
                  placeholder="Cortex">
              </div>
            </div>
            <div class="flex items-center justify-between gap-8 mt-10">
              <div class="flex items-center gap-5 border-b border-b-white border-solid py-4 w-1/2">
                <label for="email" class="text-white text-4xl">Email: </label>
                <input type="email" name="email" id="email" class="text-white text-4xl focus:outline-none"
                  placeholder="juliodiaz@cortex.com" required>
              </div>
              <div class="flex items-center gap-5 border-b border-b-white border-solid py-4 w-1/2">
                <label for="telefono" class="text-white text-4xl">Teléfono: </label>
                <input type="tel" name="telefono" id="telefono" class="text-white text-4xl focus:outline-none"
                  placeholder="477 123 4566" maxlength="12" required>
              </div>
            </div>
            <div class="border-b border-b-white border-solid py-4 mt-10 flex flex-col">
              <label for="mensaje" class="text-white text-4xl">Mensaje: </label>
              <textarea class="bg-transparent text-4xl h-56 mt-4 focus:outline-none text-white resize-none"
                name="mensaje" id="mensaje" placeholder="Escribe mensaje aquí..."></textarea>
            </div>
            <button type="submit"
              class="uppercase text-white border border-white border-solid py-3 px-28 font-bold rounded-2xl mx-auto mt-11">Enviar</button>
          </form>

        </div>
      </div>
    </section>

    <section class="global-container mapa-section-contacto mt-8 flex gap-6 items-stretch">
      <div class="orange-side-ubicacion-contacto h-full w-1/2 rounded-3xl px-32 py-40 flex flex-col justify-end"
        data-reveal="left">
        <img class="w-1/2" src="assets/images/logos/logo_blanco.svg" alt="">
        <p class="whitespace-pre-line text-white text-5xl">
          <span class="text-white font-bold">Nuestra Ubicación.</span>
          Prolongación la merced #1702
          Colonia Santa Rita CP 37450
          León Guanajuato México.
        </p>
      </div>
      <iframe class="w-1/2 rounded-3xl"
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1113.883092570549!2d-101.70054441394454!3d21.10487562569275!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x842bbf85e658010f%3A0x8923406c6f4308c2!2sAv%20La%20Merced%201702%2C%20Centro%20Bodeguero%20Robles%2C%2037450%20Le%C3%B3n%20de%20los%20Aldama%2C%20Gto.!5e0!3m2!1ses-419!2smx!4v1763749345984!5m2!1ses-419!2smx"
        width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
        referrerpolicy="no-referrer-when-downgrade" data-reveal="right"></iframe>
    </section>

    <section class="global-container info-section mt-8 flex gap-8 relative">
      <img class="absolute top-0 bottom-0 left-0 right-0 m-auto w-4/5"
        src="assets/images/assets-index/iconos/logo_fondo.svg" alt="Globxel">
      <div class="p-16 rounded-3xl image-side-info" data-reveal="left">
        <div class="border border-solid border-white p-16 rounded-3xl">
          <img class="mx-auto w-1/3" src="/assets/images/assets-index/Imagenes/tuv.png" alt="tuv">
        </div>
      </div>

      <div class="p-16 rounded-3xl text-side-info" data-reveal="right">
        <div class="border border-solid border-white p-16 rounded-3xl h-full flex justify-around">
          <div>
            <h3 class="text-white text-center text-4xl font-bold">NUESTROS TELÉFONOS:</h3>
            <p class="text-white flex gap-4 text-4xl text-center mx-auto w-fit mt-10"><img class="w-7"
                src="/assets/images/assets-index/iconos/punto_naranja.svg" alt="Punto Naranja">477 711 54 30</p>
            <p class="text-white flex gap-4 text-4xl text-center mx-auto w-fit mt-5"><img class="w-7"
                src="/assets/images/assets-index/iconos/punto_naranja.svg" alt="Punto Naranja">477 772 56 38</p>
          </div>
          <div class="bg-white w-px h-auto"></div>
          <div>
            <h3 class="text-white text-center text-4xl font-bold">LUNES A VIERNES</h3>
            <p class="text-white flex gap-4 text-4xl text-center mx-auto w-fit mt-10"><img class="w-7"
                src="/assets/images/assets-index/iconos/punto_naranja.svg" alt="Punto Naranja">9:00 - 18:00</p>
          </div>
        </div>
      </div>
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

  <script>
    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.get('enviado') === '1') {
      alert('¡Mensaje enviado correctamente!');
      window.history.replaceState({}, document.title, window.location.pathname);
    }

    const telefonoInput = document.getElementById('telefono');

    telefonoInput.addEventListener('input', function () {
      let valor = this.value.replace(/\D/g, '');
      if (valor.length > 10) valor = valor.substring(0, 10);

      if (valor.length <= 3) {
        this.value = valor;
      } else if (valor.length <= 6) {
        this.value = valor.slice(0, 3) + ' ' + valor.slice(3);
      } else {
        this.value = valor.slice(0, 3) + ' ' + valor.slice(3, 6) + ' ' + valor.slice(6);
      }
    });

    telefonoInput.addEventListener('keypress', function (e) {
      if (!/[0-9]/.test(e.key)) e.preventDefault();
    });

    document.getElementById('formulario-contacto').addEventListener('submit', function (e) {
      const telefono = document.getElementById('telefono').value.replace(/\s/g, '');
      if (telefono.length < 10) {
        e.preventDefault();
        alert('Por favor ingresa un teléfono válido de 10 dígitos.');
      }
    });
  </script>

</body>

</html>