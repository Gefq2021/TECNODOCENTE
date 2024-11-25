<?php
session_start(); // Se asegura de que la sesión esté activa
ini_set('display_errors', 1);
error_reporting(E_ALL);


// Verifica si el usuario está logueado
$usuarioLogueado = isset($_SESSION['usuario']) ? $_SESSION['usuario'] : null;

include 'conexion_db.php';
include 'obtener_datos.php';
$data = obtener_datos($conn); // Traemos los datos de la db cursos

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
  <link rel="stylesheet" href="footer.css">
</head>

<body>


  <!-- Incluir el menú de navegación -->
  <?php include 'navbar.php'; ?>

  <h1>TECNODOCENTE</h1>

  <h2>Los invitamos a explorar nuestros cursos y a formar parte de una comunidad comprometida con la educación y la
    innovación. Cada módulo está diseñado no solo para enseñar, sino también para inspirar y motivar a los educadores a
    integrar la tecnología en sus metodologías de enseñanza.</h2>

  <div class="Imagen_logo">
    <img src="img/logotecno.jpeg" alt="Logo de la pagina" style="width: 400px;">
  </div> <br><br><br><br>
  <hr><br><br>
  <h3><u><b>NUESTROS CURSOS</u></b></h3><br><br>
  <hr><br><br>

  <div class="Imagenes_cursos">
    <?php foreach($data as $row): ?>
      <div class="IMAGEN_1 imagen">
        <?php if ($usuarioLogueado): ?>
          <a href="curso_detalle.php?id_curso=<?php echo $row['id_curso']; ?>#titulo-curso" class="a-logeado">
            <div class="imagen-curso">
              <img class="CANVA" src="<?php echo $row['imagen_1']; ?>" alt="<?php echo $row['categoria_curso']; ?>">
            </div>
            <P1><u><b><?php echo mb_strtoupper($row['categoria_curso']); ?>:</u> </b><?php echo $row['descripcion_1']; ?></P1>
          </a>
        <?php else: ?>
          <div class="imagen-curso">
              <img class="CANVA" src="<?php echo $row['imagen_1']; ?>" alt="<?php echo $row['categoria_curso']; ?>">
            </div>
            <P1><u><b><?php echo mb_strtoupper($row['categoria_curso']); ?>:</u> </b><?php echo $row['descripcion_1']; ?></P1>
        <?php endif; ?>
      </div>
      <?php endforeach; ?>
  </div>

  <!-- Incluimos el footer -->
  <?php include 'footer.php'; ?>

</body>

</html>