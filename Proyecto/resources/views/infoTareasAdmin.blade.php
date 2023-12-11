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
    <div>
        <h1 id="cabecera">Información especifica</h1>
    </div>
    <div class="container">
        <div class="form-group">
            <label for="">ID:</label>
            <input value="{{ $tareas['id'] }}" Readonly></input>
        </div>

        <div class="form-group">
            <label for="">NIF:</label>
            <input value="{{ $tareas['NIF'] }}" Readonly></input>
        </div>

        <div class="form-group">
            <label for="">Nombre:</label>
            <input value="{{ $tareas['Nombre'] }}" Readonly></input>
        </div>

        <div class="form-group">
            <label for="">Apellidos:</label>
            <input value="{{ $tareas['Apellidos'] }}" Readonly></input>
        </div>

        <div class="form-group">
            <label for="">Teléfono:</label>
            <input value="{{ $tareas['Telefono'] }}" Readonly></input>
        </div>

        <div class="form-group">
            <label for="">Descripción:</label>
            <input value="{{ $tareas['Descripcion'] }}" Readonly></input>
        </div>

        <div class="form-group">
            <label for="">Email:</label>
            <input value="{{ $tareas['email'] }}" Readonly></input>
        </div>

        <div class="form-group">
            <label for="">Población:</label>
            <input value="{{ $tareas['Poblacion'] }}" Readonly></input>
        </div>

        <div class="form-group">
            <label for="">Código Postal:</label>
            <input value="{{ $tareas['cod_Postal'] }}" Readonly></input>
        </div>

        <div class="form-group">
            <label for="">Provincia:</label>
            <input value="{{ $tareas['Provincia'] }}" Readonly></input>
        </div>

        <div class="form-group">
            <label for="">Estado:</label>
            <input value="{{ $tareas['Estado'] }}" Readonly></input>
        </div>

        <div class="form-group">
            <label for="">Fecha Creación de Tarea:</label>
            <input value="{{ $tareas['Creacion_tarea'] }}" Readonly></input>
        </div>

        <div class="form-group">
            <label for="">Operario:</label>
            <input value="{{ $tareas['Operario'] }}" Readonly></input>
        </div>

        <div class="form-group">
            <label for="">Fecha de Realización:</label>
            <input value="{{ $tareas['fecha_realizacion'] }}" Readonly></input>
        </div>

        <div class="form-group">
            <label for="">Anotaciones Posteriores:</label>
            <input value="{{ $tareas['Anotaciones_posteriores'] }}" Readonly></input>
        </div>



    </div>
    @endsection
</body>

</html>