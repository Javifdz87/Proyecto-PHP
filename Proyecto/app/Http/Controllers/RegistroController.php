<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\modeloRegistro;



//controlador para registrarse
class RegistroController extends Controller {
    public function mostrarRegistro() {
        return view('registroOperario');
    }
    public function controladorRegistro(Request $request) {
        $usuario = $request->input('usuario');
        $email = $request->input('email');
        $password = $request->input('password');
        $repitPassword = $request->input('repitPassword');

        $errores = [];

        if (empty($usuario)) {
            $errores['usuario'] = "Error, el campo Usuario no puede estar vacío";
        }

        if (empty($email)) {
            $errores["email"] = " Error, el campo de correo electrónico no puede estar vacío.";
          } elseif (strpos($email, '@') === false || strpos($email, '.') === false) {
            $errores["email"] = " Error, el correo electrónico debe contener '@' y '.'.";
          };

        if (empty($password)) {
            $errores['password'] = "Error, el campo Password no puede estar vacío";
        }

        if (empty($repitPassword)) {
            $errores['repitPassword'] = "Error, el campo Repetir Contraseña no puede estar vacío";
        }
        if($password !== $repitPassword){
            $errores['noCoinciden'] = "Error, las contraseñas no coinciden";
        }
        
        if (!empty($errores)) {
            return view('registroOperario', ['errores' => $errores]);
        }

        $modeloRegistro = new modeloRegistro();
        $result = $modeloRegistro->comprobarRegistro($usuario, $email, $password, $repitPassword);

        // Manejar el resultado según tus necesidades
        switch($result) {
            case 'success':
                // Acción para usuarios administradores
                return redirect()->route('panelAdmin');
                break;

            case 'email_exists':
                // Acción para usuarios Operarios
                return redirect()->route('mostrarRegistro');
                break;
            case 'password_diferentes':
                // Acción para usuarios normales
                return redirect()->route('mostrarRegistro');
                break;

            case 'incorrect':
                // Acción en caso de falla de inicio de sesión
                $errores['insertar'] = "Nose puedo insertar el Operario";
                return view('registroOperario', ['errores' => $errores]);
                break;

          
        }
    }

}
?>