<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mesas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>

    <div id="mesas-container" class="row row-cols-1 row-cols-md-2 g-4">
    </div>

    <script>
        function cargarMesas() {
            $.ajax({
                url: '../CRUD/obtener_mesas.php',
                method: 'GET',
                dataType: 'html',
                success: function(data) {
                    $('#mesas-container').html(data);
                },
                error: function() {
                    alert('Error al cargar las mesas.');
                }
            });
        }

        $(document).ready(function() {
            cargarMesas();
            setInterval(function() {
                cargarMesas();
            }, 1000);
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>

</html>