<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lista de Tareas</title>
    <link rel="stylesheet" href="../css/tablaTareas.css">
    
</head>

<body>
    @extends('navAdmin')

    @section('content')
    
    <div class="container">
        <div class="tabla">
            <table class="table table-hover">
                <thead>
                    <tr class="table-header">
                        <th colspan="18">Lista de Tareas (Administrador)</th>
                    </tr>
                    <tr>
                        <th>Id</th>
                        <th>Descripción</th>
                        <th>Estado</th>
                        <th>Operario</th>
                        <th>Operaciones</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($tareas) > 0)
                        @foreach($tareas as $tarea)
                            <tr>
                                <td>{{ $tarea['id'] }}</td>
                                <td>{{ $tarea['Descripcion'] }}</td>
                                <td>{{ $tarea['Estado'] }}</td>
                                <td>{{ $tarea['Operario'] }}</td>
                                <td>
                                    <a href="{{route('editarTareaAdmin',['id'=>$tarea['id']])}}">
                                        <button id="bEditar">&#x270F;</button>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="5">No hay tareas disponibles.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
    @endsection
</body>

</html>
