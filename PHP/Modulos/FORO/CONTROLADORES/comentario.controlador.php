<?php

require_once "MODELOS/comentario.php";

class ComentarioControlador{

    private $modelo;

    //Método Constructor de el Modelo Comentario
    public function __CONSTRUCT(){
        $this->modelo=new Comentario();
    }

    //Método donde se muestran los comentarios a partir de la Id Foro
    public function Inicio(){
        if(isset($_GET['id'])){
            $comentarios=$this->modelo->Listar($_GET['id']);
            $id_foro=htmlspecialchars($_GET['id']);
        }
        require_once "VISTAS/encabezado.php";
        require_once "VISTAS/Comentario/Comentarios_vista.php";
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
}