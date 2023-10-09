<?php
// Incluir el archivo de conexión a la base de datos
include("conexion.php");

// Obtener el usuario y la contraseña ingresados en el formulario (por ejemplo, a través de $_POST)
$usuario = $_POST['usuario'];
$contrasena = $_POST['pin'];

// Preparar y ejecutar la consulta SQL para validar el usuario y la contraseña
$sql = "SELECT * FROM mozos WHERE usuario = ? AND contraseña = ?";
if ($stmt = $conexion->prepare($sql)) {
    $stmt->bind_param("ss", $usuario, $contrasena); // Ligamos los parámetros
    $stmt->execute(); // Ejecutamos la consulta
    $result = $stmt->get_result(); // Obtenemos el resultado

    if ($result->num_rows > 0) {
        // El usuario y la contraseña son válidos
        // Iniciar una sesión y almacenar el usuario en una variable de sesión
        session_start();
        $_SESSION['usuario'] = $usuario;

        // Obtener el ID del mozo y almacenarlo en una variable de sesión
        $fila = $result->fetch_assoc();
        $idMozo = $fila['id_mozos'];
        $_SESSION['idMozo'] = $idMozo;

        // Redirigir al usuario a index.php o la página deseada
        header('Location: ../index.php'); // Redirige al index.php u otra página deseada
        exit; // Terminar el script
    } else {
        // El usuario y/o la contraseña son incorrectos
        // Redirigir al usuario de vuelta al formulario de inicio de sesión con un mensaje de error
        header("Location: ../login.php?error=1");
        exit; // Terminar el script
    }

    $stmt->close(); // Cerramos la consulta preparada
} else {
    echo "Error en la consulta: " . $conexion->error;
}

// Cerrar la conexión a la base de datos
$conexion->close();
?>
