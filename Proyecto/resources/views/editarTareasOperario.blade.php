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
    @extends('navOperario')

    @section('content')
    <div class="general">
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




        </div>
        <div class="container2">
            <form method="POST" action="{{ route('editarTareaOperario',['id'=>$tareas['id']]) }}">
                @csrf
                <h1 id="cabecera">Editor Operario</h1>
                <div class="form-group">
                    <label for="">ID</label>
                    <input type="text" name="id" value="{{ $tareas['id'] }}" readonly>
                </div>
                <div class="form-group">
                    <label for="">Estado</label>
                    <select name="estado" id="estado">
                        <option value="B (Espera)">B (Espera)</option>
                        <option value="P (Pendiente)">P (Pendiente)</option>
                        <option value="R (Realizada)">R (Realizada)</option>
                        <option value="C (Cancelada)">C (Cancelada)</option>
                    </select>

                </div>

                <div class="form-group">
                    <label for="">Anotaciones Posteriores</label>
                    <input type="text" name="anotaciones" value="{{ $tareas['Anotaciones_posteriores'] }}">
                </div>

                <div class="form-group">
                <label for="">Fecha de Realización</label>
                <input type="date" name="realizacion" id="realizacion">
                @if(isset($errores['realizacion']))
                    <p class="error">{{ $errores['realizacion'] }}</p>
                @endif
                </div>
                <input type="submit" value="Editar">
            </form>

        </div>
    </div>

    @endsection
</body>

</html>