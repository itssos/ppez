<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header('Location: loginAdmin.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Agregar Plato</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <h1 class="bg-black p-2 text-white text-center">Agregar Plato</h1>
    <br>
    <div class="container">
        <form action="../Modelo/insertarDatos.php" method="post" id="platoForm">

            <div class="mb-3">
                <label for="">Tipo de Menú</label>
                <select class="form-select mb-3" name="Menú" required>
                    <option selected disabled value="">Elije el tipo</option>
                    <?php
                    include("../Modelo/conexion.php");
                    $sql = $conexion->query("SELECT * FROM menú");
                    while ($resultado = $sql->fetch_assoc()) {
                        echo "<option value='" . $resultado['idmenú'] . "'>" . $resultado['nombreMenú'] . "</option>";
                    }
                    ?>
                </select>
                <div class="invalid-feedback">Debe seleccionar un Tipo de Menú.</div>
            </div>
            <div class="mb-3">
                <label class="form-label">Nombre del plato</label>
                <input type="text" class="form-control rounded" name="Nombre" required>
                <div class="invalid-feedback">El campo Nombre es obligatorio.</div>
            </div>
            <div class="mb-3">
                <label class="form-label">Descripción</label>
                <input type="text" class="form-control rounded" name="Descripcion" required>
                <div class="invalid-feedback">El campo Descripción es obligatorio.</div>
            </div>
            <div class="mb-3">
                <label class="form-label">Precio</label>
                <input type="number" class="form-control rounded" name="Precio" required>
                <div class="invalid-feedback">El campo Precio es obligatorio y debe ser numérico.</div>
            </div>

            <div class="mb-3">
                <label class="form-label">Foto del plato</label>
                <input type="text" class="form-control rounded" name="Foto" required>
                <div class="invalid-feedback">El campo Foto de plato es obligatorio.</div>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-danger">ENVIAR</button>
                <a href="../Administracion/index.php" class="btn btn-dark">Volver</a>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script>
        document.getElementById("platoForm").addEventListener("submit", function(event) {
            const selectMenu = document.querySelector("select[name='Menú']");
            if (selectMenu.value === "") {
                selectMenu.setCustomValidity("Debe seleccionar un Tipo de Menú.");
                event.preventDefault();
            } else {
                selectMenu.setCustomValidity("");
            }
        });
    </script>
</body>

</html>
