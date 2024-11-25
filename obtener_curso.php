<?php
include 'conexion_db.php';

function obtener_curso($conn, $id_curso) {
    // Preparamos la consulta para obtener los detalles del curso por id
    $sql = "SELECT id_curso, categoria_curso, titulo_curso, descripcion_1, descripcion_2, duracion, precio, imagen_1, imagen_2, video FROM cursos WHERE id_curso = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id_curso);  // "i" significa que estamos pasando un entero
    $stmt->execute();
    $result = $stmt->get_result();

    // Verificamos si se encontró el curso
    if ($result->num_rows > 0) {
        // Devolvemos los datos del curso
        return $result->fetch_assoc();
    } else {
        return null;  // Si no se encuentra el curso
    }
    $stmt->close();
}
?>
