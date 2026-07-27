<?php

header("Content-Type: application/json");

include __DIR__ . "/../db.php";

$categoriaSelected = isset($_GET['categoria']) ? intval($_GET['categoria']) : '';

try {
    $query = 'SELECT id, nombre FROM sub_categorias WHERE categoria_id = ?';
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $categoriaSelected);
    $stmt->execute();
    $result = $stmt->get_result();

    $subcategorias = [];

    while ($subcatedoria = $result->fetch_assoc()) {
        $subcategorias[] = [
            'id' => $subcatedoria['id'],
            'nombre' => $subcatedoria['nombre']
        ];
    }

    ob_end_clean();
    echo json_encode(['subcategorias' => $subcategorias]);
} catch (Exception $exc) {
    echo json_encode([
        "error" => true,
        "message" => "Error: {$exc->getMessage()}"
    ]);
}
