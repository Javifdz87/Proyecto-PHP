<?php

namespace App\Models;

use Illuminate\Http\Request;
use app\Models\modeloBD;
use mysqli;

class modeloLogin {
    public function comprobarLogin($email, $password) {
        $enlace = mysqli_connect("localhost", "javifernandez", "javifdz", "javifernandez");
        mysqli_set_charset($enlace, "utf8");

        $rs = mysqli_query($enlace, "SELECT * FROM Usuario WHERE email='$email' AND contraseña='$password'");

        if($rs) {
            // La consulta se ejecutó correctamente
            if(mysqli_num_rows($rs) > 0) {
                // Se encontró al menos un registro, lo que significa que las credenciales son correctas

                // Verifica si la cuenta es de administrador
                $admin = mysqli_query($enlace, "SELECT * FROM Usuario WHERE email='$email' AND contraseña='$password' AND es_admin = 1");
                $es_admin = mysqli_num_rows($admin) > 0;

                if($es_admin) {
                    return "admin_success";
                } else {
                    return "user_success";
                }
            } else {
                // No se encontraron coincidencias, lo que significa que las credenciales son incorrectas
                return "failure";
            }
        } else {
            // Error en la ejecución de la consulta
            return "failure";
        }


    }
}
