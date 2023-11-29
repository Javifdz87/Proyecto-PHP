<?php

namespace App\Models;

class modeloTareas
{
    protected $table = 'tareas';

    public function mostrarTareas()
    {
        $enlace = mysqli_connect("localhost", "root", "", "proyecto_php");
        mysqli_set_charset($enlace, "utf8");
        $rs = mysqli_query($enlace, "SELECT Nombre, Apellidos, Descripcion, email, Estado, Creacion_tarea, Operario, fecha_realizacion 
        FROM tareas");

        $tareas = array();
        while ($fila = $rs->fetch_assoc()) {
            $tareas[] = array(
                "Nombre" => $fila["Nombre"],
                "Apellidos" => $fila["Apellidos"],
                "Descripcion" => $fila["Descripcion"],
                "email" => $fila["email"],
                "Estado" => $fila["Estado"],
                "Creacion_tarea" => $fila["Creacion_tarea"],
                "Operario" => $fila["Operario"],
                "fecha_realizacion" => $fila["fecha_realizacion"],
            );
        }

        mysqli_close($enlace);

        return $tareas;
    }
}
