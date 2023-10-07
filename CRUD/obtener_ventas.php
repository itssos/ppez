<?php
// Conexión a la base de datos y consulta SQL
include("../Config/conexion.php");
$sql = "SELECT * FROM ventas WHERE DATE(fecha) = CURDATE() AND estado = 0";
$result = $conexion->query($sql);

// Comprueba si hay resultados
if ($result->num_rows > 0) {
    echo '<table id="ventasTable" class="table table-striped" style="width:100%">';
    echo '<thead>';
    echo '<tr>';
    echo '<th>ID</th>';
    echo '<th>IdPedido</th>';
    echo '<th>Fecha</th>';
    echo '<th>Total</th>';
    echo '<th>Acción</th>'; // Cambio de "Estado" a "Acción"
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';

    // Itera sobre los resultados de la consulta y genera las filas de datos
    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . $row['id_ventas'] . '</td>';
        echo '<td>' . $row['pedidos_idpedidos'] . '</td>';
        echo '<td>' . $row['fecha'] . '</td>';
        echo '<td>' . $row['monto_total'] . '</td>';
        echo '<td><button class="btn-actualizar" data-venta-id="' . $row['id_ventas'] . '">PAGAR</button></td>'; // Botón para actualizar
        echo '</tr>';
    }

    echo '</tbody>';
    echo '</table>';
} else {
    echo 'No se encontraron ventas para hoy con estado 0.';
}

// Cierra la conexión a la base de datos
$conexion->close();
?>
