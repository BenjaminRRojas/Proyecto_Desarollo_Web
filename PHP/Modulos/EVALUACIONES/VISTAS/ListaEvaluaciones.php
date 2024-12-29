<?php
require_once 'C:\xampp\htdocs\Proyecto_Desarollo_Web\PHP\Modulos\EVALUACIONES\CONTROLADORES\EvaluacionesControlador.php';
require_once 'C:\xampp\htdocs\Proyecto_Desarollo_Web\PHP\Modulos\CURSOS\CONTROLADORES\CursosControlador.php';

$controlador1 = new CursosControlador();
$cursos = $controlador1->listarCursos();

$controlador2 = new EvaluacionesControlador();
$evaluaciones = $controlador2->listarEvaluaciones();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Evaluaciones</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../../../CSS/style-evaluaciones.css">
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
            <div class="col-md-6">
                <div class="input-group" id="selectInput">
                    <span class="input-group-text">Buscar por curso</span>
                    <select class="form-select" id="curso" name="id_curso" required>
                        <option value="" disabled selected>Selecciona un curso</option>
                        <?php
                        // Iterar sobre los cursos obtenidos del modelo
                        foreach ($cursos as $curso) {
                            $selected = (isset($evaluacion['id_curso']) && $evaluacion['id_curso'] == $curso['id_curso']) ? 'selected' : '';
                            echo "<option value='{$curso['id_curso']}' {$selected}>{$curso['titulo']}</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <input type="text" id="searchInput" class="form-control" placeholder="Buscar por título, fecha o ID...">
            </div>
        </div>

        <!-- Tabla de usuarios -->
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Curso</th>
                        <th>Título</th>
                        <th>Descripción</th>
                        <th>Fecha de Creación</th>
                        <th>Fecha Límite</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody id="userTable">
                    <?php foreach ($evaluaciones as $evaluacion): ?>
                        <tr>
                            <td><?= $evaluacion['id_evaluacion'] ?></td>
                            <td><?= $evaluacion['id_curso'] ?></td>
                            <td><?= $evaluacion['titulo'] ?></td>
                            <td><?= $evaluacion['descripcion'] ?></td>
                            <td><?= $evaluacion['fecha_creacion'] ?></td>
                            <td><?= $evaluacion['fecha_limite'] ?></td>
                            <td>
                                <a href="../RUTAS/modificar.php?id_evaluacion=<?= $evaluacion['id_evaluacion'] ?>" class="btn btn-warning btn-sm">Editar</a>
                                <button 
                                    class="btn btn-danger btn-sm" 
                                    data-bs-toggle="modal" 
                                    data-bs-target="#deleteModal" 
                                    data-id="<?= $evaluacion['id_evaluacion'] ?>">
                                    Eliminar
                                </button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <div class="text-center mt-4">
            <a href="..\..\..\formulario-evaluaciones.php?accion=agregar" class="btn btn-lg btn-primary">Agregar evaluación</a>
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
                    <p>¿Estás seguro de que deseas eliminar esta evaluación?</p>
                    <p class="fw-bold" id="userIdToDelete"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <a id="confirmDeleteButton" href="#" class="btn btn-danger">Eliminar</a>
                </div>
            </div>
        </div>
    </div>

    
    <script>
        // Script para manejar el modal de eliminación
        const deleteModal = document.getElementById('deleteModal');
        let userIdToDelete = '';

        // Evento al abrir el modal
        deleteModal.addEventListener('show.bs.modal', function (event) {
            const button = event.relatedTarget;
            userIdToDelete = button.getAttribute('data-id');

            // Mostrar el ID de la evaluación en el modal
            const userIdDisplay = deleteModal.querySelector('#userIdToDelete');
            userIdDisplay.textContent = userIdToDelete;

            // Configurar el enlace para confirmar la eliminación
            const confirmDeleteButton = deleteModal.querySelector('#confirmDeleteButton');
            confirmDeleteButton.onclick = function () {
                window.location.href = `../RUTAS/eliminar.php?id_evaluacion=${userIdToDelete}`;
            };
        });

        // Limpiar el ID cuando el modal se cierra
        deleteModal.addEventListener('hidden.bs.modal', function () {
            userIdToDelete = '';
            const userIdDisplay = deleteModal.querySelector('#userIdToDelete');
            userIdDisplay.textContent = '';
        });
    </script>


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