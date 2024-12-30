<?php

require_once "MODELOS/comentario.php";

class ComentarioControlador{

    private $modelo;
    public $id_foro;

    //Método Constructor de el Modelo Comentario
    public function __CONSTRUCT(){
        $this->modelo=new Comentario();
    }

    //Método donde se muestran los comentarios a partir de la Id Foro
    public function Inicio(){
        $this->id_foro = $_GET['id'];
        $comentarios=$this->modelo->Listar($this->id_foro);  
        require_once "VISTAS/encabezado.php";
        require_once "VISTAS/Comentario/Comentarios_vista.php";
        require_once "VISTAS/pie.php";
    }

    public function Tabla(){
        $comentarios=$this->modelo->Listar(NULL);
        require_once "VISTAS/encabezadotabla.php";
        require_once "VISTAS/Comentario/Tabla_Comentario.php";
    }

    //Método que recibe los atributos de una respuesta a un comentario y las ingresa
    public function Responder(){
        $usuario=new Comentario();
        if(isset($_POST['id_foro'])){
            $usuario->setid_foro(intval($_POST['id_foro']));
            $usuario->setid_usuario(3);
            $usuario->setcontenido($_POST['contenido']);
            $usuario->setid_responde($_POST['id_comentario']);
            $this->modelo->Agregar_Respuesta($usuario);
        }
        header("Location:?c=foro");
    }

    public function Editar(){
        $titulo = "Agregar";
        $css="../../../CSS/style_form.css";
        $foros=$this->modelo->ListarForos();
        $usuarios=$this->modelo->ListarUsuarios();
        $comentario = new Comentario();
        if(isset($_GET['id'])){
            $comentario = $this->modelo->Obtener($_GET['id']);
            $titulo = "Modificar";
        }

        require_once "VISTAS/encabezado.php";
        require_once "VISTAS/Editarcomentario.php";
        require_once "VISTAS/pie.php";
    }

    public function Guardar(){
        $comentario=new Comentario();
        $comentario->setid_comentario(intval($_POST['id_comentario']));
        $comentario->setid_foro($_POST['id_foro']);
        $comentario->setid_usuario($_POST['id_usuario']);
        $comentario->settitulo($_POST['titulo']);
        $comentario->setcontenido($_POST['contenido']);
        $comentario->setfecha($_POST['fecha_creacion']);
        $comentario->setid_respomde($_POST['id_responde']);
        $comentario->getid_comentario() > 0 ? $this->modelo->Actualizar($comentario) : $this->modelo->Insertar($comentario);

        header("location:?c=comentario&a=Tabla");
    }

    public function Borrar(){
        $this->modelo->Eliminar($_GET["id"]);
        header("location:?c=comentario&a=Tabla");
    }
}