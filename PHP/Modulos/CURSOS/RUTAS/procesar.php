<?php
require_once '../CONTROLADORES/CursosControlador.php';

$controlador = new CursosControlador();

//Determinar la accion a realizar
$accion = $_POST['accion'] ?? $_GET['accion'] ?? '';

if ($accion == 'agregar'){
    $titulo = $_POST['titulo'];
    $duracion = $_POST['duracion'];
    $fecha_creacion = $_POST['fecha_creacion'];
    $categoria = $_POST['categoria'];

}elseif ($accion == 'editar'){
    $controlador->actualizarCurso($_POST['id'], $_POST['titulo'], $_POST['duracion'], $_POST['fecha_creacion'], $_POST['categoria']);

}elseif ($accion == 'eliminar'){
    $controlador->eliminarCurso($_GET['id']);
}

// Redirigir de vuelta al formulario principal
header('Location: ../../../cursos.php');
exit();
