
<?php
// Conectar a la base de datos (reemplaza con tus datos de conexión)
$conexion = mysqli_connect("localhost", "root", "", "sabor_peruano");

if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}

// Obtener el ID del pedido desde el formulario
$pedido_id = $_POST['pedido_id'];

// Verificar si se recibió el ID del pedido
if (!empty($pedido_id)) {
    // Calcular el monto total
    $sql_calcular_monto = "SELECT SUM(p.precio) AS total
                          FROM detalle_pedido AS dp
                          JOIN plato AS p ON dp.plato_idplato = p.idplato
                          WHERE dp.pedidos_idpedidos = $pedido_id";
    $result_calculo = mysqli_query($conexion, $sql_calcular_monto);

    if ($result_calculo && mysqli_num_rows($result_calculo) > 0) {
        $row = mysqli_fetch_assoc($result_calculo);
        $monto_total = $row['total'];

        // Actualizar el estado del pedido a 1 (pagado) en la tabla 'pedidos'
        $sql_actualizar_estado = "UPDATE pedidos SET estado = 1 WHERE idpedidos = $pedido_id";
        $result_actualizacion = mysqli_query($conexion, $sql_actualizar_estado);

        if ($result_actualizacion) {
            // Insertar la venta en la tabla 'ventas'
            $sql_insertar_venta = "INSERT INTO ventas (pedidos_idpedidos, fecha, monto_total, estado) VALUES ($pedido_id, NOW(), $monto_total, 1)";
            $result_venta = mysqli_query($conexion, $sql_insertar_venta);

            if ($result_venta) {
                echo "Venta registrada con éxito. Monto total: $monto_total";
            } else {
                echo "Error al registrar la venta: " . mysqli_error($conexion);
            }
        } else {
            echo "Error al actualizar el estado del pedido: " . mysqli_error($conexion);
        }
    } else {
        echo "Error al calcular el monto total.";
    }
} else {
    echo "ID de pedido no válido.";
}

// Cerrar la conexión
mysqli_close($conexion);
?>
