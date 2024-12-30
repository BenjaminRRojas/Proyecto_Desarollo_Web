<?php
session_start();
require_once 'Modulos/CORE/conexion.php'; 

// Verificar si el usuario está logueado y es un estudiante
if (!isset($_SESSION['nombres']) || $_SESSION['tipo_usuario'] != 'ESTUDIANTE') {
    header("Location: formulario.php"); 
    exit();
}

$usuario_id = $_SESSION['id_usuario']; 

//Conecta a la db
try {
    $pdo = Database::getConnection();
    // Consulta para obtener los cursos inscritos
    $stmt = $pdo->prepare("
        SELECT 
            c.id_curso,
            c.titulo AS curso_titulo,
            c.categoria,
            c.duracion,
            c.descripcion,
            f.titulo AS foro_titulo,
            AVG(r.nota) AS promedio,
            GROUP_CONCAT(DISTINCT ev.titulo SEPARATOR ', ') AS evaluaciones
            FROM 
            cursos c
            JOIN 
            curso_estudiante ce ON c.id_curso = ce.id_curso
            LEFT JOIN 
            foro f ON c.id_curso = f.id_curso
            LEFT JOIN 
            evaluaciones ev ON c.id_curso = ev.id_curso
            LEFT JOIN 
            resultados r ON r.id_evaluacion = ev.id_evaluacion AND r.id_estudiante = ce.id_estudiante
            WHERE 
            ce.id_estudiante = :id_usuario
            GROUP BY 
            c.id_curso
            ORDER BY 
            c.titulo ASC");
    $stmt->bindParam(':id_usuario', $usuario_id, PDO::PARAM_INT);
    $stmt->execute();
    $cursos_inscritos = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}

// Conecta a la db
try {
    $pdo = Database::getConnection();
    // Consulta para obtener las evaluaciones asociadas a los cursos inscritos
    $stmt = $pdo->prepare("
        SELECT 
            ev.id_evaluacion,
            ev.titulo AS evaluacion_titulo,
            ev.descripcion AS evaluacion_descripcion,
            ev.fecha_creacion,
            ev.fecha_limite,
            c.titulo AS curso_titulo
        FROM 
            evaluaciones ev
        JOIN 
            cursos c ON ev.id_curso = c.id_curso
        JOIN 
            curso_estudiante ce ON c.id_curso = ce.id_curso
        WHERE 
            ce.id_estudiante = :id_usuario
        ORDER BY 
            ev.fecha_limite ASC;
    ");
    $stmt->bindParam(':id_usuario', $usuario_id, PDO::PARAM_INT);
    $stmt->execute();
    $evaluaciones = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}

// Conecta a la db
try {
    $pdo = Database::getConnection();
    // Consulta para obtener las evaluaciones con la nota asociada
    $stmt = $pdo->prepare("
        SELECT 
            ev.id_evaluacion,
            ev.titulo AS evaluacion_titulo,
            ev.descripcion AS evaluacion_descripcion,
            ev.fecha_creacion,
            ev.fecha_limite,
            c.titulo AS curso_titulo,
            r.nota AS nota,
            r.fecha_realizacion as fecha_realizacion
        FROM 
            evaluaciones ev
        JOIN 
            cursos c ON ev.id_curso = c.id_curso
        JOIN 
            curso_estudiante ce ON c.id_curso = ce.id_curso
        LEFT JOIN 
            resultados r ON r.id_evaluacion = ev.id_evaluacion AND r.id_estudiante = ce.id_estudiante
        WHERE 
            ce.id_estudiante = :id_usuario
        ORDER BY 
            ev.fecha_limite ASC;
    ");
    $stmt->bindParam(':id_usuario', $usuario_id, PDO::PARAM_INT);
    $stmt->execute();
    $evaluaciones = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}



?>



<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
    <title>Dashboard Estudiante</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/style-dashboard.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=VT323&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Pixel+Operator&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>

<video src="../imagenes/fondo.mp4" autoplay preload muted loop></video>
    <!-------------------------Container Principal------------------------------>
    <div class="container-fluid">

        <!------------------NAV--------------------->
        <nav class="navbar navbar-expand-lg">

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

                            <?php if (isset($_SESSION['nombres'])): // Si el usuario está logueado ?>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle active" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Bienvenido, <?= htmlspecialchars($_SESSION['nombres']) ?> <!-- Muestra el nombre del usuario -->
                                    </a>
                                    <ul class="dropdown-menu">
                                        <?php if ($_SESSION['tipo_usuario'] === 'DOCENTE'): ?>
                                            <li><a class="dropdown-item" href="gestionar_curso.php">Gestionar Cursos</a></li>
                                        <?php elseif ($_SESSION['tipo_usuario'] === 'ESTUDIANTE'): ?>
                                            <li><a class="dropdown-item" href="estudiante_dashboard.php">Cursos Inscritos</a></li>
                                        <?php endif; ?>
                                        <li><a class="dropdown-item text-danger" href="Modulos/AUTH/logout.php?logout=true">Cerrar Sesión</a></li> 
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

        <div class="container mt-5 dashboard-welcome">
            <h1 class="dashboard-title">¡Bienvenido al Dashboard <?= htmlspecialchars($_SESSION['nombres']) ?>!</h1>

            <form action="Modulos/ESTUDIANTES/RUTAS/actualizar_descripcion.php??" method="POST">
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Inserta una pequeña descripción personal</label>
                    <textarea class="form-control w-50" id="exampleFormControlTextarea1" rows="3" name="descripcion" required></textarea>
                    <!-- <button type="submit" class="btn btn-success">Enviar</button> -->
                    <button type="submit" class="buttonpro">
                        <span> Confirmar </span>
                    </button>
                </div>
            </form>

            <div class="boton-crear">
                <a href="cursos.php" class="ui-btn-link">
                    <button class="ui-btn">
                        <span> Buscar Curso </span>
                    </button>
                </a>
            </div>

        <h2 class="text-center">Cursos Inscritos</h2>
        <table class="table table-striped mb-5">
            <thead>
                <tr>
                    <th>Título del Curso</th>
                    <th>Categoría</th>
                    <th>Duración (horas)</th>
                    <th>Promedio</th>
                    <th>Foro Asociado</th>
                    <th>Evaluaciones</th>
                    <th>Descripción</th>
                </tr>
            </thead>
            <tbody>
                <?php if (count($cursos_inscritos) > 0): ?>
                    <?php foreach ($cursos_inscritos as $curso): ?>
                        <tr>
                            <td><?= htmlspecialchars($curso['curso_titulo']) ?></td>
                            <td><?= htmlspecialchars($curso['categoria']) ?></td>
                            <td><?= htmlspecialchars($curso['duracion']) ?></td>
                            <td><?= htmlspecialchars(round($curso['promedio'], 2) ?? 'N/A') ?></td>
                            <td><?= htmlspecialchars($curso['foro_titulo'] ?? 'No disponible') ?></td>
                            <td><?= htmlspecialchars($curso['evaluaciones'] ?? 'Ninguna') ?></td>
                            <td><?= htmlspecialchars($curso['descripcion']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="7">No tienes cursos inscritos actualmente.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
        <h2 class="text-center">Evaluaciones Disponibles</h2>
        <table class="table table-striped mb-5">
            <thead>
                <tr>
                    <th>Curso</th>
                    <th>Título de la Evaluación</th>
                    <th>Fecha de Creación</th>
                    <th>Fecha Límite</th>
                    <th>Nota </th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php if (count($evaluaciones) > 0): ?>
                    <?php foreach ($evaluaciones as $evaluacion): ?>
                        <tr>
                        <td><?= htmlspecialchars($evaluacion['curso_titulo']) ?></td>
                        <td><?= htmlspecialchars($evaluacion['evaluacion_titulo']) ?></td>
                        <td><?= htmlspecialchars($evaluacion['fecha_creacion']) ?></td>
                        <td><?= htmlspecialchars($evaluacion['fecha_limite']) ?></td>
                        <td><?= htmlspecialchars($evaluacion['nota'] ?? 'No disponible') ?></td>
                        <td>
                            <button type="button" class="btn btn-primary btn-sm btn-detalles" data-bs-toggle="modal" data-bs-target="#staticBackdrop"
                                data-titulo="<?= htmlspecialchars($evaluacion['evaluacion_titulo']) ?>"
                                data-descripcion="<?= htmlspecialchars($evaluacion['evaluacion_descripcion']) ?>"
                                data-fecha-creacion="<?= htmlspecialchars($evaluacion['fecha_realizacion'] ?? 'No has rendido esta evaluación.') ?>"
                                data-fecha-limite="<?= htmlspecialchars($evaluacion['fecha_limite']) ?>">
                                Ver Detalles
                            </button>
                            <a href="rendir_evaluacion.php?id_evaluacion=<?= $evaluacion['id_evaluacion'] ?>" class="btn btn-warning btn-sm">Rendir Evaluación</a>
                        </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="7">No tienes cursos inscritos actualmente.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>

        <!-- MODAL DETALLES DE LA EVALUACIÓN -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Detalles de la Evaluación</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h2 id="modal-titulo"></h2>
                        <p><strong></strong> <span id="modal-descripcion"></span></p>
                        <p><strong>Fecha de Realización:</strong> <span id="modal-fecha-creacion"></span></p>
                    </div>
                    <div class="modal-footer">
                        <a href="" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</a>
                    </div>
                </div>
            </div>
        </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
        const modalTitulo = document.getElementById('modal-titulo');
        const modalDescripcion = document.getElementById('modal-descripcion');
        const modalFechaCreacion = document.getElementById('modal-fecha-creacion');
        const modalFechaLimite = document.getElementById('modal-fecha-limite');

        // Detectar clic en cualquier botón "Ver Detalles"
        document.querySelectorAll('.btn-detalles').forEach(button => {
            button.addEventListener('click', function () {
                modalTitulo.textContent = this.getAttribute('data-titulo');
                modalDescripcion.textContent = this.getAttribute('data-descripcion');
                modalFechaCreacion.textContent = this.getAttribute('data-fecha-creacion');
                modalFechaLimite.textContent = this.getAttribute('data-fecha-limite');
            });
        });
    });

    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
