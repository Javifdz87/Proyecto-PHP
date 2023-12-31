<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Panel Operarios</title>
    <link rel="stylesheet" href="../css/tablaTareas.css">
    
</head>

<body>
    @extends('navOperario')

    @section('content')
    
    <div class="container">
        <div class="tabla">
            <table class="table table-hover">
                <thead>
                    <tr class="table-header">

                    <th colspan="18">Lista de Tareas (Operario: {{ $user_email }})</th>
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
                        <th>Operaciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($tareas as $tarea)
                    <tr> 
                        <td>{{ $tarea['id'] }}</td>         
                        <td>{{ $tarea['Nombre'] }}</td>
                        <td>{{ $tarea['Apellidos'] }}</td>
                        <td>{{ $tarea['Descripcion'] }}</td>
                        <td>{{ $tarea['email'] }}</td>
                        <td>{{ $tarea['Estado'] }}</td>
                        <td>{{ $tarea['Creacion_tarea'] }}</td>
                        <td>{{ $tarea['Operario'] }}</td>
                        <td>{{ $tarea['fecha_realizacion'] }}</td>
                        <td>
                            <a href="{{route('editarTareaOperario',['id'=>$tarea['id']])}}"><button id="bEditar">&#x270F;</button></a>
                            <a href="{{route('infoTareasOperario',['id'=>$tarea['id']])}}"><button id="bVista">&#x1F441;</button></a>
                        </td>
                    </tr>
                    @empty
                        <tr>
                            <td colspan="11">No hay tareas disponibles.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    @endsection
</body>

</html>
