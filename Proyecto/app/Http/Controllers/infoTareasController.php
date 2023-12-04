<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\modeloInfoTareas;

class infoTareasController extends Controller
{
    public function controladorinfoTareas($id)
    {
       $modeloInfoTareas = new modeloInfoTareas();

       $tareas=$modeloInfoTareas->mostrarInformacionTareas($id);
       return view('infoTareas')->with('tareas', $tareas[0]);

    }
}
?>
