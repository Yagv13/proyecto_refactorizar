<?php
header('Content-Type: application/json');
include __DIR__ . '/../db.php';

$id = $_POST['id'] ?? '';
$nombre = $_POST['nombre'] ?? '';
$descripcion = $_POST['descripcion'] ?? '';

/* Función para guardar las imagenes */
function guardarImagen($fileKey, $dir, $prefijo)
{
    if (!isset($_FILES[$fileKey]) || $_FILES[$fileKey]['error'] !== 0) {
        return null; // No se subió imagen
    }

    // Crear carpeta si no existe
    if (!file_exists($dir)) mkdir($dir, 0777, true);

    $ext = pathinfo($_FILES[$fileKey]['name'], PATHINFO_EXTENSION);
    $fileName = $prefijo . "." . $ext;
    $rutaDestino = $dir . $fileName;

    // Si ya existía una imagen con ese nombre, eliminarla
    if (file_exists($rutaDestino)) unlink($rutaDestino);

    // Mover archivo
    if (move_uploaded_file($_FILES[$fileKey]['tmp_name'], $rutaDestino)) {
        return $fileName;
    } else {
        return null;
    }
}

if (empty($id)) {

    // INSERTAR
    $sql = "INSERT INTO categorias (nombre, descripcion) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $nombre, $descripcion);

    if ($stmt->execute()) {

        $newId = $stmt->insert_id;
        $dir = "../assets/categorias/$newId/";

        // Guardar portada
        $portada = guardarImagen("portada", $dir, "portada");

        // Guardar miniatura
        $miniatura = guardarImagen("miniatura", $dir, "miniatura");

        echo json_encode([
            "success" => true,
            "message" => "Categoría agregada",
            "portada" => $portada,
            "miniatura" => $miniatura
        ]);

    } else {
        echo json_encode(["success" => false, "message" => "Error: " . $stmt->error]);
    }

} else {

    // ACTUALIZAR
    $sql = "UPDATE categorias SET nombre = ?, descripcion = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssi", $nombre, $descripcion, $id);

    if ($stmt->execute()) {

        $dir = "../assets/categorias/$id/";

        // Si subió nueva portada => guardarla
        $portada = guardarImagen("portada", $dir, "portada");

        // Si subió nueva miniatura => guardarla
        $miniatura = guardarImagen("miniatura", $dir, "miniatura");

        echo json_encode([
            "success" => true,
            "message" => "Categoría editada",
            "portada" => $portada,
            "miniatura" => $miniatura
        ]);

    } else {
        echo json_encode(["success" => false, "message" => "Error: " . $stmt->error]);
    }
}

$stmt->close();
$conn->close();
?>
