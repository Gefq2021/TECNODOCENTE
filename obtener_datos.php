<?php
include 'conexion_db.php';

function obtener_datos($conn) {
    // Obtenemos datos de la tabla "cursos"
    $sql = "SELECT id_curso, categoria_curso, titulo_curso, descripcion_1, descripcion_2, duracion, precio, imagen_1, imagen_2, video FROM cursos";
    $result = $conn->query($sql);

    // Verificar si la consulta fue exitosa
    if (!$result) {
        die("Error en la consulta: " . $conn->error);
    }

    // Guardamos los datos en un arreglo
    $data = array();
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }

    // Cerramos la conexión
    $conn->close();

    // Devolver los datos
    return $data;
}

// Llamada a la función pasando $conn como argumento
// $data = obtener_datos($conn);

?>


