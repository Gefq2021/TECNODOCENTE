<?php
include 'conexion_db.php'; // Incluir conexión a la base de datos

// Función para comprobar si el usuario está inscrito en el curso
function esta_inscripto($conn, $id_usuario, $id_curso) {
    $query = "SELECT * FROM inscripciones WHERE id_usuario = ? AND id_curso = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ii", $id_usuario, $id_curso); // Vinculamos los parámetros
    $stmt->execute();
    $resultado = $stmt->get_result();
    
    // Si existe una fila, significa que el usuario está inscrito
    return $resultado->num_rows > 0;
}
?>
