<?php

require_once "MODELOS/comentario.php";

class ComentarioControlador{

    private $modelo;
    private $id_foro;

    //Método Constructor de el Modelo Comentario
    public function __CONSTRUCT(){
        $this->modelo=new Comentario();
    }

    //Método donde se muestran los comentarios a partir de la Id Foro
    public function Inicio(){
        require_once "VISTAS/encabezado.php";

        // Verifica si se recibieron parámetros en el GET
        $css = isset($_GET['css']);
        $this->id_foro = isset($_GET['id']) ? htmlspecialchars($_GET['id']) : null;

        // Si se recibe un ID Foro se va a los comentarios, en cambio se va al panel
        $this->id_foro > 0 ? $comentarios=$this->modelo->Listar($this->id_foro) : $comentarios=$this->modelo->Listar(1);
            if ($this->id_foro) {
                require_once "VISTAS/Comentario/Comentarios_vista.php";
            }else if ($css) {
                require_once "VISTAS/Comentario/Tabla_Comentario.php";
            }
            require_once "VISTAS/pie.php";
    }

    //Método que recibe los atributos de una respuesta a un comentario y las ingresa
    public function Responder(){
        $usuario=new Comentario();
        $usuario->setid_foro($_POST['id_foro']);
        $usuario->setid_usuario(3);
        $usuario->setcontenido($_POST['contenido']);
        $usuario->setid_responde($_POST['id_comentario']);
        $this->modelo->Agregar_Respuesta($usuario);

        header("Location:?c=foro");
    }

    public function Editar(){
        $titulo = "Agregar";
        $css="../../../CSS/style_form.css";
        $usuario = new Comentario();
        if(isset($_GET['id'])){
            $usuario = $this->modelo->Obtener($_GET['id']);
            $titulo = "Modificar";
        }
        
        require_once "VISTAS/encabezado.php";
        require_once "VISTAS/Editar.php";
        require_once "VISTAS/pie.php";
    }

    public function Guardar(){
        $comentario=new Comentario();
        $comentario->setid_comentario(intval($_POST['id_comentario']));
        $comentario->settitulo($_POST['titulo']);
        $comentario->setcontenido($_POST['contenido']);
        $comentario->getid_comentario() > 0 ? $this->modelo->Actualizar($comentario) : $this->modelo->Insertar($comentario);

        header("location:?c=foro");
    }

    public function Borrar(){
        $this->modelo->Eliminar($_GET["id"]);
        header("location:?c=foro");
    }
}