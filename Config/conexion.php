<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "sabor_peruano";
$port = 3306;

// Crear la conexión a la base de datos
$conexion = new mysqli($servername, $username, $password, $database, $port);

// Verificar la conexión
if ($conexion->connect_error) {
   die('Error de conexión: ' . $conexion->connect_error);
}