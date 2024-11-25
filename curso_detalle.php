<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start(); // Se asegura de que la sesión esté activa

// Verifica si el usuario está logueado
$usuarioLogueado = isset($_SESSION['usuario']) ? $_SESSION['usuario'] : null;
$correoUsuario = isset($_SESSION['email']) ? $_SESSION['email'] : ''; // Obtener el correo del usuario desde la sesión
$usuarioId = isset($_SESSION['usuario_id']) ? $_SESSION['usuario_id'] : null; // ID del usuario

include 'conexion_db.php';
include 'obtener_curso.php'; // Incluir el archivo que contiene la función obtener_curso
include 'comprobar_inscripcion.php'; // Incluir el archivo para comprobar inscripción

// Verificar si se pasó un id_curso por la URL
if (isset($_GET['id_curso'])) {
    $id_curso = $_GET['id_curso'];

    // Obtener los datos del curso usando la función obtener_curso
    $curso = obtener_curso($conn, $id_curso);

    // Verificar si se encontró el curso
    if (!$curso) {
        die("Curso no encontrado");
    }

    // Comprobar si el usuario ya está inscrito en el curso
    $inscripto = false;
    if ($usuarioId) {
        $inscripto = esta_inscripto($conn, $usuarioId, $id_curso);
    }

} else {
    // Si no se pasa el id_curso, redirigir o mostrar un mensaje de error
    die("ID de curso no proporcionado");
}

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
  <link rel="stylesheet" href="modal_login.css">
  <link rel="stylesheet" href="curso-detalle.css">
</head>

<body>
  
  <!-- Incluir el menú de navegación -->
  <?php include 'navbar.php'; ?>


  <h1>TECNODOCENTE</h1>

  <h2 id="titulo-curso"><?php echo $curso['titulo_curso']; ?></h2>

  <div class="curso" id="curso">
    <div class="imagen-curso">
      <div class="imagen-curso-item">
        <img src="<?php echo $curso['imagen_2']; ?>" alt="Imagen del curso">
      </div>
      <div class="imagen-curso-item">
        <?php echo $curso['video']; ?>
      </div>
    </div>
    <div class="curso-info">
      <div class="descripcion">
        <p><strong>Descripción del curso:</strong></p>
        <p><?php echo $curso['descripcion_1']; ?></p>
        <p><?php echo $curso['descripcion_2']; ?></p>
        <p><strong>Duración: </strong><?php echo $curso['duracion']; ?></p>
        <p><strong>Precio:</strong> $<?php echo number_format($curso['precio'], 2); ?></p>
      </div>

      <?php if ($inscripto): ?>
        <p class="boton-inscripto">Usted ya está inscrito en este curso</p>
      <?php else: ?>
        <button class="comprar-btn boton" id="comprarCurso">Comprar curso</button>
      <?php endif; ?>
      
    </div>
  </div>
  

  <!-- Formulario de compra (oculto inicialmente) -->
   <div class="comprar" id="comprar">
     <div class="comprar-form " id="comprarForm">
       <div class="form-left">
          <h3>Opciones de pago</h3>
          <div class="pago-opciones">
            <label><img src="./img/visa-mastercard.png" alt=""><input type="radio" name="pago" value="Tarjeta de crédito"></label>
            <label><img src="./img/pypal.png" alt=""><input type="radio" name="pago" value="PayPal"></label>
            <label><img src="./img/transferencia.png" alt=""><input type="radio" name="pago" value="Transferencia bancaria"></label>
         </div>
       </div>
   
       <div class="form-right">
         <h3>Datos del comprador</h3>
         <input type="text" id="nombre" value="<?php echo $usuarioLogueado; ?>" placeholder="Nombre completo" disabled>
         <input type="email" id="correo" value="<?php echo $correoUsuario; ?>" placeholder="Correo electrónico" disabled>
         <input type="text" id="curso-compra" value="<?php echo $curso['titulo_curso']; ?>" placeholder="Eliga un curso" disabled>
         <input type="text" id="precio" value="<?php echo $curso['precio']; ?>" disabled>

         
         <div class="botones-pagar">
           <button class="pagar-btn boton" id="pagarCurso">Pagar</button>
           <button type="button" class="cancelar-btn boton" id="cancelarCompra">Cancelar</button>
          </div>
        </div>
      </div>

      <!-- Modal de agradecimiento -->
      <dialog class="modal" id="modalGracias">
        <form method="POST" action="registrar_inscripcion.php" class="contenedor-modal">
         <div class="form-id">
          <input type="hidden" name="id_curso" value="<?php echo htmlspecialchars($id_curso); ?>">
          <input type="hidden" name="id_usuario" value="<?php echo htmlspecialchars($usuarioId); ?>">
          <input type="hidden" name="forma_pago" id="forma_pago" value="">
         </div>
         <p>Gracias por su compra.<br> ¡Nos vemos en el curso!</p>
         <button type="submit" class="modalGracias-btn" id="cerrar-modalGracias">Cerrar</button>
       </form>
     </dialog>
    </div>

  <!-- Incluimos el footer -->
  <?php include 'footer.php'; ?>


  <script src="script-compra.js" type="text/javascript"></script>

  
</body>

</html>