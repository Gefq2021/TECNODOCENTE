<?php
  // Configuración de la base de datos
  $servidor = "localhost:3307";
  $usuario = "root";
  $contrasenia = "";  // Por defecto, XAMPP usa una contraseña vacía
  $base_de_datos = "tecno_docente";

  // Crear la conexión
  $conn = new mysqli($servidor, $usuario, $contrasenia, $base_de_datos);

  // Comprobar la conexión
  if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
  }
?>
