<?php
$servername = "localhost"; // Cambia esto a la dirección del servidor de tu base de datos si es diferente
$username = "root"; // Cambia esto al nombre de usuario de tu base de datos
$password = ""; // Cambia esto a la contraseña de tu base de datos
$database = "sabor_peruano"; // Cambia esto al nombre de tu base de datos

// Crea una conexión a la base de datos
$conn = new mysqli($servername, $username, $password, $database);

// Verifica la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Establece la codificación de caracteres a UTF-8 (opcional)
$conn->set_charset("utf8");

?>
