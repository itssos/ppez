<?php
// Configuración de la conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$database = "ppez";
$port = 3306;

// Crear la conexión a la base de datos
$conexion = new mysqli($servername, $username, $password, $database, $port);

// Verificar la conexión
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}