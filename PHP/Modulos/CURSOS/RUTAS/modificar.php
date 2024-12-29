<?php
require_once '../CONTROLADORES/CursosControlador.php';

// Verificar si se pasó el ID por GET
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $controlador = new CursosControlador();
    
    // Obtener el curso por ID para cargar sus datos en el formulario
    $curso = $controlador->verCurso($id);
    
    // Si el curso no existe, redirigir a la lista
    if (!$curso) {
        header('Location: ../VISTAS/ListaCursos.php');
        exit();
    }
} else {
    // Si no se proporciona un ID, redirigir a la lista
    header('Location: ../VISTAS/ListaCursos.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../../CSS/style_form.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Formulario de Edición</title>
</head>
<body>
    <video src="../../../../imagenes/fondo.mp4" autoplay preload muted loop></video>

    <div class="container my-5 p-5 rounded-3 shadow-lg">
        <h2 class="text-center fw-bold mb-4">Editar Curso</h2>
        <form action="../RUTAS/procesar.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="accion" value="editar">
            <input type="hidden" name="id" value="<?= htmlspecialchars($curso['id_curso'] ?? '') ?>">

            <!-- Campos del formulario -->
            <div class="mb-3">
                <label for="titulo" class="form-label">Titulo</label>
                <input type="text" class="form-control" id="titulo" name="titulo" value="<?= htmlspecialchars($curso['titulo']) ?>" required>
            </div>
            <div class="mb-3">
                <label for="duracion" class="form-label">Duracion</label>
                <input type="text" class="form-control" id="duracion" name="duracion" value="<?= htmlspecialchars($curso['duracion']) ?>" required>
            </div>
            <div class="mb-3">
                <label for="fecha_creacion" class="form-label">Fecha de creacion</label>
                <input type="datetime-local" class="form-control" id="fecha_creacion" name="fecha_creacion" value="<?= htmlspecialchars($curso['fecha_creacion']) ?>" required>
            </div>
            <div class="mb-3">
                <label for="categoria" class="form-label">Categoria</label>
                <input type="text" class="form-control" id="categoria" name="categoria" value="<?= htmlspecialchars($curso['categoria']) ?>" required>
            </div>

            <div class="mb-3">
                <label for="descripcion" class="form-label">Categoria</label>
                <input type="text" class="form-control" id="descripcion" name="descripcion" value="<?= htmlspecialchars($curso['descripcion']) ?>" required>
            </div>
            
            <button type="submit" class="btn btn-success w-100">Actualizar Curso</button>
        </form>
    </div>

</body>
</html>