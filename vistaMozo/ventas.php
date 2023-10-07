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
    <title>Ventas en Tiempo Real</title>
    <link rel="stylesheet" href="../assets/css/menú.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
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
                            <a class="nav-link" href="#">Link</a>
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

    <div id="tablaVentas">
        <!-- Aquí se mostrará la tabla -->
    </div>
    <br><br>

    <div class="footer">
        <nav>
            <a href="../vistaMozo/menu.php">MENÚ</a>
            <a href="../vistaMozo/mesas.php">MESAS</a>
        </nav>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

    <script>
        // Función para cargar y actualizar la tabla de ventas
        function cargarTablaVentas() {
            $.ajax({
                url: '../CRUD/obtener_ventas.php', // Reemplaza con la URL correcta para obtener los datos de ventas
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
                url: '../CRUD/actualizar_estado_venta.php', // Ruta de tu script PHP para actualizar el estado
                method: 'POST',
                data: {
                    ventaID: ventaID
                },
                success: function(response) {
                    if (response === 'success') {

                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Pedido Pagado',
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