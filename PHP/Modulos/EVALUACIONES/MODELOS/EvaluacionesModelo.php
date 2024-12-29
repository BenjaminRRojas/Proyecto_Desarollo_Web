<?php
require_once 'C:\xampp\htdocs\Proyecto_Desarollo_Web\PHP\Modulos\CORE\conexion.php';

class EvaluacionesModelo {
    private $db;
    
    public function __construct(){
        $this->db = DataBase::getConnection();
    }

    // Obtener todas las evaluaciones
    public function obtenerTodos() { 
        $query = $this->db->query("SELECT evaluaciones.id_evaluacion, 
               evaluaciones.titulo, 
               evaluaciones.descripcion, 
               evaluaciones.fecha_creacion, 
               evaluaciones.fecha_limite, 
               cursos.titulo AS curso_titulo
        FROM evaluaciones
        JOIN cursos ON evaluaciones.id_curso = cursos.id_curso");
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    // Obtener una evaluación por ID de la evaluación
    public function obtenerPorIdEvaluacion($id_evaluacion) {
        $query = $this->db->prepare("SELECT * FROM evaluaciones WHERE id_evaluacion = ?");
        $query->execute([$id_evaluacion]);
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    // Obtener todas las evaluaciones por ID del curso
    public function obtenerPorIdCurso($id_curso) {
        $query = $this->db->prepare("SELECT * FROM evaluaciones WHERE id_curso = ?");
        $query->execute([$id_curso]);
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    // Insertar una nueva evaluación
    public function insertar($titulo, $descripcion, $fecha_limite, $id_curso) {
        $query = $this->db->prepare("INSERT INTO evaluaciones (titulo, descripcion, fecha_limite, id_curso) VALUES (?, ?, ?, ?)");
        return $query->execute([$titulo, $descripcion, $fecha_limite, $id_curso]);
    }

    // Actualizar una evaluación
    public function actualizar($id_evaluacion, $titulo, $descripcion, $fecha_limite, $id_curso) {
        $query = $this->db->prepare("UPDATE evaluaciones SET titulo = ?, descripcion = ?, fecha_limite = ?, id_curso = ? WHERE id_evaluacion = ?");
        return $query->execute([$titulo, $descripcion, $fecha_limite, $id_curso, $id_evaluacion]);
    }

    // Eliminar una evaluación
    public function eliminar($id_evaluacion) {
        $query = $this->db->prepare("DELETE FROM evaluaciones WHERE id_evaluacion = ?");
        return $query->execute([$id_evaluacion]);
    }
}
?>  