<?php
session_start();
if (isset($_POST['pedidoId'])) {
    $pedidoId = $_POST['pedidoId'];
    $fechaActual = date("Y-m-d H:i:s");
    include("../Config/conexion.php");
    $sql = "INSERT INTO ventas (pedidos_idpedidos, fecha, monto_total, estado) VALUES (?, ?, ?, ?)";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("issi", $pedidoId, $fechaActual, $montoTotal, $estado);
    if ($stmt->execute()) {
        echo "success";
    } else {
        echo "Error al registrar la venta: " . $stmt->error;
    }
    $stmt->close();
    $conexion->close();
} else {
    echo "Error: Datos insuficientes.";
}
?>
