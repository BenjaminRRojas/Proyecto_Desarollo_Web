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
    <!--Navbar-->
    <video src="../imagenes/fondo.mp4" autoplay preload muted loop></video>
    <div class="container-fluid">
        <nav class="navbar mt-3 navbar-expand-lg bg-primary">
            <div class="container-fluid bg-primary">
                <a class="navbar-brand text-bg-primary" href="#">Navbar</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active text-bg-primary" aria-current="page" href="#hola">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-bg-primary" href="#hola2">Features</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-bg-primary" href="#">Pricing</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled text-bg-primary" aria-disabled="true">Disabled</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container-fluid">
            <!--Container Misión y Visión-->
            <div class="d-flex mt-5 justify-content-around noMargin">
                <div class="col-7 text-left h2 mision border borderRadius">
                    <div class="mt-4 ms-4 text-light titulo">
                        <h1>Misión y Visión</h1>
                    </div>
                    <div class="mt-4 mb-5 ms-5 me-5 fs-5 lh-lg text-light justificar fuente">
                        <li>Nuestra misión es democratizar el acceso a la educación de calidad, ofreciendo cursos en línea diseñados para empoderar a personas de todas las edades y orígenes, ayudándoles a desarrollar habilidades clave para alcanzar sus metas personales y profesionales.</li>
                        <li class="mt-3">Visualizamos un mundo donde el aprendizaje sea accesible, personalizado y continuo, promoviendo el crecimiento individual y contribuyendo al progreso global a través de la formación de comunidades de aprendizaje inclusivas y colaborativas.</li>
                    </div>
                </div>
                <img class="col-4 mb-2 ms-2 me-2 img-fluid misionImg" src="../imagenes/Estudiante.webp" alt="Sonrisa"> 
            </div>
            <!--Container Equipo-->
            <div class="d-flex mt-5 mb-5 justify-content-around mt-3">
                <img class="col-4 mb-2 ms-2 me-2 img-fluid border misionImg" src="../imagenes/grupo.webp" alt="Sonrisa"> 
                <div class="col-7 text-end h2 equipo border borderRadius">
                    <div class="mt-4 me-4 text-light titulo">
                        <h1>Equipo</h1>
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
                <a class="d-flex list-group-item list-group-item-action scrollButton justify-content-center align-items-center" data-target="titulo_1">Historia de Nuestra Plataforma></a>
                <a class="d-flex list-group-item list-group-item-action scrollButton justify-content-center align-items-center" data-target="titulo_2">Innovación Constante</a>
                <a class="d-flex list-group-item list-group-item-action scrollButton justify-content-center align-items-center" data-target="titulo_3">Nuestros Valores</a>
                <a class="d-flex list-group-item list-group-item-action scrollButton justify-content-center align-items-center" data-target="titulo_4">Nuestra Promesa</a>
            </div>
        </div>
        <!--Container Historia del Desarrollo-->
        <div class="col-9 overflow-y-scroll mt-3 mb-3 historia border borderRadius" id="scrollContainer">
            <h1 class="mt-4 ms-2 text-light" id="titulo_1">Historia De Nuestra Plataforma: De una Idea a un Movimiento Educativo</h1>
            <p class="mt-3 mb-4 ms-4 me-5 fs-5 lh-lg text-light justificar fuente">La idea de nuestra plataforma nació de una necesidad urgente: hacer que la programación sea accesible para todos, sin importar su ubicación o recursos económicos. Comenzamos como un pequeño equipo de desarrolladores apasionados, unidos por un objetivo común: democratizar el conocimiento tecnológico. Con el tiempo, nuestra plataforma evolucionó, integrando no solo cursos técnicos sino también una comunidad vibrante de estudiantes y mentores de todo el mundo. Hoy, nos enorgullece ser una puerta de entrada al mundo de la programación para miles de personas que aspiran a transformar sus vidas.</p>
            <h1 class="mt-4 ms-2 text-light" id="titulo_2">Innovación Constante: El Motor de Nuestra Evolución</h1>
            <p class="mt-3 mb-4 ms-4 me-5 fs-5 lh-lg text-light justificar fuente">Desde el primer día, la innovación ha sido el núcleo de nuestra plataforma. Cada curso, herramienta interactiva y proyecto práctico fue diseñado pensando en la experiencia del usuario. Incorporamos tecnologías de aprendizaje adaptativo, inteligencia artificial y prácticas de gamificación para mantener a los estudiantes comprometidos. La evolución no se detiene, y seguimos escuchando a nuestra comunidad para adaptarnos a los cambios en el panorama tecnológico.</p>
            <h1 class="mt-4 ms-2 text-light" id="titulo_3">Nuestros Valores: El ADN de Nuestra Comunidad</h1>
            <h2 class="mt-3 ms-5 text-light">Accesibilidad:</h2>
            <div class="ms-5">
                <p class="mt-3 mb-4 ms-4 me-5 fs-5 lh-lg text-light justificar fuente">Creemos que aprender a programar no debería ser un lujo. Nuestra misión es eliminar barreras, ofreciendo contenido de alta calidad a precios accesibles e incluso opciones gratuitas para quienes lo necesitan.</p>
            </div>
            <h2 class="mt-3 ms-5 text-light">Colaboración:</h2>
            <div class="ms-5">
                <p class="mt-3 mb-4 ms-4 me-5 fs-5 lh-lg text-light justificar fuente">Fomentamos una comunidad donde los estudiantes no solo aprenden, sino que también comparten conocimientos y se ayudan mutuamente. Aprender juntos es más efectivo y enriquecedor.</p>
            </div>
            <h2 class="mt-3 ms-5 text-light">Diversidad e Inclusión:</h2>
            <div class="ms-5">
                <p class="mt-3 mb-4 ms-4 me-5 fs-5 lh-lg text-light justificar fuente">Valoramos la diversidad de experiencias, perspectivas y talentos. Nuestra plataforma está diseñada para ser inclusiva, promoviendo un entorno donde todos puedan sentirse bienvenidos y representados.</p>
            </div>
            <h2 class="mt-3 ms-5 text-light">Excelencia:</h2>
            <div class="ms-5">
                <p class="mt-3 mb-4 ms-4 me-5 fs-5 lh-lg text-light justificar fuente">Nos comprometemos a ofrecer contenido actualizado y relevante, preparado por expertos en la industria, para que nuestros estudiantes estén siempre un paso adelante en el mundo laboral.</p>
            </div>
            <h1 class="mt-4 ms-2 text-light" id="titulo_4">Nuestra Promesa: Transformar Sueños en Realidad</h1>
            <p class="mt-3 mb-4 ms-4 me-5 fs-5 lh-lg text-light justificar fuente">No se trata solo de enseñar código; se trata de empoderar vidas. Sabemos que detrás de cada estudiante hay una historia, un sueño y una meta. Nos dedicamos a brindarles las herramientas y el apoyo necesarios para convertir esas aspiraciones en logros tangibles.</p>
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


    </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    
</body>
</html>
