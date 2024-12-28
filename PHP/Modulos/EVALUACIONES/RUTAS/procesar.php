<?php
require_once '../CONTROLADORES/EvaluacionesControlador.php';

$controlador = new EvaluacionesControlador();

// Determinar la acción a realizar
$accion = $_POST['accion'] ?? $_GET['accion'] ?? '';

if ($accion == 'agregar') {
    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];
    $fecha_limite = $_POST['fecha_limite'];
    $id_curso = $_POST['id_curso'];


    // Agregar la evaluación
    if ($controlador->agregarEvaluacion($titulo, $descripcion, $fecha_limite, $id_curso)) {
        echo "Evaluación creada.";
    } else {
        echo "Error al crear la evaluación.";
    }

} elseif ($accion == 'editar') {
    $controlador->actualizarEvaluacion($_POST['id_evaluacion'], $_POST['titulo'], $_POST['descripcion'], $_POST['fecha_limite'], $_POST['id_curso']);

} elseif ($accion == 'eliminar') {
    $controlador->eliminarEvaluacion($_GET['id_evaluacion']);
}

// Redirigir de vuelta al formulario principal
header('Location:../VISTAS/ListaEvaluaciones.php');
exit();