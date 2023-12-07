<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\modeloTareas;


//Panel de Operarios

class controladorOperarios extends Controller
{
   public function vistaTareasGeneral()
    {
       $mostrarTareasGeneral = new modeloTareas();

       $tareas=$mostrarTareasGeneral->mostrarTareasAdmin();
       return view('vistaOperario')->with('tareas', $tareas);

    }
    public function mostrarTareasOperario()
    {
       $mostrarTareasOperarios = new modeloTareas();

       $tareas=$mostrarTareasOperarios->mostrarTareasOperarios();
       return view('panelOperario')->with('tareas', $tareas);

    }

    public function controladorinfoTareas($id)
    {
       $modeloTareas = new modeloTareas();

       $tareas=$modeloTareas->mostrarInformacionTareas($id);
       return view('infoTareasOperario')->with('tareas', $tareas[0]);

    }

    
    
}
?>
