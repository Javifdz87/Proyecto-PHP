<?php

namespace App\Models;

use Illuminate\Http\Request;
use app\Models\modeloBD;
use mysqli;

// Modelo para la gestión de provincias
class modelProvincias
{
    // Conexión a la base de datos al instanciar el modelo
    private $enlace;

    public function __construct()
    {
        // Establecer la conexión a la base de datos
        $this->enlace = mysqli_connect("localhost", "root", "", "proyecto_php");
        mysqli_set_charset($this->enlace, "utf8");
    }

    // Método para obtener la lista de provincias
    public function mostrarProvincias()
    {
        // Preparar y ejecutar la consulta para obtener la lista de provincias
        $stmt = mysqli_prepare($this->enlace, "SELECT nombre as provincia FROM tbl_provincias");
        mysqli_stmt_execute($stmt);
        $rs = mysqli_stmt_get_result($stmt);

        $provincias = [];

        // Recorrer los resultados y almacenarlos en un array asociativo
        while ($row = mysqli_fetch_assoc($rs)) {
            $provincias[] = $row['provincia'];
        }

        mysqli_stmt_close($stmt);
        mysqli_close($this->enlace);

        return $provincias;
    }

    // Método para obtener el código de una provincia específica
    public function codigoProvincias($opcion)
    {
        // Preparar y ejecutar la consulta para obtener el código de una provincia específica
        $stmt = mysqli_prepare($this->enlace, "SELECT cod as codigoPos FROM tbl_provincias WHERE nombre = ?");
        mysqli_stmt_bind_param($stmt, "s", $opcion);
        mysqli_stmt_execute($stmt);
        $rs = mysqli_stmt_get_result($stmt);

        $codigo = [];

        // Recorrer los resultados y almacenarlos en un array asociativo
        while ($row = mysqli_fetch_assoc($rs)) {
            $codigo[] = $row['codigoPos'];
        }

        mysqli_stmt_close($stmt);
        mysqli_close($this->enlace);

        return $codigo;
    }
}
?>
