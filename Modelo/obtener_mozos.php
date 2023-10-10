<?php
// Conexión a la base de datos y consulta SQL
include("conexion.php");
$sqlMozos = "SELECT nombre, dni, telefono, correo FROM mozos";
$resultMozos = $conexion->query($sqlMozos);

// Iniciar la tabla HTML
echo '<table id="ventasTable" class="table table-striped" style="width:100%">';
echo '<thead>';
echo '<tr>';
echo '<th>Nombre</th>';
echo '<th>DNI</th>';
echo '<th>Teléfono</th>';
echo '<th>Correo</th>';
echo '</tr>';
echo '</thead>';
echo '<tbody>';

// Iterar sobre los resultados y generar las filas de la tabla
while ($rowMozo = $resultMozos->fetch_assoc()) {
    echo '<tr>';
    echo '<td>' . $rowMozo['nombre'] . '</td>';
    echo '<td>' . $rowMozo['dni'] . '</td>';
    echo '<td>' . $rowMozo['telefono'] . '</td>';
    echo '<td>' . $rowMozo['correo'] . '</td>';
    echo '</tr>';
}

// Cerrar la tabla HTML
echo '</tbody>';
echo '</table>';

// Cerrar la conexión a la base de datos
$conexion->close();
