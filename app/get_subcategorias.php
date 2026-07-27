<?php
include __DIR__ . '/../db.php';

ob_clean();
header('Content-Type: application/json');

try {
    $query = "SELECT 
                s.id,
                s.categoria_id,
                s.nombre,
                s.descripcion,
                c.nombre AS categoria_nombre
              FROM sub_categorias s
              JOIN categorias c ON s.categoria_id = c.id
              ORDER BY s.id ASC";

    $stmt = $conn->prepare($query);
    $stmt->execute();
    $result = $stmt->get_result();

    $subcategorias = [];
    while ($row = $result->fetch_assoc()) {

        $folder = "../assets/subcategorias/" . $row["id"] . "/";

        // Detectar portada
        $portada = glob($folder . "portada.*");
        $portada = !empty($portada) ? basename($portada[0]) : null;

        $subcategorias[] = [
            'id' => $row['id'],
            'categoria_id' => $row['categoria_id'],
            'categoria_nombre' => $row['categoria_nombre'], // 👈 nuevo campo
            'nombre' => $row['nombre'],
            'descripcion' => $row['descripcion'],
            'portada' => $portada
        ];
    }

    echo json_encode(['subcategorias' => $subcategorias]);

} catch (Exception $e) {
    echo json_encode([
        'error' => true,
        'message' => 'Error: ' . $e->getMessage()
    ]);
}
