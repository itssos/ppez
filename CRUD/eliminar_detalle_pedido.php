<?php 
include('../Config/conexion.php');
$id_pedido=$_REQUEST['id_detalle'];
$eliminar_detalle=("DELETE FROM detalle_pedido WHERE id_detalle = '".$id_pedido."'");
mysqli_query($con,$eliminar_detalle);