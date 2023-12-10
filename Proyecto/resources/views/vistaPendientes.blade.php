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
                    <tr> 
                        <td>{{ $tareas['id'] }}</td>         
                        <td>{{ $tareas['Descripcion'] }}</td>
                        <td>{{ $tareas['Estado'] }}</td>
                        <td>{{ $tareas['Operario'] }}</td>
                        <td>

                            <a href="{{route('editarTareaAdmin',['id'=>$tareas['id']])}}"><button id="bEditar">&#x270F;</button></a>

                        </td>
                    </tr>
                        <tr>
                            <td colspan="11">No hay tareas disponibles.</td>
                        </tr>
                </tbody>
            </table>
        </div>
    </div>
    @endsection
</body>

</html>
