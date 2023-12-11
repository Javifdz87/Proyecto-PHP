<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Eliminar Tarea</title>
    <link rel="stylesheet" href="../css/eliminarTarea.css">
</head>

<body>
    @extends('navAdmin')

    @section('content')
        <div class="container">
            <div class="tabla">
                <table class="table table-hover">
                    <thead>
                        <tr class="table-header">
                            <th colspan="18">Lista de Tareas</th>
                        </tr>
                        <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>Apellidos</th>
                            <th>Descripción</th>
                            <th>Email</th>
                            <th>Estado</th>
                            <th>Fecha Creación de Tarea</th>
                            <th>Operario</th>
                            <th>Fecha de Realización</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $tareas['id'] }}</td>
                            <td>{{ $tareas['Nombre'] }}</td>
                            <td>{{ $tareas['Apellidos'] }}</td>
                            <td>{{ $tareas['Descripcion'] }}</td>
                            <td>{{ $tareas['email'] }}</td>
                            <td>{{ $tareas['Estado'] }}</td>
                            <td>{{ $tareas['Creacion_tarea'] }}</td>
                            <td>{{ $tareas['Operario'] }}</td>
                            <td>{{ $tareas['fecha_realizacion'] }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="eliminar-tarea-form">
                <form action="{{ route('eliminarTareas', ['id' => $tareas['id']]) }}" method="POST">
                    @csrf
                    <h1>Eliminar Tarea</h1>
                    <p>¿Estás seguro de que quieres eliminar esta tarea?</p>
                    <div class="form-buttons">
                        <input type="submit" value="Sí">
                        
                    </div>
                </form>
                <a href="{{ route('panelAdmin') }}">
                    <button>No</button></a>
            </div>
        </div>
    @endsection
</body>

</html>
