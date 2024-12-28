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
            $consulta=$this->pdo->prepare("SELECT * FROM foro;");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    //Métodos para el Futuro CRUD

    public function Obtener($id){
        try{
            $consulta=$this->pdo->prepare("SELECT * FROM foro WHERE id_foro=?;");
            $consulta->execute(array($id));
            $fila=$consulta->fetch(PDO::FETCH_OBJ);
            $foro=new Foro();
            $foro->setid_foro($fila->id_foro);
            $foro->setid_curso($fila->id_curso);
            $foro->setid_titulo($fila->titulo);
            $foro->setdescripcion($fila->descripcion);
            $foro->setfecha_creacion($fila->fecha_creacion);

            return $p;

        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function Insertar(Foro $foro){
        try{
            $consulta="INSERT INTO foro(id_curso,titulo,descripcion,fecha_creacion) VALUES (?,?,?,FROM_UNIXTIME(?));";
            $this->pdo->prepare($consulta)
                    ->execute(array(
                        $p->getid_curso(),
                        $p->gettitulo(),
                        $p->getdescripcion(),
                        time(),
                    ));
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function Actualizar(Comentario $p){
        try{
            $consulta="UPDATE comentario SET
                id_curso=?,
                titulo=?,
                descripcion=?,
                fecha_comentario=FROM_UNIXTIME(?),
                WHERE id_comentario=?;
            ";
            $this->pdo->prepare($consulta)
                    ->execute(array(
                        $p->getid_foro(),
                        $p->getid_usuario(),
                        $p->getcontenido(),
                        time(),
                        $p->getid_comentario()
                    ));
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function Eliminar($id){
        try{
            $consulta="DELETE FROM comentario WHERE id_comentario=?;";
            $this->pdo->prepare($consulta)
                    ->execute(array($id));
        }catch(Exception $e){
            die($e->getMessage());
        }
    }
}
