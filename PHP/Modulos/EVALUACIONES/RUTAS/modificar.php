<?php
require_once '../CONTROLADORES/EvaluacionesControlador.php';

// Verificar si se pasó el ID por GET
if (isset($_GET['id_evaluacion'])) {
    $id_evaluacion = $_GET['id_evaluacion'];
    
    $controlador = new EvaluacionesControlador();
    
    // Obtener la evaluación por ID para cargar sus datos en el formulario
    $evaluacion = $controlador->verEvaluacion($id_evaluacion);
    
    // Si la evaluación no existe, redirigir a la lista
    if (!$evaluacion) {
        header('Location: ListaEvaluaciones.php');
        exit();
    }
} else {
    // Si no se proporciona un ID, redirigir a la lista
    header('Location: ListaEvaluaciones.php');
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

    <div class="container my-5 w-50 p-5 rounded-3 shadow-lg">
        <h2 class="text-center fw-bold mb-4">Editar Evaluación</h2>
        <form method="POST" action="../RUTAS/procesar.php">
            <div class="mb-3">
                <input type="hidden" name="accion" value="editar">
                <input type="hidden" name="id_evaluacion" value="<?= $evaluacion['id_evaluacion'] ?>">
            </div>  
            <div class="mb-3">
                <label for="titulo" class="form-label">Título</label>
                <input type="text" class="form-control" name="titulo" value="<?= $evaluacion['titulo'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción</label>
                <input type="textarea" class="form-control" name="descripcion" value="<?= $evaluacion['descripcion'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="fecha_limite" class="form-label">Fecha límite</label>
                <input type="datetime-local" class="form-control" name="fecha_limite" value="<?= $evaluacion['fecha_limite'] ?>" required>
            </div>
            <div class="mb-5">
                <label for="id_curso" class="form-label">Curso</label>
                <select name="id_curso" class="form-select" id="curso" required>
                    <option value="<?= $evaluacion['id_curso'] ?>">2</option>
                    <?php
                    foreach ($cursos as $curso) {
                        $selected = (isset($evaluacion['id_curso']) && $evaluacion['id_curso'] == $curso['id_curso']) ? 'selected' : '';
                        echo "<option value='{$curso['id_curso']}' {$selected}>{$curso['titulo']}</option>";
                    }
                    ?>
                </select>
            </div>

            
            <button type="submit" class="btn btn-success w-100">Actualizar Evaluación</button>
        </form>
    </div>

</body>
</html>


