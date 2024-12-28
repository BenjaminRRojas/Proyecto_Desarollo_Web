<?php
require_once '../CONTROLADORES/CursosControlador.php';

$controlador = new CursosControlador();
$cursos = $controlador->listarCursos();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Cursos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../../../CSS/style_cursos_lista.css">
</head>
<body>
    <video autoplay muted loop>
        <source src="../../../../imagenes/fondo.mp4" type="video/mp4">
    </video>

    <!-- Container principal -->
    <div class="container mt-5">
        <h1 class="text-center">Lista de Cursos</h1>

        <!-- Buscador -->
        <div class="row my-4">
            <div class="col-md-6 offset-md-3">
                <input type="text" id="searchInput" class="form-control" placeholder="Buscar por nombre, correo o ID...">
            </div>
        </div>

        <!-- Tabla de usuario -->
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Titulo</th>
                        <th>Duracion</th>
                        <th>Fecha de Creacion</th>
                        <th>Categoria</th>
                    </tr>
                </thead>
                <tbody id="userTable">
                    <?php foreach ($cursos as $curso): ?>
                        <tr>
                            <td><?= $curso['id_curso'] ?></td>
                            <td><?= $curso['titulo'] ?></td>
                            <td><?= $curso['duracion'] ?></td>
                            <td><?= $curso['fecha_creacion'] ?></td>
                            <td><?= $curso['categoria'] ?></td>
                            <td>
                                <!-- Editar -->
                                <a href="../RUTAS/modificar.php?id=<?= $curso['id_curso'] ?>" class="btn btn-warning btn-sm">Editar</a>
                                
                                <!-- Eliminar -->
                                <button 
                                    class="btn btn-danger btn-sm" 
                                    data-bs-toggle="modal" 
                                    data-bs-target="#deleteModal" 
                                    data-id="<?= $curso['id_curso'] ?>">
                                    Eliminar
                                </button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

            <div class="text-center mt-4">
                <a href="../../../curso_formulario.php?accion=agregar" class="btn btn-primary">
                    Agregar Curso
                </a>
            </div>
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
                    <p>¿Estás seguro de que deseas eliminar este curso?</p>
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

    <script>
        // Script para manejar el modal de eliminación
        const deleteModal = document.getElementById('deleteModal');

        deleteModal.addEventListener('show.bs.modal', function (event) {
            const button = event.relatedTarget;
            const courseId = button.getAttribute('data-id');

            // Mostrar el ID del curso en el modal
            const userIdDisplay = deleteModal.querySelector('#userIdToDelete');
            userIdDisplay.textContent = `ID: ${courseId}`;

            // Configurar el enlace para confirmar la eliminación
            const confirmDeleteButton = deleteModal.querySelector('#confirmDeleteButton');
            confirmDeleteButton.href = `../RUTAS/eliminar.php?id_curso=${courseId}`;
        });

        // Limpiar el ID cuando el modal se cierra
        deleteModal.addEventListener('hidden.bs.modal', function () {
            const userIdDisplay = deleteModal.querySelector('#userIdToDelete');
            userIdDisplay.textContent = '';
        });
    </script>

    <script>
        // Selecciona el modal y los elementos relacionados
        const deleteModal = document.getElementById('deleteModal');
        const userIdToDelete = document.getElementById('userIdToDelete');

        // Escucha el evento "show.bs.modal" cuando se abre el modal
        deleteModal.addEventListener('show.bs.modal', function (event) {
            // Botón que activó el modal
            const button = event.relatedTarget;

            // Obtén el ID del curso del atributo data-id
            const courseId = button.getAttribute('data-id');

            // Actualiza el contenido del modal con el ID
            userIdToDelete.textContent = courseId;
        });
    </script>


</body>
</html>