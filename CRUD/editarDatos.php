<?php 
include_once("../Config/conexion.php");
$Id=$_POST['ID'];
$Menú=$_POST['Menú'];
$Nombre=$_POST['Nombre'];
$Descripcion=$_POST['Descripcion'];
$Precio=$_POST['Precio'];
$Foto=$_POST['Foto'];

$sql = "UPDATE plato SET
nombre='".$Nombre."',
descripción='".$Descripcion."',
precio='".$Precio."',
imagen='".$Foto."',
menú_idmenú='".$Menú."'
WHERE idplato=".$Id."";
if ($resultado = mysqli_query($conexion, $sql)) {
    header("location: ../vistaAdmin/index.php");
}
