<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nosotros</title>
    <link rel="stylesheet" href="../CSS/style_nosotros.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
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
                            <a class="nav-link active text-bg-primary" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-bg-primary" href="#">Features</a>
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
                    <div class="mt-4 ms-4 fs-1 text-light titulo">
                        Misión y Visión
                    </div>
                    <div class="mt-5 mb-5 ms-5 me-5 fs-5 lh-lg text-light justificar fuente">
                        <li>Nuestra misión es democratizar el acceso a la educación de calidad, ofreciendo cursos en línea diseñados para empoderar a personas de todas las edades y orígenes, ayudándoles a desarrollar habilidades clave para alcanzar sus metas personales y profesionales.</li>
                        <li class="mt-3">Visualizamos un mundo donde el aprendizaje sea accesible, personalizado y continuo, promoviendo el crecimiento individual y contribuyendo al progreso global a través de la formación de comunidades de aprendizaje inclusivas y colaborativas.</li>
                    </div>
                </div>
                <img class="col-4 mb-2 ms-2 me-2 img-fluid border" src="../imagenes/Estudiante.jpg" alt="Sonrisa" id="misionImg"> 
            </div>
            <!--Container Equipo-->
            <div class="d-flex mt-5 justify-content-around mt-3">
                <img class="col-4 mb-2 ms-2 me-2 img-fluid border" src="../imagenes/Sonrisa.png" alt="Sonrisa" id="misionImg"> 
                <div class="col-7 text-end h2 equipo border borderRadius">
                    <div class="mt-4 me-4 fs-1 text-light titulo">
                        Equipo
                    </div>
                    <div class="mt-5 mb-5 ms-5 me-5 fs-5 lh-lg text-light justificar">
                        <li>Nuestro equipo está compuesto por expertos apasionados en sus áreas, desde desarrolladores de contenido educativo y diseñadores de experiencias digitales hasta tutores y mentores comprometidos.</li>
                        <li class="mt-3">Juntos, trabajamos para crear un entorno de aprendizaje dinámico, innovador y centrado en las necesidades de nuestros usuarios, impulsado por la tecnología y el compromiso con la excelencia educativa.</li>
                    </div>
                </div>
            </div>
        </div>
    <!--Container Linea de Tiempo-->
    <div class="container-fluid marginLinea2">
        <div class="flexlinea heightLinea">
            <div></div>
            <div class="blue mx-3"><hr></div>
            <div></div>
        </div>
        <div class="flexlinea">
            <div></div>
            <div class="blue mx-3"></div>
            <div class="text-start ms-2">
                <button type="button" class="btn btn-primary" 
                        data-bs-toggle="popover" 
                        data-bs-placement="right" 
                        data-bs-content="La historia de nuestra plataforma de cursos online comenzó con la visión de un grupo de entusiastas de la educación y la tecnología, comprometidos con transformar el acceso al conocimiento.">
                        Semana 1    
                </button>
            </div>
        </div>
        <div class="flexlinea heightLinea">
            <div></div>
            <div class="blue mx-3"><hr></div>
            <div></div>
        </div>
        <div class="flexlinea heightLinea">
            <div></div>
            <div class="blue mx-3"><hr></div>
            <div></div>
        </div>
        <div class="flexlinea">
            <div class="text-end">
                <button type="button" class="btn btn-primary" 
                        data-bs-toggle="popover" 
                        data-bs-placement="left" 
                        data-bs-content="Desde sus inicios, este proyecto fue concebido como una respuesta a las barreras económicas, geográficas y culturales que muchas personas enfrentan al buscar formación de calidad.">
                        Semana 2   
                </button>
            </div>
            <div class="blue mx-3"></div>
            <div></div>
        </div>
        <div class="flexlinea heightLinea">
            <div></div>
            <div class="blue mx-3"><hr></div>
            <div></div>
        </div>
        <div class="flexlinea heightLinea">
            <div></div>
            <div class="blue mx-3"><hr></div>
            <div></div>
        </div>
        <div class="flexlinea heightLinea">
            <div></div>
            <div class="blue mx-3"></div>
            <div class="text-start ms-2">
                <button type="button" class="btn btn-primary" 
                        data-bs-toggle="popover" 
                        data-bs-placement="right" 
                        data-bs-content="A lo largo de los años, hemos evolucionado desde ofrecer cursos básicos hasta consolidarnos como una comunidad de aprendizaje que integra herramientas tecnológicas avanzadas y un enfoque personalizado para cada usuario.">
                        Semana 3
                </button>
            </div>
        </div>
        <div class="flexlinea heightLinea">
            <div></div>
            <div class="blue mx-3"><hr></div>
            <div></div>
        </div>
        <div class="flexlinea heightLinea">
            <div></div>
            <div class="blue mx-3"><hr></div>
            <div></div>
        </div>
        <div class="flexlinea heightLinea">
            <div class="text-end">
                <button type="button" class="btn btn-primary" 
                        data-bs-toggle="popover" 
                        data-bs-placement="left" 
                        data-bs-content="Nuestros valores fundamentales son la inclusión, la innovación y el empoderamiento, pilares que guían cada decisión y nos inspiran a seguir construyendo un entorno donde cada estudiante pueda alcanzar su máximo potencial, independientemente de sus circunstancias.">
                        Semana 4
                </button>
            </div>
            <div class="blue mx-3"></div>
            <div></div>
        </div>
        <div class="flexlinea heightLinea marginLinea">
            <div></div>
            <div class="blue mx-3"><hr></div>
            <div></div>
        </div>
    </div>
    <!--Container Linea de Tiempo-->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Selecciona todos los elementos que tienen el atributo `data-bs-toggle="popover"`
            const popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]');

            // Inicializa Bootstrap Popover para cada elemento encontrado
            popoverTriggerList.forEach(function (popoverTriggerEl) {
                new bootstrap.Popover(popoverTriggerEl);
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    
</body>
</html>
