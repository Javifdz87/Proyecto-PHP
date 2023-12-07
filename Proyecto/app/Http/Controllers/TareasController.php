<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\modeloTareas;
use App\Models\modelProvincias;
use App\Models\modelOperarios;

//informacion para crear tareas y mostrar
class TareasController extends Controller
{
    public function controladorTareas(Request $request){
        $nif = $request->input('nif');
        $Nombre = $request->input('Nombre');
        $apellidos = $request->input('apellidos');
        $telefono = $request->input('telefono');
        $descripcion = $request->input('descripcion');
        $email = $request->input('email');
        $poblacion = $request->input('poblacion');
        $codigo = $request->input('codigo');
        $provincia = $request->input('provincia');
        $estado = $request->input('estado');
        $creacion = $request->input('creacion');
        $operario = $request->input('operario');
        $realizacion = $request->input('realizacion');
        $anotaciones = $request->input('anotaciones');

        $modeloTareas = new modeloTareas();

        $tareas = $modeloTareas->modeloTareas($nif, $Nombre, $apellidos, $telefono, $descripcion, $email, $poblacion, $codigo, $provincia, $estado, $creacion, $operario, $realizacion, $anotaciones);

        return view('crearTareas', compact('provincias', 'operarios'));

    
    }

   public function mostrarFormulario()
    {
        $modelProvincias = new modelProvincias();
        $modelOperarios = new modelOperarios();

        $provincias = $modelProvincias->mostrarProvincias();
        $operarios = $modelOperarios->mostrarOperarios();

        return view('crearTareas', compact('provincias', 'operarios'));
    }


}
?>
