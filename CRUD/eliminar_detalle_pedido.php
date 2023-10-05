<?php
include('../Config/conexion.php');

if (isset($_REQUEST['id_detalle'])) {
    $id_pedido = $_REQUEST['id_detalle'];
    $eliminar_detalle = "DELETE FROM detalle_pedido WHERE id_detalle = '$id_pedido'";
    
    if (mysqli_query($conexion, $eliminar_detalle)) {
        echo "success"; // Envía una respuesta de éxito al cliente
    } else {
        echo "Error al eliminar el detalle de pedido: " . mysqli_error($con);
    }
} else {
    echo "No se proporcionó un ID de detalle válido.";
}
?>
