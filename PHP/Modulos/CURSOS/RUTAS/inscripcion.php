<?php
require_once '../CONTROLADORES/CursosControlador.php';

$controlador = new CursosControlador();

//Determinar la accion a realizar
$accion = $_POST['accion'] ?? $_GET['accion'] ?? '';

$id_curso = $_POST['id_curso'] ?? null;
$id_usuario = $_POST['id_usuario'] ?? null;
$fecha_inscripcion = $_POST['fecha_inscripcion'] ?? null;

if ($id_curso && $id_usuario && $fecha_inscripcion) {
    // Llama a tu función para insertar los datos en la base de datos
    $controlador->Inscribir($id_curso, $id_usuario, $fecha_inscripcion);
} else {
    // Mostrar un error o redirigir si faltan parámetros
    echo "Faltan datos para la inscripción.";
}

