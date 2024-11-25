<?php
    session_start();
    // Verifica si el usuario está logueado
    $usuarioLogueado = isset($_SESSION['usuario']) ? $_SESSION['usuario'] : null;

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

    <!-- Incluir el menú de navegación -->
    <?php include 'navbar.php'; ?>

    <h1>TECNODOCENTE</h1>

    <h2 class="title_container title">Formulario de Registro</h2>
    <form action="guardar_usuario.php" method="POST" class="form_container">
        <div class="input_container">
            <label class="input_label" for="nombre" class="form-label">Nombre:</label>
            <input type="text" id="nombre" class="input_field" name="nombre" autofocus required>
        </div>

        <div class="input_container">
            <label class="input_label" for="apellido">Apellido:</label>
            <input type="text" id="apellido" class="input_field" name="apellido" required>
        </div>

        <div class="input_container">
            <label class="input_label" for="email">Email:</label>
            <input type="email" id="email" class="input_field" name="email" required>
        </div>

        <div class="input_container">
            <label class="input_label" for="usuario">Usuario:</label>
            <input type="text" id="usuario" class="input_field" name="usuario" required>
        </div>

        <input class="boton boton_registrar" type="submit" value="Registrar">
    </form>

    <!-- Creamos la ventamos modal que muestra el mensaje de error o exitoso al cargar el formulario de registro -->
    <dialog action="" class="modal" id="modal">
        <form action="guardar_usuario.php" method="dialog" class="modal_container">
            <!-- Mostrar mensaje si hay un error de usuario duplicado -->
            <?php if ($error_modal == 'usuario_existe'): ?>
                <h2 class="title-modal title-error">Error de Registro</h2>
                <p class="input_modal"><strong>El usuario <?= htmlspecialchars($usuario_modal) ?> ya existe. <br>Elija otro usuario.</strong></p>
            <!-- Usamos PHP para insertar el nombre de usuario y la contraseña generada en el modal -->
            <?php elseif (isset($_GET['success']) && $_GET['success'] == 1): ?>
                <h2 class="title-modal title-exito">Registro Exitoso</h2>
                <p class="input_modal"><strong>Usuario:</strong> <span id="modal-usuario"><?= htmlspecialchars($usuario_modal) ?></span></p>
                <p class="input_modal"><strong>Contraseña:</strong> <span id="modal-contrasenia"><?= htmlspecialchars($contrasenia_modal) ?></span></p>
            <?php endif; ?>
            <button class="boton boton_modal" id="boton_modal">Aceptar</button>
        </form>
    </dialog>

    <!-- Incluimos el footer -->
    <?php include 'footer.php'; ?>

    <script src="modal.js" type="text/javascript"></script>
    
</body>

</html>