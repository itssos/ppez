<?php
// Conexión a la base de datos
include("conexion.php");

// Obtén el ID del mozo de la solicitud POST
if (isset($_GET['id'])) {
    $mozoId = $_GET['id'];

// Realiza una consulta SQL para obtener los detalles del mozo con el ID dado
$sqlDetalleMozo = "SELECT * FROM mozos WHERE id_mozos = ?";
$stmtDetalleMozo = $conexion->prepare($sqlDetalleMozo);
$stmtDetalleMozo->bind_param("i", $mozoId);
$stmtDetalleMozo->execute();
$resultDetalleMozo = $stmtDetalleMozo->get_result();
$rowDetalleMozo = $resultDetalleMozo->fetch_assoc();

// Genera el HTML con los detalles del mozo
$detalle_html = '<p><strong>Nombre:</strong> ' . $rowDetalleMozo['nombre'] . '</p>';
$detalle_html .= '<p><strong>DNI:</strong> ' . $rowDetalleMozo['dni'] . '</p>';
$detalle_html .= '<p><strong>Teléfono:</strong> ' . $rowDetalleMozo['telefono'] . '</p>';
$detalle_html .= '<p><strong>Correo:</strong> ' . $rowDetalleMozo['correo'] . '</p>';

// Devuelve los detalles en formato JSON
echo json_encode(['detalle_html' => $detalle_html]);

// Cierra la conexión a la base de datos
$stmtDetalleMozo->close();
$conexion->close();
} else {
    echo "ID del mozo no proporcionado.";
}
?>
