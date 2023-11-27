<?php
namespace App\Models;
use PDO;
class modeloBD
{
    private static $instance;
    private $connection;

    // Evita que se pueda instanciar la clase directamente desde fuera
    private function __construct()
    {
        // Configura tu conexión a la base de datos aquí
        $this->connection = new PDO('mysql:host=localhost;dbname=proyecto_php', 'root', '');
    }

    // Método para obtener la instancia única de la clase
    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new modeloBD();
        }

        return self::$instance;
    }

    // Métodos para interactuar con la conexión a la base de datos
    public function query($sql)
    {
        // Implementa la lógica para ejecutar consultas SQL
        return $this->connection->query($sql);
    }
    public function getConnection()
    {
        return $this->connection;
    }


    // Otros métodos relacionados con la base de datos
}

// Uso del Singleton para obtener la instancia de la base de datos
$database = modeloBD::getInstance();

// Ejemplo de consulta SQL utilizando la instancia de la base de datos
$resultado = $database->query('SELECT * FROM usuarios');
