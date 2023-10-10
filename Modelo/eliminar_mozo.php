<?php
// Verificar si se ha recibido un ID válido para eliminar el mozo
if (isset($_POST['id'])) {
    $idMozo = $_POST['id'];

    // Realizar la conexión a la base de datos (debes incluir tu archivo de conexión)
    include("conexion.php");

    // Preparar y ejecutar la consulta SQL para eliminar el mozo
    $sqlEliminarMozo = "DELETE FROM mozos WHERE id_mozos = ?";
    $stmtEliminar = $conexion->prepare($sqlEliminarMozo);
    $stmtEliminar->bind_param("i", $idMozo);

    if ($stmtEliminar->execute()) {
        // Eliminación exitosa
        echo "Mozo eliminado correctamente.";
    } else {
        // Error al eliminar el mozo
        echo "Error al eliminar el mozo: " . $stmtEliminar->error;
    }

    // Cerrar la conexión a la base de datos
    $stmtEliminar->close();
    $conexion->close();
} else {
    // Si no se proporcionó un ID válido, mostrar un mensaje de error
    echo "ID de mozo no válido.";
}
?>
