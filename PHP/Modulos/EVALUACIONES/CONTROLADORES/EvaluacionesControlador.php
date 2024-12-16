<?php
require_once '../MODELOS/EvaluacionesModelo.php';

class EvaluacionesControlador{
    private $modelo;

    public function __construct() {
        $this->modelo = new EvaluacionesModelo();
    }

    // Mostrar la lista de evaluaciones
    public function listarEvaluaciones() {
        return $this->modelo->obtenerTodos();
    }

    // Mostrar formulario para agregar evaluaciones
    public function formularioAgregar() {
        include '../VISTAS/formulario.php';
    }

    // Agregar una nueva evaluación
    public function agregarEvaluacion($nota1, $nota2, $nota3, $tarea, $promedio, $id_usuario, $id_curso) {
        return $this->modelo->insertar($nota1, $nota2, $nota3, $tarea, $promedio, $id_usuario, $id_curso);
    }

    // Mostrar los detalles de la evaluación
    public function verEvaluacion($id_evaluacion) {
        return $this->modelo->obtenerPorId($id_evaluacion);
    }

    // Mostrar el formulario para editar una evaluación
    public function formularioEditar($id_evaluacion) {
        $usuario = $this->modelo->obtenerPorIdEvaluacion($id_evaluacion);
        include '../VISTAS/formulario.php';
    }

    // Actualizar una evaluación
    public function actualizarEvaluacion($id_evaluacion, $nota1, $nota2, $nota3, $tarea, $promedio, $id_usuario, $id_curso) {
        return $this->modelo->actualizar($id_evaluacion, $nota1, $nota2, $nota3, $tarea, $promedio, $id_usuario, $id_curso);
    }

    // Eliminar un usuario
    public function eliminarEvaluacion($id_evaluacion) {
        return $this->modelo->eliminar($id_evaluacion);
    }

}
?>