<?php

namespace App\Models;

use Illuminate\Http\Request;
use app\Models\modeloBD;
use mysqli;

// Modelo para la autenticación de usuarios
class modeloLogin {
    // Conexión a la base de datos al instanciar el modelo
    private $enlace;

    public function __construct()
    {
        // Establecer la conexión a la base de datos
        $this->enlace = mysqli_connect("localhost", "root", "", "proyecto_php");
        mysqli_set_charset($this->enlace, "utf8");
    }

    // Método para comprobar las credenciales de inicio de sesión
    public function comprobarLogin($email, $password) {
        // Preparar y ejecutar la consulta para verificar las credenciales
        $stmt = mysqli_prepare($this->enlace, "SELECT * FROM Usuario WHERE email=? AND contrasena=?");
        mysqli_stmt_bind_param($stmt, "ss", $email, $password);
        mysqli_stmt_execute($stmt);
        $rs = mysqli_stmt_get_result($stmt);

        if ($rs) {
            // La consulta se ejecutó correctamente
            if (mysqli_num_rows($rs) > 0) {
                // Se encontró al menos un registro, lo que significa que las credenciales son correctas

                // Verificar si la cuenta es de administrador
                $stmtAdmin = mysqli_prepare($this->enlace, "SELECT * FROM usuario WHERE email=? AND contrasena=? AND rol = 1");
                mysqli_stmt_bind_param($stmtAdmin, "ss", $email, $password);
                mysqli_stmt_execute($stmtAdmin);
                $admin = mysqli_stmt_get_result($stmtAdmin);
                $es_admin = mysqli_num_rows($admin) > 0;

                mysqli_stmt_close($stmtAdmin);

                // Devolver el resultado según el rol del usuario
                if ($es_admin) {
                    return "admin_success";
                } else {
                    return "user_success";
                }
            } else {
                // No se encontraron coincidencias, lo que significa que las credenciales son incorrectas
                return "incorrect";
            }
        } else {
            // Error en la ejecución de la consulta
            return "failure";
        }
    }

    // Método para obtener información del usuario por su correo electrónico
    public function obtenerUsuario($email) {
        // Preparar y ejecutar la consulta para obtener información del usuario
        $stmt = mysqli_prepare($this->enlace, "SELECT id, email, usuario FROM usuario WHERE email=?");
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        $rs = mysqli_stmt_get_result($stmt);

        $usuario = array();
        // Recorrer los resultados y almacenarlos en un array asociativo
        while ($fila = mysqli_fetch_assoc($rs)) {
            $usuario[] = $fila;
        }

        mysqli_stmt_close($stmt);

        return $usuario;
    }

    // Cierre de la conexión a la base de datos al destruir la instancia del modelo
    public function __destruct()
    {
        mysqli_close($this->enlace);
    }
}
?>
