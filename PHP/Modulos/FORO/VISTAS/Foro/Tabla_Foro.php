    <!-- Contenedor principal -->
    <div class="container mt-5">
        <h1 class="text-center">Lista de Foro</h1>
        
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
                        <th>ID Foro</th>
                        <th>Curso</th>
                        <th>Título</th>
                        <th>Descripción</th>
                        <th>Fecha Creación</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody id="userTable">
                    <?php foreach ($foros as $foro): ?>
                            <tr>
                                <td><?= $foro->id_foro ?></td>
                                <td><?= $foro->titulo ?></td>
                                <td><?= $foro->titulo_foro ?></td>
                                <td><?= $foro->descripcion ?></td>
                                <td><?= $foro->fecha_creacion ?></td>
                                <td>
                                    <a href="?c=foro&a=Editar&id_foro=<?=$foro->id_foro?>" class="btn btn-warning btn-sm">Editar</a>
                                    <button 
                                        class="btn btn-danger btn-sm" 
                                        data-bs-toggle="modal" 
                                        data-bs-target="#deleteModal" 
                                        data-id="<?= $foro->id_foro?>">
                                        Eliminar
                                    </button>
                                </td>
                            </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <div class="text-center mt-4">
            <a href="?c=foro&a=Editar" class="btn btn-primary">Agregar Foro</a>
        </div>
    </div>

    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content custom-modal">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Confirmar Eliminación</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>¿Estás seguro de que deseas eliminar este usuario?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <a id="confirmDeleteButton" href="#" class="btn btn-danger">Eliminar</a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Script para manejar el modal de eliminación
        const deleteModal = document.getElementById('deleteModal');
        let userIdToDelete = '';

        // Evento al abrir el modal
        deleteModal.addEventListener('show.bs.modal', function (event) {
            const button = event.relatedTarget;
            userIdToDelete = button.getAttribute('data-id');

            // Configurar el enlace para confirmar la eliminación
            const confirmDeleteButton = deleteModal.querySelector('#confirmDeleteButton');
            confirmDeleteButton.onclick = function () {
                window.location.href = `?c=foro&a=Borrar&id=${userIdToDelete}`;
            };
        });

        // Limpiar el ID cuando el modal se cierra
        deleteModal.addEventListener('hidden.bs.modal', function () {
            userIdToDelete = '';
        });
    </script>

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
</div>