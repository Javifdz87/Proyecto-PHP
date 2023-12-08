<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet"  href="css/tareas.css">
    <title>Crear Tareas</title>
</head>
<body>
    @extends('navAdmin')

@section('content')
<div >
   <form method="POST" action="{{ route('editarTareaAdmin') }}">
   @csrf

       <label for="nif" class="required">NIF o CIF:</label>
       <input type="text" maxlength="9" name="nif" id="nif" disabled value="{{ $tareas['NIF'] }}">
       @if(isset($errores['nif']))
            <p class="error">{{ $errores['nif'] }}</p>
        @endif

       <label for="nombre" class="required">Nombre:</label>
       <input type="text" name="nombre" id="nombre" disabled value="{{ $tareas['Nombre'] }}">
       @if(isset($errores['nombre']))
            <p class="error">{{ $errores['nombre'] }}</p>
        @endif
       <label for="nombre" class="required">Apellidos:</label>
       <input type="text" name="apellidos" id="apellidos" disabled value="{{ $tareas['Apellidos'] }}">
       @if(isset($errores['apellidos']))
            <p class="error">{{ $errores['apellidos'] }}</p>
        @endif
       <label for="telefono" class="required">Telefono de contacto:</label>
       <input type="tel" name="telefono" maxlength="9" id="telefono" disabled value="{{ $tareas['Apellidos'] }}">
       @if(isset($errores['telefono']))
            <p class="error">{{ $errores['telefono'] }}</p>
        @endif
       <label for="descripcion" class="required">Descripción:</label>
       <textarea name="descripcion" id="descripcion" cols="30" rows="5" disabled value="{{ $tareas['Apellidos'] }}"></textarea>
       @if(isset($errores['descripcion']))
            <p class="error">{{ $errores['descripcion'] }}</p>
        @endif

       <label for="email" class="required">Correo electrónico:</label>
       <input type="text" name="email" id="email" disabled value="{{ $tareas['Apellidos'] }}">
       @if(isset($errores['email']))
            <p class="error">{{ $errores['email'] }}</p>
        @endif

       <label for="poblacion" class="required">Poblacion:</label>
       <input type="text" name="poblacion" id="poblacion" disabled value="{{ $tareas['Apellidos'] }}">
       @if(isset($errores['poblacion']))
            <p class="error">{{ $errores['poblacion'] }}</p>
        @endif

       <label for="codigo" class="required">Codigo Postal:</label>
       <input type="text" maxlength="5" pattern="\d{5}" name="codigo" id="codigo" disabled value="{{ $tareas['Apellidos'] }}">
       @if(isset($errores['codigo']))
            <p class="error">{{ $errores['codigo'] }}</p>
        @endif

       <label for="opcion" class="required">Provincia:</label>
       <select name="provincia" disabled value="{{ $tareas['Apellidos'] }}">
       @if(isset($provincias))
        @foreach($provincias as $provincia)
            <option value="{{ $provincia }}">{{ $provincia }}</option>
        @endforeach
    @endif
    
    </select>

       <label for="estado">Estado:</label>
       <select name="estado" id="estado" disabled value="{{ $tareas['Apellidos'] }}">
           <option value="b">B (Espera)</option>
           <option value="p">P (Pendiente)</option>
           <option value="r">R (Realizada)</option>
           <option value="c">C (Cancelada)</option>
       </select>

       <label for="creacion" class="required">Fecha de creacion de la tarea:</label>
       <input type="date" name="creacion" id="creacion" disabled value="{{ $tareas['Apellidos'] }}">
       @if(isset($errores['creacion']))
            <p class="error">{{ $errores['creacion'] }}</p>
        @endif

       <label for="opcion">Operario:</label>
       <select name="operario" disabled value="{{ $tareas['Apellidos'] }}">
       @if(isset($operarios))
       @foreach($operarios as $operario)
        <option value="{{ $operario }}">{{ $operario }}</option>
        @endforeach
        @endif
       </select>

       <label for="realizacion" class="required">Fecha de realizacion:</label>
       <input type="date" name="realizacion" id="realizacion" disabled value="{{ $tareas['Apellidos'] }}">
       @if(isset($errores['realizacion']))
            <p class="error">{{ $errores['realizacion'] }}</p>
        @endif

       <label for="anotaciones">Anotaciones posteriores:</label>
       <textarea name="anotaciones" id="anotaciones" cols="30" rows="5" disabled value="{{ $tareas['Apellidos'] }}"></textarea>

       
       <input type="submit" value="Guardar">
   </form>
</div>
   
@endsection
    
</body>
</html>
