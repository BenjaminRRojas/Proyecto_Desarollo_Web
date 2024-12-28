<?php
require_once '../CONTROLADORES/EvaluacionesControlador.php';

// Verificar si se pasó el ID por GET
if (isset($_GET['id_evaluacion'])) {
    $id = $_GET['id_evaluacion'];
    
    $controlador = new EvaluacionesControlador();
    
    // Obtener la evaluación por ID para cargar sus datos en el formulario
    $evaluacion = $controlador->verEvaluacion($id);
    
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

<form method="POST" action="../RUTAS/procesar.php">
    <input type="hidden" name="accion" value="editar">
    <input type="hidden" name="id" value="<?= $evaluacion['id_evaluacion'] ?>">

    <label for="nombres">Título:</label>
    <input type="text" name="titulo" value="<?= $evaluacion['titulo'] ?>" required>
    
    <label for="apellidos">Descripción:</label>
    <input type="textarea" name="descripcion" value="<?= $evaluacion['descripcion'] ?>" required>
    
    <label for="correo">Fecha límite:</label>
    <input type="datetime-local" name="fecha_limite" value="<?= $evaluacion['fecha_limite'] ?>" required>
    
    <label for="curso">Curso:</label>
    <select name="curso" id="curso" required>
        <option value="" disabled selected>Selecciona un curso</option>
        <?php
        foreach ($cursos as $curso) {
            $selected = (isset($evaluacion['id_curso']) && $evaluacion['id_curso'] == $curso['id_curso']) ? 'selected' : '';
            echo "<option value='{$curso['id_curso']}' {$selected}>{$curso['titulo']}</option>";
        }
        ?>
    </select>

    
    <button type="submit">Actualizar Evaluación</button>
</form>