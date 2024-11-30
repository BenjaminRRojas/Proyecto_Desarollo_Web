<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/style_form.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Formulario</title>
</head>
<body>

    <!--navbar-->
    <nav class="navbar navbar-expand-lg bg-dark">
        <div class="container-fluid bg-dark">
            <a class="navbar-brand text-bg-dark" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active text-bg-dark" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-bg-dark" href="#">Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-bg-dark" href="#">Pricing</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled text-bg-dark" aria-disabled="true">Disabled</a>
                    </li>
                    <li class="nav-item d-flex align-items-center">
                        <a class="nav-link disabled text-bg-dark me-2" aria-disabled="true"></a>
                        <button type="button" class="btn btn-primary fw-bold" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                        Login
                        </button>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!--Formulario -->
    <div class="container my-5">
        <div class="bg-white p-5 rounded-3 shadow-lg">
            <h2 class="text-center text-success fw-bold mb-4">Formulario de Registro</h2>
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

                <!-- Campo de selección de archivos -->
                <div class="mb-3 d-none" id="archivo-docente">
                    <label for="ARCHIVOS" class="form-label">Seleccione los archivos</label>
                    <input type="file" class="form-control" id="ARCHIVOS" name="ARCHIVOS[]" multiple>
                </div>

                <button type="submit" class="btn btn-success w-100">Registrar</button>
            </form>
        </div>
    </div>

    <script>
    // Mostrar/Ocultar campo de archivo dependiendo del tipo de usuario
    document.querySelectorAll('input[name="TIPO_USUARIO"]').forEach((radio) => {
            radio.addEventListener('change', function () {//Activa la funcion 
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
                    <div class="container my-5">
                        <div class="bg-white p-5 rounded-3 shadow-lg">
                            <h2 class="text-center text-success fw-bold mb-4">Iniciar Sesión</h2>
                            <form action="login.php" method="POST">
                                <div class="mb-3">
                                    <label for="EMAIL" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="EMAIL" name="EMAIL" required>
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Contraseña</label>
                                    <input type="password" class="form-control" id="CONTRASENA" name="CONTRASENA" required>
                                </div>
                                <button type="submit" class="btn btn-success w-100">Iniciar Sesión</button>
                            </form>
                        </div>
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