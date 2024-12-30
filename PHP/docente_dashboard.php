<?php
session_start();
require_once 'Modulos/CORE/conexion.php'; 

// Verificar si el usuario está logueado y es un docente
if (!isset($_SESSION['nombres']) || $_SESSION['tipo_usuario'] != 'DOCENTE') {
    header("Location: formulario.php"); 
    exit();
}

$usuario_id = $_SESSION['id_usuario']; 

// Conectar a la base de datos y obtener los cursos del docente con la cantidad de estudiantes inscritos
try {
    $pdo = Database::getConnection();
    
    $stmt = $pdo->prepare("SELECT 
                               c.id_curso, 
                               c.titulo, 
                               c.duracion, 
                               c.categoria, 
                               c.descripcion, 
                               COUNT(ce.id_estudiante) AS cantidad_estudiantes
                           FROM 
                               cursos c
                           LEFT JOIN 
                               curso_estudiante ce ON c.id_curso = ce.id_curso
                           WHERE 
                               c.id_usuario = :id_usuario
                           GROUP BY 
                               c.id_curso");
    $stmt->bindParam(':id_usuario', $usuario_id);
    $stmt->execute();
    $cursos_inscritos = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Docente</title>
    <link rel="stylesheet" href="../CSS/style-dashboard.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=VT323&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Pixel+Operator&display=swap" rel="stylesheet">
</head>
<body>
 
<video src="../imagenes/fondo.mp4" autoplay preload muted loop></video>

    <!-------------------------Container Principal------------------------------>
    <div class="container-fluid">

        <nav class="navbar navbar-expand-lg">
                    <div class="container-fluid">
                        <a class="navbar-brand ms-3" href="index.php">
                            <img src="../imagenes/logo.svg" alt="logo" height="125">
                        </a>

                        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas"
                            data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="d-none d-lg-block text-center ms-5">
                            <h1 class="navbar-title">Aprende a programar desde cero hasta el infinito</h1>
                        </div>

                        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar"
                            aria-labelledby="offcanvasNavbarLabel">
                            <div class="offcanvas-header">
                                <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menú</h5>
                                <button type="button" class="btn-close bg-light" data-bs-dismiss="offcanvas"
                                    aria-label="Close"></button>
                                <hr>
                            </div>
                            <div class="offcanvas-body">
                                <ul class="navbar-nav justify-content-end">
                                    <li class="nav-item">
                                        <a class="nav-link active" aria-current="page" href="index.php">Inicio</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link active" href="cursos.php">Cursos</a>
                                    </li>

                                    <?php if (isset($_SESSION['nombres'])): ?>
                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle active" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                Bienvenido, <?= htmlspecialchars($_SESSION['nombres']) ?> 
                                            </a>
                                            <ul class="dropdown-menu">
                                                <?php if ($_SESSION['tipo_usuario'] === 'DOCENTE'): ?>
                                                    <li><a class="dropdown-item" href="docente_dashboard.php">Gestionar Cursos</a></li>
                                                <?php elseif ($_SESSION['tipo_usuario'] === 'ESTUDIANTE'): ?>
                                                    <li><a class="dropdown-item" href="estudiante_dashboard.php">Cursos Inscritos</a></li>
                                                <?php endif; ?>
                                                <li><a class="dropdown-item text-danger" href="Modulos/AUTH/logout.php?logout=true">Cerrar Sesión</a></li> 
                                            </ul>
                                        </li>
                                    <?php else:?>
                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle active" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                Perfil
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <button type="button" class="dropdown-item btn btn-primary w-100 text-start" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                                        Iniciar Sesión
                                                    </button>
                                                </li>
                                                <li><a class="dropdown-item" href="formulario.php">Registrarse</a></li>
                                            </ul>
                                        </li>
                                    <?php endif; ?>

                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>
        <!-- Contenedor principal -->
        <div class="container mt-5 dashboard-welcome">
            <h1 class="dashboard-title">¡Bienvenido al Dashboard <?= htmlspecialchars($_SESSION['nombres']) ?>!</h1>

            <p class="dashboard-description">A continuación, puedes ver los cursos que has creado:</p>

            <div class="boton-crear">
                <a href="curso_formulario.php" class="ui-btn-link">
                    <button class="ui-btn">
                        <span> Crear Curso </span>
                    </button>
                </a>
            </div>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Título del Curso</th>
                        <th>Categoría</th>
                        <th>Duración (horas)</th>
                        <th>Cantidad de Estudiantes</th>
                        <th>Descripción</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (count($cursos_inscritos) > 0): ?>
                        <?php foreach ($cursos_inscritos as $curso): ?>
                            <tr>
                                <td><?= htmlspecialchars($curso['titulo']) ?></td>
                                <td><?= htmlspecialchars($curso['categoria']) ?></td>
                                <td><?= htmlspecialchars($curso['duracion']) ?></td>
                                <td><?= htmlspecialchars($curso['cantidad_estudiantes']) ?></td>
                                <td><?= htmlspecialchars($curso['descripcion']) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5">No tienes cursos creados actualmente.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

</body>
</html>
