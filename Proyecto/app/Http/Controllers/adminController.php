<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\modeloAdmin;
use App\Models\modeloTareas;
use App\Http\Controllers\TareasController;
use App\Models\modelProvincias;
use App\Models\modelOperarios;

//Panel de administrador
class adminController extends Controller
{
   public function mostrarTareasAdmin()
   {
      $mostrarTareasAdmin = new modeloTareas();

      $tareas = $mostrarTareasAdmin->mostrarTareasAdmin();
      return view('panelAdmin')->with('tareas', $tareas);

   }

   public function controladorinfoTareas($id)
   {
      $modeloTareas = new modeloTareas();

      $tareas = $modeloTareas->mostrarInformacionTareas($id);
      return view('infoTareasAdmin')->with('tareas', $tareas[0]);

   }

   public function mostrarEditarTareas($id)
   {
      $modelProvincias = new modelProvincias();
      $modelOperarios = new modelOperarios();
      $modeloTareas = new modeloTareas();
      $provincias = $modelProvincias->mostrarProvincias();
      $operarios = $modelOperarios->mostrarOperarios();
      

      $tareas = $modeloTareas->mostrarInformacionTareas($id);
      return view('editarTareasAdmin')->with('tareas', $tareas[0])->with('provincias', $provincias)->with('operarios', $operarios);

   }

   public function vistaPendientes()
   {
      $modeloAdmin = new modeloAdmin();

      $tareas = $modeloAdmin->vistaPendientes();

      switch ($tareas) {
         case 'vacio':
             return redirect()->route('panelAdmin');
             
     }

      return view('vistaPendientes')->with('tareas', $tareas[0]);

   }


   public function editarTareas(Request $request, $id)
   {
       // Obtén una instancia de TareasController
       $tareasController = new TareasController();
   
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
   
       // Verifica si hay errores
       $errores = $tareasController->gestorErrores($nif, $nombre, $apellidos, $telefono, $descripcion, $email, $poblacion, $codigoP, $provincia, $estado, $creacion, $operario, $realizacion, $anotaciones);
   
       // Verifica si hay errores
       if (!empty($errores)) {
           // Si hay errores, maneja la respuesta aquí (puede redirigir a la vista de edición con errores, por ejemplo)
           $modelProvincias = new modelProvincias();
           $modelOperarios = new modelOperarios();
           $modeloTareas = new modeloTareas();
   
           // Obtén las dependencias y datos necesarios
           $provincias = $modelProvincias->mostrarProvincias();
           $operarios = $modelOperarios->mostrarOperarios();
           $tareas = $modeloTareas->mostrarInformacionTareas($id);
   
           return view('editarTareasAdmin', ['errores' => $errores, 'tareas' => $tareas[0], 'provincias' => $provincias, 'operarios' => $operarios]);
       }
   
       // Si no hay errores, continúa con el resto de la lógica
       $modeloTareas = new modeloTareas();
   
       // Pasa los datos del formulario directamente a la función de editarTareaAdmin
       $result = $modeloTareas->editarTareaAdmin($id, $nif, $nombre, $apellidos, $telefono, $descripcion, $email, $poblacion, $codigoP, $provincia, $estado, $creacion, $operario, $realizacion, $anotaciones);
   
       switch ($result) {
           case 'success':
               return redirect()->route('panelAdmin');
               break;
   
           case 'incorrect':
               return view(''); // Puedes manejar este caso según tus necesidades
               // break;
       }
   }
   


   public function eliminarTarea($id)
   {
      $modeloAdmin = new modeloAdmin();
      $tareas = $modeloAdmin->eliminarTarea($id);
      return redirect()->route('panelAdmin');

   }
   public function vistaEliminar($id)
   {
      $modeloAdmin = new modeloAdmin();

      $tareas = $modeloAdmin->vistaEliminar($id);
      return view('eliminarTarea')->with('tareas', $tareas[0]);

   }
}
?>