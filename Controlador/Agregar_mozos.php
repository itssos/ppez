<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header('Location: loginAdmin.php');
    exit;
}

// Variables para almacenar mensajes de éxito y error
$success_message = "";
$error_message = "";

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperar los datos del formulario
    $nombre = $_POST["nombre"];
    $paterno = $_POST["paterno"];
    $materno = $_POST["materno"];
    $usuario = $_POST["usuario"];
    $contrasena = $_POST["contrasena"];
    $dni = $_POST["dni"];
    $telefono = $_POST["telefono"];
    $correo = $_POST["correo"];

    // Realizar la validación de los campos
    $contrasenaValida = preg_match("/^\d{6}$/", $contrasena);
    $dniValido = preg_match("/^\d{8}$/", $dni);
    $telefonoValido = preg_match("/^\d{9}$/", $telefono);

    if (!$contrasenaValida) {
        $error_message = "La contraseña debe tener exactamente 6 dígitos numéricos.";
    } elseif (!$dniValido) {
        $error_message = "El DNI debe tener exactamente 8 dígitos numéricos.";
    } elseif (!$telefonoValido) {
        $error_message = "El teléfono debe tener exactamente 9 dígitos numéricos.";
    } else {
        // Verificar si el usuario ya existe
        include("../Modelo/conexion.php");
        $sqlUsuarioExistente = "SELECT COUNT(*) as count FROM mozos WHERE usuario = ?";
        $stmtUsuario = $conexion->prepare($sqlUsuarioExistente);
        $stmtUsuario->bind_param("s", $usuario);
        $stmtUsuario->execute();
        $resultUsuario = $stmtUsuario->get_result();
        $rowUsuario = $resultUsuario->fetch_assoc();

        if ($rowUsuario["count"] > 0) {
            $error_message = "El usuario ya existe. Por favor, elija otro usuario.";
        } else {
            // Verificar si el DNI ya existe
            $sqlDniExistente = "SELECT COUNT(*) as count FROM mozos WHERE dni = ?";
            $stmtDni = $conexion->prepare($sqlDniExistente);
            $stmtDni->bind_param("i", $dni);
            $stmtDni->execute();
            $resultDni = $stmtDni->get_result();
            $rowDni = $resultDni->fetch_assoc();

            if ($rowDni["count"] > 0) {
                $error_message = "El DNI ya existe. Por favor, ingrese otro DNI.";
            } else {
                // Verificar si el correo ya existe
                $sqlCorreoExistente = "SELECT COUNT(*) as count FROM mozos WHERE correo = ?";
                $stmtCorreo = $conexion->prepare($sqlCorreoExistente);
                $stmtCorreo->bind_param("s", $correo);
                $stmtCorreo->execute();
                $resultCorreo = $stmtCorreo->get_result();
                $rowCorreo = $resultCorreo->fetch_assoc();

                if ($rowCorreo["count"] > 0) {
                    $error_message = "El correo ya existe. Por favor, ingrese otro correo.";
                } else {
                    // Insertar el nuevo mozo en la base de datos
                    $sqlInsertarMozo = "INSERT INTO mozos (nombre, paterno, materno, usuario, contraseña, dni, telefono, correo) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
                    $stmtInsertar = $conexion->prepare($sqlInsertarMozo);
                    $stmtInsertar->bind_param("ssssssss", $nombre, $paterno, $materno, $usuario, $contrasena, $dni, $telefono, $correo);

                    if ($stmtInsertar->execute()) {
                        // Mostrar SweetAlert de éxito
                        $success_message = "Mozo agregado exitosamente.";
                    } else {
                        $error_message = "Error al agregar el mozo: " . $stmtInsertar->error;
                    }
                }
            }
        }

        // Cerrar la conexión a la base de datos
        $stmtUsuario->close();
        $stmtDni->close();
        $stmtCorreo->close();
        $stmtInsertar->close();

        // Redirigir solo si no hay errores
        if (empty($error_message)) {
            header('Location: ../Administracion/Mozos.php?success_message=' . urlencode($success_message));
            exit;
        }
    }
}

// Redirigir en caso de errores
if (!empty($error_message)) {
    header('Location: ../Administracion/Mozos.php?error_message=' . urlencode($error_message));
    exit;
}
?>