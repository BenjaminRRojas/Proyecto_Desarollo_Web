<?php
require_once 'C:\xampp\htdocs\Proyecto_Desarollo_Web\PHP\Modulos\EVALUACIONES\CONTROLADORES\EvaluacionesControlador.php';

session_start();
require_once 'Modulos/CORE/conexion.php'; 

// Verificar si el usuario está logueado
if (!isset($_SESSION['nombres']) || $_SESSION['tipo_usuario'] != 'ESTUDIANTE') {
    header("Location: ../formulario.php"); 
    exit();
}

$usuario_id = $_SESSION['id_usuario']; 

$id_evaluacion = $_GET['id_evaluacion'];
$controlador = new EvaluacionesControlador();
$evaluacion = $controlador->obtenerPorIdEvaluacion($id_evaluacion);


?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/style_form.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=VT323&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Pixel+Operator&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <title>Formulario</title>
</head>
<body>
    <video src="../imagenes/fondo.mp4" autoplay preload muted loop></video>    

    <div class="container-fluid">

        <!------------------------------NAV-------------------------------------->
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">

                <a class="navbar-brand ms-3" href="index.html">
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
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle active" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">Perfil</a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <button type="button" class="dropdown-item btn btn-primary w-100 text-start" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                            Iniciar Sesión
                                        </button>
                                    </li>
                                    <li><a class="dropdown-item" href="formulario.php">Registrarse</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>

        <div class="container my-5 w-50 p-5 rounded-3 shadow-lg">
            <h2 class="text-center fw-bold mb-4">Evaluación</h2>
            <form action="Modulos/EVALUACIONES/RUTAS/procesar.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="accion" value="agregar">


                <h3 class="text-center">Creación de preguntas y respuestas</h3>
                <p>Escriba un enunciado para cada pregunta. Luego, escriba las respuestas y seleccione la opción correcta.</p>
                <div class="mb-5">
                    <!-- Preguntas -->
                    <?php for ($i = 1; $i <= 4; $i++) : ?>
                        <h4>Pregunta <?= $i ?></h4>
                        <textarea id="pregunta<?= $i ?>" name="preguntas[<?= $i ?>][enunciado]" class="form-control mb-3" placeholder="Escriba un enunciado para la pregunta" required><?= htmlspecialchars($evaluacion['preguntas'][$i]['enunciado'] ?? '') ?></textarea>

                        <div class="mb-5">
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="radio" name="preguntas[<?= $i ?>][es_correcta]" value="opcion1" required>
                                <input type="text" name="preguntas[<?= $i ?>][opcion1]" class="form-control" placeholder="Opción 1" required>
                            </div>
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="radio" name="preguntas[<?= $i ?>][es_correcta]" value="opcion2" required>
                                <input type="text" name="preguntas[<?= $i ?>][opcion2]" class="form-control" placeholder="Opción 2" required>
                            </div>
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="radio" name="preguntas[<?= $i ?>][es_correcta]" value="opcion3" required>
                                <input type="text" name="preguntas[<?= $i ?>][opcion3]" class="form-control" placeholder="Opción 3" required>
                            </div>
                        </div>
                    <?php endfor; ?>
                </div>
                <button type="submit" class="btn btn-success w-100">Crear Evaluación</button>
            </form>
        </div>

        <!-------------------------------------Pie de Pagina------------------------------------------------>
        <footer class="container-fluid footer-docentes py-4">
            <div class="row">

                <div class="col-md-3">
                    <h4>Educación</h4>
                    <a href="cursos.html">Cursos</a><br>
                    <a href="docentes.html">Docentes</a><br>
                    <a href="#"></a>
                </div>

                <div class="col-md-3">
                    <h4>Comunidad</h4>
                    <a href="FAQ.php">Preguntas Frecuentes</a><br>
                    <a href="foro.php">Foro</a><br>
                    <a href="#"></a>
                </div>

                <div class="col-md-3">
                    <h4>Nosotros</h4>
                    <a href="Nosotros.php">Quiénes somos</a><br>
                    <a href="#"></a><br>
                    <a href="#"></a>
                </div>

                <div class="col-md-3 d-flex justify-content-center">
                    <div class="iconos-redes">
                        <ul>
                            <li class="iso-pro">
                                <span></span>
                                <span></span>
                                <span></span>
                                <a href="#">
                                    <svg viewBox="0 0 320 512" xmlns="http://www.w3.org/2000/svg" class="svg">
                                        <path
                                            d="M279.14 288l14.22-92.66h-88.91v-60.13c0-25.35 12.42-50.06 52.24-50.06h40.42V6.26S260.43 0 225.36 0c-73.22 0-121.08 44.38-121.08 124.72v70.62H22.89V288h81.39v224h100.17V288z">
                                        </path>
                                    </svg></a>
                                <div class="text">Facebook</div>
                            </li>
                            <li class="iso-pro">
                                <span></span>
                                <span></span>
                                <span></span>
                                <a href="#">
                                    <svg class="svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                        <path
                                            d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z">
                                        </path>
                                    </svg>
                                </a>
                                <div class="text">Twitter</div>
                            </li>
                            <li class="iso-pro">
                                <span></span>
                                <span></span>
                                <span></span>
                                <a href="#">
                                    <svg class="svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                        <path
                                            d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z">
                                        </path>
                                    </svg>
                                </a>
                                <div class="text">Instagram</div>
                            </li>
                        </ul>
                    </div>
                </div>


            </div>

            <div class="text-center mt-4">
                <p>&copy; 2024 INFINITYCODE</p>
            </div>
        </footer>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>