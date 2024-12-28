<?php
session_start();
require_once 'Modulos/CORE/conexion.php'; 

// Verificar si el usuario está logueado y es un estudiante
if (!isset($_SESSION['nombres']) || $_SESSION['tipo_usuario'] != 'ESTUDIANTE') {
    header("Location: formulario.php"); 
    exit();
}

$usuario_id = $_SESSION['id_usuario']; 

// Conectar a la base de datos y obtener los cursos del estudiante
try {
    $pdo = Database::getConnection();
    // Consulta para obtener los cursos inscritos
    $stmt = $pdo->prepare("SELECT c.id_curso, c.titulo, c.duracion, c.categoria, c.descripcion, e.promedio
                           FROM cursos c
                           INNER JOIN evaluaciones e ON c.id_curso = e.id_curso
                           WHERE e.id_usuario = :id_usuario");
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
    <title>Dashboard Estudiante</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/style_form.css">
    <link rel="stylesheet" href="../CSS/style-index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=VT323&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Pixel+Operator&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
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
                                <a class="nav-link active" href="cursos.html">Cursos</a>
                            </li>

                            <?php if (isset($_SESSION['nombres'])): // Si el usuario está logueado ?>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle active" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Bienvenido, <?= htmlspecialchars($_SESSION['nombres']) ?> <!-- Muestra el nombre del usuario -->
                                    </a>
                                    <ul class="dropdown-menu">
                                        <?php if ($_SESSION['tipo_usuario'] === 'DOCENTE'): ?>
                                            <li><a class="dropdown-item" href="Modulos/DOCENTES/gestionar_curso.php">Gestionar Cursos</a></li>
                                        <?php elseif ($_SESSION['tipo_usuario'] === 'ESTUDIANTE'): ?>
                                            <li><a class="dropdown-item" href="Modulos/ESTUDIANTES/cursos_inscritos.php">Cursos Inscritos</a></li>
                                        <?php endif; ?>
                                        <li><a class="dropdown-item text-danger" href="Modulos/AUTH/logout.php?logout=true">Cerrar Sesión</a></li> <!-- Opción para cerrar sesión -->
                                    </ul>
                                </li>
                            <?php else: // Si el usuario no está logueado ?>
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

    <div class="container mt-5">
        <h1>Bienvenido al Dashboard, <?= htmlspecialchars($_SESSION['nombres']) ?>!</h1>
        <p>A continuación, puedes ver los cursos en los que estás inscrito:</p>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID Curso</th>
                    <th>Título del Curso</th>
                    <th>Categoría</th>
                    <th>Duración (horas)</th>
                    <th>Promedio</th>
                    <th>Descripción</th>
                </tr>
            </thead>
            <tbody>
                <?php if (count($cursos_inscritos) > 0): ?>
                    <?php foreach ($cursos_inscritos as $curso): ?>
                        <tr>
                            <td><?= htmlspecialchars($curso['id_curso']) ?></td>
                            <td><?= htmlspecialchars($curso['titulo']) ?></td>
                            <td><?= htmlspecialchars($curso['categoria']) ?></td>
                            <td><?= htmlspecialchars($curso['duracion']) ?></td>
                            <td><?= htmlspecialchars($curso['promedio']) ?></td>
                            <td><?= htmlspecialchars($curso['descripcion']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6">No tienes cursos inscritos actualmente.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
