<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Realizar Pedido</title>
</head>
<body>
    <h1>Realizar Pedido</h1>
    <form method="POST" action="procesar_pedido.php">
        <label for="mozo_id">ID del Mozo:</label>
        <input type="text" name="mozo_id" id="mozo_id" required><br><br>

        <label for="platos">Seleccionar Platos:</label><br>
        <select name="platos[]" id="platos" multiple required>
            <option value="1">Ceviche</option>
            <option value="2">Tirado</option>
            <option value="3">Causa de Mariscos</option>
            <!-- Agregar más opciones según tu base de datos -->
        </select><br><br>

        <label for="mesa_id">ID de la Mesa:</label>
        <input type="text" name="mesa_id" id="mesa_id" required><br><br>

        <input type="submit" value="Realizar Pedido">
    </form>
</body>
</html>
