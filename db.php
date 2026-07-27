<?php
/* 
$servername = "localhost";   // servidor local
$username   = "root";        // usuario por defecto en XAMPP
$password   = "";            // contraseña vacía por defecto
$dbname     = "globxel";     // nombre de tu base en phpMyAdmin
 */

/* 
Cuando se esté usando xampp en linux por medio de Docker usar las siguientes credenciales,
en caso de usar xampp en Windows comentar las credenciales de abajo y descomentar las de arriba.
*/

// $servername = "db";
// $username = "root";
// $password = "root";
// $dbname = "globxel";

$isLocal = ($_SERVER['SERVER_NAME'] === 'localhost' || $_SERVER['SERVER_NAME'] === '127.0.0.1');

if ($isLocal) {
    $servername = "localhost";
    $username   = "root";
    $password   = "";
    $dbname     = "globxel";
} else {
    $servername = "127.0.0.1";
    $username   = "u379047759_globxelprueba";
    $password   = "Globxel2026*";
    $dbname     = "u379047759_globxelp";
}

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
