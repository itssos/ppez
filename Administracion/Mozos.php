<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header('Location: loginAdmin.php');
    exit;
}

$error_message = isset($_SESSION['error_message']) ? $_SESSION['error_message'] : "";
$success_message = isset($_SESSION['success_message']) ? $_SESSION['success_message'] : "";

unset($_SESSION['error_message']);
unset($_SESSION['success_message']);
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mozos</title>
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
                            <a class="nav-link" href="../Modelo/logoutAdmin.php">Cerrar Sesión</a>
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
    <h1>Mozos P'PEZ</h1>
    <div class="mb-4 p-4">
        <form id="formAgregarMozo" method="POST" action="../Controlador/Agregar_mozos.php">
            <div class="row">
                <div class="col-sm-6">
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre:</label>
                        <input type="text" class="form-control form-control-sm" id="nombre" name="nombre" required>
                    </div>
                    <div class="mb-3">
                        <label for="paterno" class="form-label">Apellido Paterno:</label>
                        <input type="text" class="form-control form-control-sm" id="paterno" name="paterno" required>
                    </div>
                    <div class="mb-3">
                        <label for="materno" class="form-label">Apellido Materno:</label>
                        <input type="text" class="form-control form-control-sm" id="materno" name="materno" required>
                    </div>
                    <div class="mb-3">
                        <label for="usuario" class="form-label">Usuario:</label>
                        <input type="text" class="form-control form-control-sm" id="usuario" name="usuario" required>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="mb-3">
                        <label for="contrasena" class="form-label">Contraseña (números de 6 dígitos):</label>
                        <input type="password" class="form-control form-control-sm" id="contrasena" name="contrasena" required>
                        <small id="contrasenaError" class="text-danger"></small>
                    </div>
                    <div class="mb-3">
                        <label for="dni" class="form-label">DNI (8 dígitos numéricos):</label>
                        <input type="number" class="form-control form-control-sm" id="dni" name="dni" required>
                        <small id="dniError" class="text-danger"></small>
                    </div>
                    <div class="mb-3">
                        <label for="telefono" class="form-label">Teléfono (9 dígitos numéricos):</label>
                        <input type="number" class="form-control form-control-sm" id="telefono" name="telefono" required>
                        <small id="telefonoError" class="text-danger"></small>
                    </div>
                    <div class="mb-3">
                        <label for="correo" class="form-label">Correo:</label>
                        <input type="email" class="form-control form-control-sm" id="correo" name="correo" required>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary" id="agregarMozoBtn">Agregar Mozo</button>
        </form>
    </div>

    <br>
    <div id="tablaVentas">
        <!-- Aquí se mostrará la tabla -->
    </div>

    <br>
    <footer class="py-3 my-4">
        <ul class="nav justify-content-center border-bottom pb-3 mb-3">
            <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Home</a></li>
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
        // Función para validar la contraseña
        document.getElementById('contrasena').addEventListener('input', function() {
            const contrasenaInput = this.value;
            const contrasenaError = document.getElementById('contrasenaError');

            if (/^\d{6}$/.test(contrasenaInput)) {
                contrasenaError.textContent = '';
            } else {
                contrasenaError.textContent = 'La contraseña debe tener exactamente 6 dígitos numéricos';
            }
        });

        // Función para validar el DNI
        document.getElementById('dni').addEventListener('input', function() {
            const dniInput = this.value;
            const dniError = document.getElementById('dniError');

            if (/^\d{8}$/.test(dniInput)) {
                dniError.textContent = '';
            } else {
                dniError.textContent = 'El DNI debe tener exactamente 8 dígitos numéricos';
            }
        });

        // Función para validar el teléfono
        document.getElementById('telefono').addEventListener('input', function() {
            const telefonoInput = this.value;
            const telefonoError = document.getElementById('telefonoError');

            if (/^\d{9}$/.test(telefonoInput)) {
                telefonoError.textContent = '';
            } else {
                telefonoError.textContent = 'El teléfono debe tener exactamente 9 dígitos numéricos';
            }
        });
    </script>
    <script>
        function cargarTablaVentas() {
            $.ajax({
                url: '../Modelo/obtener_mozos.php',
                method: 'GET',
                dataType: 'html',
                success: function(data) {
                    $('#tablaVentas').html(data);

                    // Inicializa la tabla DataTable
                    $('#ventasTable').DataTable();

                    // Agregar evento para eliminar mozos
                    $('.eliminar-mozo').on('click', function() {
                        var idMozo = $(this).data('id');
                        eliminarMozo(idMozo);
                    });
                },
                error: function() {
                    console.log('Error al cargar las ventas.');
                }
            });
        }

        // Función para eliminar un mozo
        function eliminarMozo(idMozo) {
            Swal.fire({
                title: '¿Estás seguro?',
                text: 'Esta acción no se puede deshacer',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, eliminarlo'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Realizar la eliminación del mozo
                    $.ajax({
                        url: '../Modelo/eliminar_mozo.php',
                        method: 'POST',
                        data: {
                            id: idMozo
                        },
                        success: function(response) {
                            // Recargar la tabla de mozos
                            cargarTablaVentas();
                        },
                        error: function() {
                            console.log('Error al eliminar el mozo.');
                        }
                    });
                }
            });
        }

        // Carga la tabla inicialmente al cargar la página
        cargarTablaVentas();
    </script>
    <script>
        // Obtener los parámetros de éxito y error de la URL
        const urlParams = new URLSearchParams(window.location.search);
        const successMessage = urlParams.get('success_message');
        const errorMessage = urlParams.get('error_message');

        // Mostrar SweetAlert si hay un mensaje de éxito
        if (successMessage) {
            Swal.fire({
                icon: 'success',
                title: 'Éxito!',
                text: successMessage,
            });
        }

        // Mostrar SweetAlert si hay un mensaje de error
        if (errorMessage) {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: errorMessage,
            });
        }
    </script>
    <script>
        $(document).on('click', '.detalle-mozo', function() {
            const mozoId = $(this).data('id');

            // Realiza una solicitud AJAX para obtener los detalles del mozo
            $.ajax({
                url: 'detalle_mozo.php?id=' + mozoId,
                method: 'GET',
                dataType: 'json',
                success: function(data) {
                    // Muestra los detalles en un modal o cualquier otro elemento de tu elección
                    // Por ejemplo, puedes mostrarlos en un modal Bootstrap
                    $('#modalDetalles .modal-body').html(data.detalle_html);
                    $('#modalDetalles').modal('show');
                },
                error: function() {
                    console.log('Error al obtener los detalles del mozo.');
                }
            });
        });
        window.location.href = 'detalle_mozo.php?id=' + mozoId;
    </script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>