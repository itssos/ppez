<?php
include("conexion.php");
$sql = "SELECT idmesa, nombre, capacidad, estado FROM mesa";
$result = $conexion->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $claseTarjeta = $row["estado"] == 0 ? "bg-success" : "bg-warning"; // Clase para el fondo de la tarjeta
        echo '<div class="col mb-4">';
        echo '<div class="card ' . $claseTarjeta . ' text-white">'; // Agregamos la clase de fondo
        echo '<div class="card-body">';
        echo '<h5 class="card-title">' . $row["nombre"] . '</h5>';
        echo '<p class="card-text">';
        echo 'ID: ' . $row["idmesa"] . '<br>';
        echo 'Capacidad: ' . $row["capacidad"] . '<br>';
        echo 'Estado: ' . ($row["estado"] == 0 ? "Desocupado" : "Ocupado") . '<br>';
        echo '<button class="btn btn-primary btn-actualizar" data-mesa-id="' . $row['idmesa'] . '">Actualizar</button>';
        echo '</p>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }
} else {
    echo "No se encontraron mesas.";
}
$conexion->close();
?>
