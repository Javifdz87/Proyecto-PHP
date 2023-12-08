<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\modeloTareas;
use App\Models\modelProvincias;
use App\Models\modelOperarios;

//informacion para crear tareas y mostrar
class TareasController extends Controller {
    public function controladorTareas(Request $request) {
        //separar en otra funcion los errores

        $nif = $request->input('nif');
        $nombre = $request->input('nombre');
        $apellidos = $request->input('apellidos');
        $telefono = $request->input('telefono');
        $descripcion = $request->input('descripcion');
        $email = $request->input('email');
        $poblacion = $request->input('poblacion');
        $codigoP = $request->input('codigo');
        $dosValores = substr($codigoP, 0, 2);

        //Aqui tengo que hacer un modelo que me saque el codgo postal
        $rs = mysqli_query("SELECT cod as codigo FROM tbl_provincias WHERE nombre= '$opcion';");
        if ($row = mysqli_fetch_assoc($rs)) {
        $codigo = $row['codigo'];
        };

        if($dosValores !== $codigo) {
            $errores["codigo"] = "Error, no coinciden";
        }
        ;

        $provincia = $request->input('provincia');

        $estado = $request->input('estado');
        $creacion = $request->input('creacion');
        $operario = $request->input('operario');

        $fecha_actual = date("d-m-Y");
        $realizacion = $request->input('realizacion');
        $dateParts = explode("-", $realizacion);
        $ano = isset($dateParts[0]) ? $dateParts[0] : null;
        $mes = isset($dateParts[1]) ? $dateParts[1] : null;
        $dia = isset($dateParts[2]) ? $dateParts[2] : null;

        $anotaciones = $request->input('anotaciones');

        if(empty($NIF)) {
            $errores["nif"] = " Error, no puede estar vacio ";
        }
        ;
        if(empty($nombre)) {
            $errores["nombre"] = " Error, no puede estar vacio ";
        }
        ;
        if(empty($nombre)) {
            $errores["apellidos"] = " Error, no puede estar vacio ";
        }
        ;
        if(empty($telefono)) {
            $errores["telefono"] = " Error, no puede estar vacio ";
        }
        ;
        if(empty($descripcion)) {
            $errores["descripcion"] = " Error, no puede estar vacio ";
        }
        ;
        if(empty($mail)) {
            $errores["mail"] = " Error, el campo de correo electrónico no puede estar vacío.";
        } elseif(strpos($mail, '@') === false || strpos($mail, '.') === false) {
            $errores["mail"] = " Error, el correo electrónico debe contener '@' y '.'.";
        }
        ;
        if(empty($codigoP)) {
            $errores["codigo"] = " Error, no puede estar vacio ";
        }
        ;
        if(!checkdate((int)$mes, (int)$dia, (int)$ano)) {
            $errores["realizacion"] = "Error, debe contener una fecha válida.";
        } elseif(strtotime($realizacion) < strtotime($fecha_actual)) {
            $errores["realizacion"] = "La fecha de realización debe ser posterior a la fecha actual.";
        }

        $modeloTareas = new modeloTareas();
        $result = $modeloTareas->insertarTarea($nif, $nombre, $apellidos, $telefono, $descripcion, $email, $poblacion, $codigoP, $provincia, $estado, $creacion, $operario, $realizacion, $anotaciones);

        switch($result) {
            case 'success':
                // Acción para usuarios administradores
                return redirect()->route('panelAdmin');
                break;


            case 'incorrect':
                // Acción en caso de falla de inicio de sesión
                $errores['insertar'] = "Nose puedo insertar el Operario";
                return view('registroOperario', ['errores' => $errores]);
                break;


        }
    }

    public function mostrarFormulario() {
        $modelProvincias = new modelProvincias();
        $modelOperarios = new modelOperarios();

        $provincias = $modelProvincias->mostrarProvincias();
        $operarios = $modelOperarios->mostrarOperarios();

        return view('crearTareas', compact('provincias', 'operarios'));
    }


}
?>