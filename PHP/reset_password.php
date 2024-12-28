<?php
require_once 'Modulos/CORE/conexion.php';

$pdo = Database::getConnection();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $token = $_POST['token'];
    $newPassword = $_POST['password'];

    // Verificar el token en la base de datos
    $stmt = $pdo->prepare("SELECT * FROM password_resets WHERE token = ?");
    $stmt->execute([$token]);
    $resetRequest = $stmt->fetch();

    if (!$resetRequest) {
        die("Token inválido o expirado.");
    }

    // Obtener el email asociado al token
    $email = $resetRequest['email'];

    // Verificar si el correo existe en la base de datos
    $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE correo = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if (!$user) {
        die("Usuario no encontrado.");
    }

    // Encriptar la nueva contraseña
    $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

    // Actualizar la contraseña del usuario
    $stmt = $pdo->prepare("UPDATE usuarios SET contrasena = ? WHERE correo = ?");
    $stmt->execute([$hashedPassword, $email]);

    // Eliminar el token de la base de datos
    $stmt = $pdo->prepare("DELETE FROM password_resets WHERE token = ?");
    $stmt->execute([$token]);

    echo '<div id="mensaje" style="background-color: rgb(48, 26, 123); color: white; padding: 10px; text-align: center; border-radius: 5px; margin-top: 20px;">
    Se ha restablecido con exito la contraseña.
    </div>
    <script>
        setTimeout(function() {
            window.location.href = "index.html"; // Redirige a index.html después de 3 segundos
        }, 3000);
    </script>';
}
?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../CSS/style_form.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>reset_password</title>
</head>
<body>
    <video src="../imagenes/fondo.mp4" autoplay preload muted loop></video>    
</body>
</html>
