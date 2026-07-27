<?php
header('Content-Type: application/json');
include __DIR__ . '/../db.php'; 

$id = $_POST['id'] ?? '';

// Convertir a entero
$id = intval($id);
error_log("🟠 ELIMINAR - ID recibido en PHP: " . $id . " (Tipo: " . gettype($id) . ")");

// Validación CORREGIDA - solo una condición
if ($id <= 0) {
    echo json_encode(["success" => false, "message" => "ID inválido o vacío: " . $id]);
    exit;
}

$sql = "DELETE FROM sub_categorias WHERE id = ?";
$stmt = $conn->prepare($sql);

if (!$stmt) {
    echo json_encode(["success" => false, "message" => "Error preparando consulta: " . $conn->error]);
    exit;
}

$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    // Verificar si realmente se eliminó algo
    if ($stmt->affected_rows > 0) {
        echo json_encode(["success" => true, "message" => "Categoría eliminada correctamente"]);
    } else {
        echo json_encode(["success" => false, "message" => "No se encontró la categoría con ID: " . $id]);
    }
} else {
    echo json_encode(["success" => false, "message" => "Error ejecutando consulta: " . $stmt->error]);
}

$stmt->close();
$conn->close();
?>

