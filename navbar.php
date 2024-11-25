<?php
// Verificar si una sesión ya está activa
if (session_status() == PHP_SESSION_NONE) {
    session_start(); // Solo iniciar la sesión si no está activa
}

$usuarioLogueado = isset($_SESSION['usuario']) ? $_SESSION['usuario'] : null;
?>

<link rel="stylesheet" href="modal_login.css">
<link rel="stylesheet" href="navbar.css">

<nav>
  <div class="navbar-logo">
    <!-- Logo de la página -->
    <li class="li-logo"><a href="index.php"><img src="img/logotecno.jpeg" alt="Logo" class="logo"></a></li>

    <!-- Sección de navegación -->
    <ul> 
      <li><a href="index.php">Inicio</a></li>
      <li><a href="pagina1.php">Acerca de nosotros</a></li>
      <li><a href="formulario_inscripcion.php">Regístrate</a></li>
    </ul>
  </div>

  <div class="nav-login">
    <!-- Si el usuario está logueado -->
    <?php if ($usuarioLogueado): ?>
      <li class="usuario">
        <a href="usuario.php" class="incial_usuario">
          <?php
          // Obtener las iniciales del usuario
          $iniciales = strtoupper(substr($usuarioLogueado, 0, 1));
          echo "<span class='iniciales'>$iniciales</span>";
          ?>
        </a>
        <a href="cerrar_sesion.php" class="logout">Salir</a>
      </li>
    <?php else: ?>
      <!-- Si el usuario no está logueado, mostrar el botón de Login -->
      <li id="openModal" class="login"><a href="#">Login</a></li>
    <?php endif; ?>
  </div>
</nav>

<!-- Modal de Login -->
<dialog id="loginModal">
  <form method="POST" action="login.php">
    <div class="modal-header">
      <button type="button" id="closeModal" class="close-btn">&times;</button>
      <h2>Login</h2>
    </div>
    <div class="modal-body">
      <label for="usuario">Usuario:</label>
      <input type="text" id="usuario" name="usuario" autofocus required>
      
      <label for="contrasenia">Contraseña:</label>
      <input type="password" id="contrasenia" name="contrasenia" required>
      
      <button type="submit" id="closeModal" class="button-sesion">Iniciar sesión</button>
      <a href="recuperar_contrasenia.php" id="nueva-clave">Olvidé mi contraseña</a>
      <!-- Muestra el error cuando el usuario o la contraseña son incorrectos -->
      <div id="error-message" style="color:red; text-align: center; margin-top: .5rem; display: <?= isset($_GET['error']) ? 'block' : 'none' ?>; ">
        Usuario o contraseña incorrectos
      </div>
    </div>
  </form>
</dialog>

<script src="modal_login.js" type="text/javascript"></script>
