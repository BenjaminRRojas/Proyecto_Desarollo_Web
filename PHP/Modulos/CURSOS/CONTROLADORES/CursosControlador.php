<?php
require_once 'C:\xampp\htdocs\Proyecto_Desarollo_Web\PHP\Modulos\CURSOS\MODELOS\CursosModelos.php';

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
        include './../../curso_formulario.php';
    }

    // Agregar un nuevo curso
    public function agregarCurso($titulo, $duracion,$fecha_creacion, $categoria,$id_profesor, $descripcion){
        return $this->modelo->insertar($titulo, $duracion,$fecha_creacion, $categoria,$id_profesor, $descripcion);
    }

    // Mostrar los detalles del curso
    public function verCurso($id){
        return $this->modelo->obtenerPorId($id);
    }

    // Mostrar el formulario para editar un curso
    public function actualizarCurso($id, $titulo, $duracion,$fecha_creacion, $categoria, $descripcion) {
        return $this->modelo->actualizar($id, $titulo, $duracion,$fecha_creacion, $categoria, $descripcion);
    }

    // Eliminar un curso
    public function eliminarCurso($id){
        return $this->modelo->eliminar($id);
    }
    // Inscribir alumno
    public function Inscribir($id, $id_usuario ,$fecha_inscripcion){
        return $this->modelo->inscribir($id, $id_usuario ,$fecha_inscripcion);
    }
}
?>