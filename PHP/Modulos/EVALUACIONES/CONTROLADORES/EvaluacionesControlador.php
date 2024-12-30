<?php
require_once 'C:\xampp\htdocs\Proyecto_Desarollo_Web\PHP\Modulos\EVALUACIONES\MODELOS\EvaluacionesModelo.php';

class EvaluacionesControlador{
    private $modelo;

    public function __construct() {
        $this->modelo = new EvaluacionesModelo();
    }

    // Mostrar la lista de evaluaciones
    public function listarEvaluaciones() {
        return $this->modelo->obtenerTodos();
    }

    // Mostrar formulario para agregar evaluaciones
    public function formularioAgregar() {
        include 'C:\xampp\htdocs\Proyecto_Desarollo_Web\PHP\formulario-evaluaciones.php';
    }

    // Agregar una nueva evaluación, junto con sus preguntas y respuestas
    public function agregarEvaluacion($titulo, $descripcion, $fecha_limite, $id_curso, $preguntas) {
        $id_evaluacion = $this->modelo->insertar($titulo, $descripcion, $fecha_limite, $id_curso);
        
        if ($id_evaluacion) {
            // Insertar las preguntas y respuestas asociadas a la evaluación
            foreach ($preguntas as $pregunta) {
                // Insertar la pregunta
                $id_pregunta = $this->modelo->insertarPregunta($pregunta['enunciado'], $id_evaluacion);
                
                // Insertar las respuestas de la pregunta
                foreach ($pregunta['respuestas'] as $respuesta) {
                    $this->modelo->insertarRespuesta($respuesta['texto_respuesta'], $respuesta['es_correcta'], $id_pregunta);
                }
            }
            return true; 
        }
        return false;
    }

    // Obtener preguntas y respuestas de una evaluación
    public function obtenerPreguntasYRespuestas($id_evaluacion) {
        $preguntas = $this->modelo->obtenerPreguntas($id_evaluacion);
        $preguntas_respuestas = [];
        
        foreach ($preguntas as $pregunta) {
            $respuestas = $this->modelo->obtenerRespuestas($pregunta['id_pregunta']);
            $pregunta['respuestas'] = $respuestas; // Asociar las respuestas con la pregunta
            $preguntas_respuestas[] = $pregunta;
        }
        
        return $preguntas_respuestas;
    }

    // Mostrar los detalles de la evaluación
    public function verEvaluacion($id_evaluacion) {
        return $this->modelo->obtenerPorIdEvaluacion($id_evaluacion);
    }

    // Mostrar el formulario para editar una evaluación
    public function formularioEditar($id_evaluacion) {
        $evaluacion = $this->modelo->obtenerPorIdEvaluacion($id_evaluacion);
        include '../../../ListaEvaluaciones.php';
    }

    // Actualizar una evaluación
    public function actualizarEvaluacion($id_evaluacion, $titulo, $descripcion, $fecha_limite, $id_curso) {
        return $this->modelo->actualizar($id_evaluacion, $titulo, $descripcion, $fecha_limite, $id_curso);
    }

    // Eliminar una evaluación 
    public function eliminarEvaluacion($id_evaluacion) {
        return $this->modelo->eliminar($id_evaluacion);
    }

    // Método para procesar la evaluación
    public function procesarEvaluacion($id_estudiante, $id_evaluacion, $respuestas) {
        return $this->modelo->procesarEvaluacion($id_estudiante, $id_evaluacion, $respuestas);
    }

}
?>