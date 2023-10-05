<?php
if (isset($_POST['pedidoId'])) {
    $pedidoId = $_POST['pedidoId'];

    // Realiza la conexión a la base de datos (Asume que ya tienes esta parte configurada)
    include('../Config/conexion.php');

    // Define la consulta SQL para eliminar el pedido
    $sql = "DELETE FROM pedidos WHERE idpedidos = $pedidoId";

    // Ejecuta la consulta
    if (mysqli_query($conexion, $sql)) {
        echo "success"; // Envía una respuesta simple de éxito
    } else {
        echo "error"; // Envía una respuesta simple de error
    }

    // Cierra la conexión a la base de datos
    mysqli_close($conexion);
} else {
    echo "missing_data"; // Envía una respuesta si falta el ID del pedido
}
?>
