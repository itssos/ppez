<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['idPlato']) && isset($_POST['cantidad'])) {
    $idPlato = $_POST['idPlato'];
    $cantidad = $_POST['cantidad'];
    $idPedido = $_SESSION['idPedido']; // Asegúrate de tener el ID del pedido disponible en tu sesión

    include ("../Config/conexion.php");

    $sqlInsertar = "INSERT INTO detalle_pedido (plato_idplato, cantidad, pedidos_idpedidos) 
                    VALUES ('$idPlato', $cantidad, $idPedido)";

    if ($conexion->query($sqlInsertar) === TRUE) {
        echo "Plato agregado al pedido correctamente.";
    } else {
        echo "Error al agregar el plato al pedido: " . $conexion->error;
    }

    $conexion->close();
} else {
    echo "Solicitud no válida.";
}
?>
