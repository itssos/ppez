<?php
require("../Modelo/conexion.php");

session_start();
if (!isset($_SESSION['usuario'])) {
    header('Location: loginAdmin.php');
    exit;
}

$sql = $conexion->query("SELECT * FROM plato
    INNER JOIN menú ON plato.menú_idmenú = menú.idmenú
    ORDER BY plato.idplato ASC
");

$nombreUsuario = $_SESSION['usuario'];
$idMozo = isset($_SESSION['id_admin']) ? $_SESSION['id_admin'] : 'ID no encontrado';
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>
        /* Estilo para la fila de encabezados (naranja) */
        .table thead th {
            background-color: orange;
            color: white;
        }

        /* Estilo para resaltar las celdas de la tabla */
        .table tbody tr:hover {
            background-color: #f5f5f5;
            /* Color de fondo al pasar el ratón por encima */
        }
    </style>
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
    <h1 class="text-center" style="background-color: blue; color: white;">LISTADO DE PLATOS</h1>
    <br>
    <div class="container">
        <a href="../Controlador/AgregarForm.php" class="btn btn-success">Agregar Plato</a>
    </div>
    <br>
    <div class="container">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Menu</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Descripcion</th>
                        <th scope="col">Imagen</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($resultado = $sql->fetch_assoc()) {
                    ?>
                        <tr>
                            <th scope="row"><?php echo $resultado['idplato'] ?></th>
                            <td><?php echo $resultado['nombre'] ?></td>
                            <td><?php echo $resultado['nombreMenú'] ?></td>
                            <td><?php echo $resultado['precio'] ?></td>
                            <td><?php echo $resultado['descripción'] ?></td>
                            <td>
                                <img src="<?php echo $resultado['imagen']; ?>" alt="Imagen del Plato" style="max-height: 100px;">
                            </td>
                            <td class="text-center align-middle">
                                <a href="../Controlador/EditarForm.php?Id=<?php echo $resultado['idplato'] ?>" class="btn btn-warning">EDITAR</a>
                                <a href="../Modelo/eliminarDatos.php?IdEliminar=<?php echo $resultado['idplato'] ?>" class="btn btn-danger">ELIMINAR</a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>