<?php
include __DIR__ . '/../db.php';


ob_clean();
header('Content-Type: application/json');

try {
    $query = "SELECT 
            id,
            nombre,
            apellido,
            email,
            telefono,
            rol,
            pass
        FROM usuarios
        ORDER BY id DESC
    ";

    $stmt = $conn->prepare($query);
    $stmt->execute();
    $result = $stmt->get_result();

    $users = [];
    while ($row = $result->fetch_assoc()) {
        $users[] = [
            'id'      => $row['id'],
            'nombre'  => $row['nombre'],
            'apellido' => $row['apellido'],
            'email'   => $row['email'],
            'telefono'=> $row['telefono'],
            'rol' => $row['rol'],
            'pass' => $row['pass']
        ];

    }

    echo json_encode(['users' => $users]);

} catch (Exception $e) {
    echo json_encode([
        'error' => true,
        'message' => 'Error: ' . $e->getMessage()
    ]);
}
