<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="stylesheet" href="../assets/css/menú.css">
    <link rel="stylesheet" href="../assets/css/titulo.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript">
        function tiempoReal() {
            var tabla = $.ajax({
                url: 'Modelo/tablaDetalle.php',
                dataType: 'text',
                async: false
            }).responseText;
            document.getElementById("miTabla").innerHTML = tabla;

            var botonesEliminar = document.querySelectorAll(".eliminar-detalle");
            botonesEliminar.forEach(function(boton) {
                boton.addEventListener("click", function() {
                    var idDetalle = boton.getAttribute("data-id-detalle");

                    $.ajax({
                        type: "POST",
                        url: 'Modelo/eliminar_detalle_pedido.php',
                        data: {
                            id_detalle: idDetalle
                        },
                        success: function(response) {
                            if (response === "success") {
                                tiempoReal();
                                Swal.fire({
                                    position: 'top-end',
                                    icon: 'success',
                                    title: 'Plato eliminado',
                                    showConfirmButton: false,
                                    timer: 1500
                                })
                            } else {
                                alert("Error al eliminar el detalle de pedido: " + response);
                            }
                        }
                    });
                });
            });
            calcularTotalPedido();
        }
        var totalPedido = 0;

        function calcularTotalPedido() {
            totalPedido = 0; // Reinicializa el total del pedido
            var filas = document.querySelectorAll("#miTabla table tbody tr");

            filas.forEach(function(fila) {
                var cantidadElement = fila.querySelector("td:nth-child(3)");
                var precioElement = fila.querySelector("td:nth-child(4)");

                if (cantidadElement && precioElement) {
                    var cantidad = parseInt(cantidadElement.textContent);
                    var precio = parseFloat(precioElement.textContent);

                    console.log("Cantidad:", cantidad); // Agregar console.log para depurar
                    console.log("Precio:", precio); // Agregar console.log para depurar

                    if (!isNaN(cantidad) && !isNaN(precio)) {
                        var subtotal = cantidad * precio;
                        totalPedido += subtotal;
                    }
                }
            });

            // Mostrar el total del pedido en algún lugar (puedes usar un elemento HTML para mostrarlo)
            var totalPedidoElement = document.getElementById("totalPedidoVisible");
            if (totalPedidoElement) {
                totalPedidoElement.textContent = "Total del pedido: s/" + totalPedido.toFixed(2); // Puedes personalizar el formato como desees
            }
        }



        setInterval(tiempoReal, 500);
    </script>
    <style>
        .contenido{
            margin: 10px;
        }
        .titulo-container{
            margin-left: 10px;
        }
        #miTabla {
            display: none;
        }
        #agregarPedido {
            background-color: #94FF8F;
            border-radius: 10px;
            border: 1px solid #63DF5D;
            width: 150px;
            height: 40px;
            font-size: 15px;
            font-weight: bold;
            color: #363935;
            box-shadow: 2px 2px 5px 0 #000;
        }
        #cancelarPedido {
            background-color: #FB9C9C;
            border-radius: 10px;
            border: 1px solid #63DF5D;
            height: 40px;
            font-size: 15px;
            font-weight: bold;
            color: #363935;
            box-shadow: 2px 2px 5px 0 #000;
        }
        #mesas{
            border-radius: 10px;
            width: 150px;
            text-align: center;
            height: 30px;
            border: 1px solid #000;
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
        <h2>REGISTRAR PEDIDOS</h2>
    </div>
    <br>


    <div class="contenido">
        <!-- Agrega el select de mesas -->
        <label for="mesas" style="font-size: 20px;">Selecciona una mesa:</label>
        <select id="mesas">
            <option value="0" selected disabled>-- Seleccionar --</option>
            <?php
            include('Modelo/conexion.php');
            $sql = "SELECT idmesa, nombre FROM mesa WHERE estado = 0";
            $result = mysqli_query($conexion, $sql);
            while ($fila = mysqli_fetch_assoc($result)) {
                echo "<option value='" . $fila['idmesa'] . "'>" . $fila['nombre'] . "</option>";
            }
            ?>
        </select>

        <div id="resultado"></div>

        <!-- Agregar botón para agregar pedido -->

        <button id="agregarPedido" style="margin: 20px;">AGREGAR PEDIDO</button>

        <!-- Botón para cancelar pedido -->
        <button id="cancelarPedido" style=" margin: 20px; display: none;">CANCELAR PEDIDO</button>

        <!-- Elemento para mostrar el ID del pedido -->
        <p id="pedidoIdTexto" style="margin-left: 20px;"></p>
    </div>


    <!-- Button trigger modal -->
    <button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#exampleModal' style="display: none; margin: 0 auto;">ADD ++</button>

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
            include('Modelo/conexion.php');
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
                                        <button type="button" class="btn btn-success agregar-plato-btn" data-idplato="<?php echo $resultado['idplato']; ?>">Agregar</button>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <br>
    <p id="totalPedidoVisible" style="display: none; margin: 20px;">Total del pedido: s/0.00</p>
    <!-- TABLA DE PEDIDOS -->
    <section id="miTabla">
    </section>
    <button id="finalizarVenta" class="btn btn-primary" style="display: none; margin: 0 auto;">Finalizar</button>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const selectMesas = document.getElementById("mesas");
            const resultadoDiv = document.getElementById("resultado");
            const agregarPedidoButton = document.getElementById("agregarPedido");
            const cancelarPedidoButton = document.getElementById("cancelarPedido");
            const addButton = document.querySelector('button[data-bs-target="#exampleModal"]');
            const agregarPlatoButtons = document.querySelectorAll(".agregar-plato-btn");
            const pedidoIdTexto = document.getElementById("pedidoIdTexto"); // Elemento de texto para el ID del pedido
            const miTablaSection = document.getElementById("miTabla");
            const pedidosCreados = [];
            const totalPedidoElement = document.getElementById("totalPedidoVisible"); // Elemento del total del pedido


            selectMesas.addEventListener("change", function() {
                const selectedOption = selectMesas.options[selectMesas.selectedIndex];
                const mesaId = selectedOption.value;
                const mesaNombre = selectedOption.textContent;
                resultadoDiv.innerHTML = `ID de la mesa seleccionada: ${mesaId} - Nombre: ${mesaNombre}`;
            });

            agregarPedidoButton.addEventListener("click", function() {
                const selectedOption = selectMesas.options[selectMesas.selectedIndex];
                const mesaId = selectedOption.value;

                const xhr = new XMLHttpRequest();
                xhr.open("POST", "Modelo/agregar_pedido.php", true);
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        const respuesta = xhr.responseText;
                        if (respuesta.startsWith("success")) {
                            const pedidoId = respuesta.split(":")[1];
                            Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                title: 'Mesa selecionada',
                                showConfirmButton: false,
                                timer: 1500
                            })
                            pedidosCreados.push(pedidoId);
                            cancelarPedidoButton.style.display = "block";
                            agregarPedidoButton.style.display = "none";
                            addButton.style.display = "block";
                            miTablaSection.style.display = "block";
                            pedidoIdTexto.textContent = `ID Pedido: ${pedidoId}`;
                            finalizarVentaButton.style.display = "block";
                            totalPedidoElement.style.display = "block";
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Mesa no encontrada...',
                                text: 'Selecione una mesa por favor!',
                            })
                        }
                    }
                };
                const datos = `idMozo=<?php echo $idMozo; ?>&idMesa=${mesaId}`;
                xhr.send(datos);
            });

            const finalizarVentaButton = document.getElementById("finalizarVenta");
            finalizarVentaButton.addEventListener("click", function() {
                if (totalPedido === 0) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Venta no guardada',
                        text: 'La cantidad debe ser mayor a 0',
                    });
                } else {
                    finalizarVenta();
                }
            });

            function finalizarVenta() {
                if (pedidosCreados.length > 0) {
                    const ultimoPedidoId = pedidosCreados[pedidosCreados.length - 1];
                    const xhr = new XMLHttpRequest();
                    xhr.open("POST", "Modelo/generarVenta.php", true);
                    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                    xhr.onreadystatechange = function() {
                        if (xhr.readyState === 4 && xhr.status === 200) {
                            const respuesta = xhr.responseText;
                            if (respuesta === "success") {
                                let timerInterval
                                Swal.fire({
                                    title: 'Venta Registra',
                                    imageUrl: '../assets/img/dinero.gif',
                                    html: 'Guardando venta...<b></b> milisegundos.',
                                    timer: 2000, // Aquí establece la cantidad de milisegundos
                                    timerProgressBar: true,
                                    didOpen: () => {
                                        Swal.showLoading()
                                        const b = Swal.getHtmlContainer().querySelector('b')
                                        timerInterval = setInterval(() => {
                                            b.textContent = Swal.getTimerLeft()
                                        }, 100)
                                    },
                                    willClose: () => {
                                        clearInterval(timerInterval)
                                    }
                                }).then((result) => {
                                    /* Read more about handling dismissals below */
                                    if (result.dismiss === Swal.DismissReason.timer) {
                                        console.log('La página se recargó automáticamente')
                                        window.location.reload(); // Recarga la página
                                    }
                                })

                            } else {
                                alert("Error al finalizar la venta: " + respuesta);
                            }
                        }
                    };

                    // Enviar el monto total actualizado
                    console.log("Total Pedido:", totalPedido); // Agregar este console.log
                    const datos = `pedidoId=${ultimoPedidoId}&montoTotal=${totalPedido}`;
                    xhr.send(datos);
                }
            }


            cancelarPedidoButton.addEventListener("click", function() {
                if (pedidosCreados.length > 0) {
                    const ultimoPedidoId = pedidosCreados.pop();
                    const xhr = new XMLHttpRequest();
                    xhr.open("POST", "Modelo/eliminar_pedido.php", true);
                    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                    xhr.onreadystatechange = function() {
                        if (xhr.readyState === 4 && xhr.status === 200) {
                            const respuesta = xhr.responseText;
                            if (respuesta === "success") {

                                Swal.fire({
                                    position: 'top-end',
                                    icon: 'success',
                                    title: 'Pedido Cancelado',
                                    showConfirmButton: false,
                                    timer: 1500
                                })

                                if (pedidosCreados.length === 0) {
                                    totalPedidoElement.style.display = "none"; // Ocultar el elemento al cancelar pedido
                                    pedidoIdTexto.textContent = "ID Pedido: Ninguno";
                                    cancelarPedidoButton.style.display = "none";
                                    agregarPedidoButton.style.display = "block";
                                    addButton.style.display = "none";
                                    miTablaSection.style.display = "none";
                                    finalizarVentaButton.style.display = "none";
                                }

                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Algo ocurrio...',
                                    text: 'Regargue la pagina',
                                    footer: '<a href="">Porque sucede esto?</a>'
                                })

                            }
                        }
                    };
                    const datos = `pedidoId=${ultimoPedidoId}`;
                    xhr.send(datos);
                }
            });

            agregarPlatoButtons.forEach(function(button) {
                button.addEventListener("click", function() {
                    const platoId = button.getAttribute("data-idplato");
                    const cantidadInput = button.previousElementSibling;
                    const cantidad = parseInt(cantidadInput.value, 10);

                    if (cantidad <= 0) {
                        Swal.fire({
                            position: 'top-end',
                            icon: 'error',
                            title: 'Cantidad deber ser mayor a 0',
                            showConfirmButton: false,
                            timer: 1500
                        })
                        return;
                    }
                    const ultimoPedidoId = pedidosCreados[pedidosCreados.length - 1];
                    const xhr = new XMLHttpRequest();
                    xhr.open("POST", "Modelo/agregar_detalle_pedido.php", true);
                    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                    xhr.onreadystatechange = function() {
                        if (xhr.readyState === 4) {
                            if (xhr.status === 200) {
                                const respuesta = xhr.responseText;
                                if (respuesta === "success") {
                                    alert("Plato agregado al pedido con éxito");
                                } else {
                                    Swal.fire({
                                        position: 'top-end',
                                        icon: 'success',
                                        showConfirmButton: false,
                                        timer: 1500
                                    })
                                }
                            } else {
                                alert("Error en la solicitud AJAX. Código de estado: " + xhr.status);
                            }
                        }
                    };
                    const datos = `idPlato=${platoId}&cantidad=${cantidad}&pedidoId=${ultimoPedidoId}`;
                    xhr.send(datos);
                });
            });

        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>