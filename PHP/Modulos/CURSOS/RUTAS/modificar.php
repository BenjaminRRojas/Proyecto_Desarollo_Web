<?php
require_once '../CONTROLADORES/CursosControlador.php';

//Verifica si se paso el id por get
if (isset($_GET['id'])){
    $id = $_GET['id'];

    $controlador = new CursosControlador();
    
}