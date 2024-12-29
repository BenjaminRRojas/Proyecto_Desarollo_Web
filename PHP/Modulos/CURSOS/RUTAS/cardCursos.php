<?php
require_once '../CONTROLADORES/CursosControlador.php';

$controlador = new CursosControlador();
$cursos = $controlador->listarCursos();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css2?family=VT323&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Pixel+Operator&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../../../../CSS/style-cursos.css">
</head>
<body>
  <video src="../../../../imagenes/fondo.mp4" autoplay preload muted loop></video>

  <div class="container-fluid">

  <!------------------------------NAV-------------------------------------->
    <nav class="navbar navbar-expand-lg">
      <div class="container-fluid">

        <a class="navbar-brand ms-3" href="#">
          <img src="../../../../imagenes/logo.svg" alt="logo" height="125">
        </a>


        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
          aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="d-none d-lg-block text-center ms-5">
          <h1 class="navbar-title">Aprende a programar desde cero hasta el infinito</h1>
        </div>


        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
          <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menú</h5>
            <button type="button" class="btn-close bg-light" data-bs-dismiss="offcanvas" aria-label="Close"></button>
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
                <a class="nav-link dropdown-toggle active" href="#" role="button" data-bs-toggle="dropdown"
                  aria-expanded="false">Perfil</a>
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

      <!----------------------------------------------------MODAL------------------------------------------------------------------>
      <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
                                <input type="password" class="form-control" id="CONTRASENA" name="CONTRASENA" required>
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

    <!------------------------------CARUSEL-------------------------------------->
    <div class="carusel">
      <div id="carouselExampleCaptions" class="carousel slide">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
            aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
            aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
            aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="../../../../imagenes/banner.webp" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>First slide label</h5>
              <p>Some representative placeholder content for the first slide.</p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="..." class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>Second slide label</h5>
              <p>Some representative placeholder content for the second slide.</p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="..." class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>Third slide label</h5>
              <p>Some representative placeholder content for the third slide.</p>
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




        <div class="card text-center">
            <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" href="#" data-target="todos">Todos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-target="ciberseguridad">sql</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-target="desarrollo-web">html</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-target="ciencia-datos">C#</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-target="ia">python</a>
                    </li>
                    <li class="nav-item ">
                      <!-- Botón Editar -->
                      <a href="modelos/CURSOS/VISTAS/ListaCursos.php" 
                        id="boton-editar" 
                        class="btn btn-primary d-flex align-items-center d-none">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-arrow-up me-2" viewBox="0 0 16 16">
                          <path d="M8.5 11.5a.5.5 0 0 1-1 0V7.707L6.354 8.854a.5.5 0 1 1-.708-.708l2-2a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1-.708.708L8.5 7.707z"/>
                          <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2M9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5z"/>
                        </svg>
                        Editar
                      </a>

                      <!-- Script para mostrar/ocultar el botón -->
                      <script>
                          // Lógica para mostrar el botón de "Editar" si el tipo de usuario es "DOCENTE"
                          document.querySelectorAll('input[name="tipo_usuario"]').forEach((radio) => {
                              radio.addEventListener('change', function () {
                                  const botonEditar = document.getElementById('boton-editar');
                                  botonEditar.classList.toggle('d-none', this.value !== 'DOCENTE');
                              });
                          });
                      </script>
                    </li>
                    <li class="nav-item ms-auto">
                      <div class="d-flex">
                        <input type="text" id="searchInput" class="form-control" placeholder="Buscar titulo o id">
                      </div>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <div class="bloque todos activo">
                    <!-- Tarjetas de todos los cursos -->
                    <div class="row">
                        <?php foreach($cursos as $row) {?>
                            <div class="col">
                                <div class="card" style="width: 18rem;">
                                    <?php 
                                    $id = $row['id_curso'];
                                    ?>
                                    <img src="../imagenes/Cursos_card3.webp" class="card-img-top" alt="...">
                                    <div class="card-body-curso">
                                        <h5 class="card-title"><?php echo $row['titulo']?></h5>
                                        <p class="card-text">Aprende a identificar, prevenir y mitigar amenazas en el ciberespacio...</p>
                                    </div>
                                    <div class="card-footer-curso">
                                    
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    

</body>
</html>