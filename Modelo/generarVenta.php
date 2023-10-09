<?php
session_start();

if (isset($_POST['pedidoId']) && isset($_POST['montoTotal'])) {
    $pedidoId = $_POST['pedidoId'];
    $montoTotal = $_POST['montoTotal'];

    include("conexion.php");
    
    // Utilizar una sentencia preparada
    $insertarVenta = "INSERT INTO ventas (pedidos_idpedidos, monto_total) VALUES (?, ?)";
    $stmt = $conexion->prepare($insertarVenta);
    if ($stmt) {
        // Vincular los valores y tipos de datos
        $stmt->bind_param("id", $pedidoId, $montoTotal); // "id" indica que el primer valor es entero y el segundo es decimal (doble)
    
        // Ejecutar la sentencia preparada
        if ($stmt->execute()) {
            echo "success";
        } else {
            echo "Error al insertar en la tabla ventas: " . $stmt->error;
        }
    
        // Cerrar la sentencia preparada
        $stmt->close();
    } else {
        echo "Error en la preparación de la sentencia: " . $conexion->error;
    }
} else {
    echo "Parámetros faltantes.";
}
