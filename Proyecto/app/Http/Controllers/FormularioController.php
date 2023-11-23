<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormularioController extends Controller
{
    public function mostrarFormulario()
    {
        return view('tareas');
    }
    public function validarFormulario(Request $request){
      $errores = [];
      
      
      //Identificacion
      $nif = $request->input('nif');
      //Nombre de la perosna de contacto
      $nombre = $request->input("nombre");
      //Nombre de la perosna de contacto
      $apellidos = $request->input( "apellidos");
      //Numero de telefono
      $telefono = $request->input( "telefono");
      //Descripcion de la tarea
      $descripcion = $request->input( "descripcion");
      //Correo electronico
      $mail = $request->input("mail");
      //Poblacion
      $poblacion = $request->input("poblacion");
      // Codigo postal
      $codigoP = $request->input("codigo");
      $dosValores = substr($codigoP, 0, 2);
      var_dump($dosValores);
      
      // Provincia  
      $provincia = $request->input("provincia");
      $opcion = $_POST["provincia"];
      var_dump($opcion);
      
      $rs = mysqli_query($enlace, "SELECT cod as codigo FROM tbl_provincias WHERE nombre= '$opcion';");
      if ($row = mysqli_fetch_assoc($rs)) {
          $codigo = $row['codigo'];
          var_dump($codigo);
      };
      
      // Verifica si los valores no son iguales
      if ($dosValores !== $codigo) {
          $errores["codigo"] = "Error, no coinciden";
      };
      
        //Estado de la tarea
        $request->input("estado");
        
        //Fecha de realizacion
        $fecha_actual = date("d-m-Y");
        $fechaRe = $request->input("realizacion");
        $dateParts = explode("-", $fechaRe);
        $ano = isset($dateParts[0]) ? $dateParts[0] : null;
        $mes = isset($dateParts[1]) ? $dateParts[1] : null;
        $dia = isset($dateParts[2]) ? $dateParts[2] : null;
      
        //Nombre del operario
        $operario = $request->input("operario");


        // archivo
        if ($_FILES["archivo"]["error"] == UPLOAD_ERR_OK) {
          $archivo_actual =$_FILES["archivo"]["name"]; 
          $archivo_temp = $_FILES["archivo"]["tmp_name"];
          $destino = "./temp/" .  $archivo_actual;
      
          move_uploaded_file($archivo_temp , $destino);
          echo " El archivo actual es : $archivo_actual <br>";
          
        } else {
          $errores["archivo"] = " Error al subir el archivo." . $_FILES["archivo"]["error"];
        }
        
        //imagen
        if ($_FILES["imagen"]["error"] == UPLOAD_ERR_OK) {
          $imagen_actual = $_FILES["imagen"]["name"];
          $imagen_temp = $_FILES["imagen"]["tmp_name"];
          $destino = "./temp/" .  $imagen_actual;  
      
          move_uploaded_file($imagen_temp, $destino);
          
      } else {
          $errores["imagen"] = " Error al subir el archivo." . $_FILES["imagen"]["error"];
      }
      //--------------------------------------------------------------------------------------------------------------
      
       //Valor de los errores 
        if (empty($NIF)) {
          $errores["nif"] = " Error, no puede estar vacio ";
        };
        if (empty($nombre)) {
          $errores["nombre"] = " Error, no puede estar vacio ";
        };
        if (empty($nombre)) {
          $errores["apellidos"] = " Error, no puede estar vacio ";
        };
        if (empty($telefono)) {
          $errores["telefono"] = " Error, no puede estar vacio ";
        };
        if (empty($descripcion)) {
          $errores["descripcion"] = " Error, no puede estar vacio ";
        };
        if (empty($mail)) {
          $errores["mail"] = " Error, el campo de correo electrónico no puede estar vacío.";
        } elseif (strpos($mail, '@') === false || strpos($mail, '.') === false) {
          $errores["mail"] = " Error, el correo electrónico debe contener '@' y '.'.";
        };
        if (empty($codigoP)) {
          $errores["codigo"] = " Error, no puede estar vacio ";
        };
        if (!checkdate((int)$mes, (int)$dia, (int)$ano)) {
          $errores["realizacion"] = "Error, debe contener una fecha válida.";
          } elseif(strtotime($fechaRe) < strtotime($fecha_actual)) {
            $errores["realizacion"] = "La fecha de realización debe ser posterior a la fecha actual."; 
        }
      
        if (!empty($errores)) {
          return redirect()->route('tareas')->withErrors($errores)->withInput();
      }
  
      // Si no hay errores, realizar la lógica adicional
  
      return redirect()->route('tareas')->with('success', 'Formulario validado con éxito');

    
    }
    public static function validar(){
    }
      
}
?>