<?php
require_once '../MODELOS/DocentesModelo.php';

class UsuariosControlador {
    private $modelo;

    public function __construct() {
        $this->modelo = new UsuariosModelo();
    }

    // Mostrar la lista de docentes
    public function listarUsuarios() {
        return $this->modelo->obtenerTodos();
    }

    // Mostrar el formulario para agregar un nuevo docente
    public function formularioAgregar() {
        include '../VISTAS/formulario.php';
    }

    // Agregar un nuevo docente
    public function agregarUsuario($nombres, $apellidos, $correo, $contrasena, $sexo, $tipo_usuario) {
        return $this->modelo->insertar($nombres, $apellidos, $correo, $contrasena, $sexo, $tipo_usuario);
    }

    // Mostrar los detalles del docente
    public function verUsuario($id) {
        return $this->modelo->obtenerPorId($id);
    }

    // Mostrar el formulario para editar un docente
    public function formularioEditar($id) {
        $usuario = $this->modelo->obtenerPorId($id);
        include '../VISTAS/formulario.php';
    }

    // Actualizar un docente
    public function actualizarUsuario($id, $nombres, $apellidos, $correo, $contrasena, $sexo, $tipo_usuario) {
        return $this->modelo->actualizar($id, $nombres, $apellidos, $correo, $contrasena, $sexo, $tipo_usuario);
    }

    // Eliminar un docente
    public function eliminarUsuario($id) {
        return $this->modelo->eliminar($id);
    }


    public function guardarArchivoEnMedia($nombreArchivo, $ubicacionArchivo, $tipoArchivo) {
        $sql = "INSERT INTO media (nombre_archivo, ubicacion_archivo, tipo_archivo) VALUES (?, ?, ?)";
        $stmt->bind_param('sss', $nombreArchivo, $ubicacionArchivo, $tipoArchivo);
        $stmt->execute();
        $stmt->close();
    }


    //Enviar Correo
    public function enviarCorreoConfirmacion($correo, $nombres, $archivo) {
        require __DIR__ . '/../../../../vendor/autoload.php';
        $mail = new PHPMailer\PHPMailer\PHPMailer(true);
    
        try {

            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'codetitans123@gmail.com';
            $mail->Password = 'cfza spsm geeg vdhg';  
            $mail->SMTPSecure = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port = 465;
    
            $mail->setFrom('codetitans123@gmail.com', 'CodeTitans Titans');
            $mail->addAddress($correo, $nombres);

    
            $mail->isHTML(true);
            $mail->Subject = 'Gracias por Registrarte!!!';
            $mail->Body = "
                <h1>Hola, $nombres</h1>
                <p>Gracias por registrarte.</p>";
                
            
            $mail->AddAttachment($archivo['tmp_name'], $archivo['name']);


            $mail->SMTPDebug = 2; 
            $mail->send();
            return true;
        } catch (Exception $e) {
            error_log('Error al enviar el correo: ' . $mail->ErrorInfo);
            return false;
        }
    }
}
?>

