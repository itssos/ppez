<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header('Location: loginAdmin.php');
    exit;
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mozos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
                            <a class="nav-link active" aria-current="page" href="interfazAdmin.php">DASHBOARD</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Platos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="ventas.php">Ventas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Mozos.php">Mozos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../Modelo/logoutAdmin.php">Cerrar Sesión</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <?php
        $nombreUsuario = $_SESSION['usuario'];
        $idMozo = isset($_SESSION['id_admin']) ? $_SESSION['id_admin'] : 'ID no encontrado';

        echo "<br><figure class='text-center'><blockquote class='blockquote'>";
        echo "<p>Usuario Administrador: $nombreUsuario</p>";
        echo "</blockquote><figcaption class='blockquote-footer'>
        ID ADMIN: <cite title='Source Title'>$idMozo</cite>
        </figcaption>";
        ?>
    </div>
    <br>

    <?php
    if (isset($_GET['id'])) {
        $idVenta = $_GET['id'];
        include("../Modelo/conexion.php");
        $sql = "SELECT pl.nombre AS nombre_plato, dp.cantidad, pl.precio, (dp.cantidad * pl.precio) AS monto
    FROM ventas AS v
    JOIN pedidos AS p ON v.pedidos_idpedidos = p.idpedidos
    JOIN detalle_pedido AS dp ON p.idpedidos = dp.pedidos_idpedidos
    JOIN plato AS pl ON dp.plato_idplato = pl.idplato
    WHERE v.id_ventas = $idVenta";

        // Ejecuta la consulta SQL
        $result = $conexion->query($sql);

        // Verifica si hay resultados
        if ($result->num_rows > 0) {
            echo '<table id="ventasTable" class="table table-striped" style="width:100%">';
            echo '<thead>';
            echo '<tr>';
            echo '<th>Nombre del Plato</th>';
            echo '<th>Cantidad</th>';
            echo '<th>Precio</th>';
            echo '<th>Monto</th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';

            // Itera sobre los resultados de la consulta y muestra los detalles de la venta
            while ($row = $result->fetch_assoc()) {
                echo '<tr>';
                echo '<td>' . $row['nombre_plato'] . '</td>';
                echo '<td>' . $row['cantidad'] . '</td>';
                echo '<td>' . $row['precio'] . '</td>';
                echo '<td>' . $row['monto'] . '</td>';
                echo '</tr>';
            }

            echo '</tbody>';
            echo '</table>';
        } else {
            echo 'No se encontraron detalles de la venta';
        }

        // Cierra la conexión a la base de datos
        $conexion->close();
    } else {
        // Si no se proporciona un ID de venta válido, muestra un mensaje de error o redirige a una página de error.
        echo 'Venta no encontrada';
    }
    ?>


    <div style="text-align: center;">
        <a href="ventas.php" class="btn btn-primary">Volver a la lista de ventas</a>
    </div>

    <footer class="py-3 my-4">
        <ul class="nav justify-content-center border-bottom pb-3 mb-3">
            <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Home</a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Caracteristicas</a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">FAQs</a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Nosotros</a></li>
        </ul>
        <p class="text-center text-muted">© 2023 Company, Inc</p>
    </footer>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>