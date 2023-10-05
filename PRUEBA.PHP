<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <div class="container_MOZO">
        <h1>Bienvenido al sistema</h1>
        <?php
        session_start(); // Iniciar la sesión

        // Verificar si el usuario está autenticado (si no lo está, redirigirlo al inicio de sesión)
        if (!isset($_SESSION['usuario'])) {
            header('Location: login.php');
            exit;
        }

        // Obtener el nombre de usuario y el ID del mozo desde la sesión
        $nombreUsuario = $_SESSION['usuario'];
        $idMozo = isset($_SESSION['idMozo']) ? $_SESSION['idMozo'] : 'ID no encontrado';

        echo "<p>Bienvenido, $nombreUsuario</p>";
        echo "<p>ID: $idMozo</p>";

        // En esta sección puedes agregar el contenido adicional que deseas mostrar en la página de inicio después de la autenticación.
        ?>

        <a href="model/logout.php">Cerrar Sesión</a>
    </div>
    <div>
        <h1>Seleccionar Mesa</h1>
        <label for="mesa">Seleccione una mesa:</label>
        <form method="post">
            <select name="mesa" id="mesa">
                <option value="0" selected disabled>-- Seleccionar --</option>
                <?php
                // Incluir el archivo de conexión
                include('../ppez/model/conexionBD.php');

                // Consulta SQL para obtener las mesas desde tu tabla de mesas
                $sql = "SELECT idmesa, nombre FROM mesa";
                $result = $conexion->query($sql);

                // Generar las opciones del select
                while ($fila = $result->fetch_assoc()) {
                    $idMesa = $fila['idmesa'];
                    $nombreMesa = $fila['nombre'];
                    echo "<option value='$idMesa'>$nombreMesa</option>";
                }
                // Cerrar la conexión a la base de datos (no es necesario aquí, se cerrará cuando se cierre el archivo)
                ?>
            </select>
            <button type="submit" class="btn btn-primary" id="agregarPedidoBtn" disabled>Aceptar</button>
        </form>
    </div>

    <?php
    // Inicializa la variable $idPedidoGenerado
    $idPedidoGenerado = null;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["mesa"])) {
            $idMesaSeleccionada = $_POST["mesa"];
            include('../ppez/model/conexionBD.php');

            // Consulta SQL para obtener el estado actual de la mesa seleccionada
            $sql = "SELECT estado FROM mesa WHERE idmesa = $idMesaSeleccionada";
            $result = $conexion->query($sql);

            if ($result) {
                if ($result->num_rows > 0) {
                    // Obtener el estado actual de la mesa
                    $fila = $result->fetch_assoc();
                    $estadoMesa = $fila["estado"];

                    if ($estadoMesa == 0) {
                        // Actualizar el estado de la mesa a 1
                        $sqlActualizar = "UPDATE mesa SET estado = 1 WHERE idmesa = $idMesaSeleccionada";
                        if ($conexion->query($sqlActualizar) === TRUE) {
                            echo "$idMesaSeleccionada";
                            echo "<br>";
                            $idPedidoGenerado = insertarNuevoPedido($conexion, $idMozo, $idMesaSeleccionada);
                            echo "<br>";
                            echo "Pedido insertado correctamente en la base de datos. ID del pedido: $idPedidoGenerado";
                        } else {
                            echo "Error al actualizar el estado de la mesa: " . $conexion->error;
                        }
                    } else {
                        // La mesa está ocupada, muestra un mensaje
                        echo "Lo sentimos, esta mesa está ocupada en este momento.";
                    }
                } else {
                    echo "Mesa no encontrada en la base de datos.";
                }
            } else {
                echo "Error en la consulta SQL: " . $conexion->error;
            }

            // Cierra la conexión a la base de datos
            $conexion->close();
        }
    }

    // Función para insertar un nuevo pedido y obtener su ID
    function insertarNuevoPedido($conexion, $idMozo, $idMesaSeleccionada)
    {
        $fechaActual = date("Y-m-d H:i:s"); // Obtener la fecha actual en formato datetime
        $sqlInsertarPedido = "INSERT INTO pedidos (mozos_id_mozos, fecha, mesa_idmesa) VALUES ('$idMozo', '$fechaActual', '$idMesaSeleccionada')";

        if ($conexion->query($sqlInsertarPedido) === TRUE) {
            return $conexion->insert_id;
        } else {
            echo "Error al insertar el pedido en la base de datos: " . $conexion->error;
            return null;
        }
    }
    ?>
    <?php
    // Verificar si se generó un pedido
    if (!is_null($idPedidoGenerado)) {
        echo "<button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#exampleModal'>Agregar Pedido</button>";
    }
    ?>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">MENÚ</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!--TABLA DE MENÚ-->
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Imagen</th>
                                <th scope="col">Descrip</th>
                                <th scope="col">Cant</th>
                            </tr>
                        </thead>
                        <!-- Dentro de tu modal -->
                        <tbody>
                            <?php
                            require("../ppez/Config/conexion.php");
                            $sql = $conexion->query("SELECT * FROM plato");
                            while ($resultado = $sql->fetch_assoc()) {
                            ?>
                                <tr>
                                    <td class="text-center align-middle">
                                        <img src="<?php echo $resultado['imagen']; ?>" alt="Imagen del Plato" style="max-height: 50px;">
                                    </td>
                                    <td class="text-center align-middle">
                                        <p><?php echo $resultado['nombre'] ?></p>
                                        <p>Costo: s/<?php echo $resultado['precio'] ?></p>
                                    </td>
                                    <td class="text-center align-middle">
                                        <!-- Agrega el formulario para cada plato -->
                                        <form id="modal-form" method="post">
                                            <!-- Campo oculto para el idPlato -->
                                            <input type="hidden" id="idPlato" name="idPlato" value="">
                                            <!-- Campo oculto para el idPedido -->
                                            <input type="hidden" id="idPedido" name="idPedido" value="<?php echo $idPedidoGenerado; ?>">
                                            <!-- Campo de entrada para la cantidad -->
                                            <input type="number" id="cantidad" name="cantidad" value="1" class="form-control">
                                            <!-- Botón "Agregar" para enviar el formulario -->
                                            <button type="button" class="btn btn-success" id="agregarPlatoBtn">Agregar</button>
                                        </form>


                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>

                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary">OK</button>
                </div>
            </div>
        </div>
    </div>



    <!-- TABLA DE PEDIDOS -->

    <table class="table">
        <thead>
            <tr>
                <th scope="col">Nomb</th>
                <th scope="col">Cant</th>
                <th scope="col">P.U</th>
                <th scope="col">P.T</th>
                <th scope="col">Act</th>
            </tr>
        </thead>
        <tbody>
            <?php
            require("../ppez/Config/conexion.php");
            $sql11 = $conexion->query("SELECT dp.*, p.nombre AS nombre_plato, p.precio AS precio_plato 
            FROM detalle_pedido AS dp
            INNER JOIN plato AS p ON dp.plato_idplato = p.idplato");

            while ($resultado11 = $sql11->fetch_assoc()) {
            ?>
                <tr>
                    <td><?php echo $resultado11['nombre_plato'] ?></td>
                    <td><?php echo $resultado11['cantidad'] ?></td>
                    <td><?php echo $resultado11['precio_plato'] ?></td>
                    <td><?php echo $resultado11['cantidad'] * $resultado11['precio_plato'] ?></td> <!-- Precio Total -->
                    <td class="text-center align-middle">
                        <a href="../CRUD/eliminarDatos.php?IdEliminar=<?php echo $resultado11['id_detalle'] ?>" class="btn btn-danger">X</a>
                    </td>

                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Script JavaScript para habilitar/deshabilitar el botón -->
    <script>
        document.getElementById('mesa').addEventListener('change', function() {
            var agregarPedidoBtn = document.getElementById('agregarPedidoBtn');
            if (this.value !== '0') {
                agregarPedidoBtn.removeAttribute('disabled');
            } else {
                agregarPedidoBtn.setAttribute('disabled', 'true');
            }
        });
    </script>
    <script>
        $(document).ready(function() {
            // Cuando se hace clic en el botón "Agregar"
            $('#agregarPlatoBtn').on('click', function() {
                // Obtiene los datos del formulario
                var idPlato = $('#idPlato').val();
                var idPedido = $('#idPedido').val();
                var cantidad = $('#cantidad').val();

                // Realiza una solicitud AJAX para agregar el plato
                $.ajax({
                    type: 'POST',
                    url: '../ppez/agregar_plato.php', // Reemplaza esto con la URL de tu script PHP para agregar platos
                    data: {
                        idPlato: idPlato,
                        idPedido: idPedido,
                        cantidad: cantidad
                    },
                    success: function(response) {
                        // Maneja la respuesta del servidor (puede ser un mensaje de éxito o datos adicionales para actualizar la interfaz)
                        var result = JSON.parse(response);
                        if (result.success) {
                            alert(result.message); // Puedes reemplazar esto con la lógica para actualizar la interfaz de usuario
                        } else {
                            alert('Error: ' + result.message); // Maneja errores si es necesario
                        }
                    },
                    error: function() {
                        alert('Error al agregar el plato.'); // Maneja errores si es necesario
                    }
                });

                // Limpia el formulario o realiza otras acciones según tus necesidades
                $('#idPlato').val('');
                $('#cantidad').val(1);
            });
        });
    </script>

</body>

</html>