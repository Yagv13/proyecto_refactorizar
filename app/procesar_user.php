<?php
header('Content-Type: application/json');
include __DIR__ . '/../db.php'; 


// Recibir datos
$id       = $_POST['id'] ?? ''; //si viene vacio será insert
$nombre   = $_POST['nombre'] ?? '';
$apellido = $_POST['apellido'] ?? '';
$email    = $_POST['email'] ?? '';
$telefono = $_POST['telefono'] ?? '';
$rol = $_POST['rol'] ?? '';
$pass = $_POST['pass'] ?? '';

// Validar que no estén vacíos
if (empty($nombre) || empty($apellido) || empty($email) || empty($telefono) || empty($rol)) {
    echo json_encode(["mensaje" => "Datos incompletos, no se insertó"]);
    exit;
}

if (empty($id)) {
    // Insertar en la tabla
    $sql = "INSERT INTO usuarios (nombre, apellido, email, telefono, rol, pass) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssss", $nombre, $apellido, $email, $telefono, $rol, $pass);

    if ($stmt->execute()) {
        echo json_encode(["mensaje" => "Usuario agregado correctamente"]);
    } else {
        echo json_encode(["mensaje" => "Error al insertar usuario"]);
    }
} else {
    // Actualizar en la tabla
    $sql = "UPDATE usuarios SET nombre = ?, apellido = ?, email = ?, telefono = ?, rol = ?, pass = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssi", $nombre, $apellido, $email, $telefono, $rol, $pass, $id);

     if ($stmt->execute()) {
        echo json_encode(["mensaje" => "Usuario actualizado correctamente"]);
    } else {
        echo json_encode(["mensaje" => "Error al actualizar usuario"]);
    }
}
$stmt->close();
$conn->close();
?>
