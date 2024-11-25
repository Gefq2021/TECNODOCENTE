<?php
  // Incluimos la conexión a la base de datos
  include 'conexion_db.php';
  // Incluimos la archivo para la generacion de la contraseña
  include 'generar_contrasenia.php';

  // Recibir los datos del formulario
  $nombre = $_POST['nombre'];
  $apellido = $_POST['apellido'];
  $email = $_POST['email'];
  $usuario = $_POST['usuario'];
  $contrasenia = generarContrasenia(); // Generamos la contraseña de forma aleatorea

  // Verificamos si el usuario ya existe en la base de datos
  $sql_check = "SELECT * FROM usuarios WHERE usuario = ?";
  $stmt_check = $conn->prepare($sql_check); // Preparamos la consulta SQL
  $stmt_check->bind_param('s', $usuario); // Vinculamos el parámetro 'usuario' a la consulta
  $stmt_check->execute(); // Ejecutamos la consulta

  // Comprobamos si se encontró un registro con ese usuario
  $result = $stmt_check->get_result(); // Obtenemos el resultado de la consulta
  if ($result->num_rows > 0) {
    // Si el usuario ya existe, redirigimos al formulario con el mensaje de error
    header('Location: formulario_inscripcion.php?success=1&error=usuario_existe&usuario=' . urlencode($usuario));
    exit;
  }

  // Insertar los datos en la base de datos
  $sql = "INSERT INTO usuarios (nombre, apellido, email, usuario, contrasenia) 
          VALUES ('$nombre', '$apellido', '$email', '$usuario', '$contrasenia')";

  if ($conn->query($sql) === TRUE) {
    // Redirigir a la página con los datos del usuario y la contraseña generada, en el modal
    header('Location: formulario_inscripcion.php?success=1&usuario=' . urlencode($usuario) . '&contrasenia=' . urlencode($contrasenia));
    exit;
  } else {
      // Si ocurre un error en la inserción, mostrar el error
      echo "Error al registrar el usuario: " . $conn->error;
    }

    // Cerrar la conexión
    $conn->close();
?>
