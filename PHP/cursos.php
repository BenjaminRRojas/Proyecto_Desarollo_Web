<?php
require_once 'Modulos/CURSOS/CONTROLADORES/CursosControlador.php';

$controlador = new CursosControlador();
$cursos = $controlador->listarCursos();

session_start(); // Inicia la sesión
require_once 'Modulos/CORE/conexion.php';

$accion = $_GET['accion'] ?? 'agregar';

$usuario = isset($usuario) ? $usuario : null; 
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cursos</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css2?family=VT323&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Pixel+Operator&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=VT323&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Pixel+Operator&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
  <link rel="stylesheet" href="../CSS/style-cursos.css">
</head>

<body>
  <video src="../imagenes/fondo.mp4" autoplay preload muted loop></video>

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
    <!------------------------------CARUSEL-------------------------------------->
    <div class="carusel">
      <div id="carouselExampleCaptions" class="carousel slide">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
            aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
            aria-label="Slide 2"></button>
          
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="../imagenes/img-3.webp" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>No esperes mas Inscribite</h5>
              <p>Some representative placeholder content for the first slide.</p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="../imagenes/img-2.webp" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>Second slide label</h5>
              <p>Some representative placeholder content for the second slide.</p>
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
    <!------------------------------MODAL-------------------------------------->
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

    <!------------------------------CURSOS-------------------------------------->
    <div class="container-fluid">
      <div id="card-cursos" class="cardCursos text-center">
        <div class="cardCursos-header">
          <ul class="nav nav-tabs card-header-tabs">
            <li class="nav-item">
              <a class="nav-link active" href="#" data-target="todos">Todos los Cursos</a>
            </li>
            <?php if (isset($_SESSION['tipo_usuario']) && $_SESSION['tipo_usuario'] === 'DOCENTE'): ?>
              <li class="nav-item1">
                <a href="Modulos/CURSOS/VISTAS/ListaCursos.php" id="boton-editar" class="btn btn-primary">Editar</a>
              </li>
            <?php endif; ?>
            <li class="nav-item ms-auto">
              <div class="d-flex">
                <input type="text" id="searchInput" class="form-control" placeholder="Buscar título o ID">
              </div>
            </li>
          </ul>
        </div>
        <div class="cardCursos-body">
          <div class="row" id="courseCards"> <!-- Agregar ID al contenedor de todas las tarjetas -->
            <?php foreach ($cursos as $row): ?>
              <div class="col-md-3 card-container"> <!-- Agregar clase "card-container" -->
                <div class="card" style="width: 18rem;">
                  <div class="card-body-curso">
                    <h5 class="card-title"><?= htmlspecialchars($row['titulo']) ?></h5> <!-- Mantén la clase "card-title" -->
                    <p class="card-text"><?= htmlspecialchars($row['categoria']) ?></p>
                  </div>
                  <div class="card-footer">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#INFOModal-<?= $row['id_curso'] ?>">
                      Saber más
                    </button>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>

      <!-- Modales -->
      <?php foreach ($cursos as $row): ?>
        <div class="modal fade" id="INFOModal-<?= $row['id_curso'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="ModalLabel-<?= $row['id_curso'] ?>" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="ModalLabel-<?= $row['id_curso'] ?>">Información del curso</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <div class="p-4 rounded-3 shadow">
                  <div class="row">
                    <div class="col-12 mb-3">
                      <label for="modalCursoTitulo" class="form-label">Título</label>
                      <h5 id="modalCursoTitulo"><?= htmlspecialchars($row['titulo']) ?></h5>
                    </div>
                    <div class="col-12 mb-3">
                      <label for="modalCursoDescripcion" class="form-label">Descripción</label>
                      <p id="modalCursoDescripcion"><?= htmlspecialchars($row['descripcion']) ?></p>
                    </div>
                    <div class="col-12 mb-3">
                      <label for="modalCursoDuracion" class="form-label">Duración en Semenas</label>
                      <p id="modalCursoDuracion"><?= htmlspecialchars($row['duracion']) ?></p>
                    </div>
                    <div class="col-12 mb-3">
                      <label for="modalCursoDuracion" class="form-label">Categoria</label>
                      <p id="modalCursoDuracion"><?= htmlspecialchars($row['categoria']) ?></p>
                    </div>
                  </div>
                </div>

                <!-- Verificar si la sesión está iniciada -->
                <?php if (!isset($_SESSION['id_usuario'])): ?>
                  <div class="alert alert-warning" role="alert">
                    <p>Debes iniciar sesión para inscribirte en este curso.</p>
                    <a href="login.php" class="btn btn-warning">Iniciar sesión</a>
                  </div>
                <?php else: ?>
                  <!-- Formulario de Inscripción -->
                  <form method="POST" action="Modulos/CURSOS/RUTAS/inscripcion.php">
                    <input type="hidden" name="id_curso" value="<?= $row['id_curso'] ?>">
                    <input type="hidden" name="id_usuario" value="<?= $_SESSION['id_usuario'] ?>"> 
                    <input type="hidden" name="fecha_inscripcion" value="<?= date('Y-m-d H:i:s') ?>"> 
                  
                    <div class="form-group">
                      <label for="confirmarInscripcion" class="form-label">¿Deseas inscribirte en este curso?</label>
                    </div>
                <?php endif; ?>
              </div>
              <div class="modal-footer">
                <?php if (isset($_SESSION['id_usuario'])): ?>
                  <a href="cursos.php" type="submit" class="btn btn-primary">Inscribirse</a>
                <?php endif; ?>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>

  
    <!------------------------------CERTIFICADOS-------------------------------------->
    <article>
      <div class="row">
        <h2>Certificados acreditados que puedes obtener</h2>
        <div class="col">
          <img
            src="https://certiprof.com/cdn/shop/files/Certiprof_Cybersecurity_Foundation_badge480x480.webp?v=1730904212"
            alt="" class="img-certificado">
        </div>
        <div class="col">
          <img src="https://certiprof.com/cdn/shop/files/Certiprof_Big_Data_badge480x480.webp?v=1730904200" alt=""
            class="img-certificado">
        </div>
        <div class="col">
          <img
            src="https://certiprof.com/cdn/shop/files/Certiprof_Ethical_Hacking_badge_480x480_f2b203a5-13b4-4546-b951-5ab69826fdfb.webp?v=1730904270"
            alt="" class="img-certificado">
        </div>
        <div class="col">
          <img
            src="https://certiprof.com/cdn/shop/files/certiprof_software_project_leader_badge_600x600_480_7b1a4454-fa81-4eb5-9073-70cd2519ddcd.png?v=1730904258"
            alt="" class="img-certificado">
        </div>
      </div>
    </article>

    <div class="container-fluid dinamico">
      <div class="card card-new">
        <div class="content">

          <div class="h6">Enterate de cursos nuevos</div>
          <div class="hover_content">
            <div class="texto-p">
              <p>¡No te pierdas ninguna actualización! Suscríbete con tu correo y sé el primero en descubrir nuestras nuevas
              ofertas, cursos exclusivos y contenido que transformará tu aprendizaje. 🚀</p>
            </div>

          </div>
        </div>
      </div>
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


    <script src="../JS/cursos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"></script>
    <script>
      document.getElementById('searchInput').addEventListener('keyup', function () {
        const filter = this.value.toLowerCase(); // Convierte el texto del buscador a minúsculas
        const cards = document.querySelectorAll('#courseCards .card-container'); // Selecciona las tarjetas
        cards.forEach(card => {
          const title = card.querySelector('.card-title').textContent.toLowerCase(); // Obtiene el texto del título
          card.style.display = title.includes(filter) ? '' : 'none'; // Muestra u oculta la tarjeta según el filtro
        });
      });
    </script>

  
</body>

</html>