<?php
require_once 'C:\xampp\htdocs\Proyecto_Desarollo_Web\PHP\Modulos\EVALUACIONES\MODELOS\PreguntasModelo.php';

class PreguntasControlador{
    private $modelo;

    public function __construct() {
        $this->modelo = new PreguntasModelo();
    }

    // Mostrar la lista de preguntas
    public function listarPreguntas() {
        return $this->modelo->obtenerTodos();
    }

    // Agregar una pregunta
    public function agregarPregunta($enunciado, $id_evaluacion) {
        return $this->modelo->insertar($enunciado, $id_evaluacion);
    }

    // Mostrar las preguntas por ID de la evaluación
    public function verPreguntas($id_evaluacion) {
        return $this->modelo->obtenerPreguntasPorIdEvaluación($id_evaluacion);
    }

}
?>