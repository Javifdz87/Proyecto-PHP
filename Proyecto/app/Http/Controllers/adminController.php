<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\modeloAdmin;
use App\Models\modeloTareas;

//Panel de administrador
class adminController extends Controller
{
    public function mostrarTareasAdmin()
    {
       $mostrarTareasAdmin = new modeloTareas();

       $tareas=$mostrarTareasAdmin->mostrarTareasAdmin();
       return view('panelAdmin')->with('tareas', $tareas);

    }

    public function controladorinfoTareas($id)
    {
       $modeloTareas = new modeloTareas();

       $tareas=$modeloTareas->mostrarInformacionTareas($id);
       return view('infoTareasAdmin')->with('tareas', $tareas[0]);

    }

    public function editarTarea($id)
    {
       $modeloTareas = new modeloTareas();

       $tareas=$modeloTareas->mostrarInformacionTareas($id);
       return view('crearTareas')->with('tareas', $tareas[0]);

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
