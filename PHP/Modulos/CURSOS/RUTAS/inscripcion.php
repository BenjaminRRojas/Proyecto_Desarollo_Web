<?php
session_start();
include 'conexion.php'; // Incluye tu archivo de conexión a la base de datos

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_curso = $_POST['id_curso'];
    $id_usuario = $_POST['id_usuario'];

    // Verificar si el alumno ya está inscrito en el curso
    $sql_check = "SELECT * FROM curso_evaluacion WHERE id_curso = ? AND id_usuario = ?";
    $stmt = $conn->prepare($sql_check);
    $stmt->bind_param("ii", $id_curso, $id_usuario);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // El alumno ya está inscrito
        echo "<script>alert('Ya estás inscrito en este curso.'); window.history.back();</script>";
    } else {
        // Insertar la inscripción en la base de datos
        $sql_insert = "INSERT INTO curso_evaluacion (id_curso, id_usuario) VALUES (?, ?)";
        $stmt = $conn->prepare($sql_insert);
        $stmt->bind_param("ii", $id_curso, $id_usuario);

        if ($stmt->execute()) {
            echo "<script>alert('Inscripción realizada con éxito.'); window.location.href = 'lista_cursos.php';</script>";
        } else {
            echo "<script>alert('Hubo un error al inscribirte.'); window.history.back();</script>";
        }
    }

    $stmt->close();
    $conn->close();
}
?>