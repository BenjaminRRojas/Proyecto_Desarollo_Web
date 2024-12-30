<?php
require_once 'C:\xampp\htdocs\Proyecto_Desarollo_Web\PHP\Modulos\CORE\conexion.php';

class RespuestasModelo {
    private $db;
    
    public function __construct(){
        $this->db = DataBase::getConnection();
    }

    // Obtener todas las respuestas por ID de la pregunta
    public function obtenerRespuestasPorIdPregunta($id_pregunta) {
        $query = $this->db->prepare("SELECT * FROM preguntas WHERE id_pregunta = ?");
        $query->execute([$id_pregunta]);
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    // Insertar una respuesta
    public function insertar($texto_respuesta, $es_correcta, $id_pregunta) {
        $query = $this->db->prepare("INSERT INTO preguntas (texto_respuesta, es_correcta, id_pregunta) VALUES (?, ?, ?)");
        return $query->execute([$texto_respuesta, $es_correcta, $id_evaluacion]);
    }

}
?>  