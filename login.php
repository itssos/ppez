<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <form method="POST" action="procesar_login.php">
                    <div class="text-center mb-4">
                        <img class="mb-4" src="imagenes\logo.png" alt="Logo de la empresa" width="200" height="200">
                        <h1 class="h3 mb-3 font-weight-normal">Iniciar Sesión</h1>
                    </div>

                    <div class="form-group">
                        <label for="username">Usuario</label>
                        <input type="text" id="username" name="username" class="form-control" placeholder="Usuario" required autofocus>
                    </div>

                    <div class="form-group">
                        <label for="password">Contraseña</label>
                        <input type="password" id="password" name="password" class="form-control" placeholder="Contraseña" required>
                    </div>
                    <br>
                    <div class="form-group text-center">
                        <button class="btn btn-primary" type="submit">Iniciar Sesión</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <div class="container">
        <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
            <div class="col-md-4 d-flex align-items-center">
                <span class="mb-3 mb-md-0 text-muted">© 2023 Sabor Peruano, Inc</span>
            </div>

            <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
                <li class="ms-3"><a class="text-muted" href="#"><i class="fab fa-twitter"></i></a></li>
                <li class="ms-3"><a class="text-muted" href="#"><i class="fab fa-instagram"></i></a></li>
                <li class="ms-3"><a class="text-muted" href="#"><i class="fab fa-facebook"></i></a></li>
            </ul>

        </footer>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="/docs/5.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>