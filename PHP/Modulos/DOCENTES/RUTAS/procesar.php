<?php
require_once 'C:\xampp\htdocs\Proyecto_Desarollo_Web\PHP\Modulos\DOCENTES\CONTROLADORES\DocentesControlador.php';

$controlador = new UsuariosControlador();

// Determinar la acción a realizar
$accion = $_POST['accion'] ?? $_GET['accion'] ?? '';

if ($accion == 'agregar') {
    $nombres = $_POST['nombres'];
    $apellidos = $_POST['apellidos'];
    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];
    $sexo = $_POST['sexo'];
    $tipo_usuario = $_POST['tipo_usuario'];


    // Variables para los datos del archivo
    $archivo = $_FILES['archivo'];
    $nameFile = $_FILES['archivo']['name'];
    $sizeFile = $_FILES['archivo']['size'];
    $typeFile = $_FILES['archivo']['type'];
    $tempFile = $_FILES['archivo']["tmp_name"];
    $fecha= time();
    $fechaFormato = date("j/n/Y", $fecha);


    // Definir la ruta donde se guardará el archivo
    $rutaDestino = 'C:/xampp/htdocs/Proyecto_Desarollo_Web/media/' . $nameFile;

    // Mover el archivo desde la carpeta temporal a la carpeta media
    if (move_uploaded_file($tempFile, $rutaDestino)) {
        echo "Archivo subido exitosamente.";
    } else {
        echo "Error al subir el archivo.";
    }
    
    // Agregar el usuario y enviar el correo de confirmación
    if ($controlador->agregarUsuario($nombres, $apellidos, $correo, $contrasena, $sexo, $tipo_usuario)) {
        $controlador->enviarCorreoConfirmacion($correo, $nombres, $archivo);
        echo "Registro exitoso. Revisa tu correo.";
    } else {
        echo "Error al registrar el usuario.";
    }

    
} elseif ($accion == 'editar') {
    $controlador->actualizarUsuario($_POST['id'], $_POST['nombres'], $_POST['apellidos'], $_POST['correo'], $_POST['contrasena'], $_POST['sexo'], $_POST['tipo_usuario']);

} elseif ($accion == 'eliminar') {
    $controlador->eliminarUsuario($_GET['id']);
}


header('Location: ../../../formulario.php');
exit();
