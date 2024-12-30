<?php
require_once 'C:\xampp\htdocs\Proyecto_Desarollo_Web\PHP\Modulos\CORE\conexion.php';

class EvaluacionesModelo {
    private $db;
    
    public function __construct(){
        $this->db = DataBase::getConnection();
    }

    // Obtener todas las evaluaciones
    public function obtenerTodos() { 
        $query = $this->db->query("SELECT evaluaciones.id_evaluacion, 
               evaluaciones.titulo, 
               evaluaciones.descripcion, 
               evaluaciones.fecha_creacion, 
               evaluaciones.fecha_limite, 
               cursos.titulo AS curso_titulo
        FROM evaluaciones
        JOIN cursos ON evaluaciones.id_curso = cursos.id_curso");
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    // Obtener una evaluación por ID de la evaluación
    public function obtenerPorIdEvaluacion($id_evaluacion) {
        $query = $this->db->prepare("SELECT * FROM evaluaciones WHERE id_evaluacion = ?");
        $query->execute([$id_evaluacion]);
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    // Obtener todas las evaluaciones por ID del curso
    public function obtenerPorIdCurso($id_curso) {
        $query = $this->db->prepare("SELECT * FROM evaluaciones WHERE id_curso = ?");
        $query->execute([$id_curso]);
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    // Insertar una nueva evaluación
    public function insertar($titulo, $descripcion, $fecha_limite, $id_curso) {
        $query = $this->db->prepare("INSERT INTO evaluaciones (titulo, descripcion, fecha_limite, id_curso) VALUES (?, ?, ?, ?)");
        $query->execute([$titulo, $descripcion, $fecha_limite, $id_curso]);
        return $this->db->lastInsertId(); // Devuelve el ID de la evaluación insertada
    }

    // Insertar una pregunta
    public function insertarPregunta($enunciado, $id_evaluacion) {
        $query = $this->db->prepare("INSERT INTO preguntas (enunciado, id_evaluacion) VALUES (?, ?)");
        $query->execute([$enunciado, $id_evaluacion]);
        return $this->db->lastInsertId(); // Devuelve el ID de la pregunta insertada
    }

    // Insertar una respuesta
    public function insertarRespuesta($texto_respuesta, $es_correcta, $id_pregunta) {
        $query = $this->db->prepare("INSERT INTO respuestas (texto_respuesta, es_correcta, id_pregunta) VALUES (?, ?, ?)");
        $query->execute([$texto_respuesta, $es_correcta, $id_pregunta]);
    }

    // Actualizar una evaluación
    public function actualizar($id_evaluacion, $titulo, $descripcion, $fecha_limite, $id_curso) {
        $query = $this->db->prepare("UPDATE evaluaciones SET titulo = ?, descripcion = ?, fecha_limite = ?, id_curso = ? WHERE id_evaluacion = ?");
        return $query->execute([$titulo, $descripcion, $fecha_limite, $id_curso, $id_evaluacion]);
    }

    // Eliminar una evaluación
    public function eliminar($id_evaluacion) {
        $query = $this->db->prepare("DELETE FROM evaluaciones WHERE id_evaluacion = ?");
        return $query->execute([$id_evaluacion]);
    }

    // Obtener las preguntas relacionadas a una evaluación por ID de le evaluación
    public function obtenerPreguntas($id_evaluacion) {
        $query = "SELECT * FROM preguntas WHERE id_evaluacion = :id_evaluacion";
        $stmt = $this->db->prepare($query); 
        $stmt->bindParam(':id_evaluacion', $id_evaluacion, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Obtener las respuestas relacionadas a una pregunta por ID de la pregunta
    public function obtenerRespuestas($id_pregunta) {

        $query = "SELECT * FROM respuestas WHERE id_pregunta = :id_pregunta";
        $stmt = $this->db->prepare($query); // Usar la conexión correcta

        $stmt->bindParam(':id_pregunta', $id_pregunta, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Obtener tanto las preguntas como las respuestas de las preguntas de una evaluación
    public function obtenerPreguntasYRespuestas($id_evaluacion) {
        // Obtener las preguntas
        $preguntas = $this->obtenerPreguntas($id_evaluacion);
        
        $preguntas_respuestas = [];
        foreach ($preguntas as $pregunta) {
            // Obtener las respuestas de cada pregunta
            $respuestas = $this->obtenerRespuestas($pregunta['id_pregunta']);
            $preguntas_respuestas[$pregunta['id_pregunta']] = [
                'enunciado' => $pregunta['enunciado'],
                'respuestas' => $respuestas
            ];
        }
        return $preguntas_respuestas;
    }

    // Insertar un resultado
    public function insertarResultado($id_estudiante, $id_evaluacion, $nota) {
        $query = $this->db->prepare("INSERT INTO resultados (id_estudiante, id_evaluacion, nota) VALUES (?, ?, ?)");
        return $query->execute([$id_estudiante, $id_evaluacion, $nota]);
    }

    // Obtener las respuestas correctas de una evaluación
    public function obtenerRespuestasCorrectas($id_evaluacion) {
        $sql = "SELECT r.id_respuesta, r.es_correcta 
                FROM respuestas r
                JOIN preguntas p ON r.id_pregunta = p.id_pregunta
                WHERE p.id_evaluacion = ?";
        
        $stmt = $this->conexion->prepare($sql);
        $stmt->bind_param('i', $id_evaluacion);
        $stmt->execute();
        $resultado = $stmt->get_result();
        
        $respuestas = [];
        while ($row = $resultado->fetch_assoc()) {
            $respuestas[] = $row;
        }
        // Retorna las respuestas correctas
        return $respuestas;
    }

    // Calcular el puntaje de la evaluación
    public function calcularPuntaje($respuestas_seleccionadas, $id_evaluacion) {
        $respuestas_correctas = $this->obtenerRespuestasCorrectas($id_evaluacion);
        $puntaje = 0;

        foreach ($respuestas_seleccionadas as $id_respuesta) {
            foreach ($respuestas_correctas as $respuesta) {
                if ($id_respuesta == $respuesta['id_respuesta'] && $respuesta['es_correcta'] == 1) {
                    $puntaje++; // Si la respuesta es correcta, el contador de puntaje aumenta en 1
                }
            }
        }

        return $puntaje;
    }

    public function esRespuestaCorrecta($id_respuesta) {
        $consulta = "SELECT es_correcta FROM respuestas WHERE id_respuesta = ?";
        $stmt = $this->db->prepare($consulta);
        $stmt->execute([$id_respuesta]);
        $respuesta = $stmt->fetch(PDO::FETCH_ASSOC);
    
        if ($respuesta) {
            return $respuesta['es_correcta'] == 1; 
        }
        return false; 
    }


    public function verificarEvaluacionRendida($id_estudiante, $id_evaluacion) {
        // Conexión a la base de datos (asegúrate de tenerla configurada correctamente)
        global $db;  // Si usas una variable global para la conexión, o usa tu método de conexión

        // Preparar la consulta
        $query = $this->db->prepare("SELECT COUNT(*) FROM resultados WHERE id_estudiante = ? AND id_evaluacion = ?");
        $query->execute([$id_estudiante, $id_evaluacion]);
        $resultado = $query->fetchColumn();

        // Retorna verdadero si ya existe un resultado
        return $resultado > 0;
    }
        

}
?>  