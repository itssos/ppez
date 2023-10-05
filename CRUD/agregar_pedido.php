<?php
if (isset($_POST['idMozo']) && isset($_POST['idMesa'])) {
    $idMozo = $_POST['idMozo'];
    $idMesa = $_POST['idMesa'];
    include('../Config/conexion.php');
    $sql = "INSERT INTO pedidos (mozos_id_mozos, fecha, mesa_idmesa, estado) VALUES ($idMozo, NOW(), $idMesa, 0)";
    if (mysqli_query($conexion, $sql)) {
        echo "success:" . mysqli_insert_id($conexion);
    } else {
        echo "error"; 
    }
    mysqli_close($conexion);
} else {
    echo "missing_data"; 
}
?>
