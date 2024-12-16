<?php
require_once '../CONTROLADORES/EvaluacionesControlador.php';

$controlador = new EvaluacionesControlador();
$evaluaciones = $controlador->listarEvaluaciones();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Evaluaciones</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../../../CSS/style_estudiantes.css">
</head>

<body>
    <video autoplay muted loop>
        <source src="../../../../imagenes/fondo.mp4" type="video/mp4">
    </video>

    <!-- Contenedor principal -->
    <div class="container mt-5">
        <h1 class="text-center">Lista de Evaluaciones</h1>
        
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
                        <th>Nota 1</th>
                        <th>Nota 2</th>
                        <th>Nota 3</th>
                        <th>Nota Tarea</th>
                        <th>Promedio</th>
                        <th>Curso</th>
                    </tr>
                </thead>
                <tbody id="userTable">
                    <?php foreach ($evaluaciones as $evaluacion): ?>
                        <?php if($usuario['tipo_usuario'] == "ESTUDIANTE") :?>
                            <tr>
                                <td><?= $usuario['id_usuario'] ?></td>
                                <td><?= $usuario['nombres'] ?> <?= $usuario['apellidos'] ?></td>
                                <td><?= $usuario['correo'] ?></td>
                                <td><?= $usuario['sexo'] ?></td>
                                <td><?= $usuario['fecha_registro'] ?></td>
                                <td>
                                    <a href="../RUTAS/modificar.php?id=<?= $evaluacion['id_evaluacion'] ?>" class="btn btn-warning btn-sm">Editar</a>
                                    <button 
                                        class="btn btn-danger btn-sm" 
                                        data-bs-toggle="modal" 
                                        data-bs-target="#deleteModal" 
                                        data-id="<?= $evaluacion['id_evaluacion'] ?>">
                                        Eliminar
                                    </button>
                                </td>
                            </tr>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <div class="text-center mt-4">
            <a href="formulario.php?accion=agregar" class="btn btn-lg btn-primary">Agregar Usuario</a>
        </div>
    </div>

    <!-- Modal para confirmar eliminación -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content custom-modal">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Confirmar Eliminación</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>¿Estás seguro de que deseas eliminar este usuario?</p>
                    <p class="fw-bold" id="userIdToDelete"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <a id="confirmDeleteButton" href="#" class="btn btn-danger">Eliminar</a>
                </div>
            </div>
        </div>
    </div>


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