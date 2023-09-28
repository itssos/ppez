// Función para agregar un número al campo de entrada de contraseña
function appendNumber(number) {
    var passwordInput = document.getElementById("password");
    var passwordButtonsInput = document.getElementById("passwordButtons");

    passwordInput.value += number; // Agrega el número al campo de contraseña
    passwordButtonsInput.value += number; // Agrega el número al campo de botones numéricos
}
