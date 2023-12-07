<?php

namespace App\Models;

class modeloTareas {
    public function mostrarTareasAdmin() {
        $enlace = mysqli_connect("localhost", "root", "", "proyecto_php");
        mysqli_set_charset($enlace, "utf8");
        $rs = mysqli_query($enlace, "SELECT id, Nombre, Apellidos, Descripcion, email, Estado, Creacion_tarea, Operario, fecha_realizacion 
        FROM tareas");

        $tareas = array();
        while($fila = $rs->fetch_assoc()) {
            $tareas[] = array(
                "id" => $fila["id"],
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

    public function mostrarTareasOperarios() {
        $enlace = mysqli_connect("localhost", "root", "", "proyecto_php");
        mysqli_set_charset($enlace, "utf8");
        $rs = mysqli_query($enlace, "SELECT t.id, t.Nombre, t.Apellidos, t.Descripcion, t.email, t.Estado, t.Creacion_tarea, t.Operario, t.fecha_realizacion 
        FROM usuario u, tareas t
        WHERE u.usuario=t.operario
        AND u.usuario='Juan de Dios'
        AND u.rol=0;");

        $tareas = array();
        while($fila = $rs->fetch_assoc()) {
            $tareas[] = array(
                "id" => $fila["id"],
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

    public function mostrarInformacionTareas($id_tarea) {
        $enlace = mysqli_connect("localhost", "root", "", "proyecto_php");
        mysqli_set_charset($enlace, "utf8");



        $rs = mysqli_query($enlace, "SELECT id, NIF, Nombre, Apellidos, Telefono, Descripcion, email, Poblacion, cod_Postal, Provincia, Estado, Creacion_tarea, Operario, fecha_realizacion, Anotaciones_posteriores 
        FROM tareas
        where id= $id_tarea");

        $tareas = array();
        while($fila = $rs->fetch_assoc()) {
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

    public function insertarTarea($nif, $Nombre, $apellidos, $telefono, $descripcion, $email, $poblacion, $codigo, $provincia, $estado, $creacion, $operario, $realizacion, $anotaciones) {
        $enlace = mysqli_connect("localhost", "root", "", "proyecto_php");
        mysqli_set_charset($enlace, "utf8");

        $insertUsuario = mysqli_query($enlace, "INSERT INTO tareas VALUES ()");

        if($insertUsuario) {
            // Inserción exitosa
            return "success";
        } else {
            // Error en la inserción
            return "incorrect";
        }
    }

}
?>