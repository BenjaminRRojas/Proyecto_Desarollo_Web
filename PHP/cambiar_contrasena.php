<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/style_form.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=VT323&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Pixel+Operator&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
</head>
<body>
<video src="../imagenes/fondo.mp4" autoplay preload muted loop></video>    

<div class="container-fluid">

    <div class="container mt-5">
        <h2 class="mb-4">Actualizar Contraseña</h2>

        <form action="change_pass.php" method="POST" id="change-password-form">
            <div class="mb-3">
                Para solicitar contraseña,ingrese su Email:
            </div>

            <div class="mb-3">
                <label for="EMAIL" class="form-label">Email</label>
                <input type="email" class="form-control" name="EMAIL" id="EMAIL" placeholder="EMAIL">
            </div>


            <div class="mb-3 py-3 ">
                <input type="submit" class="btn btn-primary btn-block" value="Enviar Correo">
            </div>
        </form>

    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>


</body>
</html>
