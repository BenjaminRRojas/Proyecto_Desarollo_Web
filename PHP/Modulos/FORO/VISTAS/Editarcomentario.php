    <div class="container my-5 p-5 rounded-3 shadow-lg">
        <h2 class="text-center fw-bold mb-4"><?=$titulo?> Comentario</h2>
        <form action="?c=comentario&a=Guardar" method="POST" enctype="multipart/form-data">
            
            <input type="hidden" name="id_comentario" value="<?= htmlspecialchars($comentario->getid_comentario() ?? '') ?>">

            <!-- Campos del formulario -->
            <div class="mb-3">
                <label for="titulo" class="form-label">Título</label>
                <input type="text" class="form-control" id="titulo" name="titulo" value="<?= htmlspecialchars($comentario->gettitulo()) ?>" required>
            </div>
            <div class="mb-3">
                <label for="contenido" class="form-label">Contenido</label>
                <input type="text" class="form-control" id="contenido" name="contenido" value="<?= htmlspecialchars($comentario->getcontenido()) ?>" required>
            </div>
            <div class="mb-3">
                    <label for="fecha_creacion" class="form-label">Fecha de creacion</label>
                    <input type="datetime-local" class="form-control" id="fecha_creacion" name="fecha_creacion" value="<?= htmlspecialchars($comentario->getfecha() ?? '') ?>" required>
            </div>
            <label for="foroSeleccionado" class="form-label">Foro</label>
            <select class="form-select mb-3" id="foroSeleccionado" name="id_foro" required>
                <option value="" disabled <?= empty($comentario->getid_foro()) ? 'selected' : '' ?>>Seleccionar Foro</option>
                <?php foreach ($foros as $foro): ?>
                    <option 
                        value="<?= htmlspecialchars($foro->id_foro) ?>" 
                        <?= $foro->id_foro == ($comentario->getid_foro() ?? '') ? 'selected' : '' ?>>
                        <?= htmlspecialchars($foro->titulo_foro) ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <label for="usuarioSeleccionado" class="form-label">Usuario</label>
            <select class="form-select mb-3" id="usuarioSeleccionado" name="id_usuario" required>
                <option value="" disabled <?= empty($comentario->getid_usuario()) ? 'selected' : '' ?>>Seleccionar Usuario</option>
                <?php foreach ($usuarios as $usuario): ?>
                    <option 
                        value="<?= htmlspecialchars($usuario->id_usuario) ?>" 
                        <?= $usuario->id_usuario == ($comentario->getid_usuario() ?? '') ? 'selected' : '' ?>>
                        <?= htmlspecialchars($usuario->nombres) ?> <?= htmlspecialchars($usuario->apellidos) ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <?php if (!is_null($comentario->getid_responde())): ?>
                <label for="usuariorespondeSeleccionado" class="form-label">Usuario a Responder</label>
                <select class="form-select mb-3" id="usuariorespondeSeleccionado" name="id_responde" <?= $comentario->getid_responde() === 0 ? '' : 'required' ?>>
                    <option value="" disabled <?= ($comentario->getid_responde() === 0) ? 'selected' : '' ?>>Seleccionar Usuario</option>
                    <?php foreach ($comentarios as $comentario2): ?>
                        <option 
                            value="<?= htmlspecialchars($comentario2->id_comentario) ?>" 
                            <?= $comentario2->id_usuario == ($comentario->getid_responde() ?? '') ? 'selected' : '' ?>>
                            <?= htmlspecialchars($comentario2->nombres) ?> <?= htmlspecialchars($comentario2->apellidos) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            <?php endif; ?>
            <button type="submit" class="btn btn-success w-100">Enviar</button>
        </form>
    </div>