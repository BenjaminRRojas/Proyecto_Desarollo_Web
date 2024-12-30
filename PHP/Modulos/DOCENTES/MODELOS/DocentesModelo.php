<?php
require_once 'C:\xampp\htdocs\Proyecto_Desarollo_Web\PHP\Modulos\CORE\conexion.php';

class UsuariosModelo {
    private $db;

    public function __construct() {
        $this->db = Database::getConnection();
    }

    // Obtener todos los usuarios
    public function obtenerTodos() {
        $query = $this->db->query("SELECT id_usuario, nombres, apellidos, correo, sexo, tipo_usuario, fecha_registro FROM usuarios");
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    // Obtener un usuario por ID
    public function obtenerPorId($id) {
        $query = $this->db->prepare("SELECT * FROM usuarios WHERE id_usuario = ?");
        $query->execute([$id]);
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    // Insertar un nuevo usuario
    public function insertar($nombres, $apellidos, $correo, $contrasena, $sexo, $tipo_usuario) {
        $query = $this->db->prepare("INSERT INTO usuarios (nombres, apellidos, correo, contrasena, sexo, tipo_usuario) VALUES (?, ?, ?, ?, ?, ?)");
        return $query->execute([$nombres, $apellidos, $correo, password_hash($contrasena, PASSWORD_DEFAULT), $sexo, $tipo_usuario]);
    }

    // Actualizar un usuario
    public function actualizar($id, $nombres, $apellidos, $correo, $contrasena, $sexo, $tipo_usuario) {
        $query = $this->db->prepare("UPDATE usuarios SET nombres = ?, apellidos = ?, correo = ?, contrasena = ?, sexo = ?, tipo_usuario = ? WHERE id_usuario = ?");
        return $query->execute([$nombres, $apellidos, $correo, password_hash($contrasena, PASSWORD_DEFAULT), $sexo, $tipo_usuario, $id]);
    }


    // Actualizar un usuario
    public function actualizar_descripcion($id,$descripcion) {
        $query = $this->db->prepare("UPDATE usuarios SET descripcion = ? WHERE id_usuario = ?");
        return $query->execute([$descripcion, $id]);
    }


    // Eliminar un usuario
    public function eliminar($id) {
        $query = $this->db->prepare("DELETE FROM usuarios WHERE id_usuario = ?");
        return $query->execute([$id]);
    }


    public function obtenerInformacion() {
        $query = $this->db->prepare("SELECT nombres, descripcion FROM usuarios");
        $query->execute(); 
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
