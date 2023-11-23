<?php
namespace  App\Models;
use PDO;
use PDOException;

class Conexion
{
    private static $instance;
    private $connection;

    private function __construct()
    {
        try {
            $dsn = "mysql:host=127.0.0.1;dbname=proyecto_php";
            $options = array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            );
            $this->connection = new PDO($dsn, 'root', '');
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }
    public function getConnection()
    {
        return $this->connection;
    }
}

?>