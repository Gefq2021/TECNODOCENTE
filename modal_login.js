const modal = document.getElementById('loginModal');
const abrirModal = document.getElementById('openModal');
const cerrarModal = document.getElementById('closeModal');
const nuevaClave = document.getElementById('nueva-clave');

// Abre el modal cuando se hace clic en el enlace de login
abrirModal.addEventListener('click', (event) => {
  event.preventDefault(); // Evitar que el enlace navegue a la URL
  modal.showModal();  // Muestra el modal
});

// Cierra el modal cuando se hace clic en el botón de cierre (X)
cerrarModal.addEventListener('click', () => {
  modal.close();  // Cierra el modal
  // Cambiamos la URL para eliminar 'login=true' al cerrar el modal
  window.history.pushState({}, '', 'index.php'); // Elimina 'login=true' de la URL sin recargar la página
});


// Si hay un error, el modal no se cierra y el mensaje de error se muestra
window.addEventListener('load', () => {
  if (window.location.search.indexOf('error=true') !== -1) {
    modal.showModal();  // Si el login falló, no cerrar el modal
    document.getElementById('usuario').focus(); // Enfocar el campo de usuario
  }
});

// Cierra el modal y redirige a "recuperar_contrasenia.php" cuando se hace clic en el enlace "Olvidé mi contraseña"
nuevaClave.addEventListener('click', (e) => {
  modal.close();  // Cierra el modal
  window.location.href = 'recuperar_contrasenia.php'; // Redirige a la página de generar nueva clave
});

// Función para abrir el modal si hay un parámetro 'login=true' en la URL
function abrirModalSiEsNecesario() {
  const urlParams = new URLSearchParams(window.location.search);
  if (urlParams.has('login') && urlParams.get('login') === 'true') {
    modal.showModal();  // Muestra el modal si 'login=true' está en la URL
    document.getElementById('usuario').focus(); // Enfocar el campo de usuario
  }

  // Si hay un error, no cerrar el modal
  if (urlParams.has('error') && urlParams.get('error') === 'true') {
    modal.showModal();
    document.getElementById('usuario').focus(); // Enfocar el campo de usuario
  }
}

// Ejecuta la función al cargar la página
window.addEventListener('load', abrirModalSiEsNecesario);

// const modal = document.getElementById('loginModal');
// const abrirModal = document.getElementById('openModal');
// const cerrarModal = document.getElementById('closeModal');
// const nuevaClave = document.getElementById('nueva-clave');
// const errorMessage = document.getElementById('error-message');
// const spinner = document.getElementById('spinner');  // Si usas un spinner de carga

// // Abre el modal cuando se hace clic en el enlace de login
// abrirModal.addEventListener('click', (event) => {
//   event.preventDefault(); // Evitar que el enlace navegue a la URL
//   modal.showModal();  // Muestra el modal
// });

// // Cierra el modal cuando se hace clic en el botón de cierre (X)
// cerrarModal.addEventListener('click', () => {
//   modal.close();  // Cierra el modal
//   // Cambiamos la URL para eliminar 'login=true' al cerrar el modal
//   window.history.pushState({}, '', 'index.php'); // Elimina 'login=true' de la URL sin recargar la página
//   // Esconde el mensaje de error y spinner cuando se cierra el modal
//   errorMessage.style.display = 'none';
//   spinner.style.display = 'none';
// });

// // Si hay un error, el modal no se cierra y el mensaje de error se muestra
// window.addEventListener('load', () => {
//   const urlParams = new URLSearchParams(window.location.search);
//   if (urlParams.has('error') && urlParams.get('error') === 'true') {
//     modal.showModal();  // Si el login falló, no cerrar el modal
//     document.getElementById('usuario').focus(); // Enfocar el campo de usuario
//     errorMessage.style.display = 'block'; // Mostrar mensaje de error
//   } else {
//     errorMessage.style.display = 'none'; // Asegurarse de que no se muestre el mensaje si no hay error
//   }
  
//   // Si el login fue exitoso, el modal se cierra automáticamente, pero aseguramos que el spinner esté oculto
//   spinner.style.display = 'none'; // Ocultar el spinner cuando la página se cargue completamente
// });

// // Cierra el modal y redirige a "recuperar_contrasenia.php" cuando se hace clic en el enlace "Olvidé mi contraseña"
// nuevaClave.addEventListener('click', (e) => {
//   modal.close();  // Cierra el modal
//   window.location.href = 'recuperar_contrasenia.php'; // Redirige a la página de generar nueva clave
// });

// Función para abrir el modal si hay un parámetro 'login=true' en la URL
// function abrirModalSiEsNecesario() {
//   const urlParams = new URLSearchParams(window.location.search);
//   if (urlParams.has('login') && urlParams.get('login') === 'true') {
//     modal.showModal();  // Muestra el modal si 'login=true' está en la URL
//     document.getElementById('usuario').focus(); // Enfocar el campo de usuario
//   }

//   // Si hay un error, no cerrar el modal
//   if (urlParams.has('error') && urlParams.get('error') === 'true') {
//     modal.showModal();
//     document.getElementById('usuario').focus(); // Enfocar el campo de usuario
//     errorMessage.style.display = 'block'; // Mostrar el mensaje de error
//   }
// }

// // Ejecuta la función al cargar la página
// window.addEventListener('load', abrirModalSiEsNecesario);
