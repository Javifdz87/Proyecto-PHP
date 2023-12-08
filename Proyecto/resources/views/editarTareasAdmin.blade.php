<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lista de Tareas</title>
    <link rel="stylesheet" href="../css/editarTareas.css">


</head>

<body>
    @extends('navAdmin')

    @section('content')
    <div class="general">
        <div class="container">
            <div class="form-group">
                <label for="">ID</label>
                <input type="text" name="id" disabled value="{{ $tareas['id'] }}">
            </div>

            <div class="form-group">
                <label for="">NIF </label>
                <input type="text" disabled value="{{ $tareas['NIF'] }}">

            </div>
            <div class="form-group">
                <label for="">Nombre</label>
                <input type="text" disabled value="{{ $tareas['Nombre'] }}">

            </div>
            <div class="form-group">
                <label for="">Apellidos</label>
                <input type="text" disabled value="{{ $tareas['Apellidos'] }}">

            </div>
            <div class="form-group"><label for="">Teléfono</label>
                <input type="text" disabled value="{{ $tareas['Telefono'] }}">

            </div>
            <div class="form-group">
                <label for="">Descripción</label>
                <input type="text" disabled value="{{ $tareas['Descripcion'] }}">

            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input type="text" disabled value="{{ $tareas['email'] }}">

            </div>
            <div class="form-group">
                <label for="">Población</label>
                <input type="text" disabled value="{{ $tareas['Poblacion'] }}">

            </div>
            <div class="form-group">
                <label for="">Código Postal</label>
                <input type="text" disabled value="{{ $tareas['cod_Postal'] }}">

            </div>
            <div class="form-group">
                <label for="">Provincia</label>
                <input type="text" disabled value="{{ $tareas['Provincia'] }}">
            </div>
            <div class="form-group">
                <label for="">Estado</label>
                <input type="text" name="estado" disabled value="{{ $tareas['Estado'] }}">

            </div>

            <div class="form-group">
                <label for="">Fecha Creación de Tarea</label>
                <input type="text" disabled value="{{ $tareas['Creacion_tarea'] }}">
            </div>
            <div class="form-group">
                <label for="">Operario</label>
                <input type="text" disabled value="{{ $tareas['Operario'] }}">
            </div>
            <div class="form-group">
                <label for="">Fecha de Realización</label>
                <input type="text" disabled value="{{ $tareas['fecha_realizacion'] }}">
            </div>
            <div class="form-group">
                <label for="">Anotaciones Posteriores</label>
                <input type="text" name="anotaciones" disabled value="{{ $tareas['Anotaciones_posteriores'] }}">
            </div>



        </div>
        <div class="container2">
            <form method="POST" action="{{ route('editarTareaAdmin',['id'=>$tareas['id']]) }}">
                @csrf
                <h1>Editor Administrador</h1>
                <div class="form-group">
                <label for="">ID</label>
                <input type="text" name="id"  value="{{ $tareas['id'] }}">
            </div>

            <div class="form-group">
                <label for="">NIF </label>
                <input type="text"  value="{{ $tareas['NIF'] }}">

            </div>
            <div class="form-group">
                <label for="">Nombre</label>
                <input type="text"  value="{{ $tareas['Nombre'] }}">

            </div>
            <div class="form-group">
                <label for="">Apellidos</label>
                <input type="text"  value="{{ $tareas['Apellidos'] }}">

            </div>
            <div class="form-group"><label for="">Teléfono</label>
                <input type="text"  value="{{ $tareas['Telefono'] }}">

            </div>
            <div class="form-group">
                <label for="">Descripción</label>
                <input type="text"  value="{{ $tareas['Descripcion'] }}">

            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input type="text"  value="{{ $tareas['email'] }}">

            </div>
            <div class="form-group">
                <label for="">Población</label>
                <input type="text"  value="{{ $tareas['Poblacion'] }}">

            </div>
            <div class="form-group">
                <label for="">Código Postal</label>
                <input type="text"  value="{{ $tareas['cod_Postal'] }}">

            </div>
            <div class="form-group">
                <label for="">Provincia</label>
                <input type="text"  value="{{ $tareas['Provincia'] }}">
            </div>
            <div class="form-group">
                <label for="">Estado</label>
                <input type="text" name="estado"  value="{{ $tareas['Estado'] }}">

            </div>

            <div class="form-group">
                <label for="">Fecha Creación de Tarea</label>
                <input type="text"  value="{{ $tareas['Creacion_tarea'] }}">
            </div>
            <div class="form-group">
                <label for="">Operario</label>
                <input type="text"  value="{{ $tareas['Operario'] }}">
            </div>
            <div class="form-group">
                <label for="">Fecha de Realización</label>
                <input type="text"  value="{{ $tareas['fecha_realizacion'] }}">
            </div>
            <div class="form-group">
                <label for="">Anotaciones Posteriores</label>
                <input type="text" name="anotaciones"  value="{{ $tareas['Anotaciones_posteriores'] }}">
            </div>
                <input type="submit" value="Editar">
            </form>

        </div>
    </div>

    @endsection
</body>

</html>