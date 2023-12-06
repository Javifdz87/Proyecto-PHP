<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\modeloTareas;
use App\Models\modelProvincias;
use App\Models\modelOperarios;

//informacion para crear tareas y mostrar
class TareasController extends Controller
{
    
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
