<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\modeloTareas;
use App\Models\modelProvincias;
use App\Models\modelOperarios;

class TareasController extends Controller
{
    public function controladorTareas(Request $request)
    {

        $nif = $request->input('nif');
        $nombre = $request->input('nombre');
        $apellidos = $request->input('apellidos');
        $telefono = $request->input('telefono');
        $descripcion = $request->input('descripcion');
        $email = $request->input('email');
        $poblacion = $request->input('poblacion');
        $codigoP = $request->input('codigo');
        $provincia = $request->input('provincia');
        $estado = $request->input('estado');
        $creacion = $request->input('creacion');
        $operario = $request->input('operario');
        $realizacion = $request->input('realizacion');
        $anotaciones = $request->input('anotaciones');

        $errores = $this->gestorErrores($nif, $nombre, $apellidos, $telefono, $descripcion, $email, $poblacion, $codigoP, $provincia, $estado, $creacion, $operario, $realizacion, $anotaciones);

        if (!empty($errores)) {
            // Si hay errores, carga las provincias y operarios nuevamente
            $modelProvincias = new modelProvincias();
            $modelOperarios = new modelOperarios();

            $provincias = $modelProvincias->mostrarProvincias();
            $operarios = $modelOperarios->mostrarOperarios();

            return view('crearTareas', ['errores' => $errores, 'provincias' => $provincias, 'operarios' => $operarios]);
        }

        $modeloTareas = new modeloTareas();
        $result = $modeloTareas->insertarTarea($nif, $nombre, $apellidos, $telefono, $descripcion, $email, $poblacion, $codigoP, $provincia, $estado, $creacion, $operario, $realizacion, $anotaciones);

        switch ($result) {
            case 'success':
                return redirect()->route('panelAdmin');
                break;

            case 'incorrect':
                $errores['insertar'] = "No se puede insertar el Operario";
                return view('registroOperario', ['errores' => $errores]);
                break;
        }

    }

    public function mostrarFormulario()
    {
        $modelProvincias = new modelProvincias();
        $modelOperarios = new modelOperarios();

        $provincias = $modelProvincias->mostrarProvincias();
        $operarios = $modelOperarios->mostrarOperarios();


        return view('crearTareas')->with('provincias', $provincias)->with('operarios', $operarios);
    }

    public function gestorErrores($nif, $nombre, $apellidos, $telefono, $descripcion, $email, $poblacion, $codigoP, $provincia, $estado, $creacion, $operario, $realizacion, $anotaciones)
    {
        $errores = [];

        if (empty($nif)) {
            $errores["nif"] = "Error, no puede estar vacío";
        }

        if (empty($nombre)) {
            $errores["nombre"] = "Error, no puede estar vacío";
        }

        if (empty($apellidos)) {
            $errores["apellidos"] = "Error, no puede estar vacío";
        }

        if (empty($telefono)) {
            $errores["telefono"] = "Error, no puede estar vacío";
        }

        if (empty($descripcion)) {
            $errores["descripcion"] = "Error, no puede estar vacío";
        }

        if (empty($email)) {
            $errores["email"] = "Error, el campo de correo electrónico no puede estar vacío.";
        } elseif (strpos($email, '@') === false || strpos($email, '.') === false) {
            $errores["email"] = "Error, el correo electrónico debe contener '@' y '.'.";
        }

        if (empty($poblacion)) {
            $errores["poblacion"] = "Error, no puede estar vacío";
        }

        $modelProvincias = new modelProvincias();
        $codigoProvincia = $modelProvincias->codigoProvincias($provincia);

        $dosValores = substr($codigoP, 0, 2);

        if (empty($codigoP)) {
            $errores["codigo"] = "Error, no puede estar vacío";
        } else{
            if(!empty($codigoProvincia) && $dosValores !== $codigoProvincia[0]) {
                $errores["codigo"] = "Error, los dos primeros dígitos del código postal no coinciden con la provincia seleccionada.";
            }
        }


        $dateParts_creacion = explode("-", $creacion);
        $ano_creacion = isset($dateParts_creacion[0]) ? $dateParts_creacion[0] : null;
        $mes_creacion = isset($dateParts_creacion[1]) ? $dateParts_creacion[1] : null;
        $dia_creacion = isset($dateParts_creacion[2]) ? $dateParts_creacion[2] : null;

        if (!checkdate((int) $mes_creacion, (int) $dia_creacion, (int) $ano_creacion)) {
            $errores["creacion"] = "Error, la fecha de creación debe contener una fecha válida.";
        }

        $fecha_actual = date("d-m-Y");

        $dateParts = explode("-", $realizacion);
        $ano = isset($dateParts[0]) ? $dateParts[0] : null;
        $mes = isset($dateParts[1]) ? $dateParts[1] : null;
        $dia = isset($dateParts[2]) ? $dateParts[2] : null;

        if (!checkdate((int) $mes, (int) $dia, (int) $ano)) {
            $errores["realizacion"] = "Error, debe contener una fecha válida.";
        } elseif (strtotime($realizacion) < strtotime($fecha_actual)) {
            $errores["realizacion"] = "La fecha de realización debe ser posterior a la fecha actual.";
        }





        return $errores;
    }
}
?>