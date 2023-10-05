<?php
if (isset($_POST['idMozo']) && isset($_POST['idMesa'])) {
    $idMozo = $_POST['idMozo'];
    $idMesa = $_POST['idMesa'];

    // Realiza la conexión a la base de datos (Asume que ya tienes esta parte configurada)
    include('../Config/conexion.php');

    // Define la consulta SQL para insertar el nuevo pedido
    $sql = "INSERT INTO pedidos (mozos_id_mozos, fecha, mesa_idmesa, estado) VALUES ($idMozo, NOW(), $idMesa, 0)";

    // Ejecuta la consulta
    if (mysqli_query($conexion, $sql)) {
        echo "success"; // Envía una respuesta simple de éxito
    } else {
        echo "error"; // Envía una respuesta simple de error
    }

    // Cierra la conexión a la base de datos
    mysqli_close($conexion);
} else {
    echo "missing_data"; // Envía una respuesta si faltan datos
}
// ... (código para insertar el pedido en la base de datos)

// Obtén el ID del pedido recién insertado
$pedidoId = mysqli_insert_id($conexion);

// Devuelve el ID del pedido como respuesta
echo $pedidoId;

?>
