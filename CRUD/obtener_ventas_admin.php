<?php
// Conexión a la base de datos y consulta SQL
include("../Config/conexion.php");

// Obtener el monto total del día
$sqlTotalDia = "SELECT SUM(monto_total) FROM ventas WHERE DATE(fecha) = CURDATE() AND estado = 1";
$resultTotalDia = $conexion->query($sqlTotalDia);
$rowTotalDia = $resultTotalDia->fetch_assoc();
$totalDia = ($rowTotalDia['SUM(monto_total)']) ? $rowTotalDia['SUM(monto_total)'] : 0;

// Obtener el monto total de la semana
$sqlTotalSemana = "SELECT SUM(monto_total) FROM ventas WHERE WEEK(fecha) = WEEK(CURDATE()) AND estado = 1";
$resultTotalSemana = $conexion->query($sqlTotalSemana);
$rowTotalSemana = $resultTotalSemana->fetch_assoc();
$totalSemana = ($rowTotalSemana['SUM(monto_total)']) ? $rowTotalSemana['SUM(monto_total)'] : 0;

// Obtener el monto total del mes
$sqlTotalMes = "SELECT SUM(monto_total) FROM ventas WHERE MONTH(fecha) = MONTH(CURDATE()) AND estado = 1";
$resultTotalMes = $conexion->query($sqlTotalMes);
$rowTotalMes = $resultTotalMes->fetch_assoc();
$totalMes = ($rowTotalMes['SUM(monto_total)']) ? $rowTotalMes['SUM(monto_total)'] : 0;

// Obtener el total de ventas del día, semana y mes
$sqlVentasDia = "SELECT COUNT(*) AS ventas_dia FROM ventas WHERE DATE(fecha) = CURDATE()";
$resultVentasDia = $conexion->query($sqlVentasDia);
$rowVentasDia = $resultVentasDia->fetch_assoc();
$ventasDia = ($rowVentasDia['ventas_dia']) ? $rowVentasDia['ventas_dia'] : 0;

$sqlVentasSemana = "SELECT COUNT(*) AS ventas_semana FROM ventas WHERE WEEK(fecha) = WEEK(CURDATE())";
$resultVentasSemana = $conexion->query($sqlVentasSemana);
$rowVentasSemana = $resultVentasSemana->fetch_assoc();
$ventasSemana = ($rowVentasSemana['ventas_semana']) ? $rowVentasSemana['ventas_semana'] : 0;

$sqlVentasMes = "SELECT COUNT(*) AS ventas_mes FROM ventas WHERE MONTH(fecha) = MONTH(CURDATE())";
$resultVentasMes = $conexion->query($sqlVentasMes);
$rowVentasMes = $resultVentasMes->fetch_assoc();
$ventasMes = ($rowVentasMes['ventas_mes']) ? $rowVentasMes['ventas_mes'] : 0;

// Generar la información a mostrar
echo '<h1 style="text-align: center; display: block; margin: 0 auto;">Dinero Recaudado:</h1>';
echo '<div style="text-align: center;">';
echo 'Monto total del día: s/' . $totalDia . '<br>';
echo 'Monto total de la semana: s/' . $totalSemana . '<br>';
echo 'Monto total del mes: s/' . $totalMes . '<br><br>';
echo '<h1 style="text-align: center; display: block; margin: 0 auto;">Total de ventas:</h1>';
echo 'Total de ventas hoy: ' . $ventasDia . '<br>';
echo 'Total de ventas esta semana: ' . $ventasSemana . '<br>';
echo 'Total de ventas este mes: ' . $ventasMes . '<br>';
echo '</div>';


// Obtener los datos de las ventas
$sqlVentas = "SELECT fecha, monto_total, estado FROM ventas";
$resultVentas = $conexion->query($sqlVentas);

// Iniciar la tabla HTML
echo '<table id="ventasTable" class="table table-striped" style="width:100%">';
echo '<thead>';
echo '<tr>';
echo '<th>Fecha</th>';
echo '<th>Monto Total</th>';
echo '<th>Estado</th>';
echo '</tr>';
echo '</thead>';
echo '<tbody>';

// Iterar sobre los resultados y generar las filas de la tabla
while ($rowVenta = $resultVentas->fetch_assoc()) {
    $estado = ($rowVenta['estado'] == 1) ? 'Pagado' : 'Pendiente';
    echo '<tr>';
    echo '<td>' . $rowVenta['fecha'] . '</td>';
    echo '<td> s/' . $rowVenta['monto_total'] . '</td>';
    echo '<td>' . $estado . '</td>';
    echo '</tr>';
}

// Cerrar la tabla HTML
echo '</tbody>';
echo '</table>';

// Cerrar la conexión a la base de datos
$conexion->close();
