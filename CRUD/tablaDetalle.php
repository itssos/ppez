<?php
session_start();

if (isset($_SESSION['pedidoIdCreado'])) {
    $pedidoId = $_SESSION['pedidoIdCreado'];
    include("../Config/conexion.php");
    $tabla = $conexion->query("SELECT dp.*, p.nombre AS nombre_plato, p.precio AS precio_plato 
    FROM detalle_pedido AS dp
    INNER JOIN plato AS p ON dp.plato_idplato = p.idplato
    WHERE dp.pedidos_idpedidos = $pedidoId");

    $totalPedido = 0; // Inicializa una variable para almacenar el total del pedido

    echo '<table class="table" style="font-size: 12px; margin-top: -1%;">
            <tr class="active">
                <th scope="col">ID</th>
                <th scope="col">Nomb</th>
                <th scope="col">Cant</th>
                <th scope="col">P.U</th>
                <th scope="col">P.T</th>
                <th scope="col">Acción</th>
            </tr>';
    while ($resultado11 = $tabla->fetch_array(MYSQLI_BOTH)) {
        $subtotal = $resultado11['cantidad'] * $resultado11['precio_plato']; // Calcula el subtotal para esta fila
        $totalPedido += $subtotal; // Agrega el subtotal al total del pedido
        echo '<tr>
                <td>' . $resultado11['id_detalle'] . '</td>
                <td>' . $resultado11['nombre_plato'] . '</td>
                <td>' . $resultado11['cantidad'] . '</td>
                <td>' . $resultado11['precio_plato'] . '</td>
                <td>' . $subtotal . '</td>
                <td class="text-center align-middle">
                    <a href="#" class="eliminar-detalle" data-id-detalle="' . $resultado11['id_detalle'] . '">
                        <i class="zmdi zmdi-delete zmdi-hc-lg"></i>
                        Eliminar
                    </a>
                </td>
            </tr>';
    }
    echo '</table>';

} else {
    echo "No se ha creado un pedido aún.";
}
?>