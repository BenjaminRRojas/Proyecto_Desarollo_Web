<?php

require_once "MODELOS/foro.php";

class ForoControlador{
    private $modelo;

    //Método Constructor de el Módelo Foro
    public function __CONSTRUCT(){
        $this->modelo=new Foro();
    }

    //Método para Mostrar todos los Foros
    public function Inicio(){
        $foros=new Foro();
        $foros=$this->modelo->Listar();
        require_once "VISTAS/encabezado.php";
        require_once "VISTAS/Foro/foro_vista.php";
        require_once "VISTAS/pie.php";
    }
}