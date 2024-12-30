<?php
require_once 'C:\xampp\htdocs\Proyecto_Desarollo_Web\PHP\Modulos\EVALUACIONES\CONTROLADORES\EvaluacionesControlador.php';

$controlador = new EvaluacionesControlador();

// Obtener los datos del formulario necesarios para la tabla resultados
$id_usuario = $_POST['id_usuario'];
$id_evaluacion = $_POST['id_evaluacion'];

// Recolectar las respuestas seleccionadas
$respuestas_seleccionadas = [];
foreach ($_POST as $clave => $valor) {
    if (strpos($clave, 'respuesta_') === 0) {
        $respuestas_seleccionadas[] = $valor;
    }
}

// Procesar la evaluación y obtener el puntaje
$puntaje = $controlador->procesarEvaluacion($id_usuario, $id_evaluacion, $respuestas_seleccionadas);

// Calcular la nota basada en el puntaje
$nota = 1 + ($puntaje * 1.5);

// Insertar la nota en la tabla resultados
$controlador->insertarResultado($id_usuario, $id_evaluacion, $nota);

// Redirigir después de procesar todo
header('Location:../../../estudiante_dashboard.php');
exit();
?>

