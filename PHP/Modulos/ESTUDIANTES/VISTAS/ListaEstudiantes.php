<?php
require_once '../CONTROLADORES/UsuariosControlador.php';

$controlador = new UsuariosControlador();
$usuarios = $controlador->listarUsuarios();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_estudiantes.css">
    <title>LISTA ESTUDIANTES</title>
</head>
<body>
    


<h1>Lista de Usuarios</h1>
<table>
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Correo</th>
        <th>Sexo</th>
        <th>Tipo Usuario</th>
        <th>Fecha Registro</th>
        <th>Acciones</th>
    </tr>
    <?php foreach ($usuarios as $usuario): ?>
        <?php if($usuario['tipo_usuario'] == "ESTUDIANTE") :?>
            <tr>
                <td><?= $usuario['id_usuario'] ?></td>
                <td><?= $usuario['nombres'] ?> <?= $usuario['apellidos'] ?></td>
                <td><?= $usuario['correo'] ?></td>
                <td><?= $usuario['sexo'] ?></td>
                <td><?= $usuario['tipo_usuario'] ?></td>
                <td><?= $usuario['fecha_registro'] ?></td>
                <td>
                    <a href="../RUTAS/modificar.php?id=<?= $usuario['id_usuario'] ?>">Editar</a>
                    <a href="../RUTAS/eliminar.php?id=<?= $usuario['id_usuario'] ?>">Eliminar</a>
                </td>
            </tr>
        <?php endif; ?>
    <?php endforeach; ?>
</table>
<a href="formulario.php?accion=agregar">Agregar Usuario</a>


</body>
</html>