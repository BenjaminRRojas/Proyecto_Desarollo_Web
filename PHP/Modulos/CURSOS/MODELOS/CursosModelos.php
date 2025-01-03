<?php
require_once 'C:\xampp\htdocs\Proyecto_Desarollo_Web\PHP\Modulos\CORE\conexion.php';

class CursosModelo {
    private $db;

    public function __construct() {
        $this->db = Database::getConnection();
    }

    // Obtener todos los usuarios
    public function obtenerTodos(){
        $query = $this->db->query("SELECT id_curso, titulo, duracion, fecha_creacion, categoria , descripcion FROM cursos");
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    // Obtener un curso por ID
    public function obtenerPorId($id) {
        $query = $this->db->prepare("SELECT * FROM cursos WHERE id_curso = ?");
        $query->execute([$id]);
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    // Insertar un nuevo curso
    public function insertar($titulo, $duracion,$fecha_creacion, $categoria , $id_profesor , $descripcion){
        $query = $this->db->prepare("INSERT INTO cursos (titulo,duracion,fecha_creacion,categoria,id_usuario,descripcion) VALUES (?,?,?,?,?,?)");
        return $query->execute([$titulo, $duracion,$fecha_creacion, $categoria , $id_profesor , $descripcion]);
    }

    // Actualizar un curso
    public function actualizar($id, $titulo, $duracion, $fecha_creacion, $categoria , $descripcion) {
    $query = $this->db->prepare("UPDATE cursos SET titulo = ?, duracion = ?, fecha_creacion = ?, categoria = ? , descripcion = ? WHERE id_curso = ?");
    return $query->execute([$titulo, $duracion, $fecha_creacion, $categoria , $descripcion, $id]);
    }

    // Eliminar un curso
    public function eliminar($id){
        $query = $this->db->prepare("DELETE FROM cursos WHERE id_curso = ?");
        return $query->execute([$id]);
    }

    // Inscripcion alumno a curso
    public function inscribir($id, $id_usuario, $fecha_inscripcion){	
        $query = $this->db->prepare("INSERT INTO curso_estudiante (id_curso, id_estudiante, fecha_inscripcion) VALUES (?, ?, ?)");
        return $query->execute([$id, $id_usuario, $fecha_inscripcion]);
    }
}
?>