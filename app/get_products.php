<?php
include __DIR__ . '/../db.php';

header('Content-Type: application/json');

try {
    // Consulta para obtener los productos
    $query = "SELECT 
                id,
                nombre,
                resumen,
                precio
            FROM productos
            ORDER BY id DESC
        ";

    $stmt = $conn->prepare($query);
    $stmt->execute();
    $result = $stmt->get_result();
    
    $products = [];
    
    while ($row = $result->fetch_assoc()) {

        //Verificación de imagenes
        $folder = "../assets/products/" . $row["id"] . "/";

        $images = glob($folder . $row["id"] . "_*.*");
        $imagePath = (!empty($images)) ? $images[0] : "../assets/products/default.png";


        //Variables que se usarán
        $products[] = [
            'id' => $row['id'],
            'nombre' => $row['nombre'],
            'resumen' => $row['resumen'],
            'precio' => $row['precio'],
            'imagen' => $imagePath
        ];
    }
        ob_end_clean();
        echo json_encode(['products' => $products]);

    } catch (Exception $e) {
        echo json_encode([
            'error' => true,
            'message' => 'Error: ' . $e->getMessage()
        ]);
}

?>