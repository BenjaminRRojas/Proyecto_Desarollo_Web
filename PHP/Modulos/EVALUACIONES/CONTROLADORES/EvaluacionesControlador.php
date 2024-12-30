<?php
require_once 'C:\xampp\htdocs\Proyecto_Desarollo_Web\PHP\Modulos\EVALUACIONES\MODELOS\EvaluacionesModelo.php';

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
        include 'C:\xampp\htdocs\Proyecto_Desarollo_Web\PHP\formulario-evaluaciones.php';
    }

    // Agregar una nueva evaluación
    public function agregarEvaluacion($titulo, $descripcion, $fecha_limite, $id_curso) {
        return $this->modelo->insertar($titulo, $descripcion, $fecha_limite, $id_curso);
    }

    // Mostrar los detalles de la evaluación
    public function verEvaluacion($id_evaluacion) {
        return $this->modelo->obtenerPorIdEvaluacion($id_evaluacion);
    }

    // Mostrar el formulario para editar una evaluación
    public function formularioEditar($id_evaluacion) {
        $evaluacion = $this->modelo->obtenerPorIdEvaluacion($id_evaluacion);
        include '../../../ListaEvaluaciones.php';
    }

    // Actualizar una evaluación
    public function actualizarEvaluacion($id_evaluacion, $titulo, $descripcion, $fecha_limite, $id_curso) {
        return $this->modelo->actualizar($id_evaluacion, $titulo, $descripcion, $fecha_limite, $id_curso);
    }

    // Eliminar una evaluación 
    public function eliminarEvaluacion($id_evaluacion) {
        return $this->modelo->eliminar($id_evaluacion);
    }

}
?>