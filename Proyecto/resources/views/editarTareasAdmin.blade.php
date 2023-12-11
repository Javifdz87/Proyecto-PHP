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
            <form method="POST" action="{{ route('editarTareaAdmin',['id'=>$tareas['id']]) }}">
                @csrf
                <h1 id="cabecera">Editor Administrador</h1>
                <div class="form-group">
                    <label for="">ID</label>
                    <input type="text" name="id" value="{{ $tareas['id'] }}" maxlength="9" readonly>
                </div>

                <div class="form-group">
                    <label for="">NIF: </label>
                    <input type="text" name="nif" value="{{ $tareas['NIF'] }}">
                    @if(isset($errores['nif']))
                    <p class="error">{{ $errores['nif'] }}</p>
                    @endif
                </div>
                <div>
                    <label for="nombre" class="required">Nombre:</label>
                    <input type="text" name="nombre" id="nombre" value="{{ $tareas['Nombre'] }}">
                    @if(isset($errores['nombre']))
                    <p class="error">{{ $errores['nombre'] }}</p>
                    @endif
                </div>
                <div>
                    <label for="nombre" class="required">Apellidos:</label>
                    <input type="text" name="apellidos" id="apellidos" value="{{ $tareas['Apellidos'] }}">
                    @if(isset($errores['apellidos']))
                    <p class="error">{{ $errores['apellidos'] }}</p>
                    @endif
                </div>

                <div>
                    <label for="telefono" class="required">Telefono de contacto:</label>
                    <input type="tel" name="telefono" maxlength="9" id="telefono" value="{{ $tareas['Telefono'] }}">
                    @if(isset($errores['telefono']))
                    <p class="error">{{ $errores['telefono'] }}</p>
                    @endif
                </div>
                <div>
                    <label for="descripcion" class="required">Descripción:</label>
                    <input type="text" name="descripcion" id="descripcion" value="{{ $tareas['Descripcion'] }}"></input>
                    @if(isset($errores['descripcion']))
                    <p class="error">{{ $errores['descripcion'] }}</p>
                    @endif
                </div>
                <div>
                    <label for="email" class="required">Correo electrónico:</label>
                    <input type="text" name="email" id="email" value="{{ $tareas['email'] }}">
                    @if(isset($errores['email']))
                    <p class="error">{{ $errores['email'] }}</p>
                    @endif
                </div>

                <div>
                    <label for="poblacion" class="required">Poblacion:</label>
                    <input type="text" name="poblacion" id="poblacion" value="{{ $tareas['Poblacion'] }}">
                    @if(isset($errores['poblacion']))
                    <p class="error">{{ $errores['poblacion'] }}</p>
                    @endif
                </div>

                <div>
                    <label for="codigo" class="required">Codigo Postal:</label>
                    <input type="text" maxlength="5" pattern="\d{5}" name="codigo" id="codigo"
                        value="{{ $tareas['cod_Postal'] }}">
                    @if(isset($errores['codigo']))
                    <p class="error">{{ $errores['codigo'] }}</p>
                    @endif

                </div>

                <div>
                    <label for="opcion" class="required">Provincia:</label>
                    <select name="provincia" value="{{ $tareas['Provincia'] }}">
                        @if(isset($provincias))
                        @foreach($provincias as $provincia)
                        <option value="{{ $provincia }}">{{ $provincia }}</option>
                        @endforeach
                        @endif

                    </select>
                </div>

                <div>
                    <label for="">Estado</label>
                    <input type="text" name="estado" value="{{ $tareas['Estado'] }}" readonly>
                </div>

                <div>
                    <label for="creacion" class="required">Fecha de creacion de la tarea:</label>
                    <input type="date" name="creacion" id="creacion" value="{{ $tareas['Creacion_tarea'] }}">
                    @if(isset($errores['creacion']))
                    <p class="error">{{ $errores['creacion'] }}</p>
                    @endif

                </div>

                <div>
                    <label for="opcion">Operario:</label>
                    <select name="operario" value="{{ $tareas['Operario'] }}">
                        @if(isset($operarios))
                        @foreach($operarios as $operario)
                        <option value="{{ $operario }}">{{ $operario }}</option>
                        @endforeach
                        @endif
                    </select>
                </div>

                <div>
                    <label for="">Fecha de Realización</label>
                    <input type="text" name="realizacion" value="{{ $tareas['fecha_realizacion'] }}" readonly>
                </div>

                <div>
                    <label for="">Anotaciones Posteriores</label>
                    <input type="text" name="anotaciones" value="{{ $tareas['Anotaciones_posteriores'] }}" readonly>
                </div>


                <input type="submit" value="Editar">
            </form>

        </div>
    </div>

    @endsection
</body>

</html>