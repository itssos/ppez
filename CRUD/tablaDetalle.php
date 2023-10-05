<?php
include("../Config/conexion.php");
$tabla = $conexion->query("SELECT dp.*, p.nombre AS nombre_plato, p.precio AS precio_plato 
FROM detalle_pedido AS dp
INNER JOIN plato AS p ON dp.plato_idplato = p.idplato");
echo '<table class="table" style="font: size 12px;margin-top: -1%;">
            <tr class="active">
                <th scope="col">Nomb</th>
                <th scope="col">Cant</th>
                <th scope="col">P.U</th>
                <th scope="col">P.T</th>
                <th scope="col">Act</th>
            </tr>';
while ($resultado11 = $tabla->fetch_array(MYSQLI_BOTH)) {
    echo '<tr>
            <td>' . $resultado11['nombre_plato'] . '</td>
            <td>' . $resultado11['cantidad'] . '</td>
            <td>' . $resultado11['precio_plato'] . '</td>
            <td>' . ($resultado11['cantidad'] * $resultado11['precio_plato']) . '</td>
            <td class="text-center align-middle">
                <a href="../CRUD/eliminarDatos.php?IdEliminar=' . $resultado11['id_detalle'] . '" class="btn btn-danger">X</a>
            </td>
        </tr>';
}
echo '</table>';
?>
