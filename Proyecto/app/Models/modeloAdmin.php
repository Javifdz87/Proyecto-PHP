<?php

namespace App\Models;

//en este modelo encontramos, eliminar tareas que lo hace el admin, y ver la tarea que quieres eliminar
class modeloAdmin
{
    
    public function eliminarTarea($id_tarea)
    {
        $enlace = mysqli_connect("localhost", "root", "", "proyecto_php");
        mysqli_set_charset($enlace, "utf8");

        
        $rs = mysqli_query($enlace, "DELETE FROM tareas WHERE id= $id_tarea;");

    
    }
    public function vistaEliminar($id_tarea)
    {
        $enlace = mysqli_connect("localhost", "root", "", "proyecto_php");
        mysqli_set_charset($enlace, "utf8");

        

        $rs = mysqli_query($enlace, "SELECT id, NIF, Nombre, Apellidos, Telefono, Descripcion, email, Poblacion, cod_Postal, Provincia, Estado, Creacion_tarea, Operario, fecha_realizacion, Anotaciones_posteriores 
        FROM tareas
        where id= $id_tarea");

        $tareas = array();
        while ($fila = $rs->fetch_assoc()) {
            $tareas[] = array(
                "id" => $fila["id"],
                "NIF" => $fila["NIF"],
                "Nombre" => $fila["Nombre"],
                "Apellidos" => $fila["Apellidos"],
                "Telefono" => $fila["Telefono"],
                "Descripcion" => $fila["Descripcion"],
                "email" => $fila["email"],
                "Poblacion" => $fila["Poblacion"],
                "cod_Postal" => $fila["cod_Postal"],
                "Provincia" => $fila["Provincia"],
                "Estado" => $fila["Estado"],
                "Creacion_tarea" => $fila["Creacion_tarea"],
                "Operario" => $fila["Operario"],
                "fecha_realizacion" => $fila["fecha_realizacion"],
                "Anotaciones_posteriores" => $fila["Anotaciones_posteriores"],
            );
        }

        mysqli_close($enlace);

        return $tareas;

    }
}
?>
