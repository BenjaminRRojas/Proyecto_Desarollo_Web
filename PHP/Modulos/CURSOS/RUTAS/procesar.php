<?php
require_once '../CONTROLADORES/CursosControlador.php';

$controlador = new CursosControlador();

//Determinar la accion a realizar
$accion = $_POST['accion'] ?? $_GET['accion'] ?? '';

if ($accion == 'agregar') {
    $titulo = $_POST['titulo'];
    $duracion = $_POST['duracion'];
    $fecha_creacion = $_POST['fecha_creacion'] ?? date('Y-m-d H:i:s');;
    $categoria = $_POST['categoria'];
    $id_profesor = $_POST['id_profesor'];
    $descripcion = $_POST['descripcion'];
    
    // Llamar al método para agregar curso
    $controlador->agregarCurso($titulo, $duracion, $fecha_creacion, $categoria,$id_profesor, $descripcion);

}elseif ($accion == 'editar'){
    $controlador->actualizarCurso($_POST['id'], $_POST['titulo'], $_POST['duracion'], $_POST['fecha_creacion']?? date('Y-m-d H:i:s'), $_POST['categoria'],$_POST['descripcion']);

}elseif ($accion == 'eliminar') {
    $controlador->eliminarCurso($_GET['id']);
}

// Redirigir de vuelta al formulario principal
header('Location: ../../../docente_dashboard.php');
exit();
