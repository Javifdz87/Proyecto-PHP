<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\modeloLogin;


//controlador para loguearse
class LoginController extends Controller {
    public function controladorLogin(Request $request) {
        $email = $request->input('email');
        $password = $request->input('password');

        $modeloLogin = new modeloLogin();
        $result = $modeloLogin->comprobarLogin($email, $password);

        // Manejar el resultado según tus necesidades
        switch($result) {
            case 'admin_success':
                // Acción para usuarios administradores
                return view('infoTareas');
                break;

            case 'user_success':
                // Acción para usuarios normales
                // Puedes redirigir a otra vista o realizar otra acción según tus necesidades
                break;

            case 'failure':
                // Acción en caso de falla de inicio de sesión
                // Puedes redirigir a una vista de error o realizar otra acción según tus necesidades
                break;

            default:
                // Acción por defecto
                // Puedes redirigir a una vista por defecto o realizar otra acción según tus necesidades
                break;
        }
    }
}
?>