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
    <br>
    <div class="container">
        <h1 class="text-center" style="background-color: blue; color: white;">LISTADO DE PLATOS</h1>
    </div>
    <br>
    <div class="container">
        <a href="../Formularios/AgregarForm.php" class="btn btn-success">Agregar Plato</a>
    </div>
    <br>

    <div class="container">
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
                require("../Config/conexion.php");
                $sql = $conexion->query("SELECT * FROM plato
                    INNER JOIN menú ON plato.menú_idmenú = menú.idmenú
                ");
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
                            <a href="../Formularios/EditarForm.php?Id=<?php echo $resultado['idplato'] ?>" class="btn btn-warning">EDITAR</a>
                            <a href="../CRUD/eliminarDatos.php?IdEliminar=<?php echo $resultado['idplato'] ?>" class="btn btn-danger">ELIMINAR</a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>