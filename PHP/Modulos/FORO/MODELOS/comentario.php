<?php

class Comentario{
    private $pdo;

    private $id_comentario;
    private $id_foro;
    private $id_usuario;
    private $titulo;
    private $contenido;
    private $fecha_comentario;
    private $id_comentario_responde;

    public function __CONSTRUCT(){
        $this->pdo = DataBase::getConnection();
    }

    public function getid_comentario() : ?int{
        return $this->id_comentario;
    }

    public function setid_comentario(int $id){
        $this->id_comentario=$id;
    }

    public function getid_foro() : ?int{
        return $this->id_foro;
    }

    public function setid_foro(int $id){
        $this->id_foro=$id;
    }

    public function getid_usuario() : ?int{
        return $this->id_usuario;
    }

    public function setid_usuario(int $id){
        $this->id_usuario=$id;
    }

    public function gettitulo() : ?string{
        return $this->titulo;
    }

    public function settitulo(string $tit){
        $this->titulo=$tit;
    }

    public function getcontenido() : ?string{
        return $this->contenido;
    }

    public function setcontenido(string $con){
        $this->contenido=$con;
    }

    public function getfecha() : ?string{
        return $this->fecha_comentario;
    }

    public function setfecha(string $fec){
        $this->fecha_comentario=$fec;
    }

    public function getid_responde() : ?string{
        return $this->id_comentario_responde;
    }

    public function setid_responde(string $res){
        $this->id_comentario_responde=$res;
    }

    public function Listar(string $id){
        try{
            $consulta=$this->pdo->prepare("SELECT * FROM comentario WHERE id_foro=$id");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $e){
            die($e->getMessage());
        }
    }
}