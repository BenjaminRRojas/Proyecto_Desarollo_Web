<?php

require_once "../CORE/conexion.php";

//Si no captura nada del navegador, redirecciona al controlador de Inicio (Que sería el foro)
if(!isset($_GET['c'])){
    require_once "CONTROLADORES/foro.controlador.php";
    $controlador = new ForoControlador();
    call_user_func(array($controlador,"Inicio"));
}else{
//Si captura algo del navegador, redirecciona al controlador correspondiente
    $controlador = $_GET['c'];
    require_once "CONTROLADORES/$controlador.controlador.php";
    $controlador = ucwords($controlador)."Controlador";
    $controlador = new $controlador;
    $accion = isset($_GET['a']) ? $_GET['a'] : "Inicio";
    call_user_func(array($controlador,$accion));
}