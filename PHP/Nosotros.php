<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nosotros</title>
    <link rel="stylesheet" href="../CSS/style_nosotros.css">
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
                                <a class="nav-link active" aria-current="page" href="index.html">Inicio</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="cursos.html">Cursos</a>
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

        
            <!--Container Misión y Visión-->
            <div class="flexMisionVision justify-content-around">
                <div class="mision">
                    <div class="mt-4 ms-4 text-light titulo">
                        <h1 class="titulo">Misión y Visión</h1>
                    </div>
                    <div class="mt-4 mb-5 ms-5 me-5 fs-5 lh-lg text-light justificar">
                        <li>Nuestra misión es democratizar el acceso a la educación de calidad, ofreciendo cursos en línea diseñados para empoderar a personas de todas las edades y orígenes, ayudándoles a desarrollar habilidades clave para alcanzar sus metas personales y profesionales.</li>
                        <li class="mt-3">Visualizamos un mundo donde el aprendizaje sea accesible, personalizado y continuo, promoviendo el crecimiento individual y contribuyendo al progreso global a través de la formación de comunidades de aprendizaje inclusivas y colaborativas.</li>
                    </div>
                </div>
                <img class="img-fluid misionImg" src="../imagenes/Estudiante.webp" alt="Estudiante">
            </div>
            <!--Container Equipo-->
            <div class="flexEquipo mt-5 mb-5 justify-content-around">
                <img class="img-fluid misionImg" src="../imagenes/grupo.webp" alt="Equipo"> 
                <div class="text-end equipo">
                    <div class="mt-4 me-4 text-light titulo">
                        <h1 class="titulo">Equipo</h1>
                    </div>
                    <div class="mt-4 mb-5 ms-5 me-5 fs-5 lh-lg text-light justificar">
                        <li>Nuestro equipo está compuesto por expertos apasionados en sus áreas, desde desarrolladores de contenido educativo y diseñadores de experiencias digitales hasta tutores y mentores comprometidos.</li>
                        <li class="mt-3">Juntos, trabajamos para crear un entorno de aprendizaje dinámico, innovador y centrado en las necesidades de nuestros usuarios, impulsado por la tecnología y el compromiso con la excelencia educativa.</li>
                    </div>
                </div>
            </div>
        </div>
    
    <div class="row mb-3 container-fluid justify-content-center align-items-center">
        <!--List-Group Historia del Desarrollo-->
        <div class="col-3">
            <div id="list-example" class="list-group">
                <a class="d-flex list-group-item list-group-item-action scrollButton justify-content-center align-items-center" data-target="titulo_1">Historia de Nuestra Plataforma</a>
                <a class="d-flex list-group-item list-group-item-action scrollButton justify-content-center align-items-center" data-target="titulo_2">Innovación Constante</a>
                <a class="d-flex list-group-item list-group-item-action scrollButton justify-content-center align-items-center" data-target="titulo_3">Nuestros Valores</a>
                <a class="d-flex list-group-item list-group-item-action scrollButton justify-content-center align-items-center" data-target="titulo_4">Nuestra Promesa</a>
            </div>
        </div>
        <!--Container Historia del Desarrollo-->
        <div class="col-9 overflow-y-scroll mt-3 mb-3 historia border" id="scrollContainer">
            <h1 class="mt-4 ms-2 text-light titulo" id="titulo_1">Historia De Nuestra Plataforma: De una Idea a un Movimiento Educativo</h1>
            <p class="mt-3 mb-4 ms-4 me-5 lh-lg text-light justificar fuente">La idea de nuestra plataforma nació de una necesidad urgente: hacer que la programación sea accesible para todos, sin importar su ubicación o recursos económicos. Comenzamos como un pequeño equipo de desarrolladores apasionados, unidos por un objetivo común: democratizar el conocimiento tecnológico. Con el tiempo, nuestra plataforma evolucionó, integrando no solo cursos técnicos sino también una comunidad vibrante de estudiantes y mentores de todo el mundo. Hoy, nos enorgullece ser una puerta de entrada al mundo de la programación para miles de personas que aspiran a transformar sus vidas.</p>
            <h1 class="mt-4 ms-2 text-light titulo" id="titulo_2">Innovación Constante: El Motor de Nuestra Evolución</h1>
            <p class="mt-3 mb-4 ms-4 me-5 lh-lg text-light justificar fuente">Desde el primer día, la innovación ha sido el núcleo de nuestra plataforma. Cada curso, herramienta interactiva y proyecto práctico fue diseñado pensando en la experiencia del usuario. Incorporamos tecnologías de aprendizaje adaptativo, inteligencia artificial y prácticas de gamificación para mantener a los estudiantes comprometidos. La evolución no se detiene, y seguimos escuchando a nuestra comunidad para adaptarnos a los cambios en el panorama tecnológico.</p>
            <h1 class="mt-4 ms-2 text-light titulo" id="titulo_3">Nuestros Valores: El ADN de Nuestra Comunidad</h1>
            <h2 class="mt-3 ms-5 text-light titulo2">Accesibilidad:</h2>
            <div class="ms-5">
                <p class="mt-3 mb-4 ms-4 me-5 lh-lg text-light justificar fuente">Creemos que aprender a programar no debería ser un lujo. Nuestra misión es eliminar barreras, ofreciendo contenido de alta calidad a precios accesibles e incluso opciones gratuitas para quienes lo necesitan.</p>
            </div>
            <h2 class="mt-3 ms-5 text-light titulo2">Colaboración:</h2>
            <div class="ms-5">
                <p class="mt-3 mb-4 ms-4 me-5 lh-lg text-light justificar fuente">Fomentamos una comunidad donde los estudiantes no solo aprenden, sino que también comparten conocimientos y se ayudan mutuamente. Aprender juntos es más efectivo y enriquecedor.</p>
            </div>
            <h2 class="mt-3 ms-5 text-light titulo2">Diversidad e Inclusión:</h2>
            <div class="ms-5">
                <p class="mt-3 mb-4 ms-4 me-5 lh-lg text-light justificar fuente">Valoramos la diversidad de experiencias, perspectivas y talentos. Nuestra plataforma está diseñada para ser inclusiva, promoviendo un entorno donde todos puedan sentirse bienvenidos y representados.</p>
            </div>
            <h2 class="mt-3 ms-5 text-light titulo2">Excelencia:</h2>
            <div class="ms-5">
                <p class="mt-3 mb-4 ms-4 me-5 lh-lg text-light justificar fuente">Nos comprometemos a ofrecer contenido actualizado y relevante, preparado por expertos en la industria, para que nuestros estudiantes estén siempre un paso adelante en el mundo laboral.</p>
            </div>
            <h1 class="mt-4 ms-2 text-light titulo" id="titulo_4">Nuestra Promesa: Transformar Sueños en Realidad</h1>
            <p class="mt-3 mb-4 ms-4 me-5 lh-lg text-light justificar fuente">No se trata solo de enseñar código; se trata de empoderar vidas. Sabemos que detrás de cada estudiante hay una historia, un sueño y una meta. Nos dedicamos a brindarles las herramientas y el apoyo necesarios para convertir esas aspiraciones en logros tangibles.</p>
        </div>
    </div>

    <script>
        document.querySelectorAll(".scrollButton").forEach(button => {
            button.addEventListener("click", function () {
                const targetId = this.dataset.target;
                const container = document.getElementById("scrollContainer");
                const targetElement = document.getElementById(targetId);

                if (targetElement) {
                    targetElement.scrollIntoView({
                        behavior: "smooth",
                        block: "start",
                        inline: "nearest"
                    });
                }
            });
        });
    </script>
    <!-------------------------------------Pie de Pagina------------------------------------------------>
    <footer class="container-fluid footer-docentes py-4">
            <div class="row">

                <div class="col-md-3">
                    <h4>Educación</h4>
                    <a href="#">Cursos</a><br>
                    <a href="docentes.html">Docentes</a><br>
                    <a href="#"></a>
                </div>

                <div class="col-md-3">
                    <h4>Comunidad</h4>
                    <a href="#">Preguntas Frecuentes</a><br>
                    <a href="#">Foro</a><br>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="../JS/docentes.js"></script>       
    </div>
</div>
    
</body>
</html>
