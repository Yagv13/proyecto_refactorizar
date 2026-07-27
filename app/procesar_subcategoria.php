<?php
header('Content-Type: application/json');
include __DIR__ . '/../db.php';

$id = $_POST['id'] ?? '';
$categoria_id = $_POST['categoria_id'] ?? '';
$nombre = $_POST['nombre'] ?? '';
$descripcion = $_POST['descripcion'] ?? '';

/* Función para guardar las imagenes */
function guardarPortada($dir)
{
    if (!isset($_FILES['portada']) || $_FILES['portada']['error'] !== 0) {
        return null; // no se subió imagen
    }

    // Crear carpeta si no existe
    if (!file_exists($dir)) mkdir($dir, 0777, true);

    $ext = pathinfo($_FILES['portada']['name'], PATHINFO_EXTENSION);
    $fileName = "portada." . $ext;
    $rutaDestino = $dir . $fileName;

    // Si ya existe, eliminar para reemplazar
    if (file_exists($rutaDestino)) unlink($rutaDestino);

    if (move_uploaded_file($_FILES['portada']['tmp_name'], $rutaDestino)) {
        return $fileName;
    } else {
        return null;
    }
}

if (empty($id)) {

    // INSERTAR
    $sql = "INSERT INTO sub_categorias (categoria_id, nombre, descripcion) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iss", $categoria_id, $nombre, $descripcion);

    if ($stmt->execute()) {

        $newId = $stmt->insert_id;
        $dir = "../assets/subcategorias/$newId/";

        // Guardar portada si viene
        $portada = guardarPortada($dir);

        echo json_encode([
            "success" => true,
            "message" => "Subcategoría agregada",
            "portada" => $portada
        ]);

    } else {
        echo json_encode(["success" => false, "message" => "Error: " . $stmt->error]);
    }

} else {

    // ACTUALIZAR
    $sql = "UPDATE sub_categorias SET categoria_id = ?, nombre = ?, descripcion = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("issi", $categoria_id, $nombre, $descripcion, $id);

    if ($stmt->execute()) {

        $dir = "../assets/subcategorias/$id/";

        // Reemplazar portada si se subió una nueva
        $portada = guardarPortada($dir);

        echo json_encode([
            "success" => true,
            "message" => "Subcategoría editada",
            "portada" => $portada
        ]);

    } else {
        echo json_encode(["success" => false, "message" => "Error: " . $stmt->error]);
    }

}

$stmt->close();
$conn->close();
?>
