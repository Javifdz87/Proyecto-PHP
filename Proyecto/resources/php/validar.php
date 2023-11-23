<?php
$errores = [];
if (!$_POST) {
} else {
  include("./conexion.php");

  //Identificacion
  $NIF = filter_input(INPUT_POST, "nif");
  //Nombre de la perosna de contacto
  $nombre = filter_input(INPUT_POST, "nombre");
  //Nombre de la perosna de contacto
  $apellidos = filter_input(INPUT_POST, "apellidos");
  //Numero de telefono
  $telefono = filter_input(INPUT_POST, "telefono");
  //Descripcion de la tarea
  $descripcion = filter_input(INPUT_POST, "descripcion");
  //Correo electronico
  $mail = filter_input(INPUT_POST, "mail");
  //Poblacion
  $poblacion = filter_input(INPUT_POST, "poblacion");
// Codigo postal
$codigoP = filter_input(INPUT_POST, "codigo");
$dosValores = substr($codigoP, 0, 2);
var_dump($dosValores);

// Provincia  
$provincia = filter_input(INPUT_POST, "provincia");
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
  $estado = filter_input(INPUT_POST, "estado");
  
  //Fecha de realizacion
  $fecha_actual = date("d-m-Y");
  $fechaRe = filter_input(INPUT_POST, "realizacion");
  $dateParts = explode("-", $fechaRe);
  $ano = isset($dateParts[0]) ? $dateParts[0] : null;
  $mes = isset($dateParts[1]) ? $dateParts[1] : null;
  $dia = isset($dateParts[2]) ? $dateParts[2] : null;

  //Nombre del operario
  $operario = filter_input(INPUT_POST, "operario");
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

  if ($errores) {

  } else {
    
  };
};
//Si no coincide los dos primeros valores de cod de poblacion con los primeros del codigo postal error
?>