<?php
session_start();
require_once '../CORE/conexion.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $correo = $_POST['EMAIL']; 
    $contrasena = $_POST['CONTRASENA']; 

    try {
        // Obtén la conexión a través de la clase Database
        $pdo = Database::getConnection();

        // Prepara y ejecuta la consulta
        $query = $pdo->prepare('SELECT id_usuario,nombres,apellidos,correo,contrasena,sexo, tipo_usuario, contrasena FROM usuarios WHERE correo = :correo');
        
        // Asegúrate de pasar los parámetros correctamente
        $query->bindParam(':correo', $correo, PDO::PARAM_STR);

        // Ejecutar la consulta
        $query->execute();

        // Recupera el usuario
        $user = $query->fetch(PDO::FETCH_ASSOC);
        //PASSWORD  VERIFY PARA COMPARAR CON LA CONTRA HASHEADA SINO NO FUNCA ESTUVE 2 HORAS VIENDO ESTO OJO!!!!!!!
        if ($user && password_verify($contrasena, $user['contrasena'])) {
            // Contraseña correcta, configura la sesión según el usuario encontrado
            $_SESSION['id_usuario'] = $user['id_usuario'];
            $_SESSION['tipo_usuario'] = $user['tipo_usuario'];
            $_SESSION['nombres'] = $user['nombres'];
            $_SESSION['apellidos'] = $user['apellidos'];
            $_SESSION['corre'] = $user['correo'];
            $_SESSION['sexo'] = $user['sexo'];

            $_SESSION['login_success'] = "¡Inicio de sesión exitoso!";

            // Redirige al usuario según su tipo
            if ($user['tipo_usuario'] === 'DOCENTE') {
                header('Location: ../../docente_dashboard.php');
            } else if ($user['tipo_usuario'] === 'ESTUDIANTE') {
                header('Location: ../../estudiante_dashboard.php');
            }
            exit;
        } else {
            $error = "Correo o contraseña incorrectos.";
        }
    } catch (PDOException $e) {
        // Maneja errores de la base de datos
        die("Error: " . $e->getMessage());
    }
}
?>