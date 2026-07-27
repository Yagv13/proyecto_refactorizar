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

    <section class="terminos-condiciones">
        <div class="contenido-terminos">
            <h1>TÉRMINOS Y CONDICIONES DE USO</h1>
            <p><strong>Globxel S.A. de C.V.</strong></p>
            <p><strong>Última actualización: febrero 2026</strong></p>

            <div>
                <h2>1. Aceptación de los términos</h2>
                <p>Al acceder y utilizar el sitio web de Globxel (en adelante "el Sitio"), el usuario acepta de manera íntegra y sin reservas los presentes Términos y Condiciones. Si no está de acuerdo con alguno de ellos, deberá abstenerse de utilizar el Sitio.</p>
            </div>

            <div>
                <h2>2. Información de la empresa</h2>
                <p>Globxel S.A. de C.V. es una empresa productora y comercializadora especializada en materiales wovens y non-wovens de alto desempeño, con más de 50 años de experiencia en el sector textil industrial.</p>
                <ul>
                <li><strong>Domicilio:</strong> Prolongación La Merced #1702, Colonia Santa Rita, C.P. 37450, León, Guanajuato, México.</li>
                <li><strong>Correo:</strong> <a href="mailto:ventas@globxel.com">ventas@globxel.com</a></li>
                <li><strong>Teléfonos:</strong> 477 711 54 30 | 477 772 56 38</li>
                </ul>
            </div>

            <div>
                <h2>3. Uso del sitio web</h2>
                <p>El Sitio tiene como finalidad proporcionar información sobre los productos y servicios de Globxel, así como facilitar el contacto entre la empresa y sus clientes o prospectos. El usuario se compromete a utilizar el Sitio de manera lícita, sin realizar acciones que puedan dañar, inutilizar o deteriorar el Sitio o sus contenidos.</p>
            </div>

            <div>
                <h2>4. Propiedad intelectual</h2>
                <p>Todos los contenidos del Sitio, incluyendo pero no limitándose a textos, imágenes, logotipos, íconos, diseños y software, son propiedad exclusiva de Globxel S.A. de C.V. o de sus proveedores de contenido, y están protegidos por las leyes mexicanas e internacionales de propiedad intelectual. Queda prohibida su reproducción, distribución o modificación sin autorización expresa y por escrito de Globxel.</p>
            </div>

            <div>
                <h2>5. Formulario de contacto</h2>
                <p>La información proporcionada a través del formulario de contacto del Sitio será utilizada exclusivamente para atender la solicitud del usuario y dar seguimiento comercial. Globxel se compromete a no compartir dicha información con terceros sin consentimiento previo del usuario, conforme a lo establecido en el Aviso de Privacidad.</p>
            </div>

            <div>
                <h2>6. Exactitud de la información</h2>
                <p>Globxel hace su mejor esfuerzo para mantener la información del Sitio actualizada y precisa. Sin embargo, no garantiza que los contenidos estén libres de errores u omisiones, y se reserva el derecho de modificarlos en cualquier momento sin previo aviso.</p>
            </div>

            <div>
                <h2>7. Limitación de responsabilidad</h2>
                <p>Globxel no será responsable por daños directos, indirectos, incidentales o consecuentes derivados del uso o imposibilidad de uso del Sitio, incluyendo interrupciones técnicas, virus informáticos o fallas en la conectividad a Internet.</p>
            </div>

            <div>
                <h2>8. Modificaciones</h2>
                <p>Globxel se reserva el derecho de actualizar o modificar los presentes Términos y Condiciones en cualquier momento. Las modificaciones entrarán en vigor a partir de su publicación en el Sitio. Se recomienda al usuario revisar periódicamente esta sección.</p>
            </div>

            <div>
                <h2>9. Legislación aplicable</h2>
                <p>Los presentes Términos y Condiciones se rigen por las leyes vigentes de los Estados Unidos Mexicanos. Para cualquier controversia derivada de su interpretación o cumplimiento, las partes se someten a la jurisdicción de los tribunales competentes de la ciudad de León, Guanajuato, renunciando expresamente a cualquier otro fuero que pudiera corresponderles.</p>
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
</body>

</html>