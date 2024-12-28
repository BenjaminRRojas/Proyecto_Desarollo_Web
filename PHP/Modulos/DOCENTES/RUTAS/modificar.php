<?php
require_once '../CONTROLADORES/DocentesControlador.php';

// Verificar si se pasó el ID por GET
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $controlador = new UsuariosControlador();
    
    // Obtener el usuario por ID para cargar sus datos en el formulario
    $usuario = $controlador->verUsuario($id);
    
    // Si el usuario no existe, redirigir a la lista
    if (!$usuario) {
        header('Location: ListaEstudiantes.php');
        exit();
    }
} else {
    // Si no se proporciona un ID, redirigir a la lista
    header('Location: ListaEstudiantes.php');
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
        <h2 class="text-center fw-bold mb-4">Editar Usuario</h2>
        <form action="../RUTAS/procesar.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="accion" value="editar">
            <input type="hidden" name="id" value="<?= htmlspecialchars($usuario['id_usuario'] ?? '') ?>">

            <!-- Campos del formulario -->
            <div class="mb-3">
                <label for="nombres" class="form-label">Nombres</label>
                <input type="text" class="form-control" id="nombres" name="nombres" value="<?= htmlspecialchars($usuario['nombres']) ?>" required>
            </div>
            <div class="mb-3">
                <label for="apellidos" class="form-label">Apellidos</label>
                <input type="text" class="form-control" id="apellidos" name="apellidos" value="<?= htmlspecialchars($usuario['apellidos']) ?>" required>
            </div>
            <div class="mb-3">
                <label for="correo" class="form-label">Correo</label>
                <input type="email" class="form-control" id="correo" name="correo" value="<?= htmlspecialchars($usuario['correo']) ?>" required>
            </div>
            <div class="mb-3">
                <label for="contrasena" class="form-label">Contraseña</label>
                <input type="password" class="form-control" id="contrasena" name="contrasena">
            </div>
            <div class="mb-3">
                <label class="form-label">Sexo</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="sexo" value="Hombre" <?= $usuario['sexo'] == 'Hombre' ? 'checked' : '' ?>>
                    <label class="form-check-label">Hombre</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="sexo" value="Mujer" <?= $usuario['sexo'] == 'Mujer' ? 'checked' : '' ?>>
                    <label class="form-check-label">Mujer</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="sexo" value="Otro" <?= $usuario['sexo'] == 'Otro' ? 'checked' : '' ?>>
                    <label class="form-check-label">Otro</label>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Tipo de Usuario</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="tipo_usuario" value="alumno" <?= $usuario['tipo_usuario'] == 'alumno' ? 'checked' : '' ?>>
                    <label class="form-check-label">Alumno</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="tipo_usuario" value="docente" <?= $usuario['tipo_usuario'] == 'docente' ? 'checked' : '' ?>>
                    <label class="form-check-label">Docente</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="tipo_usuario" value="admin" <?= $usuario['tipo_usuario'] == 'admin' ? 'checked' : '' ?>>
                    <label class="form-check-label">Administrador</label>
                </div>
            </div>
            <button type="submit" class="btn btn-success w-100">Actualizar Usuario</button>
        </form>
    </div>

</body>
</html>