<?php
include("conexion.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $mesaID = $_POST['mesaID'];

    // Consulta SQL para cambiar el estado de la mesa
    $sql = "UPDATE mesa SET estado = CASE estado WHEN 0 THEN 1 ELSE 0 END WHERE idmesa = $mesaID";

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
