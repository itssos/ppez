// Crear un array para almacenar los dígitos
const passwordDigits = [];

// Obtener el botón "del" y el elemento contentPass
const delButton = document.querySelector('.del');
const contentPass = document.querySelector('.contentPass p');

// Obtener todos los divs numéricos
const divs = document.querySelectorAll('.buttonsPanel .btn');

// Obtener el campo de usuario
const usuarioInput = document.getElementById('usuario');

// Función para actualizar el contenido de contentPass
function updateContentPass() {
    contentPass.textContent = passwordDigits.map(() => '•').join('');
}

// Función para habilitar o deshabilitar los divs
function toggleDivs(enabled) {
    divs.forEach(div => {
        div.style.pointerEvents = enabled ? 'auto' : 'none';
        div.style.opacity = enabled ? '1' : '0.5';
    });
}

// Deshabilitar los divs inicialmente
toggleDivs(false);

// Agregar un evento de cambio (input) al campo de usuario
usuarioInput.addEventListener('input', () => {
    const usuarioValue = usuarioInput.value.trim();
    
    // Habilitar los divs solo si hay un valor en el campo de usuario
    if (usuarioValue !== '') {
        toggleDivs(true);
    } else {
        toggleDivs(false);
    }
});

// Agregar un evento de clic al botón "del"
delButton.addEventListener('click', () => {
    // Verificar si el array tiene elementos para eliminar
    if (passwordDigits.length > 0) {
        // Eliminar el último dígito del array
        passwordDigits.pop();

        // Actualizar el contenido de contentPass
        updateContentPass();

        // Mostrar el array actualizado en la consola
        console.log(passwordDigits);
    }
});

// Iterar a través de los divs y agregar un evento de clic
divs.forEach(div => {
    div.addEventListener('click', () => {
        // Verificar si ya hay 6 dígitos
        if (passwordDigits.length >= 6) {
            return; // No agregar más dígitos
        }

        // Obtener el valor del div haciendo referencia al elemento p dentro de él
        const value = div.querySelector('p').textContent;

        // Agregar el dígito al array de dígitos
        passwordDigits.push(value);

        // Actualizar el contenido de contentPass
        updateContentPass();

        // Mostrar el array actualizado en la consola
        console.log(passwordDigits);

        const usuarioInput = document.getElementById('usuario');
        const usuarioValue = usuarioInput.value.trim();

        if (passwordDigits.length === 6 && usuarioValue !== '') {
            const pinInput = document.getElementById('pin');
            pinInput.value = passwordDigits.join(''); // Unir los dígitos en un solo string
            const loginForm = document.getElementById('loginForm');
            loginForm.submit();
        }
    });
});
