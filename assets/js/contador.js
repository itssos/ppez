function agregarCantidad(button) {
    const cantidadElement = button.nextElementSibling;
    let cantidad = parseInt(cantidadElement.textContent);
    cantidad++;
    cantidadElement.textContent = cantidad;
}
function restarCantidad(button) {
    const cantidadElement = button.previousElementSibling;
    let cantidad = parseInt(cantidadElement.textContent);
    if (cantidad > 0) {
        cantidad--;
        cantidadElement.textContent = cantidad;
    }
}
