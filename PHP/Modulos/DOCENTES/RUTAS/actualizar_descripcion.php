<?php
session_start();
require_once 'C:\xampp\htdocs\Proyecto_Desarollo_Web\PHP\Modulos\DOCENTES\CONTROLADORES\DocentesControlador.php';

$controlador = new UsuariosControlador();
// Verifica si el usuario está logueado
if (!isset($_SESSION['id_usuario'])) {
    die("Acceso no autorizado.");
}

// Obtener los datos del formulario
$usuario_id = $_SESSION['id_usuario'];  
$descripcion = $_POST['descripcion'];  

if (!empty($descripcion)) {

    $controlador->actualizarUsuarioDescripcion($usuario_id,$descripcion);

    if ($controlador) {
        echo "Descripción actualizada correctamente.";
        header("Location: ../../../docente_dashboard.php");
        exit();
    } else {
        echo "Error al actualizar la descripción.";
    }
} else {
    echo "La descripción no puede estar vacía.";
}
?>