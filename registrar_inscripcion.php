<?php
// Iniciar sesión
session_start();

// Verificar si el usuario está logueado
$usuarioId = isset($_SESSION['usuario_id']) ? $_SESSION['usuario_id'] : null;
if ($usuarioId === null) {
    echo "Debes iniciar sesión para realizar la inscripción.";
    exit();  // Detener la ejecución si el usuario no está logueado
}

// Incluir la conexión a la base de datos
include 'conexion_db.php';

// Comprobar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Verificar si se ha recibido el id_curso, id_usuario y forma_pago a través del formulario
if (isset($_POST['id_curso']) && isset($_POST['id_usuario']) && isset($_POST['forma_pago'])) {
    var_dump($_POST); // Para depuración

    $id_curso = $_POST['id_curso'];
    $id_usuario = $_POST['id_usuario'];
    $forma_pago = $_POST['forma_pago'];

    // Verificar que el id_usuario sea el mismo que el de la sesión
    if ($id_usuario != $usuarioId) {
        echo "El usuario no coincide con el que está logueado.";
        exit(); // Detener la ejecución si el usuario no coincide
    }

    // Obtener el precio del curso
    $sql_precio = "SELECT precio FROM cursos WHERE id_curso = ?";
    $stmt_precio = $conn->prepare($sql_precio);
    $stmt_precio->bind_param("i", $id_curso);
    $stmt_precio->execute();
    $result_precio = $stmt_precio->get_result();
    if ($result_precio->num_rows > 0) {
        $curso = $result_precio->fetch_assoc();
        $precio = $curso['precio'];
    } else {
        echo "Curso no encontrado.";
        exit();
    }

    // Iniciar una transacción para asegurar que ambos registros se guarden correctamente
    $conn->begin_transaction();

    try {
        // Insertar los datos de la inscripción en la tabla inscripciones
        $sql_inscripcion = "INSERT INTO inscripciones (id_usuario, id_curso) VALUES (?, ?)";
        $stmt_inscripcion = $conn->prepare($sql_inscripcion);
        $stmt_inscripcion->bind_param("ii", $id_usuario, $id_curso);
        $stmt_inscripcion->execute();

        // Verificar si hubo error en la inscripción
        if ($stmt_inscripcion->error) {
            echo "Error en la inscripción: " . $stmt_inscripcion->error;
            exit();
        }

        // Obtener el ID de la última inscripción
        $id_inscripcion = $conn->insert_id;

        // Insertar los datos del pago en la tabla pagos
        $sql_pago = "INSERT INTO pagos (id_inscripcion, forma_pago, monto, fecha_pago) 
                     VALUES (?, ?, ?, NOW())";
        $stmt_pago = $conn->prepare($sql_pago);
        $stmt_pago->bind_param("isd", $id_inscripcion, $forma_pago, $precio);
        $stmt_pago->execute();

        // Verificar si hubo error en el pago
        if ($stmt_pago->error) {
            echo "Error en el pago: " . $stmt_pago->error;
            exit();
        }

        // Si ambos inserts fueron exitosos, hacer commit
        $conn->commit();

        // Redirigir a una página de éxito o mostrar un mensaje de éxito
        header("Location: index.php?success=true");
        exit(); // Detener la ejecución después de la redirección
    } catch (Exception $e) {
        // En caso de error, hacer rollback de la transacción
        $conn->rollback();
        echo "Error al procesar la inscripción o el pago. Por favor, inténtalo de nuevo más tarde.";
    }

    // Cerrar sentencias
    $stmt_inscripcion->close();
    $stmt_pago->close();
} else {
    echo "Faltan datos. Asegúrate de que el formulario esté completo.";
}

$conn->close();
?>
