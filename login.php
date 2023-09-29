<?php
session_start();

// Verificar si el usuario ya está autenticado
if (isset($_SESSION['usuario'])) {
    header('Location: index.php'); // Redirige al index.php u otra página deseada
    exit;
}

// Verificar si se ha pasado un mensaje de error en la URL
$error = isset($_GET['error']) ? $_GET['error'] : null;

// Mensaje de error predeterminado
$errorMessage = "";

// Definir mensajes de error personalizados según el valor del parámetro 'error'
if ($error === "1") {
    $errorMessage = "Usuario y/o contraseña incorrectos.";
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>
    <link rel="stylesheet" href="assets/css/login.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="container-login">
            <div class="container-login__background">
                <img src="assets/img/logo.png" alt="alt" />
            </div>
            <div class="container-login__title">
                <h2>Iniciar sesión </h2>
            </div>
            <?php if (!empty($errorMessage)) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $errorMessage; ?>
                    </div>
                <?php endif; ?>
            <div>
                <form action="model/validarMozo.php" method="POST" id="loginForm">
                    <div>
                        <label for="usuario">Usuario</label>
                        <input type="text" id="usuario" name="usuario" placeholder="Mozo">
                        <input type="text" id="pin" name="pin" style="display: none;">
                    </div>
                    <div class="mb-3">
                        <div class="container-pass">
                            <div class="top mt-2">
                                <div class="contentPass">
                                    <p></p>
                                </div>
                                <div class="del">
                                    <p>⌫</p>
                                </div>
                            </div>
                            <div class="buttonsPanel mt-2">
                                <div class="row mb-2">
                                    <div class="col-4">
                                        <div class="btn btn-block">
                                            <p>1</p>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="btn btn-block">
                                            <p>2</p>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="btn btn-block">
                                            <p>3</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-4">
                                        <div class="btn btn-block">
                                            <p>4</p>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="btn btn-block">
                                            <p>5</p>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="btn btn-block">
                                            <p>6</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-4">
                                        <div class="btn btn-block">
                                            <p>7</p>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="btn btn-block">
                                            <p>8</p>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="btn btn-block">
                                            <p>9</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4 offset-4">
                                        <div class="btn btn-block">
                                            <p>0</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <label for="pass">Contraseña</label>
                            <input type="password" id="pass" name="pass" placeholder="••••"> -->
                    </div>
                    <!-- <div class="d-grid">
                            <div class="btn" type="submit">Ingresar</div>
                        </div> -->
                </form>
            </div>
        </div>
    </div>

    <script src="assets/js/panelBotones.js"></script>
</body>

</html>