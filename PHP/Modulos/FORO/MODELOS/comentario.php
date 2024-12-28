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

    //Métodos Constructor, Get y Set

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

    //Método para el Inicio
    public function Listar($id){
        try{
            $consulta=$this->pdo->prepare("SELECT * FROM comentario WHERE id_foro=?;");
            $consulta->execute(array($id));
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    //Método para ingresar la Respuesta a un Comentario
    public function Agregar_Respuesta(Comentario $usuario){
        try{
            $consulta="INSERT INTO comentario(id_foro,id_usuario,contenido,fecha_comentario,id_comentario_responde) VALUES(?,?,?,FROM_UNIXTIME(?),?);";
            $this->pdo->prepare($consulta)
                ->execute(array(
                    $usuario->getid_foro(),
                    $usuario->getid_usuario(),
                    $usuario->getcontenido(),
                    time(),
                    $usuario->getid_responde()
                ));
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    //Métodos para el Futuro CRUD

    public function Obtener($id){
        try{
            $consulta=$this->pdo->prepare("SELECT * FROM comentario WHERE id_comentario=?;");
            $consulta->execute(array($id));
            $r=$consulta->fetch(PDO::FETCH_OBJ);
            $comentario=new Comentario();
            $comentario->setid_comentario($r->id_comentario);
            $comentario->setid_foro($r->id_foro);
            $comentario->setid_usuario($r->id_usuario);
            $comentario->settitulo($r->titulo);
            $comentario->setcontenido($r->contenido);
            $comentario->setfecha($r->fecha_comentario);

            return $comentario;

        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function Insertar(Comentario $p){
        try{
            $consulta="INSERT INTO comentario(id_foro,id_usuario,titulo,contenido,fecha_comentario,id_comentario_responde) VALUES (?,?,?,?,FROM_UNIXTIME(?));";
            $this->pdo->prepare($consulta)
                    ->execute(array(
                        $p->getid_foro(),
                        $p->getid_usuario(),
                        $p->gettitulo(),
                        $p->getcontenido(),
                        time(),
                        $p->getid_responde()
                    ));
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function Actualizar(Comentario $p){
        try{
            $consulta="UPDATE comentario SET
                titulo=?,
                contenido=?,
                fecha_comentario=?
                WHERE id_comentario=?;
            ";
            $this->pdo->prepare($consulta)
                    ->execute(array(
                        $p->gettitulo(),
                        $p->getcontenido(),
                        $p->getfecha(),
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