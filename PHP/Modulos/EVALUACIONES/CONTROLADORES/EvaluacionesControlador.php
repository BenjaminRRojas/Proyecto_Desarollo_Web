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


}
?>