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
   //funcion para mostrar todas las tareas en modo admin
   public function mostrarTareasAdmin()
   {
      $mostrarTareasAdmin = new modeloTareas();

      $tareas = $mostrarTareasAdmin->mostrarTareasAdmin();
      return view('panelAdmin')->with('tareas', $tareas);
   }
   //funcion para mostrar toda la informacion de la tarea pulsada en modo admin
   public function controladorinfoTareas($id)
   {
      $modeloTareas = new modeloTareas();

      $tareas = $modeloTareas->mostrarInformacionTareas($id);
      return view('infoTareasAdmin')->with('tareas', $tareas[0]);
   }

   //funcion para los datos en la vista editar
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

   //funcion para mostrar las lista de pendientes
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

   //funcion para recoger los datos del formulario y actualizarlo
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

      $errores = $tareasController->gestorErrores($nif, $nombre, $apellidos, $telefono, $descripcion, $email, $poblacion, $codigoP, $provincia, $estado, $creacion, $operario, $realizacion, $anotaciones);

      // Verifica si hay errores
      if (!empty($errores)) {
         // Si hay errores, maneja la respuesta aquí (puede redirigir a la vista de edición con errores, por ejemplo)
         $modelProvincias = new modelProvincias();
         $modelOperarios = new modelOperarios();
         $modeloTareas = new modeloTareas();

         // Obtiene los valores de los modelos
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
      }
   }


//funcion para eliminar la tarea
   public function eliminarTarea($id)
   {
      $modeloAdmin = new modeloAdmin();
      $tareas = $modeloAdmin->eliminarTarea($id);
      return redirect()->route('panelAdmin');
   }

   //funcion que muestra la vista si queremos eliminar la tarea
   public function vistaEliminar($id)
   {
      $modeloAdmin = new modeloAdmin();

      $tareas = $modeloAdmin->vistaEliminar($id);
      return view('eliminarTarea')->with('tareas', $tareas[0]);
   }
}
