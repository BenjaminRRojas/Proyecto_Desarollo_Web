<?php

require_once '../CORE/conexion.php';

$con= Database::getConnection();

$id_curso=1;
$id_usuario=1;
$titulo=$_POST['titulo'];
$descripcion=$_POST['descripcion'];

try {
    // Usar una consulta preparada para evitar inyección SQL
    $sql = "INSERT INTO foro (id_curso, id_usuario, titulo, descripcion) VALUES (:curso, :usuario , :titulo, :descripcion)";
    $stmt = $con->prepare($sql);

    // Ejecutar la consulta con los valores capturados
    $stmt->execute([
        ':curso' => $id_curso,
        ':usuario' => $id_usuario,
        ':titulo' => $titulo,
        ':descripcion' => $descripcion,
    ]);

    // Redirigir si la inserción fue exitosa
    Header("Location: ../../PHP/foro.php");
} catch (PDOException $e) {
    // Manejar errores y mostrar el mensaje
    echo "Error al insertar en la base de datos: " . $e->getMessage();
}
?>