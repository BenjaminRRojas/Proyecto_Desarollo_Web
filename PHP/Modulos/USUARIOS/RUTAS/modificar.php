<?php
require_once '../CONTROLADORES/UsuariosControlador.php';

// Verificar si se pasó el ID por GET
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $controlador = new UsuariosControlador();
    
    // Obtener el usuario por ID para cargar sus datos en el formulario
    $usuario = $controlador->verUsuario($id);
    
    // Si el usuario no existe, redirigir a la lista
    if (!$usuario) {
        header('Location: lista.php');
        exit();
    }
} else {
    // Si no se proporciona un ID, redirigir a la lista
    header('Location: lista.php');
    exit();
}
?>

<form method="POST" action="../RUTAS/procesar.php">
    <input type="hidden" name="accion" value="editar">
    <input type="hidden" name="id" value="<?= $usuario['id_usuario'] ?>">

    <label for="nombres">Nombres:</label>
    <input type="text" name="nombres" value="<?= $usuario['nombres'] ?>" required>
    
    <label for="apellidos">Apellidos:</label>
    <input type="text" name="apellidos" value="<?= $usuario['apellidos'] ?>" required>
    
    <label for="correo">Correo:</label>
    <input type="email" name="correo" value="<?= $usuario['correo'] ?>" required>
    
    <label for="contrasena">Contraseña:</label>
    <input type="password" name="contrasena">
    
    <label for="sexo">Sexo:</label>
    <select name="sexo">
        <option value="Hombre" <?= $usuario['sexo'] == 'Hombre' ? 'selected' : '' ?>>Hombre</option>
        <option value="Mujer" <?= $usuario['sexo'] == 'Mujer' ? 'selected' : '' ?>>Mujer</option>
        <option value="Otro" <?= $usuario['sexo'] == 'Otro' ? 'selected' : '' ?>>Otro</option>
    </select>
    
    <label for="tipo_usuario">Tipo de Usuario:</label>
    <select name="tipo_usuario">
        <option value="alumno" <?= $usuario['tipo_usuario'] == 'alumno' ? 'selected' : '' ?>>Alumno</option>
        <option value="docente" <?= $usuario['tipo_usuario'] == 'docente' ? 'selected' : '' ?>>Docente</option>
        <option value="admin" <?= $usuario['tipo_usuario'] == 'admin' ? 'selected' : '' ?>>Administrador</option>
    </select>

    <button type="submit">Actualizar Usuario</button>
</form>