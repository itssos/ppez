<?php
if (isset($_POST['idMozo']) && isset($_POST['idMesa'])) {
    $idMozo = $_POST['idMozo'];
    $idMesa = $_POST['idMesa'];
    include("conexion.php");
    $sql = "INSERT INTO pedidos (mozos_id_mozos, fecha, mesa_idmesa, estado) VALUES ($idMozo, NOW(), $idMesa, 0)";
    if (mysqli_query($conexion, $sql)) {
        $nuevoPedidoId = mysqli_insert_id($conexion); // Obtener el ID del pedido insertado
        session_start(); // Iniciar la sesión si no está iniciada
        $_SESSION['pedidoIdCreado'] = $nuevoPedidoId; // Guardar el ID del pedido en una variable de sesión
        echo "success:" . $nuevoPedidoId; // Devolver el ID del pedido como respuesta
    } else {
        echo "error"; // En caso de error
    }
    mysqli_close($conexion);
    
} else {
    echo "missing_data"; 
}
