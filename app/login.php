<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Globxel | Inicio de sesión</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <link rel="shortcut icon" href="../assets/images/logos/isotipo_1.svg" type="image/svg+xml">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <!-- Icons -->
    <link rel="stylesheet" href="assets/css/fonts.min.css">

    <style>
        body {
            background: url('../assets/images/assets-index/Imagenes/hero.png') center/cover no-repeat fixed;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }

        /* Capa oscura */
        .overlay {
            position: absolute;
            inset: 0;
            background: rgba(0, 0, 0, 0.55);
            backdrop-filter: blur(3px);
            z-index: 1;
        }

        /* Contenedor para centrar logo + form */
        .login-wrapper {
            position: relative;
            z-index: 2;
            width: 100%;
            max-width: 420px;
            text-align: center;
        }

        /* Logo centrado */
        .logo-login {
            width: 140px;
            margin: 0 auto 1rem auto;
        }

        /* Tarjeta del formulario */
        .login-card {
            background: white;
            padding: 2rem;
            border-radius: 1rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            margin-top: 1rem;
            animation: fadeIn .4s ease-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(15px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        label {
            font-weight: 600;
            color: #333;
            text-align: left;
            width: 100%;
            display: block;
        }

        .input-form {
            background: #f1f1f1;
            border: none;
            border-radius: .7rem;
            padding: .9rem 1.2rem;
            margin-bottom: 1.2rem;
            width: 100%;
            transition: .2s;
        }

        .input-form:focus {
            background: #e9e9e9;
            outline: 2px solid #006eff50;
        }

        .btn-submit {
            width: 100%;
            border-radius: 2rem;
            padding: .9rem;
            background: #006eff;
            border: none;
            color: white;
            font-size: 1.1rem;
            font-weight: 600;
        }

        .btn-submit:hover {
            background: #0055cb;
        }

        .mensaje-error-credenciales {
            color: #d9534f;
            display: none;
        }

        /* Flecha atrás */
        .back-btn {
            position: absolute;
            top: 25px;
            left: 25px;
            z-index: 3;
        }

        .back-btn img {
            width: 45px;
        }
    </style>
</head>

<body>
    <div class="overlay"></div>

    <!-- Botón atrás -->
    <a class="back-btn" href="../">
        <img src="../assets/images/assets-index/iconos/flecha_izq.svg" alt="Regresar">
    </a>

    <div class="login-wrapper">

        <img class="logo-login" src="../assets/images/logos/logo.svg" alt="Logo Globxel">

        <form action="loger.php" method="post" class="login-card">

            <p class="mensaje-error-credenciales">Correo o contraseña incorrectos.</p>

            <label for="login_usuario">E-Mail:</label>
            <input class="input-form" type="email" placeholder="Introduce tu E-Mail..." id="login_usuario" name="login_usuario" required />

            <label for="login_pass">Contraseña:</label>
            <input class="input-form" type="password" placeholder="Introduce tu contraseña..." id="login_pass" name="login_pass" required />

            <button type="submit" class="btn-submit">INICIAR SESIÓN</button>
        </form>

    </div>
</body>


</html>