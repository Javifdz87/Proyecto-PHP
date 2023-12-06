<?php

namespace App\Models;

use Illuminate\Http\Request;
use app\Models\modeloBD;
use mysqli;

class modelOperarios
{
    protected $table = 'operarios';

    public function mostrarOperarios()
    {
        $enlace = mysqli_connect("localhost", "root", "", "proyecto_php");
        mysqli_set_charset($enlace, "utf8");
        $rs = mysqli_query($enlace, "SELECT usuario as operario from usuario WHERE rol= 0;");

        $operarios = [];

        while ($row = $rs->fetch_assoc()) {
            $operarios[] = $row['operario'];

        }
        
        mysqli_close($enlace);

        return $operarios;
    }
}
