<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header('Location: ../login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mesas</title>
    <link rel="stylesheet" href="../assets/css/menú.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        body {
            background-color: aliceblue;
            /* Celeste */
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
                            <a class="nav-link active" aria-current="page" href="../vistaMozo/menu.php">Pedidos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../vistaMozo/mesas.php">Mesas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../vistaMozo/ventas.php">Ventas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="model/logout.php">Cerrar Sesión</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <?php
        $nombreUsuario = $_SESSION['usuario'];
        $idMozo = isset($_SESSION['idMozo']) ? $_SESSION['idMozo'] : 'ID no encontrado';

        echo "<figure class='text-center'><blockquote class='blockquote'>";
        echo "<p>¡Bienvenido!, $nombreUsuario</p>";
        echo "</blockquote><figcaption class='blockquote-footer'>
        ID MOZO: <cite title='Source Title'>$idMozo</cite>
        </figcaption>";
        ?>
    </div>

    <div class="container">
        <div id="mesas-container" class="row row-cols-1 row-cols-md-2 g-4">
            <!-- Las tarjetas de las mesas se cargarán aquí -->
        </div>
    </div>


    <script>
        function cargarMesas() {
            $.ajax({
                url: '../CRUD/obtener_mesas.php',
                method: 'GET',
                dataType: 'html',
                success: function(data) {
                    $('#mesas-container').html(data);
                    // Agregar un manejador de eventos clic a los botones "Actualizar"
                    $('.btn-actualizar').on('click', function() {
                        const mesaID = $(this).data('mesa-id');
                        actualizarMesa(mesaID);
                    });
                },
                error: function() {
                    alert('Error al cargar las mesas.');
                }
            });
        }

        $('.btn-actualizar').on('click', function() {
            const mesaID = $(this).data('mesa-id');
            actualizarMesa(mesaID);
        });

        function actualizarMesa(mesaID) {
            $.ajax({
                url: '../CRUD/cambiar_estado_mesa.php', // Reemplaza 'ruta_a_actualizar_mesa.php' con la URL correcta
                method: 'POST',
                data: {
                    mesaID: mesaID
                },
                success: function(response) {
                    if (response === 'success') {
                        // Actualizar las mesas después de cambiar el estado
                        cargarMesas();
                    } else {
                        alert('Error al actualizar la mesa.');
                    }
                },
                error: function() {
                    alert('Error al actualizar la mesa.');
                }
            });
        }

        $(document).ready(function() {
            cargarMesas();
            setInterval(function() {
                cargarMesas();
            }, 1000);
        });
    </script>

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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>

</html>