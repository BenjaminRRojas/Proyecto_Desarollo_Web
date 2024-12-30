<?php
session_start(); // Inicia la sesión


$accion = $_GET['accion'] ?? 'agregar';
$usuario = isset($usuario) ? $usuario : null;

?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Infinity Code</title>
    <link rel="stylesheet" href="../CSS/style-index.css">
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
    
    <?php if (isset($_SESSION['logout_success'])): ?> 
        <script> 
            Swal.fire({ 
                title: '¡Hasta pronto!', 
                text: '<?php echo $_SESSION['logout_success']; ?>', 
                icon: 'info', 
                confirmButtonText: 'Aceptar' 
            }); 
        </script> 
        <?php unset($_SESSION['logout_success']);?> 
    <?php endif; ?>


    <video src="../imagenes/fondo.mp4" autoplay preload muted loop></video>

    <!-------------------------Container Principal------------------------------>

    <div class="container-fluid">


        <!------------------------------NAV-------------------------------------->
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


        <!------------------------------------BANNER------------------------------------------------>

        <div class="banner">
            <img src="../imagenes/banner.webp" alt="Banner" class="img-fluid">
        </div>

        <!-------------------------------------TEXTO------------------------------------------------>

        <div class="container container-texto">
            <p>Bienvenidos a Infinity Code, el lugar donde comienza tu viaje hacia el mundo de la programación. Ya sea
                que estés dando tus primeros pasos o busques perfeccionar tus habilidades, aquí encontrarás cursos
                diseñados para todos los niveles. Aprende a tu ritmo, con herramientas prácticas y mentores apasionados
                que te guiarán en cada etapa. Conviértete en el programador que siempre quisiste ser. ¡Empieza a
                construir tu futuro hoy!</p>
        </div>

        <!-------------------------------------CARRUSEL------------------------------------------------>

        <div class="container-xxl">
            <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                        aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                        aria-label="Slide 3"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3"
                        aria-label="Slide 4"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="../imagenes/carrusel-index1.webp" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Cursos populares</h5>
                            <p>Descubre nuestros cursos más populares, diseñados para ofrecerte una formación completa
                                en programación. ¡Comienza tu viaje hacia el dominio de los lenguajes de programación
                                hoy mismo!</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="../imagenes/carrusel-index2.webp" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Curso de Python</h5>
                            <p>Aprende Python desde cero, uno de los lenguajes más populares para desarrollo web,
                                análisis de datos, inteligencia artificial y más.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="../imagenes/carrusel-index3.webp" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Curso de C++</h5>
                            <p>Domina C++, un lenguaje de programación poderoso y versátil usado en software de alto
                                rendimiento, juegos y sistemas embebidos.</p>

                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="../imagenes/carrusel-index4.webp" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Curso de JavaScript</h5>
                            <p>Adéntrate en el mundo de JavaScript, el lenguaje esencial para añadir interactividad y
                                dinamismo a tus páginas web modernas.</p>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>


        <!-------------------------------------TARJETAS------------------------------------------------>

        <div class="container container-texto2">
            <div class="row row-cols-1 row-cols-md-2 g-4">
                <div class="col">
                    <div class="card h-100">
                        <div class="card-image">
                            <img src="../imagenes/programacion.webp" class="card-img-top" alt="...">
                        </div>
                        <div class="card-body">
                            <h4 class="card-title">Cursos de Programación</h4>
                            <p class="card-text">Accede a una variedad de cursos de programación, desde Python hasta
                                HTML, diseñados para todos los niveles.</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100">
                        <div class="card-image">
                            <img src="../imagenes/beneficios.webp" class="card-img-top" alt="...">
                        </div>
                        <div class="card-body">
                            <h4 class="card-title">Beneficios del Curso</h4>
                            <p class="card-text">Mejora tus habilidades técnicas con cursos que te preparan para el
                                mundo laboral y ofrecen certificación.</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100">
                        <div class="card-image">
                            <img src="../imagenes/online.webp" class="card-img-top" alt="...">
                        </div>
                        <div class="card-body">
                            <h4 class="card-title">Modalidad 100% Online</h4>
                            <p class="card-text">Accede a los cursos desde cualquier lugar, sin necesidad de
                                desplazarte. Ideal para aprender a tu propio ritmo.</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100">
                        <div class="card-image">
                            <img src="../imagenes/duracion.webp" class="card-img-top" alt="...">
                        </div>
                        <div class="card-body">
                            <h4 class="card-title">Duración Flexible</h4>
                            <p class="card-text">Cursos con una duración flexible que se adaptan a tu ritmo de
                                aprendizaje. Desde 3 semanas hasta 8 semanas.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!----------------------------------------------MODAL-------------------------------------------------------->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Iniciar Sesión</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class=" p-4 rounded-3 shadow">
                            <form action="login.php" method="POST">
                                <div class="mb-3">
                                    <label for="EMAIL" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="EMAIL" name="EMAIL" required>
                                </div>
                                <div class="mb-3">
                                    <label for="CONTRASENA" class="form-label">Contraseña</label>
                                    <input type="password" class="form-control" id="CONTRASENA" name="CONTRASENA"
                                        required>
                                </div>
                                <div>
                                    <p>¿No tienes una cuenta? <a href="formulario.php">Regístrate</a></p>
                                </div>
                                <button type="submit" class="btn w-100">Iniciar sesión</button>
                            </form>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="cambiar_contrasena.php" class="btn btn-primary">Cambiar contraseña</a>
                        <a href="" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</a>
                    </div>
                </div>
            </div>
        </div>

        <!-------------------------------------Pie de Pagina------------------------------------------------>
        <footer class="container-fluid footer-docentes py-4">
            <div class="row">

                <div class="col-md-3">
                    <h4>Educación</h4>
                    <a href="cursos.php">Cursos</a><br>
                    <a href="docentes.html">Docentes</a><br>
                    <a href="#"></a>
                </div>

                <div class="col-md-3">
                    <h4>Comunidad</h4>
                    <a href="FAQ.php">Preguntas Frecuentes</a><br>
                    <a href="Modulos/FORO/foro.php">Foro</a><br>
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


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="../JS/docentes.js"></script>

    
</body>

</html>