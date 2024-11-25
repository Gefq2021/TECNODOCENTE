
const abrirModal = document.getElementById('openModal');
const cerrarModal = document.getElementById('closeModal');

document.addEventListener("DOMContentLoaded", function () {
  // Verifica si el parámetro 'success' está presente en la URL
  const urlParams = new URLSearchParams(window.location.search);
  const success = urlParams.get('success');

  // Si 'success' es 1, abre el modal
  if (success == '1') {
      // Mostrar el modal
      const abrirModal = document.getElementById('modal');
      if (abrirModal) { // Mostrarmos el modal
            abrirModal.showModal(); // Mostramos el modal
      }
  }
});

// Cerramos el modal
const btn_modal = document.getElementById('closeModal');
btn_modal.addEventListener("click", () => {
  const modal = document.getElementById('modal');
  if (modal) {
      modal.close(); // Cerrar el modal
  }

  // Limpiar los parámetros 'usuario' y 'contrasenia' de la URL
  const newUrl = window.location.protocol + "//" + window.location.host + window.location.pathname;
  window.history.replaceState({}, document.title, newUrl); // Eliminar los parámetros de la URL sin recargar la página
})
