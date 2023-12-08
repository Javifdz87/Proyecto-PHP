<?php

namespace App\Models;

use Illuminate\Http\Request;
use app\Models\modeloBD;
use mysqli;
//modelo para la implementacion en la creacion de tareas

class modelProvincias
{
    public function mostrarProvincias()
    {
        $enlace = mysqli_connect("localhost", "root", "", "proyecto_php");
        mysqli_set_charset($enlace, "utf8");
        $rs = mysqli_query($enlace, "SELECT nombre as provincia from tbl_provincias;");

        $provincias = [];

        while ($row = $rs->fetch_assoc()) {
            $provincias[] = $row['provincia'];

        }
        
        mysqli_close($enlace);

        return $provincias;
    }

    public function codigoProvincias($opcion)
    {
        $enlace = mysqli_connect("localhost", "root", "", "proyecto_php");
        mysqli_set_charset($enlace, "utf8");
        $rs = mysqli_query($enlace, "SELECT cod as codigoPos FROM tbl_provincias WHERE nombre= '$opcion';");

        $codigo = [];

        while ($row = $rs->fetch_assoc()) {
            $codigo[] = $row['codigoPos'];

        }
        
        mysqli_close($enlace);

        return $codigo;
    }
}
?>
