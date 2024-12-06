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
                                <a class="nav-link active" aria-current="page" href="#">Inicio</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="#">Cursos</a>
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
                                    <li><a class="dropdown-item" href="#">Registrarse</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>


        <!-- Formulario -->
        <div class="container my-5 p-5 rounded-3 shadow-lg">
            <h2 class="text-center fw-bold mb-4">Registro</h2>
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="NOMBRES" class="form-label">Nombres</label>
                    <input type="text" class="form-control" id="NOMBRES" name="NOMBRES" required>
                </div>
                <div class="mb-3">
                    <label for="APELLIDOS" class="form-label">Apellidos</label>
                    <input type="text" class="form-control" id="APELLIDOS" name="APELLIDOS" required>
                </div>
                <div class="mb-3">
                    <label for="EMAIL" class="form-label">Email</label>
                    <input type="email" class="form-control" id="EMAIL" name="EMAIL" required>
                </div>
                <div class="mb-3">
                    <label for="CONTRASENA" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" id="CONTRASENA" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Sexo</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="SEXO" id="sexo-hombre" value="Hombre" required>
                        <label class="form-check-label" for="sexo-hombre">Hombre</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="SEXO" id="sexo-mujer" value="Mujer">
                        <label class="form-check-label" for="sexo-mujer">Mujer</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="SEXO" id="sexo-otro" value="Otro">
                        <label class="form-check-label" for="sexo-otro">Otro</label>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Tipo de Usuario</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="TIPO_USUARIO" id="ALUMNO" value="Alumno" required>
                        <label class="form-check-label" for="ALUMNO">Alumno</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="TIPO_USUARIO" id="DOCENTE" value="DOCENTE">
                        <label class="form-check-label" for="DOCENTE">Docente</label>
                    </div>
                </div>
                <div class="mb-3 d-none" id="archivo-docente">
                    <label for="ARCHIVOS" class="form-label">Seleccione los archivos</label>
                    <input type="file" class="form-control" id="ARCHIVOS" name="ARCHIVOS[]" multiple>
                </div>
                <button type="submit" class="btn btn-success w-100">Registrar</button>
            </form>
        </div>

        <script>
            // Mostrar/Ocultar campo de archivo dependiendo del tipo de usuario
            document.querySelectorAll('input[name="TIPO_USUARIO"]').forEach((radio) => {
                radio.addEventListener('change', function () {
                    const archivoDocente = document.getElementById('archivo-docente');
                    if (this.value === 'DOCENTE') {
                        archivoDocente.classList.remove('d-none');
                    } else {
                        archivoDocente.classList.add('d-none');
                    }
                });
            });
        </script>

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
                            <form action="login.php" method="POST">
                                <div class="mb-3">
                                    <label for="EMAIL" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="EMAIL" name="EMAIL" required>
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Contraseña</label>
                                    <input type="password" class="form-control" id="CONTRASENA" name="CONTRASENA" required>
                                </div>
                                <button type="submit" class="btn btn-primary w-100">Iniciar Sesión</button>
                            </form>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="cambiar_contrasena.php" class="btn btn-primary">Cambiar Contraseña</a>
                        <a href="" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</a>
                        <a href="formulario.php" class="btn btn-primary">Registrarse</a>
                    </div>
                </div>
            </div>
        </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
