<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container_MOZO">
        <h1>Bienvenido al sistema</h1>
        <?php
        session_start();
        if (!isset($_SESSION['usuario'])) {
            header('Location: login.php');
            exit;
        }
        $nombreUsuario = $_SESSION['usuario'];
        $idMozo = isset($_SESSION['idMozo']) ? $_SESSION['idMozo'] : 'ID no encontrado';

        echo "<p>Bienvenido, $nombreUsuario</p>";
        echo "<p>ID: $idMozo</p>";

        ?>

        <a href="model/logout.php">Cerrar Sesión</a>
    </div>

    <div>
        <!-- Agrega el select de mesas -->
        <label for="mesas">Selecciona una mesa:</label>
        <select id="mesas">
            <option value="0" selected disabled>-- Seleccionar --</option>
            <?php
            include('../Config/conexion.php');
            $sql = "SELECT idmesa, nombre FROM mesa WHERE estado = 0";
            $result = mysqli_query($conexion, $sql);
            while ($fila = mysqli_fetch_assoc($result)) {
                echo "<option value='" . $fila['idmesa'] . "'>" . $fila['nombre'] . "</option>";
            }
            ?>
        </select>

        <div id="resultado"></div>

        <!-- Agregar botón para agregar pedido -->
        <button id="agregarPedido">AGREGAR PEDIDO</button>

        <!-- Botón para cancelar pedido -->
        <button id="cancelarPedido" style="display: none;">CANCELAR PEDIDO</button>
    </div>


    <!-- Button trigger modal -->
    <button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#exampleModal' style="display: none;">ADD ++</button>

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
                        <tbody>
                            <?php
                            require("../Config/conexion.php");
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
                                        <input type="hidden" name="imagen" value="<?php echo $resultado['imagen']; ?>">
                                        <input type="hidden" name="nombre" value="<?php echo $resultado['nombre'] ?>; ?>">
                                        <input type="hidden" name="precio" value="<?php echo $resultado['precio'] ?>; ?>">
                                        <input type="number" name="cantidad" value="0" class="form-control">
                                        <!-- Cambia el id a una clase para el botón "Agregar a la Orden" -->
                                        <button type="button" class="btn btn-success agregar-plato-btn">Agregar</button>
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

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const selectMesas = document.getElementById("mesas");
            const resultadoDiv = document.getElementById("resultado");
            const agregarPedidoButton = document.getElementById("agregarPedido");
            const cancelarPedidoButton = document.getElementById("cancelarPedido");
            const addButton = document.querySelector('button[data-bs-target="#exampleModal"]'); // Botón "ADD ++"

            selectMesas.addEventListener("change", function() {
                const selectedOption = selectMesas.options[selectMesas.selectedIndex];
                const mesaId = selectedOption.value;
                const mesaNombre = selectedOption.textContent;
                resultadoDiv.innerHTML = `ID de la mesa seleccionada: ${mesaId} - Nombre: ${mesaNombre}`;
            });

            // Variable para almacenar el ID del pedido creado
            let pedidoIdCreado = null;

            agregarPedidoButton.addEventListener("click", function() {
                const selectedOption = selectMesas.options[selectMesas.selectedIndex];
                const mesaId = selectedOption.value;

                // Realizar una solicitud AJAX para agregar el pedido a la base de datos
                const xhr = new XMLHttpRequest();
                xhr.open("POST", "../CRUD/agregar_pedido.php", true);
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        const respuesta = xhr.responseText;
                        if (respuesta.startsWith("success")) {
                            const pedidoId = respuesta.split(':')[1]; // Extrae el ID del pedido
                            alert("Pedido agregado con éxito");
                            pedidoIdCreado = pedidoId; // Asigna el ID del pedido creado
                            cancelarPedidoButton.style.display = "block";
                            agregarPedidoButton.style.display = "none";
                            addButton.style.display = "block"; // Muestra el botón "ADD ++"
                        } else {
                            alert("Error al agregar el pedido");
                        }
                    }
                };
                const datos = `idMozo=<?php echo $idMozo; ?>&idMesa=${mesaId}`;
                xhr.send(datos);
            });

            // Cancelar un pedido
            cancelarPedidoButton.addEventListener("click", function() {
                console.log("Botón Cancelar Pedido clickeado"); // Agrega esta línea para verificar el evento
                if (pedidoIdCreado) {
                    console.log("Pedido ID a cancelar:", pedidoIdCreado);
                    const xhr = new XMLHttpRequest();
                    xhr.open("POST", "../CRUD/eliminar_pedido.php", true);
                    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                    xhr.onreadystatechange = function() {
                        if (xhr.readyState === 4 && xhr.status === 200) {
                            const respuesta = xhr.responseText;
                            console.log("Respuesta del servidor:", respuesta); // Agrega esta línea para depuración
                            if (respuesta === "success") {
                                alert("Pedido cancelado con éxito");
                                cancelarPedidoButton.style.display = "none";
                                agregarPedidoButton.style.display = "block";
                                pedidoIdCreado = null;
                                addButton.style.display = "none"; // Oculta el botón "ADD ++"
                            } else {
                                alert("Error al cancelar el pedido");
                            }
                        }
                    };
                    const datos = `pedidoId=${pedidoIdCreado}`;
                    xhr.send(datos);
                }
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>