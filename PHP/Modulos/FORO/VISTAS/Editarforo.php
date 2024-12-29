    <div class="container my-5 p-5 rounded-3 shadow-lg">
        <h2 class="text-center fw-bold mb-4"><?=$titulo?> Foro</h2>
        <form action="?c=comentario&a=Guardar" method="POST" enctype="multipart/form-data">
            
            <input type="hidden" name="id_comentario" value="<?= htmlspecialchars($usuario->getid_foro() ?? '') ?>">

            <!-- Campos del formulario -->
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Cursos
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
            </div>
            <div class="mb-3">
                <label for="titulo" class="form-label">Título</label>
                <input type="text" class="form-control" id="titulo" name="titulo" value="<?= htmlspecialchars($usuario->gettitulo()) ?>" required>
            </div>
            <div class="mb-3">
                <label for="contenido" class="form-label">Contenido</label>
                <input type="text" class="form-control" id="contenido" name="contenido" value="<?= htmlspecialchars($usuario->getdescripcion()) ?>" required>
            </div>
            <div class="mb-3">
                    <label for="fecha_creacion" class="form-label">Fecha de creacion</label>
                    <input type="datetime-local" class="form-control" id="fecha_creacion" name="fecha_creacion" value="<?= htmlspecialchars($usuario->getfecha() ?? '') ?>" required>
            </div>
            <button type="submit" class="btn btn-success w-100">Enviar</button>
        </form>
    </div>