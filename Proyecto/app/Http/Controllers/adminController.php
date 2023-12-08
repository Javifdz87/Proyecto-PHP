<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\modeloAdmin;
use App\Models\modeloTareas;
use App\Http\Controllers\TareasController;

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

    public function mostrarEditarTareas($id)
    {
       $modeloTareas = new modeloTareas();

       $tareas=$modeloTareas->mostrarInformacionTareas($id);
       return view('editarTareasAdmin')->with('tareas', $tareas[0]);

    }

    public function editarTareas(Request $request)
    {
       $tareasController = new TareasController;
       $tareas = $tareasController->controladorTareas($request);

       //Falta por hacer pasarle los datos a Tareas controller y que verifique la validacion de errores y pasarle al modulo para que actualice la categoria
       
       //$modeloTareas = new modeloTareas();
 
       //$result = $modeloTareas->editarTareaAdmin();
 
       //switch ($result) {
         // case 'success':
           //   return redirect()->route('panelAdmin');
             // break;
 
          //case 'incorrect':
            //  return view('');
              //break;
      //}
 
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
