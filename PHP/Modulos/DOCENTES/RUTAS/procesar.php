<?php
require_once '../CONTROLADORES/DocentesControlador.php';

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

    // Agregar el usuario y enviar el correo de confirmación
    if ($controlador->agregarUsuario($nombres, $apellidos, $correo, $contrasena, $sexo, $tipo_usuario)) {
        $controlador->enviarCorreoConfirmacion($correo, $nombres);
        echo "Registro exitoso. Revisa tu correo.";
    } else {
        echo "Error al registrar el usuario.";
    }


    // Procesar los archivos enviados
    $archivos = $_FILES['ARCHIVOS'] ?? null;
    if ($archivos && !empty($archivos['tmp_name'][0])) {
        foreach ($archivos['tmp_name'] as $key => $tmp_name) {
            if ($archivos['error'][$key] === UPLOAD_ERR_OK) {
                $nombreArchivo = $archivos['name'][$key];
                $tipoArchivo = $archivos['type'][$key]; // Tipo MIME
                $rutaDestino = '../uploads/' . $nombreArchivo;

                // Mover el archivo al servidor
                if (move_uploaded_file($tmp_name, $rutaDestino)) {
                    // Guardar información del archivo en la tabla 'media'
                    $controlador->guardarArchivoEnMedia($nombreArchivo, $rutaDestino, $tipoArchivo);
                }
            }
        }
    }

} elseif ($accion == 'editar') {
    $controlador->actualizarUsuario($_POST['id'], $_POST['nombres'], $_POST['apellidos'], $_POST['correo'], $_POST['contrasena'], $_POST['sexo'], $_POST['tipo_usuario']);

} elseif ($accion == 'eliminar') {
    $controlador->eliminarUsuario($_GET['id']);
}

// Redirigir de vuelta al formulario principal
header('Location: ../VISTAS/ListaDocentes.php');
exit();
