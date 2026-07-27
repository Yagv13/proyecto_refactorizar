<?php
header("Content-Type: application/json");
include __DIR__ . '/../db.php';

$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$per_page = isset($_GET['per_page']) ? intval($_GET['per_page']) : 9;

$categoria = isset($_GET['categoria']) ? intval($_GET['categoria']) : null;
$subcategoria = isset($_GET['subcategoria']) ? intval($_GET['subcategoria']) : null;

$offset = ($page - 1) * $per_page;

/* -------------------------
   CONDICIONES DINÁMICAS
------------------------- */
$where = "WHERE 1";
$params = [];
$types = "";

// filtrar categoría (correcto)
if ($categoria) {
    $where .= " AND c.id = ?";
    $params[] = $categoria;
    $types .= "i";
}

// filtrar subcategoría (CORRECTO → usar tabla productos)
if ($subcategoria) {
    $where .= " AND p.sub_categoria_id = ?";
    $params[] = $subcategoria;
    $types .= "i";
}

/* -------------------------
   OBTENER TOTAL
------------------------- */
$sql_total = "
    SELECT COUNT(*) AS total
    FROM productos p
    JOIN sub_categorias s ON p.sub_categoria_id = s.id
    JOIN categorias c ON s.categoria_id = c.id
    $where
";

$stmt = $conn->prepare($sql_total);
if (!empty($params)) $stmt->bind_param($types, ...$params);
$stmt->execute();
$res_total = $stmt->get_result();
$total_products = $res_total->fetch_assoc()["total"];

$total_pages = ceil($total_products / $per_page);

/* -------------------------
      OBTENER PRODUCTOS
------------------------- */
$sql = "
    SELECT 
        p.id, 
        p.nombre,
        s.nombre AS subcategoria,
        c.nombre AS categoria
    FROM productos p
    JOIN sub_categorias s ON p.sub_categoria_id = s.id
    JOIN categorias c ON s.categoria_id = c.id
    $where
    ORDER BY p.id ASC
    LIMIT $per_page OFFSET $offset
";

$stmt2 = $conn->prepare($sql);
if (!empty($params)) $stmt2->bind_param($types, ...$params);
$stmt2->execute();
$res_products = $stmt2->get_result();

$products = [];

while ($row = $res_products->fetch_assoc()) {

    // Imagen principal
    $folder = __DIR__ . "/../assets/products/{$row['id']}/";
    $imagen_principal = null;

    if (is_dir($folder)) {
        $files = glob($folder . "*.*");
        if (count($files) > 0) {
            $imagen_principal = basename($files[0]);
        }
    }

    $row["imagen_principal"] = $imagen_principal;

    $products[] = $row;
}

echo json_encode([
    "current_page" => $page,
    "total_pages" => $total_pages,
    "products" => $products
]);
