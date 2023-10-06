<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $idPlato = $_POST["idPlato"]; // Usar el nombre correcto del campo del botón
    $cantidad = $_POST["cantidad"]; // Obtener cantidad correctamente
    $pedidoId = $_POST["pedidoId"]; // Obtener pedidoId correctamente

    include('../Config/conexion.php');

    // Verificar si el pedidoId es válido
    $verificarPedido = "SELECT idpedidos FROM pedidos WHERE idpedidos = ?";
    $stmtVerificar = $conexion->prepare($verificarPedido);
    $stmtVerificar->bind_param("i", $pedidoId);
    $stmtVerificar->execute();
    $stmtVerificar->store_result();

    if ($stmtVerificar->num_rows > 0) {
        // El pedidoId es válido, proceder con la inserción
        $stmtVerificar->close();

        // Intenta ejecutar la consulta SQL para agregar el detalle del pedido
        $sql = "INSERT INTO detalle_pedido (plato_idplato, cantidad, pedidos_idpedidos) VALUES (?, ?, ?)";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("iii", $idPlato, $cantidad, $pedidoId);

        if ($stmt->execute()) {
            echo "Plato agregado al pedido con éxito";
        } else {
            echo "Error al agregar el plato al pedido: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "El pedidoId no es válido. Asegúrate de tener un pedido válido antes de agregar detalles.";
    }

    $conexion->close();
}
