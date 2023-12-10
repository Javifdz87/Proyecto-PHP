<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\modeloTareas;



//Panel de Operarios

class ControladorOperarios extends Controller
{

   public function vistaTareasGeneral()
{
    session_start();

    $userEmail = $_SESSION['user_email'];
    $mostrarTareasGeneral = new modeloTareas();

    $tareas = $mostrarTareasGeneral->mostrarTareasAdmin();

    return view('vistaOperario')->with(['tareas' => $tareas, 'user_email' => $userEmail]);
}

   public function mostrarTareasOperario()
   {
      session_start(); // Agrega esta línea

        $userEmail = $_SESSION['user_email'];
      $mostrarTareasOperarios = new modeloTareas();

      $tareas = $mostrarTareasOperarios->mostrarTareasOperarios($userEmail);
      return view('panelOperario')->with(['tareas' => $tareas, 'user_email' => $userEmail]);

   }

   public function controladorinfoTareas($id)
   {
      $modeloTareas = new modeloTareas();

      $tareas = $modeloTareas->mostrarInformacionTareas($id);
      return view('infoTareasOperario')->with('tareas', $tareas[0]);

   }

   public function mostrarEditarTareas($id)
   {
      $modeloTareas = new modeloTareas();

      $tareas = $modeloTareas->mostrarInformacionTareas($id);
      return view('editarTareasOperario')->with('tareas', $tareas[0]);

   }
   public function editarTareas(Request $request)
   {


      $id = $request->input('id');
      $estado = $request->input('estado');
      $anotaciones = $request->input('anotaciones');
      $realizacion = $request->input('realizacion');

      $errores = $this->gestorErrores($realizacion);

      if (!empty($errores)) {
         // Si hay errores, maneja la respuesta aquí (puede redirigir a la vista de edición con errores, por ejemplo)
         $modeloTareas = new modeloTareas();

         // Obtén las dependencias y datos necesarios
         $tareas = $modeloTareas->mostrarInformacionTareas($id);

         return view('editarTareasOperario', ['errores' => $errores, 'tareas' => $tareas[0]]);
      }


      $modeloTareas = new modeloTareas();

      $result = $modeloTareas->editarTareaOperario($id, $estado, $anotaciones, $realizacion);

      switch ($result) {
         case 'success':
            return redirect()->route('vistaOperario');
            break;

         case 'incorrect':
            return redirect()->route('editarTareaOperario');
            break;
      }

   }
   public function gestorErrores($realizacion)
   {
      $errores = [];


      $fecha_actual = date("d-m-Y");

      $dateParts = explode("-", $realizacion);
      $ano = isset($dateParts[0]) ? $dateParts[0] : null;
      $mes = isset($dateParts[1]) ? $dateParts[1] : null;
      $dia = isset($dateParts[2]) ? $dateParts[2] : null;

      if (!checkdate((int) $mes, (int) $dia, (int) $ano)) {
         $errores["realizacion"] = "Error, debe contener una fecha válida.";
      } elseif (strtotime($realizacion) < strtotime($fecha_actual)) {
         $errores["realizacion"] = "La fecha de realización debe ser posterior a la fecha actual.";
      }





      return $errores;
   }



}
?>