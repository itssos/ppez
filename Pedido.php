<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- Agregamos un poco de CSS personalizado -->
    <style>
        /* Mueve el combo box al lado derecho de la barra de navegación */
        .navbar .navbar-nav {
            flex-direction: row;
            /* Alinea los elementos en la misma fila */
        }

        .navbar .nav-item {
            margin-right: 15px;
            /* Agrega espacio entre los elementos */
        }

        /* Alinea el combo box y las opciones a la derecha de la página */
        .navbar .mesaSelect-container {
            margin-left: auto;
            /* Mueve el combo box al extremo derecho */
            display: flex;
            /* Permite alinear verticalmente */
            align-items: center;
            /* Centra verticalmente el combo box */
        }
    </style>
</head>

<body>

    <!-- NAVEGADOR -->
    <nav class="navbar navbar-dark bg-primary">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- COMBO BOX EN LA MISMA LÍNEA QUE EL NAV -->
            <div class="mesaSelect-container">
                <label for="mesaSelect" class="form-label">Selecciona una mesa</label>
                <select class="form-select" id="mesaSelect">
                    <option selected disabled>Elige una mesa</option>
                    <option value="mesa1">Mesa 1</option>
                    <option value="mesa2">Mesa 2</option>
                    <option value="mesa3">Mesa 3</option>
                    <option value="mesa4">Mesa 4</option>
                    <option value="mesa5">Mesa 5</option>
                </select>
            </div>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Cerrar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Ver boletas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">¿Cómo usar?</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled">Contactanos: 998187600</a>
                    </li>
                </ul>
            </div>
        </div>



    </nav>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script>
        document.getElementById("mesaSelect").addEventListener("change", function() {
            var selectedMesa = this.value;
            alert("Has seleccionado una mesa: " + selectedMesa);
        });
    </script>

</body>

</html>