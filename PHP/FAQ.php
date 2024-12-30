<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQ</title>
    <link rel="stylesheet" href="../CSS/style_faq.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=VT323&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Pixel+Operator&display=swap" rel="stylesheet">
</head>
<body>
    <video src="../imagenes/fondo.mp4" autoplay preload muted loop></video>
    <div class="container-fluid">
        <!--Navbar-->
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
                                         <?= htmlspecialchars($_SESSION['nombres']) ?> 
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
        <div class="container-fluid" style="margin: 5% 0 5% 0;">
        <!--Accordeon FAQ-->
            <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                    <div class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                            <h2>¿Puedo acceder al curso después de completarlo?</h2>
                        </button>
                    </div>
                    <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <p>Sí, al completar un curso, seguirás teniendo acceso al contenido siempre que mantengas activa tu cuenta. Esto te permite repasar lecciones, consultar materiales complementarios y fortalecer tus conocimientos en cualquier momento. Nuestro objetivo es garantizar que puedas usar los recursos de aprendizaje para tu desarrollo continuo.</p>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <div class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            <h2>¿Se necesita experiencia previa para inscribirse en los cursos?</h2>
                        </button>
                    </div>
                    <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                        <p>No necesitas experiencia previa para inscribirte en nuestros cursos. Están diseñados para ser accesibles a estudiantes de todos los niveles, desde principiantes hasta avanzados. Cada curso incluye materiales y guías detalladas que te permitirán aprender a tu propio ritmo. Además, si surgen dudas durante el proceso de aprendizaje, contarás con recursos de soporte y ayuda para resolverlas.</p>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <div class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            <h2>¿Cómo puedo inscribirme en un curso?</h2>
                        </button>
                    </div>
                    <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <p>Inscribirte en un curso es rápido y sencillo. Primero, navega por nuestro catálogo de cursos y selecciona el que más te interese. Luego, haz clic en el botón "Inscribirme" o "Comprar" y sigue los pasos para realizar el pago. Una vez confirmado, recibirás acceso inmediato al curso desde tu cuenta, donde podrás comenzar a aprender de inmediato.</p>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <div class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                            <h2>¿Recibiré un certificado al completar el curso?</h2>
                        </button>
                    </div>
                    <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <p>Sí, al finalizar un curso recibirás un certificado digital que acredita tu participación y finalización. Este certificado incluirá tu nombre, el título del curso y la fecha de finalización. Podrás descargarlo para compartirlo en tus redes profesionales o incluirlo en tu currículum. Algunos cursos también ofrecen opciones para obtener certificados físicos por un costo adicional.</p>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <div class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                            <h2>¿Cómo puedo dejar comentarios o sugerencias sobre un curso?</h2>
                        </button>
                    </div>
                    <div id="collapseFive" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <p>En cada curso encontrarás una sección dedicada para dejar tus comentarios o sugerencias. Ahí podrás compartir tus opiniones sobre el contenido, destacar aspectos positivos y sugerir mejoras. Valoramos mucho tu retroalimentación, ya que nos ayuda a mejorar continuamente y a ofrecer una experiencia de aprendizaje excepcional.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>


<!-- Login Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Iniciar Sesión</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class=" p-4 rounded-3 shadow">
                            <form action="Modulos/AUTH/login.php" method="POST">
                                <div class="mb-3">
                                    <label for="EMAIL" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="EMAIL" name="EMAIL" required>
                                </div>
                                <div class="mb-3">
                                    <label for="CONTRASENA" class="form-label">Contraseña</label>
                                    <input type="password" class="form-control" id="CONTRASENA" name="CONTRASENA" required>
                                </div>
                                <?php if (!empty($error)): ?>
                                    <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
                                <?php endif; ?>
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
                    <a href="docentes.php">Docentes</a><br>
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