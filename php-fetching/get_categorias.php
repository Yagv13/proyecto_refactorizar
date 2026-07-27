<?php

header('Content-Type: application/json');

include __DIR__ . '/../db.php';

try {
    $query = 'SELECT id, nombre FROM categorias';
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $result = $stmt->get_result();

    $categorias = [];

    while ($categoria = $result->fetch_assoc()) {
        $categorias[] = [
            "id" => $categoria['id'],
            "nombre" => $categoria['nombre']
        ];
    }

    ob_end_clean();
    echo json_encode(["categorias" => $categorias]);
} catch (Exception $exc) {
    echo json_encode([
        'error' => true,
        'message' => 'Error: ' . $exc->getMessage()
    ]);
}
