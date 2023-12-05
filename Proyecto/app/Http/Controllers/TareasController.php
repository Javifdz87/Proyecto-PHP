<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\modeloTareas;

class TareasController extends Controller
{
    public function controladorTareas()
    {
       $modeloTareas = new modeloTareas();

       $tareas=$modeloTareas->mostrarTareas();
       return view('panelAdmin')->with('tareas', $tareas);

    }
}
?>
