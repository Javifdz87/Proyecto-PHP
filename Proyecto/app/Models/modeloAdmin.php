<?php

namespace App\Models;

// Modelo para la gestión de operaciones administrativas en la base de datos
class modeloAdmin
{
    // Conexión a la base de datos al instanciar el modelo
    private $enlace;

    public function __construct()
    {
        // Establecer la conexión a la base de datos
        $this->enlace = mysqli_connect("localhost", "root", "", "proyecto_php");
        mysqli_set_charset($this->enlace, "utf8");
    }

    // Método para eliminar una tarea por su ID
    public function eliminarTarea($id_tarea)
    {
        // Preparar y ejecutar la consulta para eliminar la tarea
        $stmt = mysqli_prepare($this->enlace, "DELETE FROM tareas WHERE id = ?");
        mysqli_stmt_bind_param($stmt, "i", $id_tarea);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }

    // Método para obtener la información de una tarea a eliminar por su ID
    public function vistaEliminar($id_tarea)
    {
        // Preparar y ejecutar la consulta para obtener la información de la tarea
        $stmt = mysqli_prepare($this->enlace, "SELECT id, NIF, Nombre, Apellidos, Telefono, Descripcion, email, Poblacion, cod_Postal, Provincia, Estado, Creacion_tarea, Operario, fecha_realizacion, Anotaciones_posteriores FROM tareas WHERE id = ?");
        mysqli_stmt_bind_param($stmt, "i", $id_tarea);
        mysqli_stmt_execute($stmt);
        $rs = mysqli_stmt_get_result($stmt);

        $tareas = array();
        // Recorrer los resultados y almacenarlos en un array asociativo
        while ($fila = mysqli_fetch_assoc($rs)) {
            $tareas[] = $fila;
        }

        mysqli_stmt_close($stmt);

        return $tareas;
    }

    // Método para obtener las tareas pendientes
    public function vistaPendientes()
    {
        // Preparar y ejecutar la consulta para obtener las tareas pendientes
        $stmt = mysqli_prepare($this->enlace, "SELECT id, Descripcion, Estado, Creacion_tarea, Operario FROM tareas WHERE Estado = 'P (Pendiente)'");
        mysqli_stmt_execute($stmt);
        $rs = mysqli_stmt_get_result($stmt);

        // Verificar si hay resultados
        if (mysqli_num_rows($rs) === 0) {
            // No hay resultados, devolver 'vacio' o algún indicador
            return 'vacio';
        }

        $tareas = array();
        // Recorrer los resultados y almacenarlos en un array asociativo
        while ($fila = mysqli_fetch_assoc($rs)) {
            $tareas[] = $fila;
        }

        mysqli_stmt_close($stmt);

        return $tareas;
    }

    // Cierre de la conexión a la base de datos al destruir la instancia del modelo
    public function __destruct()
    {
        mysqli_close($this->enlace);
    }
}
?>
