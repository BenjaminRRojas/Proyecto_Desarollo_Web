<?php
require_once '../CONTROLADORES/CursosControlador.php';

// Verificar si se pasó el ID por GET
if (isset($_GET['id_curso'])) {
    $id = $_GET['id_curso'];
    
    $controlador = new CursosControlador();
    
    // Llamamos al método para eliminar el curso
    $controlador->eliminarCurso($id);
    
    // Redirigir a la lista después de eliminar
    header('Location: ../VISTAS/ListaCursos.php');
    exit();
} else {
    // Si no se proporciona un ID, redirigir a la lista
    header('Location: ../../../cursos.php');
    exit();
}
?>
