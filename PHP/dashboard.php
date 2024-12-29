<?php
require_once "Modulos/CORE/conexion.php";

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/style_dash.css">
    <title>Dashboard de Cursos Online</title>
</head>
<body>

    <video src="../imagenes/fondo.mp4" autoplay preload muted loop></video>

    <!-- Menú lateral -->
    <div class="sidebar">
        <h2>Menu</h2>
        <ul>
            <li><a href="#">Inicio</a></li>
            <li><a href="Modulos/CURSOS/VISTAS/ListaCursos.php">Cursos</a></li>
            <li><a href="Modulos/DOCENTES/VISTAS/ListaDocentes.php">Docentes</a></li>
            <li><a href="Modulos/ESTUDIANTES/VISTAS/ListaEstudiantes.php">Estudiantes</a></li>
            <li><a href="Modulos/FORO/foro.php?c=comentario&css=style_cursos_lista.css">Comentario</a></li>
            <li><a href="Modulos/FORO/foro.php?c=foro&css=style_cursos_lista.css">Foro</a></li>
            <li><a href="#">Inscripciones</a></li>
            <li><a href="#">Reportes</a></li>
            <li><a href="#">Configuraciones</a></li>
        </ul>
    </div>

    <!--- Contenido principal --->
    <div class="dashboard-container">
        <h1>Dashboard de Cursos Online</h1>

        <!-- Resumen General -->
        <div class="stats">
            <div class="stat-box">
                <h3>Total de Estudiantes</h3>
            </div>
            <div class="stat-box">
                <h3>Total de Cursos</h3>
            </div>
            <div class="stat-box">
                <h3>Total de Inscripciones</h3>
            </div>
            <div class="stat-box">
                <h3>Estudiantes que Completaron un Curso</h3>
            </div>
        </div>

        <!--Cursos más populares-->
        <h2>Cursos Más Populares</h2>
        <table>
            <thead>
                <tr>
                    <th>Curso</th>
                    <th>Inscripciones</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>

</body>
</html>
