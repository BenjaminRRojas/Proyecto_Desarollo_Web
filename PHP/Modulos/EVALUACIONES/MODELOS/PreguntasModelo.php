<?php
require_once 'C:\xampp\htdocs\Proyecto_Desarollo_Web\PHP\Modulos\CORE\conexion.php';

class PreguntasModelo {
    private $db;
    
    public function __construct(){
        $this->db = DataBase::getConnection();
    }

    // Obtener todas las preguntas por ID de la evaluación
    public function obtenerPreguntasPorIdEvaluación($id_evaluacion) {
        $query = $this->db->prepare("SELECT * FROM preguntas WHERE id_evaluacion = ?");
        $query->execute([$id_evaluacion]);
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    // Insertar una pregunta
    public function insertar($enunciado, $id_evaluacion) {
        $query = $this->db->prepare("INSERT INTO preguntas (enunciado, id_evaluacion) VALUES (?, ?)");
        return $query->execute([$enunciado, $id_evaluacion]);
    }

}
?>  