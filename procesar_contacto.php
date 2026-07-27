<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './PHPMailer/src/Exception.php';
require './PHPMailer/src/PHPMailer.php';
require './PHPMailer/src/SMTP.php';

include './db.php';

if (
    isset($_POST['nombre']) &&
    isset($_POST['empresa']) &&
    isset($_POST['email']) &&
    isset($_POST['telefono']) &&
    isset($_POST['mensaje'])
) {
    $nombre   = trim($_POST['nombre']);
    $empresa  = trim($_POST['empresa']);
    $email    = trim($_POST['email']);
    $telefono = trim($_POST['telefono']);
    $mensaje  = trim($_POST['mensaje']);

    if (empty($nombre) || empty($email) || empty($telefono)) {
        header('Location: contacto.php?error=campos_vacios');
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header('Location: contacto.php?error=email_invalido');
        exit;
    }

    $insert = $conn->prepare("INSERT INTO leads (nombre, empresa, email, telefono, mensaje) VALUES (?, ?, ?, ?, ?)");
    $insert->bind_param("sssss", $nombre, $empresa, $email, $telefono, $mensaje);

    if ($insert->execute()) {

        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'lairurbieta@gmail.com';
            $mail->Password   = 'pihi wymu pmho vuru';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port       = 587;
            $mail->CharSet    = 'UTF-8';

            $mail->setFrom('tucorreo@gmail.com', 'Globxel Contacto');
            $mail->addAddress('ventas@globxel.com', 'Globxel');
            $mail->addReplyTo($email, $nombre);

            $mail->isHTML(true);
            $mail->Subject = "Nuevo mensaje de contacto - $nombre";
            $mail->Body    = "
                <h2>Nuevo mensaje desde el formulario de contacto</h2>
                <p><strong>Nombre:</strong> $nombre</p>
                <p><strong>Empresa:</strong> $empresa</p>
                <p><strong>Email:</strong> $email</p>
                <p><strong>Teléfono:</strong> $telefono</p>
                <p><strong>Mensaje:</strong> $mensaje</p>
                <p><strong>Fecha:</strong> " . date('d/m/Y H:i:s') . "</p>
            ";
            $mail->AltBody = "Nombre: $nombre\nEmpresa: $empresa\nEmail: $email\nTeléfono: $telefono\nMensaje: $mensaje\nFecha: " . date('d/m/Y H:i:s');

            $mail->send();

        } catch (Exception $e) {
            error_log("Error al enviar correo: " . $mail->ErrorInfo);
        }

        $insert->close();
        $conn->close();

        header('Location: contacto.php?enviado=1');
        exit;
    }

    $insert->close();
    $conn->close();
}
?>