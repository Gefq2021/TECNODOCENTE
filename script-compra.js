// Mostrar el formulario de compra cuando se hace clic en "Comprar curso"
document.getElementById("comprarCurso").addEventListener("click", function() {
  document.getElementById("comprar").style.display = "flex";
  document.getElementById("curso").style.display = "none";
});

// Cancelar compra
document.getElementById("cancelarCompra").addEventListener("click", (event) => {
  document.getElementById("comprar").style.display = "none";
  document.getElementById("curso").style.display = "grid";
  document.getElementById("titulocurso").scrollIntoView();
  event.preventDefault(); // Evitar que el enlace navegue a la URL
});

// Cerrar modal de agradecimiento
document.getElementById("cerrar-modalGracias").addEventListener("click", (event) => {
  document.getElementById("comprar").style.display = "none";
  document.getElementById("curso").style.display = "grid";
  
  // Cerrar el modal cuando se haga clic en el botón de cerrar
  document.getElementById("modalGracias").close();

});

// Validación antes de realizar el pago
document.getElementById("pagarCurso").addEventListener('click', (event) => {
  const nombre = document.getElementById("nombre").value;
  const correo = document.getElementById("correo").value;
  const pagoSeleccionado = document.querySelector('input[name="pago"]:checked');

  if (!nombre || !correo || !pagoSeleccionado) {
    alert("Por favor complete todos los campos.");
    event.preventDefault(); // Detener la ejecución si no se han completado los campos
    return;
  }

  // Obtener la opción de pago seleccionada
  var opcionesPago = document.getElementsByName("pago");
  var formaPagoSeleccionada = null;

  for (var i = 0; i < opcionesPago.length; i++) {
    if (opcionesPago[i].checked) {
      formaPagoSeleccionada = opcionesPago[i].value;
      break;
    }
  }

  if (formaPagoSeleccionada) {
    // Insertar el valor de la forma de pago seleccionada en el campo oculto
    document.getElementById("forma_pago").value = formaPagoSeleccionada;
  }

  // Si todo está correcto, mostramos el modal de agradecimiento
  document.getElementById("modalGracias").showModal(); // Mostrar el modal de agradecimiento
  document.getElementById("curso").style.display = "none"; // Ocultar la información del curso
  
});
