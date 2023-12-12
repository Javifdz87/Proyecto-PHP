<?php

namespace App\Models;

// Modelo para la gestión de tareas
class modeloTareas {
    // Conexión a la base de datos al instanciar el modelo
    private $enlace;

    public function __construct()
{
    // Establecer la conexión a la base de datos
    $this->enlace = mysqli_connect("localhost", "root", "", "proyecto_php");

    if (!$this->enlace) {
        die("Error en la conexión: " . mysqli_connect_error());
    }

    mysqli_set_charset($this->enlace, "utf8");
}


    // Método para obtener todas las tareas para administradores
    public function mostrarTareasAdmin() {
        // Preparar y ejecutar la consulta para obtener todas las tareas
        $stmt = mysqli_prepare($this->enlace, "SELECT id, Nombre, Apellidos, Descripcion, email, Estado, Creacion_tarea, Operario, fecha_realizacion FROM tareas");
        mysqli_stmt_execute($stmt);
        $rs = mysqli_stmt_get_result($stmt);

        $tareas = array();
        // Recorrer los resultados y almacenarlos en un array asociativo
        while($fila = mysqli_fetch_assoc($rs)) {
            $tareas[] = $fila;
        }

        mysqli_stmt_close($stmt);

        return $tareas;
    }

    // Método para obtener las tareas de un operario específico
    public function mostrarTareasOperarios($userEmail) {

        $enlace = mysqli_connect("localhost", "root", "", "proyecto_php");
        mysqli_set_charset($enlace, "utf8");
        $rs = mysqli_query($enlace, "SELECT t.id, t.Nombre, t.Apellidos, t.Descripcion, t.email, t.Estado, t.Creacion_tarea, t.Operario, t.fecha_realizacion 
        FROM usuario u, tareas t
        WHERE u.usuario=t.operario
        AND u.email='$userEmail'
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


    // Método para obtener la información de una tarea específica
    public function mostrarInformacionTareas($id_tarea) {
        // Preparar y ejecutar la consulta para obtener la información de una tarea
        $stmt = mysqli_prepare($this->enlace, "SELECT id, NIF, Nombre, Apellidos, Telefono, Descripcion, email, Poblacion, cod_Postal, Provincia, Estado, Creacion_tarea, Operario, fecha_realizacion, Anotaciones_posteriores FROM tareas WHERE id = ?");
        mysqli_stmt_bind_param($stmt, "i", $id_tarea);
        mysqli_stmt_execute($stmt);
        $rs = mysqli_stmt_get_result($stmt);

        $tareas = array();
        // Recorrer los resultados y almacenarlos en un array asociativo
        while($fila = mysqli_fetch_assoc($rs)) {
            $tareas[] = $fila;
        }

        mysqli_stmt_close($stmt);

        return $tareas;
    }

    // Método para insertar una nueva tarea
    public function insertarTarea($nif, $nombre, $apellidos, $telefono, $descripcion, $email, $poblacion, $codigoP, $provincia, $estado, $creacion, $operario, $realizacion, $anotaciones) {
        // Preparar y ejecutar la consulta para insertar una nueva tarea
        $stmt = mysqli_prepare($this->enlace, "INSERT INTO tareas VALUES (0, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        mysqli_stmt_bind_param($stmt, "issssssissssss", $nif, $nombre, $apellidos, $telefono, $descripcion, $email, $poblacion, $codigoP, $provincia, $estado, $creacion, $operario, $realizacion, $anotaciones);
        $insertTarea = mysqli_stmt_execute($stmt);

        if($insertTarea) {
            // Inserción exitosa
            return "success";
        } else {
            // Error en la inserción
            return "incorrect";
        }

        mysqli_stmt_close($stmt);
    }

    // Método para editar una tarea por parte de un operario
    public function editarTareaOperario($id, $estado, $anotaciones, $realizacion) {
        // Verificar si el ID es nulo
        if ($id === null) {
            // Manejar caso de ID nulo
            return "incorrect";
        }
        // Preparar y ejecutar la consulta para editar una tarea por parte de un operario
        $stmt = mysqli_prepare($this->enlace, "UPDATE tareas SET Estado = ?, Anotaciones_posteriores = ?, fecha_realizacion = ? WHERE id = ?");
        mysqli_stmt_bind_param($stmt, "sssi", $estado, $anotaciones, $realizacion, $id);
        $editarTarea = mysqli_stmt_execute($stmt);

        if($editarTarea) {
            // Edición exitosa
            return "success";
        } else {
            // Error en la edición
            return "incorrect";
        }

        mysqli_stmt_close($stmt);
    }

    // Método para editar una tarea por parte de un administrador
    public function editarTareaAdmin($id, $nif, $nombre, $apellidos, $telefono, $descripcion, $email, $poblacion, $codigoP, $provincia, $estado, $creacion, $operario, $realizacion, $anotaciones) {
        // Verificar si el ID es nulo
    
        // Preparar y ejecutar la consulta para editar una tarea por parte de un administrador
        $stmt = mysqli_prepare($this->enlace, "UPDATE tareas SET NIF = ?, Nombre = ?, Apellidos = ?, Telefono = ?, Descripcion = ?, email = ?, Poblacion = ?, cod_Postal = ?, Provincia = ?, Estado = ?, Creacion_tarea = ?, Operario = ?, fecha_realizacion = ?, Anotaciones_posteriores = ? WHERE id = ?");
        mysqli_stmt_bind_param($stmt, "sssisssissssssi", $nif, $nombre, $apellidos, $telefono, $descripcion, $email, $poblacion, $codigoP, $provincia, $estado, $creacion, $operario, $realizacion, $anotaciones, $id);
        $editarTarea = mysqli_stmt_execute($stmt);
    
        if ($editarTarea) {
            // Edición exitosa
            mysqli_stmt_close($stmt); // Cerrar el statement después de usarlo
            mysqli_close($this->enlace); // Cerrar la conexión a la base de datos
            return "success";
        } else {
            // Error en la edición
            echo "Error: " . mysqli_error($this->enlace);
            mysqli_stmt_close($stmt); // Cerrar el statement en caso de error
            mysqli_close($this->enlace); // Cerrar la conexión a la base de datos en caso de error
            return "incorrect";
        }
    }
    

   
}
?>
