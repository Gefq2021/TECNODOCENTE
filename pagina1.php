<?php
session_start();

// Verifica si el usuario está logueado
$usuarioLogueado = isset($_SESSION['usuario']) ? $_SESSION['usuario'] : null;
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewpoert" content="width=device-width,
  initial-scale=1.0">
  <title>Trabajo final 2024</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="style1.css">
</head>

<body>
  
  <!-- Incluir el menú de navegación -->
  <?php include 'navbar.php'; ?>
  
  <br>
  <br>
  <h1>Sobre Nosotros</h1>

  <div class="Inicio-CajaTexto">
    <p1>En nuestra institución, nos apasiona transformar la educación mediante el uso estratégico de herramientas tecnológicas en el aula. Nos dedicamos a brindar capacitación integral a docentes, ayudándolos a incorporar tecnologías innovadoras que potencien el aprendizaje, promuevan la creatividad y faciliten la enseñanza en todos los niveles educativos.</p1>

    <p>Sabemos que el rol docente enfrenta constantes desafíos en la era digital, por lo que nuestro objetivo es ofrecer programas prácticos y accesibles que permitan a los educadores no solo adquirir habilidades técnicas, sino también integrarlas de manera efectiva en sus prácticas pedagógicas.</p><br>

    <p>Nuestras capacitaciones incluyen herramientas como Canva, Genially, Google Drive, Powtoon, Kahoot y ChatGPT, diseñadas para enriquecer la experiencia en el aula, crear materiales atractivos y fomentar la interacción con los estudiantes.</p>
    <p>En un ambiente colaborativo y profesional, nos comprometemos a apoyar a los docentes en su camino hacia la innovación educativa, fortaleciendo sus competencias digitales para enfrentar los retos del presente y construir el futuro de la educación.</p>
    <p>¡Juntos, construimos aulas más dinámicas y conectadas al mundo digital!</p>

  </div>

  <div class="imagen_nosotros">
    <div>
      <img src="./img/DOCENTE1.jpg" alt="">
    </div>
    <div>
      <img src="./img/DOCENTE2.jpg" alt="">
    </div>
    <div>
      <img src="./img/DOCENTE3.jpg" alt="">
    </div>
  </div>

  <div class="Inicio-CajaTexto">
    <p1> En nuestra plataforma ofrecemos dos modalidades de aprendizaje para adaptarnos a tus necesidades y facilitar el
      acceso a la capacitación en herramientas digitales:</p1>

    <p><b>MODALIDAD SINCRONICA</b> podrás participar en clases en tiempo real junto a
      otros docentes. Esto significa que:
      <li>Tendrás un horario específico para conectarte, lo que facilita la
        interacción directa con el instructor y otros
        participantes.</li>
      <li>Podrás realizar preguntas en el momento, recibir retroalimentación inmediata y participar en actividades
        grupales,
        lo que enriquece el aprendizaje colaborativo.</li>
      <li>Las clases sincrónicas están diseñadas para aquellos que prefieren una estructura guiada y un contacto cercano
        con los tutores.</li>
      <li>Ideal para quienes buscan un acompañamiento constante y disfrutan del aprendizaje en comunidad.</li>
    </p><br>

    <p><b>MODALIDAD ASINCRONICA</b> te brinda la libertad de aprender a tu propio ritmo y en el momento que mejor
      te convenga:
      <li>Tendrás acceso a materiales grabados, tutoriales y recursos disponibles en la plataforma las 24 horas del día,
        todos los días.</li>
      <li>Puedes organizar tu tiempo para avanzar en el curso y acceder a los contenidos desde cualquier lugar, sin
        depender de horarios fijos.</li>
      <li>Además, los foros y espacios de consulta estarán disponibles para que dejes tus preguntas y recibas respuestas
        en un plazo breve.</li> </p>

      </div>

  <style>
    .Inicio-CajaTexto {
      padding: 5rem;
      font-size: 1rem;
    }
    footer {
      text-align: center;
      padding: 3px;
      background-color: rgb(161, 122, 233);
      color: rgb(24, 23, 23);
    }
  </style>

  <!-- Incluir el menú de navegación -->
  <?php include 'nuestro_equipo.php'; ?>

  <!-- Incluimos el footer -->
  <?php include 'footer.php'; ?>
  
</body>

</html>