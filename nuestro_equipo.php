<?php
// Verificar si una sesión ya está activa
if (session_status() == PHP_SESSION_NONE) {
    session_start(); // Solo iniciar la sesión si no está activa
}

$usuarioLogueado = isset($_SESSION['usuario']) ? $_SESSION['usuario'] : null;
?>

<link rel="stylesheet" href="nuestro-equipo.css">

<section class="nuestroEquipo">
  <h2 class="nuestroEquipo_titulo">Nuestro Equipo</h2>

  <div class="integrantes" id="integrantes-container">

    <!-- <div class="integrante">
      <div class="integrante-imagen">
        <img src="./img/DOCENTE1.jpg" alt="" />
      </div>
      <p class="integrante-nombre">Julio César Burgos</p>
      <p class="integrante-descripcion">
        Soy profesor de informatica especializado en Diseño Digital. Te
        enseño ausar herramientas digitales para crear contenido impactante
        en redes sociales, desde publicaciones atractivas, hasta historias y
        banners profesionales. "¡Diseña como un experto, sin experiencia
        previa!"
      </p>
    </div> -->

  </div>
      
</section>

<script type="module" src="nuestro-equipo.js"></script>
