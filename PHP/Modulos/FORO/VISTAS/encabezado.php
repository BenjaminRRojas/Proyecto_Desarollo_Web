<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foro</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=VT323&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Pixel+Operator&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <?php if(!empty($css)){
            echo '<link rel="stylesheet" href="' . htmlspecialchars($css) . '">';
        }else{
            echo '<link rel="stylesheet" href="../../../CSS/style_encabezado.css">';
            echo '<link rel="stylesheet" href="../../../CSS/style_form.css">';
        }
    ?>
</head>
<body>
<video src="../../../imagenes/fondo.mp4" autoplay preload muted loop></video>
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg">
                <div class="container-fluid">
                    <a class="navbar-brand ms-3" href="../../index.php">
                        <img src="../../../imagenes/logo.svg" alt="logo" height="125">
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
                                    <a class="nav-link active" aria-current="page" href="../../index.php">Inicio</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" href="../../cursos.php">Cursos</a>
                                </li>

                                <?php if (isset($_SESSION['nombres'])): ?>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle active" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                             <?= htmlspecialchars($_SESSION['nombres']) ?> 
                                        </a>
                                        <ul class="dropdown-menu">
                                            <?php if ($_SESSION['tipo_usuario'] === 'DOCENTE'): ?>
                                                <li><a class="dropdown-item" href="../../docente_dashboard.php">Gestionar Cursos</a></li>
                                            <?php elseif ($_SESSION['tipo_usuario'] === 'ESTUDIANTE'): ?>
                                                <li><a class="dropdown-item" href="../../estudiante_dashboard.php">Cursos Inscritos</a></li>
                                            <?php elseif ($_SESSION['tipo_usuario'] === 'ADMIN'): ?>
                                                <li><a class="dropdown-item" href="dashboard.php">Dashboard</a></li>
                                            <?php endif; ?>
                                            <li><a class="dropdown-item text-danger" href="../../Modulos/AUTH/logout.php?logout=true">Cerrar Sesión</a></li> 
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
        <!-- Login Modal -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Iniciar Sesión</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="p-4 rounded-3 shadow">
                            <form action="../../Modulos/AUTH/login.php" method="POST">
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