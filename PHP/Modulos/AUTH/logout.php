<?php
session_start(); 

// Destruir la sesión si se ha solicitado el logout
if (isset($_GET['logout']) && $_GET['logout'] == 'true') {
    session_unset(); // Elimina todas las variables de sesión
    session_destroy(); // Destruye la sesión
    session_start();
    $_SESSION['logout_success'] = "Has cerrado sesión exitosamente.";
    header("Location: ../../index.php"); // Redirige a la pagina de inicio o login
    exit;
}

?>



