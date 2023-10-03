// Agrega un evento a todos los botones "Agregar a la Orden" con la clase 'agregar-plato-btn'
var agregarPlatoButtons = document.querySelectorAll('.agregar-plato-btn');

agregarPlatoButtons.forEach(function(button) {
    button.addEventListener('click', function() {
        // Captura los valores del plato seleccionado desde el modal
        var fila = this.closest('tr'); // Obtiene la fila actual
        var nombrePlato = fila.querySelector('p:nth-child(1)').textContent;
        var precioTexto = fila.querySelector('p:nth-child(2)').textContent.replace('Costo: s/', ''); // Elimina 'Costo: s/' y luego convierte a número
        var precioUnitarioPlato = parseFloat(precioTexto);
        var cantidadPlato = parseInt(fila.querySelector('input[type="number"]').value);

        // Verifica que la cantidad sea mayor o igual a 1 y no sea 0
        if (cantidadPlato >= 1) {
            // Calcula el precio total del pedido
            var precioTotal = cantidadPlato * precioUnitarioPlato;

            // Crea una nueva fila en la tabla de pedidos
            var tablaPedidos = document.getElementById('tabla-pedidos').getElementsByTagName('tbody')[0];
            var newRow = tablaPedidos.insertRow(tablaPedidos.rows.length);

            // Inserta celdas en la nueva fila
            var cell1 = newRow.insertCell(0);
            var cell2 = newRow.insertCell(1);
            var cell3 = newRow.insertCell(2);
            var cell4 = newRow.insertCell(3);
            var cell5 = newRow.insertCell(4); // Celda para el botón de eliminar

            // Llena las celdas con los valores del plato
            cell1.innerHTML = nombrePlato;
            cell2.innerHTML = cantidadPlato;
            cell3.innerHTML = precioUnitarioPlato.toFixed(2); // Formatea el precio unitario con dos decimales
            cell4.innerHTML = precioTotal.toFixed(2); // Formatea el precio total con dos decimales

            // Agrega el botón de eliminar
            var eliminarButton = document.createElement('button');
            eliminarButton.textContent = 'Eliminar';
            eliminarButton.className = 'btn btn-danger eliminar-plato-btn';
            cell5.appendChild(eliminarButton);

            // Limpia el campo de cantidad en el modal
            fila.querySelector('input[type="number"]').value = '0';

            // Recalcula el monto total y lo muestra
            calcularYMostrarMontoTotal();
        } else {
            alert('La cantidad debe ser mayor o igual a 1.');
        }
    });
});

// Agrega un evento a los botones "Eliminar" en la tabla de pedidos
document.addEventListener('click', function(e) {
    if (e.target && e.target.className == 'btn btn-danger eliminar-plato-btn') {
        var filaAEliminar = e.target.closest('tr');
        filaAEliminar.remove();
        calcularYMostrarMontoTotal();
    }
});

// Función para calcular y mostrar el monto total
function calcularYMostrarMontoTotal() {
    var filas = document.querySelectorAll('#tabla-pedidos tbody tr');
    var montoTotal = 0;

    filas.forEach(function(fila) {
        var precioTotal = parseFloat(fila.querySelector('td:nth-child(4)').textContent);
        montoTotal += precioTotal;
    });

    // Actualiza el elemento HTML con el monto total
    document.getElementById('monto-total').textContent = 'Monto Total: ' + montoTotal.toFixed(2);
}
