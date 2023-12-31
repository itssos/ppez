<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header('Location: loginAdmin.php');
    exit;
}

if (isset($_GET['id'])) {
    $mozoId = $_GET['id'];

    // Conexión a la base de datos
    include("../Modelo/conexion.php");

    // Realiza una consulta SQL para obtener los detalles del mozo con el ID dado
    $sqlDetalleMozo = "SELECT * FROM mozos WHERE id_mozos = ?";
    $stmtDetalleMozo = $conexion->prepare($sqlDetalleMozo);
    $stmtDetalleMozo->bind_param("i", $mozoId);
    $stmtDetalleMozo->execute();
    $resultDetalleMozo = $stmtDetalleMozo->get_result();
    $rowDetalleMozo = $resultDetalleMozo->fetch_assoc();

    // Cierra la conexión a la base de datos
    $stmtDetalleMozo->close();
    $conexion->close();
} else {
    header('Location: Mozos.php');
    echo "ID del mozo no proporcionado.";
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
    <div style="text-align: center;">
        <h1>Detalles del Mozo</h1>
        <p><strong>ID:</strong> <?php echo $rowDetalleMozo['id_mozos']; ?></p>
        <p><strong>Nombre:</strong> <?php echo $rowDetalleMozo['nombre']; ?></p>
        <p><strong>Apellido Paterno:</strong> <?php echo $rowDetalleMozo['paterno']; ?></p>
        <p><strong>Apellido Materno:</strong> <?php echo $rowDetalleMozo['materno']; ?></p>
        <p><strong>Usuario:</strong> <?php echo $rowDetalleMozo['usuario']; ?></p>
        <p><strong>Contraseña:</strong> <?php echo $rowDetalleMozo['contraseña']; ?></p>
        <p><strong>DNI:</strong> <?php echo $rowDetalleMozo['dni']; ?></p>
        <p><strong>Teléfono:</strong> <?php echo $rowDetalleMozo['telefono']; ?></p>
        <p><strong>Correo:</strong> <?php echo $rowDetalleMozo['correo']; ?></p>
        <br>
        <button class="btn btn-primary" onclick="window.location.href='Mozos.php'">Volver a la lista de mozos</button>
    </div>
    <br>

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