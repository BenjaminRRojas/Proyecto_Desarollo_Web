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
                                <a class="nav-link active" aria-current="page" href="#">Inicio</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="#">Cursos</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle active" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">Perfil</a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Iniciar Sesión</a></li>
                                    <li><a class="dropdown-item" href="#">Registrarse</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
        <div class="container-fluid">
        <!--Accordeon FAQ-->
            <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                    <div class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
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
                    <div>
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
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>