<?php
// Incluye el archivo de conexión a la base de datos
include 'conexion.php';

// Obtiene los valores del formulario
$username = trim($_POST['username']);
$password = trim($_POST['password']);

// Realiza una consulta SQL para verificar las credenciales
$sql = "SELECT * FROM sabor_peruano.mozos WHERE usuario = '$username' and contraseña='$password'";
$resultado = $conn->query($sql);
if($resultado->num_rows>0){
    session_start();
    $_SESSION['user']=$username;
    header("Location: bienvenido.php");
}else{
    header("Location: login.php");
}
?>
