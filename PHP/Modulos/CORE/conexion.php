<?php
class Database {
    private static $connection;

    public static function getConnection() {
        if (!self::$connection) {
            try {
                // Configuración de la conexión
                $host = 'localhost';
                $dbname = 'cursos_online';
                $user = 'root';
                $password = '';

                // Crear una nueva conexión PDO
                self::$connection = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $password);

                // Configurar para Mostrar exepciones
                self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                // Manejar errores de conexión
                die("Error de conexión: " . $e->getMessage());
            }
        }

        return self::$connection;
    }
}