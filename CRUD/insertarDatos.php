<?php
include("../Config/conexion.php");

$nombre = $_POST['Nombre'];
$descripcion = $_POST['Descripcion'];
$precio = $_POST['Precio'];
$foto = $_POST['Foto'];
$menú = $_POST['Menú'];


$sql = "INSERT INTO plato(idplato,nombre,descripción,precio,imagen,menú_idmenú) 
        VALUES (null,'$nombre', '$descripcion', '$precio', '$foto', '$menú')";

if ($resultado = mysqli_query($conexion, $sql)) {
    header("location: ../view/index.php");
} else {
    echo "Error en la consulta SQL: ".mysqli_error($conexion);
}