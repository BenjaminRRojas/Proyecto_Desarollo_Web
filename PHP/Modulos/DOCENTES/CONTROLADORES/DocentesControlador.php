<?php
require_once '../MODELOS/DocentesModelo.php';

class UsuariosControlador {
    private $modelo;

    public function __construct() {
        $this->modelo = new UsuariosModelo();
    }

    // Mostrar la lista de usuarios
    public function listarUsuarios() {
        return $this->modelo->obtenerTodos();
    }

    // Mostrar el formulario para agregar un nuevo usuario
    public function formularioAgregar() {
        include '../VISTAS/ListaDocentes.php';
    }

    // Agregar un nuevo usuario
    public function agregarUsuario($nombres, $apellidos, $correo, $contrasena, $sexo, $tipo_usuario) {
        return $this->modelo->insertar($nombres, $apellidos, $correo, $contrasena, $sexo, $tipo_usuario);
    }

    // Mostrar los detalles del usuario
    public function verUsuario($id) {
        return $this->modelo->obtenerPorId($id);
    }

    // Mostrar el formulario para editar un usuario
    public function formularioEditar($id) {
        $usuario = $this->modelo->obtenerPorId($id);
        include '../VISTAS/ListaDocentes.php';
    }

    // Actualizar un usuario
    public function actualizarUsuario($id, $nombres, $apellidos, $correo, $contrasena, $sexo, $tipo_usuario) {
        return $this->modelo->actualizar($id, $nombres, $apellidos, $correo, $contrasena, $sexo, $tipo_usuario);
    }

    // Eliminar un usuario
    public function eliminarUsuario($id) {
        return $this->modelo->eliminar($id);
    }
}
?>
