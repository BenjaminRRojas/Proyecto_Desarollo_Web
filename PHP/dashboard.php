<?php
session_start();

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
            <li><a href="Modulos/EVALUACIONES/VISTAS/ListaEvaluaciones.php">Evaluaciones</a></li>
            <li><a href="Modulos/DOCENTES/VISTAS/ListaDocentes.php">Docentes</a></li>
            <li><a href="Modulos/ESTUDIANTES/VISTAS/ListaEstudiantes.php">Estudiantes</a></li>
            <li><a href="Modulos/FORO/foro.php?c=comentario&a=Tabla">Comentario</a></li>
            <li><a href="Modulos/FORO/foro.php?c=foro&a=Tabla">Foro</a></li>
        </ul>
    </div>

</body>
</html>
