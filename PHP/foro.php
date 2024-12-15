<?php
    include 'Modulos/CORE/conexion.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foro</title>
    <link rel="stylesheet" href="../CSS/style_foro.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
    <form class="d-flex align-items-center flex-column mt-5" action="Modulos/FORO/insert.php" method="POST">
        <div class="mb-2 text-center">
            <input type="text" required  size="50" placeholder="Título" name="titulo">
        </div>
        <div class="mb-2 text-center">
            <input type="text" required  size="50" placeholder="Descripción" name="descripcion">
        </div>
        <div class="mb-2 text-center">
            <input type="submit">
        </div>
    </form>
</body>
</html>