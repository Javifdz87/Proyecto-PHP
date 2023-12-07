<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\modeloRegistro;



//controlador para loguearse
class RegistroController extends Controller {
    public function mostrarRegistro() {
        return view('registroOperario');
    }
    public function controladorRegistro(Request $request) {
        $usuario = $request->input('usuario');
        $email = $request->input('email');
        $password = $request->input('password');
        $repitPassword = $request->input('repitPassword');

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