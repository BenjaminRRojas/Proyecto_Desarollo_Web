<?php

require_once "MODELOS/modelo_foro.php";

class ForoControlador{
    private $modelo;

    public function __CONSTRUCT(){
        $this->modelo=new Foro();
    }

    public function Inicio(){
        $items=$this->modelo->Listar();
        require_once "VISTAS/encabezado.php";
        require_once "VISTAS/Foro/foro_vista.php";
        require_once "VISTAS/pie.php";
    }
}