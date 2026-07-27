<?php
header('Content-Type: application/json');
include __DIR__ . '/../db.php'; 

// Recibir datos
$id = $_POST['id'] ?? ''; //si viene vacio será insert
$nombre = $_POST['nombre'] ?? '';
$sub_categoria_id = $_POST['sub_categoria_id'] ?? '';
$resumen = $_POST['resumen'] ?? '';
$material = $_POST['material'] ?? '';
$color = $_POST['color'] ?? '';
$precio = $_POST['precio'] ?? '';
$descripcion = $_POST['descripcion'] ?? '';
$detalles = $_POST['detalles'] ?? '';

// Validar que no estén vacíos
/* if (empty($nombre) || empty($apellido) || empty($email) || empty($telefono)) {
    echo json_encode(["mensaje" => "Datos incompletos, no se insertó"]);
    exit;
} */

if (empty($id)) {
    // Insertar en la tabla
    $sql = "INSERT INTO 
        productos (nombre, sub_categoria_id, resumen, material, color, precio, descripcion, detalles) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sissssss", 
        $nombre, 
        $sub_categoria_id, 
        $resumen, 
        $material, 
        $color, 
        $precio, 
        $descripcion, 
        $detalles);

    
    if ($stmt->execute()) {

        // Obtener ID insertado
        $newId = $stmt->insert_id;

        // Guardar imagenes
        if (isset($_FILES['imagenes'])) {
            $dir = "../assets/products/$newId/";
            if (!file_exists($dir)) mkdir($dir, 0777, true);

            $count = 1;

            foreach ($_FILES['imagenes']['tmp_name'] as $key => $tmp_name) {
                $ext = pathinfo($_FILES['imagenes']['name'][$key], PATHINFO_EXTENSION);
                $newName = $newId . "_" . $count . "." . $ext;
                move_uploaded_file($tmp_name, $dir . $newName);
                $count++;
            }
        }

        echo json_encode(["mensaje" => "Producto agregado correctamente"]);
    } else {
        echo json_encode(["mensaje" => "Error al agregar producto"]);
    }

} else {
    // Actualizar en la tabla
    $sql = "UPDATE 
        productos SET nombre = ?, sub_categoria_id = ?, resumen = ?, material = ?, color = ?, precio = ?, descripcion = ?, detalles = ?
        WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sissssssi", 
    $nombre, 
    $sub_categoria_id, 
    $resumen, 
    $material, 
    $color, 
    $precio, 
    $descripcion, 
    $detalles, 
    $id);
    
    if ($stmt->execute()) {

        // SI SUBE NUEVAS IMÁGENES, GUARDARLAS
        if (isset($_FILES['imagenes'])) {
            $dir = "../assets/products/$id/";
            if (!file_exists($dir)) mkdir($dir, 0777, true);

            // numerar nuevas imágenes según cuántas existan
            $existing = glob($dir . "$id_*.*");
            $count = count($existing) + 1;

            foreach ($_FILES['imagenes']['tmp_name'] as $key => $tmp_name) {
                $ext = pathinfo($_FILES['imagenes']['name'][$key], PATHINFO_EXTENSION);
                $newName = $id . "_" . $count . "." . $ext;
                move_uploaded_file($tmp_name, $dir . $newName);
                $count++;
            }
        }

        echo json_encode(["mensaje" => "Producto actualizado correctamente"]);
    } else {
        echo json_encode(["mensaje" => "Error al actualizar producto"]);
    }
}

$stmt->close();
$conn->close();
?>
