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

    public function getfecha() : ?string{
        return $this->fecha_creacion;
    }

    public function setfecha(string $fec){
        $this->fecha_creacion=$fec;
    }

    //Método para el Inicio
    public function Listar(){
        try{
            $consulta=$this->pdo->prepare("SELECT foro.*, cursos.titulo FROM foro INNER JOIN cursos on foro.id_curso =cursos.id_curso;");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    //Método para los Cursos
    public function ListarCursos(){
        try{
            $consulta=$this->pdo->prepare("SELECT id_curso, titulo from cursos");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    //Métodos CRUD

    public function Obtener($id){
        try{
            $consulta=$this->pdo->prepare("SELECT * FROM foro WHERE id_foro=?;");
            $consulta->execute(array($id));
            $fila=$consulta->fetch(PDO::FETCH_OBJ);
            $foro=new Foro();
            $foro->setid_foro($fila->id_foro);
            $foro->setid_curso($fila->id_curso);
            $foro->settitulo($fila->titulo_foro);
            $foro->setdescripcion($fila->descripcion);
            $foro->setfecha($fila->fecha_creacion);

            return $foro;

        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function Insertar(Foro $foro){
        try{
            $consulta="INSERT INTO foro(id_curso,titulo_foro,descripcion,fecha_creacion) VALUES (?,?,?,?);";
            $this->pdo->prepare($consulta)
                    ->execute(array(
                        $foro->getid_curso(),
                        $foro->gettitulo(),
                        $foro->getdescripcion(),
                        $foro->getfecha(),
                    ));
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function Actualizar(Foro $foro){
        try{
            $consulta="UPDATE foro SET
                id_curso=?,
                titulo_foro=?,
                descripcion=?,
                fecha_creacion=?
                WHERE id_foro=?;
            ";
            $this->pdo->prepare($consulta)
                    ->execute(array(
                        $foro->getid_curso(),
                        $foro->gettitulo(),
                        $foro->getdescripcion(),
                        $foro->getfecha(),
                        $foro->getid_foro()
                    ));
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function Eliminar($id){
        try{
            $consulta="DELETE FROM foro WHERE id_foro=?;";
            $this->pdo->prepare($consulta)
                    ->execute(array($id));
        }catch(Exception $e){
            die($e->getMessage());
        }
    }
}
