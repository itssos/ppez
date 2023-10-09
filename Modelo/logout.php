<?php
session_start(); // Iniciar la sesión

// Destruir todas las variables de sesión
session_unset();

// Destruir la sesión
session_destroy();

// Redirigir al usuario a la página de inicio de sesión o a donde desees
header('location: ../login.php');
exit; // Terminar el script para evitar que se siga ejecutando después de la redirección
?>
