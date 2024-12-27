<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';

$mail = new PHPMailer(true);

// Obtener el correo electrónico del formulario
$email = $_POST['EMAIL'];

// Generar un token único
$token = bin2hex(random_bytes(50));

// Verificar si el correo está registrado en la base de datos
require_once 'Modulos/CORE/conexion.php';
$pdo = Database::getConnection();
$stmt = $pdo->prepare("SELECT id_usuario FROM usuarios WHERE correo = ?");
$stmt->execute([$email]);
$user = $stmt->fetch();

if (!$user) {
    die("El correo no está registrado.");
}

// Insertar el token en la tabla password_resets
$stmt = $pdo->prepare("INSERT INTO password_resets (email, token) VALUES (?, ?)");
$stmt->execute([$email, $token]);

// Crear el enlace de recuperación
$resetLink = "http://localhost/proyecto_desarollo_web/PHP/reset_password.html?token=" . $token;

try {
    // Configuración del servidor SMTP
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'codetitans123@gmail.com';
    $mail->Password = 'cfza spsm geeg vdhg';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port = 465;

    // Configuración del correo
    $mail->setFrom('codetitans123@gmail.com', 'Code Titans');
    $mail->addAddress($email);

    $mail->isHTML(true);
    $mail->Subject = 'Recuperación de contraseña';
    $mail->Body = 'Haz clic en este enlace para restablecer tu contraseña: <a href="' . $resetLink . '">Restablecer Contraseña</a>';

    $mail->send();
    echo 'Correo enviado correctamente';
} catch (Exception $e) {
    echo "Error al enviar el correo: {$mail->ErrorInfo}";
}
?>
