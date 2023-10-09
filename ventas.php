<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ventas en Tiempo Real</title>
    <link rel="stylesheet" href="../assets/css/menú.css">
    <link rel="stylesheet" href="../assets/css/titulo.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
                            <a class="nav-link active" aria-current="page" href="index.php">Pedidos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="mesas.php">Mesas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="ventas.php">Ventas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Modelo/logout.php">Cerrar Sesión</a>
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


    <br>
    <div class="titulo-container">
        <h2>REGISTRO DE VENTAS DEL DIA</h2>
    </div>
    <br>

    <div id="tablaVentas">
        <!-- Aquí se mostrará la tabla -->
    </div>
    <br><br>

    <footer class="py-3 my-4">
        <ul class="nav justify-content-center border-bottom pb-3 mb-3">
            <li class="nav-item"><a href="index.php" class="nav-link px-2 text-muted">Home</a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Caracteristicas</a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">FAQs</a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Nosotros</a></li>
        </ul>
        <p class="text-center text-muted">© 2023 Company, Inc</p>
    </footer>

    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    <script>
        // Función para cargar y actualizar la tabla de ventas
        function cargarTablaVentas() {
            $.ajax({
                url: 'Modelo/obtener_ventas.php', // Reemplaza con la URL correcta para obtener los datos de ventas
                method: 'GET',
                dataType: 'html',
                success: function(data) {
                    $('#tablaVentas').html(data);

                    // Inicializa la tabla DataTable
                    $('#ventasTable').DataTable();
                },
                error: function() {
                    console.log('Error al cargar las ventas.');
                }
            });
        }

        // Carga la tabla inicialmente al cargar la página
        cargarTablaVentas();

        // Actualiza la tabla cada 5 segundos (puedes ajustar el intervalo según tus necesidades)
        setInterval(function() {
            cargarTablaVentas();
        }, 5000); // 5000 milisegundos = 5 segundos

        // Maneja el clic en el botón "Actualizar"
        $(document).on('click', '.btn-actualizar', function() {
            const ventaID = $(this).data('venta-id');

            // Realiza la solicitud Ajax para actualizar el estado
            $.ajax({
                url: 'Modelo/actualizar_estado_venta.php', // Ruta de tu script PHP para actualizar el estado
                method: 'POST',
                data: {
                    ventaID: ventaID
                },
                success: function(response) {
                    if (response === 'success') {

                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Venta Pagada',
                            showConfirmButton: false,
                            timer: 1500
                        })
                        cargarTablaVentas();
                    } else {
                        alert('Error al actualizar el estado.');
                    }
                },
                error: function() {
                    alert('Error al actualizar el estado.');
                }
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>