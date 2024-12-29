<?php
require_once '../CONTROLADORES/EvaluacionesControlador.php';

// Verificar si se pasó el ID por GET
if (isset($_GET['id_evaluacion'])) {
    $id_evaluacion = $_GET['id_evaluacion'];
    
    $controlador = new EvaluacionesControlador();
    
    // Llamamos al método para eliminar la evaluación
    $controlador->eliminarEvaluacion($id_evaluacion);
    
    // Redirigir a la lista después de eliminar
    header('Location: ../VISTAS/ListaEvaluaciones.php');
    exit();
} else {
    // Si no se proporciona un ID, redirigir a la lista
    header('Location: ../VISTAS/ListaEvaluaciones.php');
    exit();
}
?>