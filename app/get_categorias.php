<?php
include __DIR__ . '/../db.php';

ob_clean();
header('Content-Type: application/json');

try {
    $query = "SELECT 
            id,
            nombre,
            descripcion
        FROM categorias
        ORDER BY id ASC
    ";

    $stmt = $conn->prepare($query);
    $stmt->execute();
    $result = $stmt->get_result();

    $categorias = [];
    while ($row = $result->fetch_assoc()) {

        $folder = "../assets/categorias/" . $row["id"] . "/";

        // Detectar portada
        $portada = glob($folder . "portada.*");
        $portada = !empty($portada) ? basename($portada[0]) : null;

        // Detectar miniatura
        $miniatura = glob($folder . "miniatura.*");
        $miniatura = !empty($miniatura) ? basename($miniatura[0]) : null;

        $categorias[] = [
            'id' => $row['id'],
            'nombre' => $row['nombre'],
            'descripcion' => $row['descripcion'],
            'portada' => $portada,
            'miniatura' => $miniatura
        ];
    }

    echo json_encode(['categorias' => $categorias]);

} catch (Exception $e) {
    echo json_encode([
        'error' => true,
        'message' => 'Error: ' . $e->getMessage()
    ]);
}
