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
  <link rel="stylesheet" href="../CSS/style-cursos.css">
</head>
<body>
    
    <div class="container-fluid">
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