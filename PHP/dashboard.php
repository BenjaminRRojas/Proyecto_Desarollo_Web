<?php

include("modulos CRUD/conexion.php");

?>

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/style_dash.css">
    <title>Dashboard de Cursos Online</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<video src="../imagenes/fondo.mp4" autoplay preload muted loop></video> 
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

        <!--Cursos mas populares ( con mas usuarios)-->
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

<?php
$conexion->close();
?>