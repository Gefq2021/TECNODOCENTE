<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start(); // Se asegura de que la sesión esté activa

// Verifica si el usuario está logueado
$usuarioLogueado = isset($_SESSION['usuario']) ? $_SESSION['usuario'] : null;
$correoUsuario = isset($_SESSION['email']) ? $_SESSION['email'] : ''; // Obtener el correo del usuario desde la sesión
$usuarioId = isset($_SESSION['usuario_id']) ? $_SESSION['usuario_id'] : null; // ID del usuario

include 'conexion_db.php';
include 'obtener_usuario.php'; // Incluir el archivo que contiene la función obtener_usuario

// Verificar si el usuario está logueado
if (!$usuarioLogueado) {
    // die("No has iniciado sesión.");
    header("Location: index.php");
    exit();
}

// Obtener los datos del usuario y sus cursos
$usuarioDatos = obtener_usuario($conn, $usuarioId);
$usuario = $usuarioDatos['usuario'];
$cursos = $usuarioDatos['cursos'];
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewpoert" content="width=device-width,
  initial-scale=1.0">
  <title>Trabajo Final 2024</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="style.css">
  <!-- <link rel="stylesheet" href="modal_login.css"> -->
  <link rel="stylesheet" href="usuario.css">
</head>

<body>
  
  <!-- Incluir el menú de navegación -->
  <?php include 'navbar.php'; ?>

  <h1>TECNODOCENTE</h1>
  
  <section class="usuario_info">
    <!-- <h2>Usuario: <?php echo $usuario['usuario']; ?></h2> -->
    <h2>Usuario: <?php echo $usuario['usuario']; ?></h2>
    <div class="usuario-datos">
      <div class="imagen-usuario">
        <!-- Mostrar la imagen del usuario -->
        <!-- <?php if (!empty($usuario['imagen'])): ?>
          <img src="<?php echo $usuario['imagen']; ?>" alt="Imagen del usuario" class="img-usuario">
        <?php else: ?>
          <img src="<?php echo $usuario['imagen']; ?>" alt="Imagen del usuario" class="img-usuario">
        <?php endif; ?> -->

        <img src="./img/usuario_1.png" alt="Imagen del usuario" class="img-usuario">
        <span><?php echo $usuario['usuario']; ?></span>
      </div>
      
      <div class="informacion-usuario">
        <p><strong>Nombre:</strong> <?php echo $usuario['nombre'] . ' ' . $usuario['apellido']; ?></p>
        <p><strong>Email:</strong> <?php echo $usuario['email']; ?></p>
        <p><strong>Usuario:</strong> <?php echo $usuario['usuario']; ?></p>
      </div>
    </div>

  </section>

  <section class="usuario_cursos">
    <h2>Cursos Registrados</h2>
    
    <!-- Verificar si el usuario tiene cursos registrados -->
    <?php if (empty($cursos)): ?>
      <div class="mensaje-no-cursos">
        <p><strong>¡Aún no estás registrado en ningún curso!</strong></p>
        <p>Explora nuestros cursos y comienza tu aprendizaje.</p>
      </div>
    <?php else: ?>
      <!-- Tabla de cursos -->
      <table>
        <thead>
        <tr>
          <th>Imagen</th>
          <th>Categoría</th>
          <th>Título</th>
          <th>Duración</th>
          <th>Fecha de Inscripción</th>
          <th>Precio</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($cursos as $curso): ?>
          <tr>
            <td class="td-imagen"><img src="<?php echo $curso['imagen_2']; ?>" alt="Imagen del curso" class="img-curso"></td>
            <td><?php echo $curso['categoria_curso']; ?></td>
            <td><?php echo $curso['titulo_curso']; ?></td>
            <td><?php echo $curso['duracion']; ?></td>
            <td><?php echo $curso['fecha_inscripcion']; ?></td>
            <td><?php echo "$" . number_format($curso['precio'], 2); ?></td>
          </tr>
        <?php endforeach; ?>
        </tbody>
      </table>
    <?php endif; ?>

  </section>


  <!-- Incluimos el footer -->
  <?php include 'footer.php'; ?>

  <!-- <script src="script-compra.js" type="text/javascript"></script> -->

  
  </body>

</html>