    <div class="container my-5 p-5 rounded-3 shadow-lg">
        <h2 class="text-center fw-bold mb-4">Editar Usuario</h2>
        <form action="?c=comentario&a=Guardar" method="POST" enctype="multipart/form-data">
            
            <input type="hidden" name="id_comentario" value="<?= htmlspecialchars($usuario->getid_comentario() ?? '') ?>">
            <input type="hidden" name="id_foro" value="<?= htmlspecialchars($usuario->getid_foro() ?? '') ?>">
            <input type="hidden" name="id_usuario" value="<?= htmlspecialchars($usuario->getid_usuario() ?? '') ?>">
            <input type="hidden" name="id_responde" value="<?= htmlspecialchars($usuario->getid_responde() ?? '') ?>">

            <!-- Campos del formulario -->
            <div class="mb-3">
                <label for="titulo" class="form-label">Título</label>
                <input type="text" class="form-control" id="titulo" name="titulo" value="<?= htmlspecialchars($usuario->gettitulo()) ?>" required>
            </div>
            <div class="mb-3">
                <label for="contenido" class="form-label">Contenido</label>
                <input type="text" class="form-control" id="contenido" name="contenido" value="<?= htmlspecialchars($usuario->getcontenido()) ?>" required>
            </div>
            <div class="mb-3">
                <label for="fecha" class="form-label">Fecha Comentario</label>
                <input type="datetime-local" 
                    class="form-control" 
                    id="fecha" 
                    name="fecha" 
                    value="<?= htmlspecialchars(date('Y-m-d\TH:i', strtotime($usuario->getfecha()))) ?>" 
                    required>
            </div>
            <button type="submit" class="btn btn-success w-100">Actualizar Usuario</button>
        </form>
    </div>