<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar Plato</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <h1 class="bg-black p-2 text-white text-center">Agregar Plato</h1>
    <div class="container">
        <br>
        <form action="../CRUD/editarDatos.php" method="post">
            <?php
            include("../Config/conexion.php");
            $sql = "SELECT *FROM plato WHERE idplato=" . $_GET['Id'];
            $resultado = $conexion->query($sql);
            $row = $resultado->fetch_assoc();
            ?>

<input type="Hidden" class="form-control rounded" name="ID" value="<?php echo $row['idplato'] ?>">

            <!--TRAER DATO-->
            <label for="">Tipo de Menú</label>
            <select class="form-select" aria-label="Default select example" name="Menú">
                <option selected disabled>Seleccione</option>
                <?php
                include("../Config/conexion.php");
                $sql1 = "SELECT *FROM menú WHERE idmenú=" . $row['menú_idmenú'];
                $resultado1 = $conexion->query($sql1);
                $row1 = $resultado1->fetch_assoc();
                echo "<option selected value='" . $row1['idmenú'] . "'>" . $row1['nombreMenú'] . "</option>";

                $sql2 = "SELECT *FROM menú";
                $resultado2 = $conexion->query($sql2);
                while ($fila = $resultado2->fetch_array()) {
                    echo "<option value='" . $fila['idmenú'] . "'>" . $fila['nombreMenú'] . "</option>";
                }
                ?>

            </select>
            <div class="mb-3">
                <label class="form-label">Nombre del plato</label>
                <input type="text" class="form-control rounded" name="Nombre" value="<?php echo $row['nombre'] ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Descripción</label>
                <input type="text" class="form-control rounded" name="Descripcion" value="<?php echo $row['descripción'] ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Precio</label>
                <input type="text" class="form-control rounded" name="Precio" value="<?php echo $row['precio'] ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Enlace de la imagen</label>
                <input type="text" class="form-control rounded" name="Foto" value="<?php echo $row['imagen'] ?>">
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-danger">EDITAR</button>
                <a href="../vistaAdmin/index.php" class="btn btn-dark">VOLVER</a>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>