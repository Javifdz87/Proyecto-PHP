<?php

namespace App\Models;

use Illuminate\Http\Request;
use app\Models\modeloBD;
use mysqli;

class modeloLogin {
    public function comprobarLogin($email, $password) {
        $enlace = mysqli_connect("localhost", "root", "", "proyecto_php");
        mysqli_set_charset($enlace, "utf8");

        $rs = mysqli_query($enlace, "SELECT * FROM Usuario WHERE email='$email' AND contrasena='$password'");

        if($rs) {
            // La consulta se ejecutó correctamente
            if(mysqli_num_rows($rs) > 0) {
                // Se encontró al menos un registro, lo que significa que las credenciales son correctas

                // Verifica si la cuenta es de administrador
                $admin = mysqli_query($enlace, "SELECT * FROM usuario WHERE email='$email' AND contrasena='$password' AND rol = 1");
                $es_admin = mysqli_num_rows($admin) > 0;

                if($es_admin) {
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
    public function obtenerUsuario($email) {
        $enlace = mysqli_connect("localhost", "root", "", "proyecto_php");
        mysqli_set_charset($enlace, "utf8");

        $rs = mysqli_query($enlace, "SELECT id, email, usuario FROM usuario WHERE email='$email'");

        $usuario = array();
        while ($fila = $rs->fetch_assoc()) {
            $usuario[] = array(
                "id" => $fila["id"],
                "email" => $fila["Descripcion"],
                "usuario" => $fila["usuario"],
            );

        }
        mysqli_close($enlace);

        return $usuario;


    }
}
?>
