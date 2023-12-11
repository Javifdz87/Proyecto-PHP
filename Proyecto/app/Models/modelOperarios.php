<?php

namespace App\Models;

use Illuminate\Http\Request;
use app\Models\modeloBD;
use mysqli;

// Modelo para la gestión de operarios
class modelOperarios
{
    // Conexión a la base de datos al instanciar el modelo
    private $enlace;

    public function __construct()
    {
        // Establecer la conexión a la base de datos
        $this->enlace = mysqli_connect("localhost", "root", "", "proyecto_php");
        mysqli_set_charset($this->enlace, "utf8");
    }

    // Método para obtener la lista de operarios
    public function mostrarOperarios()
    {
        // Preparar y ejecutar la consulta para obtener operarios
        $stmt = mysqli_prepare($this->enlace, "SELECT usuario as operario FROM usuario WHERE rol = 0");
        mysqli_stmt_execute($stmt);
        $rs = mysqli_stmt_get_result($stmt);

        $operarios = [];

        // Recorrer los resultados y almacenar los nombres de operarios en un array
        while ($row = mysqli_fetch_assoc($rs)) {
            $operarios[] = $row['operario'];
        }

        mysqli_stmt_close($stmt);
        mysqli_close($this->enlace);

        return $operarios;
    }
}
?>
