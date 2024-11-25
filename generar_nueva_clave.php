<?php
// Habilitar la visualización de errores de PHP (solo en desarrollo)
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Incluir la conexión a la base de datos
include 'conexion_db.php'; // Asegúrate de que el archivo de conexión sea correcto
include 'generar_contrasenia.php'; // Incluir la función que genera contraseñas

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Recibir los datos del formulario
    $usuario = $_POST['usuario'];
    $email = $_POST['email'];

    // Preparar la consulta SQL usando MySQLi
    $stmt = $conn->prepare("SELECT * FROM usuarios WHERE usuario = ? AND email = ? LIMIT 1");
    
    // Enlazar el parámetro para la consulta
    $stmt->bind_param("ss", $usuario, $email);
    
    // Ejecutar la consulta
    $stmt->execute();
    
    // Obtener el resultado
    $resultado = $stmt->get_result();
    $user = $resultado->fetch_assoc();
    
    // Verificar si el usuario existe y si el email es correcto
    if ($user && $email === $user['email']) {
        // Generar una nueva contraseña
        $nueva_contrasenia = generarContrasenia(6); // Puedes cambiar la longitud si lo deseas
        
        // Preparar la consulta SQL para actualizar la contraseña
        $stmt_update = $conn->prepare("UPDATE usuarios SET contrasenia = ? WHERE usuario = ?");
        $stmt_update->bind_param("ss", $nueva_contrasenia, $usuario);
        
        // Ejecutar la actualización
        if ($stmt_update->execute()) {
            // Redirigir a la página actual con éxito y pasando los datos
            header('Location: recuperar_contrasenia.php?success=1&usuario=' . urlencode($usuario) . '&contrasenia=' . urlencode($nueva_contrasenia));
            exit();  // Detener la ejecución del script
        } else {
            // Si la actualización falló, redirigir con un error
            header('Location: recuperar_contrasenia.php?success=1&error=update_failed&usuario=' . urlencode($usuario));
            exit();
        }
    } else {
        // Si el usuario no existe o el correo no coincide, redirigir con un error
        header('Location: recuperar_contrasenia.php?success=1&error=user_not_found&usuario=' . urlencode($usuario));
        exit();
    }
}
