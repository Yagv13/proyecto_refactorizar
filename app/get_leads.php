<?php
include __DIR__ . '/../db.php';


ob_clean();
header('Content-Type: application/json');

try {
    $query = "SELECT 
            id,
            nombre,
            empresa,
            email,
            telefono,
            mensaje
        FROM leads
        ORDER BY id DESC
    ";

    $stmt = $conn->prepare($query);
    $stmt->execute();
    $result = $stmt->get_result();

    $leads = [];
    while ($row = $result->fetch_assoc()) {
        $leads[] = [
            'id'      => $row['id'],
            'nombre'  => $row['nombre'] ?: 'Sin nombre',
            'empresa' => $row['empresa'] ?: 'Sin empresa',
            'email'   => $row['email'] ?: 'Sin email',
            'telefono'=> $row['telefono'] ?: 'Sin teléfono',
            'mensaje' => $row['mensaje'] ?: 'Sin mensaje'
        ];

    }

    echo json_encode(['leads' => $leads]);

} catch (Exception $e) {
    echo json_encode([
        'error' => true,
        'message' => 'Error: ' . $e->getMessage()
    ]);
}
