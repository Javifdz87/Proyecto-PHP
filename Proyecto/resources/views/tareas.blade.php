<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet"  href="css/tareas.css">
    <title>Tareas</title>
</head>
<body>
    @extends('app')

@section('content')
<div >
   <form method="post" action="" enctype="multipart/form-data">
       <label for="nif" class="required">NIF o CIF: <?php if (!empty($errores['nif'])) { echo '<span class="error">' . $errores['nif'] . '</span>'; } ?></label>
       <input type="text" maxlength="9" name="nif" id="nif">

       <label for="nombre" class="required">Nombre:<?php if (!empty($errores['nombre'])) { echo '<span class="error">' . $errores['nombre'] . '</span>'; } ?></label>
       <input type="text" name="nombre" id="nombre">

       <label for="nombre" class="required">Apellidos:<?php if (!empty($errores['apellidos'])) { echo '<span class="error">' . $errores['apellidos'] . '</span>'; } ?></label>
       <input type="text" name="apellidos" id="apellidos">

       <label for="telefono" class="required">Telefono de contacto:<?php if (!empty($errores['telefono'])) { echo '<span class="error">' . $errores['telefono'] . '</span>'; } ?></label>
       <input type="tel" name="telefono" maxlength="9" id="telefono">

       <label for="descripcion">Descripción:<?php if (!empty($errores['descripcion'])) { echo '<span class="error">' . $errores['descripcion'] . '</span>'; } ?></label>
       <textarea name="descripcion" id="descripcion" cols="30" rows="5"></textarea>
       

       <label for="mail" class="required">Correo electrónico:<?php if (!empty($errores['mail'])) { echo '<span class="error">' . $errores['mail'] . '</span>'; } ?></label>
       <input type="text" name="mail" id="mail">
       

       <label for="poblacion">Poblacion:</label>
       <input type="text" name="poblacion" id="poblacion">

       <label for="codigo" class="required">Codigo Postal:<?php if (!empty($errores['codigo'])) { echo '<span class="error">' . $errores['codigo'] . '</span>'; } ?></label>
       <input type="text" maxlength="5" pattern="\d{5}" name="codigo" id="codigo">
       

       <label for="opcion" class="required">Provincia:</label>
       <select name="provincia">
        @foreach($provincias as $provincia)
        <option value="{{ $provincia }}">{{ $provincia }}</option>
        @endforeach
    </select>

       <label for="estado">Estado:</label>
       <select name="estado" id="estado">
           <option value="b">B (Espera)</option>
           <option value="p">P (Pendiente)</option>
           <option value="r">R (Realizada)</option>
           <option value="c">C (Cancelada)</option>
       </select>

       <label for="creacion" class="required">Fecha de creacion de la tarea:</label>
       <input type="date" name="creacion" id="creacion">

       <label for="operario">Operario:</label>
       <select name="operario" id="operario">
           <option value="operario1">Ramon</option>
           <option value="operario2">Juan de Dios</option>
           <option value="operario3">Messi</option>
       </select>

       <label for="realizacion" class="required">Fecha de realizacion:<?php if (!empty($errores['realizacion'])) { echo '<span class="error">' . $errores['realizacion'] . '</span>'; } ?></label>
       <input type="date" name="realizacion" id="realizacion">
       

       <label for="anotaciones">Anotaciones posteriores:</label>
       <textarea name="anotaciones" id="anotaciones" cols="30" rows="5"></textarea>

       <label for="archivo">Fichero resumen de tareas realizadas:<?php if (!empty($errores['archivo'])) { echo '<span class="error">' . $errores['archivo'] . '</span>'; } ?></label>
       <input type="file" name="archivo" id="archivo">
       

       <label for="imagen">Fotos del trabajo realizado:<?php if (!empty($errores['imagen'])) { echo '<span class="error">' . $errores['imagen'] . '</span>'; } ?></label>
       <input type="file" name="imagen" id="imagen">
       

       <input type="submit" value="Guardar">
   </form>
</div>
   
@endsection
    
</body>
</html>

