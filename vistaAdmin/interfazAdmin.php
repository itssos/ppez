<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header('Location: ../loginAdmin.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>
        /* Estilo para los botones */
        .card-button {
            background: none;
            border: none;
            padding: 0;
            cursor: pointer;
            max-width: 250px;
            margin: 0 auto;
            /* Centra horizontalmente los botones */
            transition: transform 0.3s;
            /* Agrega una animación de transformación */
        }

        /* Estilo para los botones al hacer hover */
        .card-button:hover {
            transform: scale(1.1);
            /* Escala el botón al 110% en el hover */
        }
    </style>
</head>

<body>

    <div class="container_MOZO">
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">P'PEZ</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="interfazAdmin.php">DASHBOARD</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Platos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="ventas.php">Ventas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Mozos.php">Mozos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../model/logoutAdmin.php">Cerrar Sesión</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <?php
        $nombreUsuario = $_SESSION['usuario'];
        $idMozo = isset($_SESSION['id_admin']) ? $_SESSION['id_admin'] : 'ID no encontrado';

        echo "<br><figure class='text-center'><blockquote class='blockquote'>";
        echo "<p>Usuario Administrador: $nombreUsuario</p>";
        echo "</blockquote><figcaption class='blockquote-footer'>
        ID ADMIN: <cite title='Source Title'>$idMozo</cite>
        </figcaption>";
        ?>
    </div>


    <br>
    <div class="card-button" onclick="window.location.href='index.php'">
        <div class="card mb-3">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="../assets/img/plato.png" class="img-fluid rounded-start" alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title text-center">Agregar Platos</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card-button" onclick="window.location.href='ventas.php'">
        <div class="card mb-3">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="../assets/img/ventas.png" class="img-fluid rounded-start" alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title text-center">Ver ventas</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card-button" onclick="window.location.href='mozos.php'">
        <div class="card mb-3">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="../assets/img/mozo.png" class="img-fluid rounded-start" alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title text-center">Crear Mozo</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <footer class="py-3 my-4">
        <ul class="nav justify-content-center border-bottom pb-3 mb-3">
            <li class="nav-item"><a href="../vistaMozo/menu.php" class="nav-link px-2 text-muted">Home</a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Caracteristicas</a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">FAQs</a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Nosotros</a></li>
        </ul>
        <p class="text-center text-muted">© 2023 Company, Inc</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>