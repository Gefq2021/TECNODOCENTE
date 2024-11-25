<?php
include 'conexion_db.php';

function obtener_usuario($conn, $usuarioId) {
    // Obtener datos del usuario
    $queryUsuario = "SELECT * FROM usuarios WHERE id = ?";
    $stmt = $conn->prepare($queryUsuario);
    $stmt->bind_param("i", $usuarioId);
    $stmt->execute();
    $resultadoUsuario = $stmt->get_result();
    $usuario = $resultadoUsuario->fetch_assoc();
    $stmt->close();

    // Obtener los cursos en los que el usuario está inscrito
    $queryCursos = "
        SELECT c.categoria_curso, c.titulo_curso, c.duracion, c.precio, c.imagen_2, i.fecha_inscripcion 
        FROM inscripciones i
        JOIN cursos c ON i.id_curso = c.id_curso
        WHERE i.id_usuario = ?
    ";
    $stmt = $conn->prepare($queryCursos);
    $stmt->bind_param("i", $usuarioId);
    $stmt->execute();
    $resultadoCursos = $stmt->get_result();
    $cursos = [];
    while ($curso = $resultadoCursos->fetch_assoc()) {
        $cursos[] = $curso;
    }
    $stmt->close();

    // Devolver tanto los datos del usuario como los cursos
    return ['usuario' => $usuario, 'cursos' => $cursos];
}
?>
