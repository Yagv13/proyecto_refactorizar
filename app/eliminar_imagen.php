<?php
header('Content-Type: application/json');

$id = $_POST['id'] ?? '';
$filename = $_POST['filename'] ?? '';

if (!$id || !$filename) {
    echo json_encode(["ok" => false, "error" => "Datos incompletos"]);
    exit;
}

$path = "../assets/products/$id/$filename";

if (file_exists($path)) {
    unlink($path);
    echo json_encode(["ok" => true]);
} else {
    echo json_encode(["ok" => false, "error" => "Archivo no existe"]);
}
