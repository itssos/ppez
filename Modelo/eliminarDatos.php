<?php 
include("conexion.php");
$iD=$_GET['IdEliminar'];
$sql = "DELETE FROM plato WHERE idplato='$iD'";
$query = mysqli_query($conexion,$sql);
if ($query===TRUE) {
    header("location: ../vistaAdmin/index.php");
}
?>