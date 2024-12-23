<?php

require_once "MODELOS/comentario.php";

class ComentarioControlador{

    private $modelo;

    public function __CONSTRUCT(){
        $this->modelo=new Comentario();
    }

    public function Inicio(){
        if(isset($_GET['id'])){
            $items=$this->modelo->Listar($_GET['id']);
        }
        require_once "VISTAS/encabezado.php";
        require_once "VISTAS/Comentario/Comentarios_vista.php";
        require_once "VISTAS/pie.php";
    }
}