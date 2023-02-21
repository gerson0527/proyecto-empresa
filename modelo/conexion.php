<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "empresa";

// Conexión a la base de datos
$conn = new mysqli($server, $username, $password, $database);

// Verificar si la conexión fue exitosa
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
