<?php
// Habilitar la visualización de errores de PHP (solo en desarrollo)
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Incluir la conexión a la base de datos
include 'conexion_db.php'; // Asegúrate de que el archivo de conexión sea correcto

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Recibir los datos del formulario
    $usuario = $_POST['usuario'];
    $contrasenia = $_POST['contrasenia'];
    // $correo = $_POST['email'];

    // Preparar la consulta SQL usando MySQLi
    $stmt = $conn->prepare("SELECT * FROM usuarios WHERE usuario = ? LIMIT 1");
    
    // Enlazar el parámetro para la consulta
    $stmt->bind_param("s", $usuario);
    
    // Ejecutar la consulta
    $stmt->execute();
    
    // Obtener el resultado
    $resultado = $stmt->get_result();
    $user = $resultado->fetch_assoc();
    
    // Verificar si el usuario existe y si la contraseña es correcta
    if ($user && $contrasenia === $user['contrasenia']) {
        // Si las credenciales son correctas, se guarda la sesión
        $_SESSION['usuario_id'] = $user['id']; // Guardamos el ID del usuario
        $_SESSION['usuario'] = $usuario; // Guardamos el nombre de usuario
        $_SESSION['email'] = $user['email']; // Guardamos el correo en la sesión
        $_SESSION['nombre'] = $user['nombre']; // Guardamos el nombre del usuario
        $_SESSION['apellido'] = $user['apellido']; // Guardamos el apellido del usuario
        
        header('Location: index.php');  // Redirigir a la página principal
        exit();  // Detener la ejecución del script
    } else {
        // Si las credenciales son incorrectas, redirigir con un mensaje de error
        header("Location: index.php?error=true");
        exit();
    }
}
?>



