    <div class="container my-5 p-5 rounded-3 shadow-lg">
        <h2 class="text-center fw-bold mb-4"><?=$titulo?> Foro</h2>
        <form action="?c=foro&a=Guardar" method="POST" enctype="multipart/form-data">
            
            <input type="hidden" name="id_foro" value="<?= htmlspecialchars($usuario->getid_foro() ?? '') ?>">

            <!-- Campos del formulario -->
            <div class="mb-3">
                <label for="titulo" class="form-label">Título</label>
                <input type="text" class="form-control" id="titulo" name="titulo" value="<?= htmlspecialchars($usuario->gettitulo()) ?>" required>
            </div>
            <div class="mb-3">
                <label for="contenido" class="form-label">Descripción</label>
                <input type="text" class="form-control" id="descripcion" name="descripcion" value="<?= htmlspecialchars($usuario->getdescripcion()) ?>" required>
            </div>
            <div class="mb-3">
                    <label for="fecha_creacion" class="form-label">Fecha de Creación</label>
                    <input type="datetime-local" class="form-control" id="fecha_creacion" name="fecha_creacion" value="<?= htmlspecialchars($usuario->getfecha() ?? '') ?>" required>
            </div>
            
            <label for="cursoSeleccionado" class="form-label">Curso</label>
            <select class="form-select mb-3" id="cursoSeleccionado" name="id_curso" required>
                <option value="" disabled <?= empty($usuario->getid_curso()) ? 'selected' : '' ?>>Seleccionar curso</option>
                <?php foreach ($cursos as $curso): ?>
                    <option 
                        value="<?= htmlspecialchars($curso->id_curso) ?>" 
                        <?= $curso->id_curso == ($usuario->getid_curso() ?? '') ? 'selected' : '' ?>>
                        <?= htmlspecialchars($curso->titulo) ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <button type="submit" class="btn btn-success w-100">Enviar</button>
        </form>
    </div>