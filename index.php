<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>P'Pez</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>

<body>

    <?php
    session_start(); // Iniciar la sesión al principio del archivo

    if (isset($_SESSION['usuario'])) {
        // Hay un usuario en la sesión, mostrar el contenido de la página aquí
        echo "Bienvenido, " . $_SESSION['usuario'];
        echo '<a href="model/logout.php">Cerrar Sesión</a>';

        ?>
        
            <h2>AQUI CODIGO HTML CUANDO SE LOGEE</h2>

        <?php

    } else {
        // No hay usuario en la sesión, redirigir al login
        header('location: /ppez/login.php');
        exit; // Terminar el script para evitar que se siga ejecutando después de la redirección
    }
    ?>

</body>

</html>