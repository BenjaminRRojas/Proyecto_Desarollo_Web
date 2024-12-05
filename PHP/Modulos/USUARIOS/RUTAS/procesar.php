<?php
require_once '../CONTROLADORES/UsuariosControlador.php';

$controlador = new UsuariosControlador();

$accion = $_POST['accion'] ?? $_GET['accion'] ?? '';

if ($accion == 'agregar') {
    $controlador->agregarUsuario($_POST['nombres'], $_POST['apellidos'], $_POST['correo'], $_POST['contrasena'], $_POST['sexo'], $_POST['tipo_usuario']);
} elseif ($accion == 'editar') {
    $controlador->actualizarUsuario($_POST['id'], $_POST['nombres'], $_POST['apellidos'], $_POST['correo'], $_POST['contrasena'], $_POST['sexo'], $_POST['tipo_usuario']);
} elseif ($accion == 'eliminar') {
    $controlador->eliminarUsuario($_GET['id']);
}

header('Location: ../VISTAS/ListaUsuarios.php');
exit();