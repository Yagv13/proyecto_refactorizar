<?php
include __DIR__ . '/db.php';

header('Content-Type: application/json');

if (!isset($_GET['id'])) {
    echo json_encode(["error" => true, "message" => "No se recibió ID"]);
    exit;
}

$id = intval($_GET['id']);

try {

    // Obtener datos del producto
    $query = "
        SELECT 
            p.id,
            p.sub_categoria_id,
            p.nombre,
            p.resumen,
            p.material,
            p.color,
            p.precio,
            p.descripcion,
            p.detalles,
            s.nombre AS subcategoria_nombre,
            c.nombre AS categoria_nombre
        FROM productos p
        JOIN sub_categorias s ON p.sub_categoria_id = s.id
        JOIN categorias c ON s.categoria_id = c.id
        WHERE p.id = ?
        LIMIT 1
    ";

    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $res = $stmt->get_result();

    if ($res->num_rows === 0) {
        echo json_encode(["error" => true, "message" => "Producto no encontrado"]);
        exit;
    }

    $producto = $res->fetch_assoc();

    // Obtener imágenes del producto
    $folder = __DIR__ . "/assets/products/" . $id . "/";
    $imagenes = [];

    if (is_dir($folder)) {
        foreach (glob($folder . "*.*") as $img) {
            $imagenes[] = basename($img);
        }
    }

    $producto["imagenes"] = $imagenes;

    echo json_encode(["producto" => $producto]);

} catch (Exception $e) {

    echo json_encode([
        "error" => true,
        "message" => "Error: " . $e->getMessage()
    ]);
}
