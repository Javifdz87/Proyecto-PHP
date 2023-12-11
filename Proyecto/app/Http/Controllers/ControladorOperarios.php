<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\modeloTareas;



//Panel de Operarios

class ControladorOperarios extends Controller
{
//esta funcion devuele una vista general de las tareas
   public function vistaTareasGeneral()
{
    session_start();//inicia la sesion pra recoger los datos del login

    $userEmail = $_SESSION['user_email'];// en este caso se recoge el email de la session
    $mostrarTareasGeneral = new modeloTareas();

    $tareas = $mostrarTareasGeneral->mostrarTareasAdmin();

    return view('vistaOperario')->with(['tareas' => $tareas, 'user_email' => $userEmail]);//devolver a la vista los datos
}

//esta funcion devuele una vista de las tareas de ese operario
   public function mostrarTareasOperario()
   {
      session_start(); //inicia la sesion pra recoger los datos del login

        $userEmail = $_SESSION['user_email'];// en este caso se recoge el email de la session
      $mostrarTareasOperarios = new modeloTareas();

      $tareas = $mostrarTareasOperarios->mostrarTareasOperarios($userEmail);
      return view('panelOperario')->with(['tareas' => $tareas, 'user_email' => $userEmail]);

   }

   //esta funcion devuele una vista mas detallada de las tareas
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
         $modeloTareas = new modeloTareas();

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


// Esta función gestiona errores relacionados con la edición de tareas por parte del operario.
// Comprueba la validez de la fecha de realización y su relación con la fecha actual.

public function gestorErrores($realizacion)
{
$errores = [];

// Obtener la fecha actual en el formato "d-m-Y"
$fecha_actual = date("d-m-Y");

// Desglosar la fecha de realización en partes (día, mes, año)
$dateParts = explode("-", $realizacion);
$ano = isset($dateParts[0]) ? $dateParts[0] : null;
$mes = isset($dateParts[1]) ? $dateParts[1] : null;
$dia = isset($dateParts[2]) ? $dateParts[2] : null;

// Comprobar si la fecha es válida utilizando la función checkdate()
if (!checkdate((int) $mes, (int) $dia, (int) $ano)) {
// Agregar mensaje de error si la fecha no es válida
$errores["realizacion"] = "Error, debe contener una fecha válida.";
} elseif (strtotime($realizacion) < strtotime($fecha_actual)) {
// Agregar mensaje de error si la fecha de realización es anterior a la fecha actual
$errores["realizacion"] = "La fecha de realización debe ser posterior a la fecha actual.";
}

// Devolver el array de errores
return $errores;
}



}
?>