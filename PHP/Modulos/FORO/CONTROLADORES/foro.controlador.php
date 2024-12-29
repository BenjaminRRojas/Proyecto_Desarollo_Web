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
        require_once "VISTAS/encabezado.php";
        $css = isset($_GET['css']);
        $foros=new Foro();
        $foros=$this->modelo->Listar();
        
        $css != NULL ? require_once "VISTAS/Foro/Tabla_Foro.php" : require_once "VISTAS/Foro/foro_vista.php";

        require_once "VISTAS/pie.php";
    }

    //Método para cambiar la vista si tiene id o no
    public function Editar(){
        $titulo = "Agregar";
        $css="../../../CSS/style_form.css";
        $usuario = new Foro();
        if(isset($_GET['id'])){
            $usuario = $this->modelo->Obtener($_GET['id']);
            $titulo = "Modificar";
        }else{
            require_once "../CURSOS2/CONTROLADORES/CursosControlador.php";
            $controlador = new CursoControlador();
            $cursos = $controlador->listarCursos();
        }

        require_once "VISTAS/encabezado.php";
        require_once "VISTAS/Editarforo.php";
        require_once "VISTAS/pie.php";
    }

    //Método para Agregar o Actualizar un Foro
    public function Guardar(){
        $foro=new Foro();
        $foro->setid_foro(intval($_POST['id_foro']));
        $foro->setid_curso($_POST['id_curso']);
        $foro->settitulo($_POST['titulo']);
        $foro->setdescripcion($_POST['descripcion']);
        $foro->getid_foro() > 0 ? $this->modelo->Actualizar($foro) : $this->modelo->Insertar($foro);

        header("location:?c=foro&css=style-listadocentes.css");
    }

    public function Borrar(){
        $this->modelo->Eliminar($_GET["id"]);
        header("location:?c=foro&css=style-listadocentes.css");
    }
}

?>