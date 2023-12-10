<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\modeloLogin;

class LoginController extends Controller {

    public function mostrarLogin() {
        return view('index');
    }

    public function controladorLogin(Request $request) {
        $email = $request->input('email');
        $password = $request->input('password');

        $errores = [];

        if (empty($email)) {
            $errores['email'] = "Error, el campo Email no puede estar vacío";
        }

        if (empty($password)) {
            $errores['password'] = "Error, el campo Contraseña no puede estar vacío";
        }

        if (!empty($errores)) {
            return view('index', ['errores' => $errores]);
        }

        $modeloLogin = new modeloLogin();
        $result = $modeloLogin->comprobarLogin($email, $password);

        switch ($result) {
            case 'admin_success':
                return redirect()->route('panelAdmin');
                break;

            case 'user_success':
                return redirect()->route('vistaOperario');
                break;

            case 'incorrect':
                $errores['noCoinciden'] = "Las credenciales son incorrectas";
                return view('index', ['errores' => $errores]);
                break;
        }
    }
    public function comprobarUsuario(Request $request) {
        $email = $request->input('email');
        $modeloLogin = new ModeloLogin();
        $usuario = $modeloLogin->obtenerUsuario($email);
        dd($usuario);

    
        if ($usuario) {
            return view('vistaOperario')->with('usuario', $usuario[0]);
        } else {
            // Manejar el caso en el que no se encuentra el usuario
            return view('vistaSinUsuario');
        }
    }
    
    
}
?>
