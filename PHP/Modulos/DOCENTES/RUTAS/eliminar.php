<?php
require_once 'C:\xampp\htdocs\Proyecto_Desarollo_Web\PHP\Modulos\DOCENTES\CONTROLADORES\DocentesControlador.php';

// Verificar si se pasó el ID por GET
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $controlador = new UsuariosControlador();
    
    // Llamamos al método para eliminar el usuario
    $controlador->eliminarUsuario($id);
    
    // Redirigir a la lista después de eliminar
    header('Location: ../VISTAS/ListaDocentes.php');
    exit();
} else {
    // Si no se proporciona un ID, redirigir a la lista
    header('Location: ../VISTAS/ListaDocentes.php');
    exit();
}
?>