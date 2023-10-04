<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h1>Bienvenido al sistema</h1>
        <?php
        session_start(); // Iniciar la sesión

        // Verificar si el usuario está autenticado (si no lo está, redirigirlo al inicio de sesión)
        if (!isset($_SESSION['usuario'])) {
            header('Location: login.php');
            exit;
        }

        // Obtener el nombre de usuario y el ID del mozo desde la sesión
        $nombreUsuario = $_SESSION['usuario'];
        $idMozo = isset($_SESSION['idMozo']) ? $_SESSION['idMozo'] : 'ID no encontrado';

        echo "<p>Bienvenido, $nombreUsuario</p>";
        echo "<p>ID: $idMozo</p>";

        // En esta sección puedes agregar el contenido adicional que deseas mostrar en la página de inicio después de la autenticación.
        ?>

        <a href="model/logout.php">Cerrar Sesión</a>
    </div>
    <div>
        <h1>Seleccionar Mesa</h1>

        <form action="procesar.php" method="post">
            <label for="mesa">Seleccione una mesa:</label>
            <select name="mesa" id="mesa">
                <option value="" selected disabled>-- Seleccionar --</option>
                <?php
                // Conexión a la base de datos (debes ajustar los datos de conexión según tu configuración)
                $servername = "localhost";
                $username = "root";
                $password = "";
                $database = "sabor_peruano";

                // Crear la conexión a la base de datos
                $conexion = new mysqli($servername, $username, $password, $database);

                // Verificar la conexión
                if ($conexion->connect_error) {
                    die('Error de conexión: ' . $conexion->connect_error);
                }

                // Consulta SQL para obtener las mesas desde tu tabla de mesas
                $sql = "SELECT idmesa, nombre FROM mesa";
                $result = $conexion->query($sql);

                // Generar las opciones del select
                while ($fila = $result->fetch_assoc()) {
                    $idMesa = $fila['idmesa'];
                    $nombreMesa = $fila['nombre'];
                    echo "<option value='$idMesa'>$nombreMesa</option>";
                }

                // Cerrar la conexión a la base de datos
                $conexion->close();
                ?>
            </select>

            <!-- Botón "ADD +" que estará deshabilitado inicialmente -->
            <button type="submit" name="agregar" id="agregar" disabled>ADD +</button>
        </form>
    </div>


    <script>
        // Habilitar el botón "ADD +" cuando se seleccione una mesa
        document.getElementById('mesa').addEventListener('change', function() {
            document.getElementById('agregar').disabled = false;
        });
    </script>
</body>

</html>