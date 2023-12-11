<?php

namespace App\Models;

use Illuminate\Http\Request;
use app\Models\modeloBD;
use mysqli;

// Modelo para la gestión de registros de usuarios
class modeloRegistro {
    // Conexión a la base de datos al instanciar el modelo
    private $enlace;

    public function __construct()
    {
        // Establecer la conexión a la base de datos
        $this->enlace = mysqli_connect("localhost", "root", "", "proyecto_php");
        mysqli_set_charset($this->enlace, "utf8");
    }

    // Método para comprobar el registro de un nuevo usuario
    public function comprobarRegistro($usuario, $email, $password, $repitPassword) {
        // Preparar y ejecutar la consulta para verificar la existencia del email
        $stmt = mysqli_prepare($this->enlace, "SELECT * FROM usuario WHERE email=?");
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        $rs = mysqli_stmt_get_result($stmt);

        if (!$rs) {
            // Error en la consulta
            return "failure";
        } else {
            // Verificar si ya existe un usuario con el mismo email
            if (mysqli_num_rows($rs) > 0) {
                return "email_exists";
            } else {
                // Verificar si las contraseñas coinciden
                if ($password !== $repitPassword) {
                    return "password_diferentes";
                } else {
                    // El email no existe, proceder con la inserción
                    $stmtInsert = mysqli_prepare($this->enlace, "INSERT INTO usuario VALUES (0, ?, ?, ?, 0)");
                    mysqli_stmt_bind_param($stmtInsert, "sss", $email, $usuario, $password);
                    $insertUsuario = mysqli_stmt_execute($stmtInsert);

                    if ($insertUsuario) {
                        // Inserción exitosa
                        return "success";
                    } else {
                        // Error en la inserción
                        return "incorrect";
                    }

                    mysqli_stmt_close($stmtInsert);
                }
            }
        }

        mysqli_stmt_close($stmt);
    }

    // Cierre de la conexión a la base de datos al destruir la instancia del modelo
    public function __destruct()
    {
        mysqli_close($this->enlace);
    }
}
?>
