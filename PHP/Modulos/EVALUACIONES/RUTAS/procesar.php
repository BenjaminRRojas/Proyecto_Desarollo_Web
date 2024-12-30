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

    // Captura de las preguntas
    $preguntas = [];
    for ($i = 1; $i <= 4; $i++) {
        // Almacenar el enunciado
        $enunciado = $_POST["preguntas"][$i]["enunciado"] ?? '';
        
        // Almacenar las respuestas y marcar la correcta
        $respuestas = [];
        for ($j = 1; $j <= 3; $j++) {
            $opcion = $_POST["preguntas"][$i]["opcion{$j}"] ?? '';
            $es_correcta = ($_POST["preguntas"][$i]["es_correcta"] ?? '') == "opcion{$j}" ? true : false;
            $respuestas[] = ['texto_respuesta' => $opcion, 'es_correcta' => $es_correcta];
        }

        // Agregar la pregunta y respuestas al array de preguntas
        $preguntas[] = [
            'enunciado' => $enunciado,
            'respuestas' => $respuestas
        ];
    }

    // Llamada al método del controlador para agregar la evaluación
    if ($controlador->agregarEvaluacion($titulo, $descripcion, $fecha_limite, $id_curso, $preguntas)) {
        echo "Evaluación creada con éxito.";
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
?>
