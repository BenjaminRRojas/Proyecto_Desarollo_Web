<?php
session_start();
require_once 'C:\xampp\htdocs\Proyecto_Desarollo_Web\PHP\Modulos\EVALUACIONES\CONTROLADORES\EvaluacionesControlador.php';

// Verificar si el usuario está logueado
if (!isset($_SESSION['nombres']) || $_SESSION['tipo_usuario'] != 'ESTUDIANTE') {
    header("Location: ../formulario.php"); 
    exit();
}

$usuario_id = $_SESSION['id_usuario']; 
$id_evaluacion = $_GET['id_evaluacion']; // Obtenemos el id de la evaluación
$respuestas = $_POST;  // Recoger todas las respuestas del formulario

// Crear instancia del controlador
$controlador = new EvaluacionesControlador();


// Redirigir de vuelta al dashboard de estudiantes
header('Location:../../../estudiante_dashboard.php');
exit();
?>
