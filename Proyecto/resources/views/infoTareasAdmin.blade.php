<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lista de Tareas</title>
    <link rel="stylesheet" href="../css/infoTareas.css">


</head>

<body>
    @extends('navAdmin')

    @section('content')
    <div class="container">

        <div class="form-group">
            <label for="">ID:</label>
            <label>{{ $tareas['id'] }}</label>
        </div>

        <div class="form-group">
            <label for="">NIF:</label>
            <label>{{ $tareas['NIF'] }}</label>
        </div>

        <div class="form-group">
            <label for="">Nombre:</label>
            <label>{{ $tareas['Nombre'] }}</label>
        </div>

        <div class="form-group">
            <label for="">Apellidos:</label>
            <label>{{ $tareas['Apellidos'] }}</label>
        </div>

        <div class="form-group">
            <label for="">Teléfono:</label>
            <label>{{ $tareas['Telefono'] }}</label>
        </div>

        <div class="form-group">
            <label for="">Descripción:</label>
            <label>{{ $tareas['Descripcion'] }}</label>
        </div>

        <div class="form-group">
            <label for="">Email:</label>
            <label>{{ $tareas['email'] }}</label>
        </div>

        <div class="form-group">
            <label for="">Población:</label>
            <label>{{ $tareas['Poblacion'] }}</label>
        </div>

        <div class="form-group">
            <label for="">Código Postal:</label>
            <label>{{ $tareas['cod_Postal'] }}</label>
        </div>

        <div class="form-group">
            <label for="">Provincia:</label>
            <label>{{ $tareas['Provincia'] }}</label>
        </div>

        <div class="form-group">
            <label for="">Estado:</label>
            <label>{{ $tareas['Estado'] }}</label>
        </div>

        <div class="form-group">
            <label for="">Fecha Creación de Tarea:</label>
            <label>{{ $tareas['Creacion_tarea'] }}</label>
        </div>

        <div class="form-group">
            <label for="">Operario:</label>
            <label>{{ $tareas['Operario'] }}</label>
        </div>

        <div class="form-group">
            <label for="">Fecha de Realización:</label>
            <label>{{ $tareas['fecha_realizacion'] }}</label>
        </div>

        <div class="form-group">
            <label for="">Anotaciones Posteriores:</label>
            <label>{{ $tareas['Anotaciones_posteriores'] }}</label>
        </div>

        <div class="form-group">
            <label for="">Fichero Resumen de Tareas Realizadas</label>
            <label>En mantenimiento</label>
        </div>
        <div class="form-group">
            <label for="">Fotos del Trabajo Realizado</label>
            <label>En mantenimiento</label>
        </div>

    </div>
    @endsection
</body>

</html>