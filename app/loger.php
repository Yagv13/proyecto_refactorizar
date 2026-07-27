<?php
session_start();
include __DIR__ . '/../db.php';

$email = trim(strtolower($_POST['login_usuario'] ?? ''));
$password = $_POST['login_pass'] ?? '';

error_log("LOGIN DEBUG: intento de login para: " . $email);

if (empty($email) || empty($password)) {
    error_log("LOGIN DEBUG: campos vacíos");
    header("Location: login.php?error=1");
    exit;
}

$sql = "SELECT id, nombre, apellido, email, pass, rol FROM usuarios WHERE email = ?";
$stmt = $conn->prepare($sql);
if (!$stmt) {
    error_log("LOGIN DEBUG: prepare falló: " . $conn->error);
    header("Location: login.php?error=1");
    exit;
}

$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

error_log("LOGIN DEBUG: filas encontradas: " . $result->num_rows);

if ($result && $result->num_rows === 1) {
    $user = $result->fetch_assoc();
    $stored = $user['pass'];

    error_log("LOGIN DEBUG: pass almacenada: " . $stored);
    error_log("LOGIN DEBUG: pass ingresada: " . $password);

    // Comparación directa en texto plano
    if ($password === $stored) {
        session_regenerate_id(true);

        $_SESSION['user_id']   = $user['id'];
        $_SESSION['nombre']    = $user['nombre'];
        $_SESSION['apellido']  = $user['apellido'];
        $_SESSION['email']     = $user['email'];
        $_SESSION['rol']       = $user['rol'];

        header("Location: index.php");
        exit();
    } else {
        error_log("LOGIN DEBUG: contraseña inválida para usuario " . $email);
    }
} else {
    error_log("LOGIN DEBUG: usuario no encontrado: " . $email);
}

header("Location: login.php?error=1");
exit();
?>
