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
            <h1>POLÍTICA DE PRIVACIDAD</h1>
            <p><strong>Globxel S.A. de C.V.</strong></p>
            <p><strong>Última actualización: febrero 2026</strong></p>

            <div>
                <h2>1. Identidad y domicilio del responsable</h2>
                <p>Globxel S.A. de C.V., con domicilio en Prolongación La Merced #1702, Colonia Santa Rita, C.P. 37450, León, Guanajuato, México, es responsable del tratamiento de los datos personales que usted nos proporcione, de conformidad con lo establecido en la <strong>Ley Federal de Protección de Datos Personales en Posesión de los Particulares (LFPDPPP)</strong> y su Reglamento.</p>
            </div>

            <div>
                <h2>2. Datos personales que recabamos</h2>
                <p>A través de nuestro formulario de contacto y otros medios de comunicación, podemos recabar los siguientes datos personales:</p>
                <ul>
                <li>Nombre completo</li>
                <li>Nombre de empresa o razón social</li>
                <li>Correo electrónico</li>
                <li>Número de teléfono</li>
                <li>Mensaje o comentarios adicionales</li>
                </ul>
            </div>

            <div>
                <h2>3. Finalidades del tratamiento</h2>
                <p>Los datos personales que recabamos serán utilizados para las siguientes <strong>finalidades primarias</strong>, necesarias para la relación comercial:</p>
                <ul>
                <li>Atender solicitudes de información sobre nuestros productos y servicios.</li>
                <li>Dar seguimiento a cotizaciones y propuestas comerciales.</li>
                <li>Establecer comunicación relacionada con proyectos o requerimientos industriales en los sectores automotriz, aeronáutico, de empaque y calzado.</li>
                </ul>
                <p>De manera <strong>secundaria</strong>, y siempre con su consentimiento, podremos utilizar sus datos para el envío de información sobre novedades, catálogos o promociones de Globxel.</p>
            </div>

            <div>
                <h2>4. Transferencia de datos</h2>
                <p>Globxel S.A. de C.V. no transferirá sus datos personales a terceros sin su consentimiento previo, salvo en los casos previstos en el artículo 37 de la LFPDPPP, tales como requerimientos de autoridades competentes o cuando sea necesario para cumplir obligaciones legales.</p>
            </div>

            <div>
                <h2>5. Medios para ejercer los derechos ARCO</h2>
                <p>Usted tiene derecho a <strong>Acceder, Rectificar, Cancelar u Oponerse</strong> (derechos ARCO) al tratamiento de sus datos personales. Para ejercer cualquiera de estos derechos, puede enviar una solicitud a <a href="mailto:ventas@globxel.com">ventas@globxel.com</a>, indicando:</p>
                <ul>
                <li>Su nombre completo</li>
                <li>Los datos sobre los que desea ejercer su derecho</li>
                <li>Una descripción clara de su solicitud</li>
                </ul>
                <p>Daremos respuesta en un plazo máximo de <strong>20 días hábiles</strong>.</p>
            </div>

            <div>
                <h2>6. Uso de cookies</h2>
                <p>El Sitio puede utilizar cookies y tecnologías similares para mejorar la experiencia de navegación del usuario. Estas herramientas recopilan información de manera anónima sobre el uso del Sitio. El usuario puede desactivar las cookies desde la configuración de su navegador, aunque esto podría afectar el correcto funcionamiento de algunas secciones del Sitio.</p>
            </div>

            <div>
                <h2>7. Cambios al aviso de privacidad</h2>
                <p>Globxel se reserva el derecho de actualizar el presente Aviso de Privacidad en cualquier momento para reflejar cambios legislativos o en sus prácticas internas. Cualquier modificación será publicada en el Sitio con la fecha de actualización correspondiente.</p>
            </div>

            <div>
                <h2>8. Contacto</h2>
                <p>Para cualquier duda o aclaración relacionada con el tratamiento de sus datos personales, puede comunicarse con nosotros a través de:</p>
                <ul>
                <li><strong>Correo:</strong> <a href="mailto:ventas@globxel.com">ventas@globxel.com</a></li>
                <li><strong>Teléfonos:</strong> 477 711 54 30 | 477 772 56 38</li>
                <li><strong>Horario de atención:</strong> lunes a viernes de 9:00 a 18:00 horas</li>
                </ul>
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