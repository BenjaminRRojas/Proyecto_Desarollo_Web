<?php

class Foro{
    private $pdo;

    private $id_foro;
    private $id_curso;
    private $titulo;
    private $descripcion;
    private $fecha_creacion;

    //Métodos Constructor, Get y Set

    public function __CONSTRUCT(){
        $this->pdo = DataBase::getConnection();
    }

    public function getid_foro() : ?int{
        return $this->id_foro;
    }

    public function setid_foro(int $id){
        $this->id_foro=$id;
    }

    public function getid_curso() : ?int{
        return $this->id_curso;
    }

    public function setid_curso(int $id){
        $this->id_curso=$id;
    }

    public function gettitulo() : ?string{
        return $this->titulo;
    }

    public function settitulo(string $tit){
        $this->titulo=$tit;
    }

    public function getdescripcion() : ?string{
        return $this->descripcion;
    }

    public function setdescripcion(string $des){
        $this->descripcion=$des;
    }

    public function getfecha_creacion() : ?string{
        return $this->fecha_creacion;
    }

    public function setfecha_creacion(string $fec){
        $this->fecha_creacion=$fec;
    }

    //Método para el Inicio
    public function Listar(){
        try{
            $consulta=$this->pdo->prepare("SELECT * FROM foro");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $e){
            die($e->getMessage());
        }
    }
}