<?php
if (isset($_POST['pedidoId'])) {
    $pedidoId = $_POST['pedidoId'];

    include('../Config/conexion.php');

    $sql = "DELETE FROM pedidos WHERE idpedidos = $pedidoId";

    if (mysqli_query($conexion, $sql)) {
        echo "success" ;
    } else {
        echo "error"; 
    }

    mysqli_close($conexion);
} else {
    echo "missing_data"; 
}

?>
