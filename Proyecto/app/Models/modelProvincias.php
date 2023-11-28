<?php

namespace App\Models;

use Illuminate\Http\Request;
use app\Models\modeloBD;
use mysqli;

class modelProvincias
{
    protected $table = 'provincias';

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
}
