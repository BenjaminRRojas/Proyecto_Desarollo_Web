<?php
require_once '../CONTROLADORES/CursosControlador.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $controlador = new CursosControlador();
    
    // Obtener el curso por ID para cargar sus datos en el formulario
    $curso = $controlador->verCurso($id);
    
    // Si el curso no existe, redirigir a la lista
    if (!$curso) {
        header('Location: ../VISTAS/ListaCursos.php');
        exit();
    }
} else {
    // Si no se proporciona un ID, redirigir a la lista
    header('Location: ../VISTAS/ListaCursos.php');
    exit();
}