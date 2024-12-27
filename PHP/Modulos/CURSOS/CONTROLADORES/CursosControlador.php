<?php
require_once '../MODELOS/CursosModelos.php';

class CursosControlador {
    private $modelo;

    public function __construct() {
        $this->modelo = new CursosModelo();
    }

    // Mostrar la lista de usuarios
    public function listarCursos(){
        return $this->modelo->obtenerTodos();
    }

    // Mostrar el formulario para agregar un nuevo curso
    public function formularioAgregar(){
        include '../VISTAS/formulario.php';
    }

    // Agregar un nuevo curso
    public function agregarCurso($titulo, $duracion,$fecha_creacion, $categoria){
        return $this->modelo->insertar($titulo, $duracion,$fecha_creacion, $categoria);
    }

    // Mostrar los detalles del curso
    public function verCurso($id){
        return $this->modelo->obtenerPorId($id);
    }

    // Mostrar el formulario para editar un curso
    public function actualizarCurso($id, $titulo, $duracion,$fecha_creacion, $categoria) {
        return $this->modelo->actualizar($id, $titulo, $duracion,$fecha_creacion, $categoria);
    }

    // Eliminar un curso
    public function eliminarCurso($id){
        return $this->modelo->eliminar($id);
    }
}
?>