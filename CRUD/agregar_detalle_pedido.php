<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $idPlato = $_POST["idPlato"]; // Usar el nombre correcto del campo del botón
    $cantidad = $_POST["cantidad"]; // Obtener cantidad correctamente
    $pedidoId = $_POST["pedidoId"]; // Obtener pedidoId correctamente
    include('../Config/conexion.php');
    // Intenta ejecutar la consulta SQL
    $sql = "INSERT INTO detalle_pedido (plato_idplato, cantidad, pedidos_idpedidos) VALUES (?, ?, ?)";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("iii", $idPlato, $cantidad, $pedidoId);

    if ($stmt->execute()) {
        echo "Plato agregado al pedido con éxito";
    } else {
        echo "Error al agregar el plato al pedido: " . $stmt->error;
    }
    $stmt->close();
    $conexion->close();
}
