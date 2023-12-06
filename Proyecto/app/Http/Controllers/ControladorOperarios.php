<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\modeloAdmin;
use App\Models\modeloTareas;


class controladorOperarios extends Controller
{
    public function controladorTareas()
    {
       $modeloTareas = new modeloTareas();

       $tareas=$modeloTareas->mostrarTareas();
       return view('panelOperario')->with('tareas', $tareas);

    }

    public function controladorinfoTareas($id)
    {
       $modeloAdmin = new modeloAdmin();

       $tareas=$modeloAdmin->mostrarInformacionTareas($id);
       return view('infoTareas')->with('tareas', $tareas[0]);

    }
    
}
?>
