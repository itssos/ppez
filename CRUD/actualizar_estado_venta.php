<?php
include("../Config/conexion.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ventaID = $_POST['ventaID'];

    // Consulta SQL para cambiar el estado de la venta
    $sql = "UPDATE ventas SET estado = 1 WHERE id_ventas = $ventaID";

    if ($conexion->query($sql) === TRUE) {
        echo 'success';
    } else {
        echo 'error';
    }
} else {
    echo 'Acceso no válido.';
}

$conexion->close();
?>
