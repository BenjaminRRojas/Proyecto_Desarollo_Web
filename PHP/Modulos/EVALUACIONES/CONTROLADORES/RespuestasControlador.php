<?php
require_once 'C:\xampp\htdocs\Proyecto_Desarollo_Web\PHP\Modulos\EVALUACIONES\MODELOS\PreguntasModelo.php';

class RespuestasControlador{
    private $modelo;

    public function __construct() {
        $this->modelo = new RespuestasModelo();
    }

    // Mostrar la lista de respuestas
    public function listarRespuestas() {
        return $this->modelo->obtenerTodos();
    }

    // Agregar una respuesta
    public function agregarRespuesta($texto_respuesta, $es_correcto, $id_pregunta) {
        return $this->modelo->insertar($texto_respuesta, $es_correcto, $id_pregunta);
    }

    // Mostrar las respuestas por ID de la pregunta
    public function verRespuestas($id_pregunta) {
        return $this->modelo->obtenerRespuestasPorIdPregunta($id_pregunta);
    }

}
?>