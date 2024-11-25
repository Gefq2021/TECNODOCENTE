<?php
    // Recuperar los valores desde la URL (si es que existen)
    $usuario_modal = isset($_GET['usuario']) ? $_GET['usuario'] : '';
    $contrasenia_modal = isset($_GET['contrasenia']) ? $_GET['contrasenia'] : '';
    $error_modal = isset($_GET['error']) ? $_GET['error'] : ''; // Recuperar el error 
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Registro</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="style-formulario.css">
</head>

<body>

    <h1>TECNODOCENTE</h1>

    <nav>
    <ul class="boton-volver">
      <li> <a href="index.php" class="volver-inicio">Volver al Inicio</a></li>
    </ul>
  </nav>

    <h2 class="title_container title">Formulario de Generacion de Nueva Contraseña</h2>
    <form action="generar_nueva_clave.php" method="POST" class="form_container">
      
        <div class="input_container">
            <label class="input_label" for="usuario">Usuario:</label>
            <input type="text" id="usuario" class="input_field" name="usuario" autofocus required>
        </div>

        <div class="input_container">
            <label class="input_label" for="email">Email:</label>
            <input type="email" id="email" class="input_field" name="email" required>
        </div>

        <input class="boton boton_nueva_clave" id="openModal" type="submit" value="Generar Nueva Clave">
    </form>

    <!-- Creamos la ventamos modal que muestra el mensaje de error o exitoso al cargar el formulario de registro -->
    <dialog action="" class="modal" id="modal">
        <form action="" method="" class="modal_container">
            <!-- Mostrar mensaje si hay un error de usuario no existe -->
            <?php if ($error_modal == 'user_not_found'): ?>
                <h2 class="title-modal title-error">Error</h2>
                <p class="input_modal"><strong>El usuario <?= htmlspecialchars($usuario_modal) ?> no existe o el correo no coincide.<br> Por favor, ingresa un usuario y correo válido.</strong></p>
            <?php elseif ($error_modal == 'update_failed'): ?>
                <h2 class="title-modal title-error">Error</h2>
                <p class="input_modal"><strong>Hubo un problema al generar la nueva contraseña.<br> Intenta nuevamente.</strong></p>
            <?php elseif (isset($_GET['success']) && $_GET['success'] == 1): ?>
                <h2 class="title-modal title-exito">Proceso Exitoso</h2>
                <p class="input_modal"><strong>Usuario:</strong> <?= htmlspecialchars($usuario_modal) ?></p>
                <p class="input_modal"><strong>Nueva Contraseña:</strong> <?= htmlspecialchars($contrasenia_modal) ?></p>
            <?php endif; ?>
            <button class="boton boton_modal" id="closeModal">Aceptar</button>
        </form>
    </dialog>

    <script src="actualizar_contrasenia.js" type="text/javascript"></script>
    
</body>

</html>