<?php 
include ("../Config/conexion.php");
$iD=$_GET['IdEliminar'];
$sql = "DELETE FROM plato WHERE idplato='$iD'";
$query = mysqli_query($conexion,$sql);
if ($query===TRUE) {
    header("location: ../view/index.php");
}
?>