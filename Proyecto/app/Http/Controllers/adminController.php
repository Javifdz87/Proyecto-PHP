<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\modeloAdmin;

class adminController extends Controller
{
    public function controladorinfoTareas($id)
    {
       $modeloAdmin = new modeloAdmin();

       $tareas=$modeloAdmin->mostrarInformacionTareas($id);
       return view('infoTareas')->with('tareas', $tareas[0]);

    }
    public function eliminarTarea($id)
    {
        $modeloAdmin = new modeloAdmin();
        $tareas=$modeloAdmin->eliminarTarea($id);
        return redirect()->route('panelAdmin');

    }
    public function vistaEliminar($id)
    {
        $modeloAdmin = new modeloAdmin();

       $tareas=$modeloAdmin->vistaEliminar($id);
       return view('eliminarTarea')->with('tareas', $tareas[0]);

    }
}
?>
