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
    <title>Lista de Usuarios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../../../CSS/style_estudiantes.css">
</head>

<body>
    <!-- Video de fondo -->
    <video autoplay muted loop>
        <source src="../../../../imagenes/fondo.mp4" type="video/mp4">
    </video>

    <!-- Contenedor principal -->
    <div class="container mt-5">
        <h1 class="text-center">Lista de Estudiantes</h1>
        
        <!-- Buscador -->
        <div class="row my-4">
            <div class="col-md-6 offset-md-3">
                <input type="text" id="searchInput" class="form-control" placeholder="Buscar por nombre, correo o ID...">
            </div>
        </div>

        <!-- Tabla de usuarios -->
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Sexo</th>
                        <th>Tipo Usuario</th>
                        <th>Fecha Registro</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody id="userTable">
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
                                    <a href="../RUTAS/modificar.php?id=<?= $usuario['id_usuario'] ?>" class="btn btn-warning btn-sm">Editar</a>
                                    <a href="../RUTAS/eliminar.php?id=<?= $usuario['id_usuario'] ?>" class="btn btn-danger btn-sm">Eliminar</a>
                                </td>
                            </tr>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <!-- Botón de agregar usuario -->
        <div class="text-center mt-4">
            <a href="formulario.php?accion=agregar" class="btn btn-primary">Agregar Usuario</a>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Script para el buscador -->
    <script>
        document.getElementById('searchInput').addEventListener('keyup', function () {
            const filter = this.value.toLowerCase();
            const rows = document.querySelectorAll('#userTable tr');
            rows.forEach(row => {
                const text = row.textContent.toLowerCase();
                row.style.display = text.includes(filter) ? '' : 'none';
            });
        });
    </script>
</body>
</html>
