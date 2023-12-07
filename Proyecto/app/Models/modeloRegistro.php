<?php

namespace App\Models;

use Illuminate\Http\Request;
use app\Models\modeloBD;
use mysqli;

class modeloRegistro {
    public function comprobarRegistro($usuario, $email, $password, $repitPassword) {
        $enlace = mysqli_connect("localhost", "root", "", "proyecto_php");
        mysqli_set_charset($enlace, "utf8");

        $rs = mysqli_query($enlace, "SELECT * FROM usuario WHERE email='$email'");

        if(!$rs) {
            // Error en la consulta
            return "failure";
        } else {
            // Verificar si ya existe un usuario con el mismo email
            if(mysqli_num_rows($rs) > 0) {
                return "email_exists";
            } else {
                if($password !== $repitPassword) {
                    return "password_diferentes";
                } else {
                    // El email no existe, proceder con la inserción
                    $insertUsuario = mysqli_query($enlace, "INSERT INTO usuario VALUES (0,'$email', '$usuario', '$password', 0)");

                    if($insertUsuario) {
                        // Inserción exitosa
                        return "success";
                    } else {
                        // Error en la inserción
                        return "failure";
                    }
                }

            }
        }
    }
}
?>