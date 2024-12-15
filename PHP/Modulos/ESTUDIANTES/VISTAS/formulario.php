<?php
$accion = $_GET['accion'] ?? 'agregar';
$usuario = isset($usuario) ? $usuario : null;
?>

<h1><?= ($accion == 'agregar') ? 'Agregar' : 'Editar' ?> Usuario</h1>
<form method="POST" action="../RUTAS/procesar.php">
    <input type="hidden" name="accion" value="<?= $accion ?>">
    <?php if ($accion == 'editar'): ?>
        <input type="hidden" name="id" value="<?= $usuario['id_usuario'] ?>">
    <?php endif; ?>
    <label for="nombres">Nombres:</label>
    <input type="text" name="nombres" value="<?= $usuario['nombres'] ?? '' ?>" required>

    <label for="apellidos">Apellidos:</label>
    <input type="text" name="apellidos" value="<?= $usuario['apellidos'] ?? '' ?>" required>

    <label for="correo">Correo:</label>
    <input type="email" name="correo" value="<?= $usuario['correo'] ?? '' ?>" required>

    <label for="contrasena">Contraseña:</label>
    <input type="password" name="contrasena" value="<?= $usuario['contrasena'] ?? '' ?>" required>

    <label for="sexo">Sexo:</label>
    <select name="sexo" required>
        <option value="Hombre" <?= isset($usuario) && $usuario['sexo'] == 'Hombre' ? 'selected' : '' ?>>Hombre</option>
        <option value="Mujer" <?= isset($usuario) && $usuario['sexo'] == 'Mujer' ? 'selected' : '' ?>>Mujer</option>
        <option value="Otro" <?= isset($usuario) && $usuario['sexo'] == 'Otro' ? 'selected' : '' ?>>Otro</option>
    </select>

    <label for="tipo_usuario">Tipo de Usuario:</label>
    <select name="tipo_usuario" required>
        <option value="alumno" <?= isset($usuario) && $usuario['tipo_usuario'] == 'alumno' ? 'selected' : '' ?>>Alumno</option>
        <option value="docente" <?= isset($usuario) && $usuario['tipo_usuario'] == 'docente' ? 'selected' : '' ?>>Docente</option>
        <option value="admin" <?= isset($usuario) && $usuario['tipo_usuario'] == 'admin' ? 'selected' : '' ?>>Admin</option>
    </select>

    <button type="submit"><?= ($accion == 'agregar') ? 'Agregar' : 'Actualizar' ?> Usuario</button>
</form>