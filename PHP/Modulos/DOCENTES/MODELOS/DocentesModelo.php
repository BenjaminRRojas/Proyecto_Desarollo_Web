<?php
require_once '../../CORE/conexion.php';

class docentessModelo {
    private $db;

    public function __construct() {
        $this->db = Database::getConnection();
    }

    // Obtener todos los docentes
    public function obtenerTodos() {
        $query = $this->db->query("SELECT id_docente, nombres, apellidos, profesion, experiencia, correo, sexo, tipo_usuario, fecha_registro FROM docentes");
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    // Obtener un docente por ID
    public function obtenerPorId($id) {
        $query = $this->db->prepare("SELECT * FROM docentes WHERE id_docente = ?");
        $query->execute([$id]);
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    // Insertar un nuevo docentes
    public function insertar($nombres, $apellidos, $profesion, $experiencia, $correo, $contrasena, $sexo, $tipo_docentes) {
        $query = $this->db->prepare("INSERT INTO docentes (nombres, apellidos, profesion, experiencia, correo, contrasena, sexo, tipo_usuario) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        return $query->execute([$nombres, $apellidos, $profesion, $experiencia, $correo, password_hash($contrasena, PASSWORD_DEFAULT), $sexo, $tipo_docentes]);
    }

    // Actualizar un docentes
    public function actualizar($id, $nombres, $apellidos, $profesion, $experiencia, $correo, $contrasena, $sexo, $tipo_docentes) {
        $query = $this->db->prepare("UPDATE docentess SET nombres = ?, apellidos = ?, profesion = ?, experiencia = ?, correo = ?, contrasena = ?, sexo = ?, tipo_docente = ? WHERE id_docente = ?");
        return $query->execute([$nombres, $apellidos, $profesion, $experiencia, $correo, password_hash($contrasena, PASSWORD_DEFAULT), $sexo, $tipo_docente, $id]);
    }

    // Eliminar un docentes
    public function eliminar($id) {
        $query = $this->db->prepare("DELETE FROM docentes WHERE id_docente = ?");
        return $query->execute([$id]);
    }
}
?>
