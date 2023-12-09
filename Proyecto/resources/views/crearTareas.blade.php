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
    <div class="container">
        <form class="task-form" method="POST" action="{{ route('crearTareas') }}">
            @csrf

            <!-- Section 1: Datos Personales -->
            <div class="form-section">
                <h2>Datos Personales</h2>

                <label for="nif" class="required">NIF o CIF:</label>
                <input type="text" maxlength="9" name="nif" id="nif">
                @if(isset($errores['nif']))
                    <p class="error">{{ $errores['nif'] }}</p>
                @endif

                <label for="nombre" class="required">Nombre:</label>
                <input type="text" name="nombre" id="nombre">
                @if(isset($errores['nombre']))
                    <p class="error">{{ $errores['nombre'] }}</p>
                @endif

                <label for="apellidos" class="required">Apellidos:</label>
                <input type="text" name="apellidos" id="apellidos">
                @if(isset($errores['apellidos']))
                    <p class="error">{{ $errores['apellidos'] }}</p>
                @endif

                <label for="telefono" class="required">Telefono de contacto:</label>
                <input type="tel" name="telefono" maxlength="9" id="telefono">
                @if(isset($errores['telefono']))
                    <p class="error">{{ $errores['telefono'] }}</p>
                @endif
            </div>

            <!-- Section 2: Descripción y Detalles -->
            <div class="form-section">
                <h2>Descripción y Detalles</h2>

                <label for="descripcion" class="required">Descripción:</label>
                <textarea name="descripcion" id="descripcion" cols="30" rows="5"></textarea>
                @if(isset($errores['descripcion']))
                    <p class="error">{{ $errores['descripcion'] }}</p>
                @endif

                <label for="email" class="required">Correo electrónico:</label>
                <input type="text" name="email" id="email">
                @if(isset($errores['email']))
                    <p class="error">{{ $errores['email'] }}</p>
                @endif

                <label for="poblacion" class="required">Poblacion:</label>
                <input type="text" name="poblacion" id="poblacion">
                @if(isset($errores['poblacion']))
                    <p class="error">{{ $errores['poblacion'] }}</p>
                @endif

                <label for="codigo" class="required">Codigo Postal:</label>
                <input type="text" maxlength="5" pattern="\d{5}" name="codigo" id="codigo">
                @if(isset($errores['codigo']))
                    <p class="error">{{ $errores['codigo'] }}</p>
                @endif
            </div>

            <!-- Section 3: Estado y Fechas -->
            <div class="form-section">
                <h2>Estado y Fechas</h2>

                <label for="provincia" class="required">Provincia:</label>
                <select name="provincia">
                    @if(isset($provincias))
                        @foreach($provincias as $provincia)
                            <option value="{{ $provincia }}">{{ $provincia }}</option>
                        @endforeach
                    @endif
                </select>

                <label for="estado">Estado:</label>
                <select name="estado" id="estado">
                    <option value="b">B (Espera)</option>
                    <option value="p">P (Pendiente)</option>
                    <option value="r">R (Realizada)</option>
                    <option value="c">C (Cancelada)</option>
                </select>

                <label for="creacion" class="required">Fecha de creacion de la tarea:</label>
                <input type="date" name="creacion" id="creacion">
                @if(isset($errores['creacion']))
                    <p class="error">{{ $errores['creacion'] }}</p>
                @endif
            </div>

            <!-- Section 4: Operario y Anotaciones -->
            <div class="form-section">
                <h2>Operario y Anotaciones</h2>

                <label for="operario">Operario:</label>
                <select name="operario">
                    @if(isset($operarios))
                        @foreach($operarios as $operario)
                            <option value="{{ $operario }}">{{ $operario }}</option>
                        @endforeach
                    @endif
                </select>

                <label for="realizacion" class="required">Fecha de realizacion:</label>
                <input type="date" name="realizacion" id="realizacion">
                @if(isset($errores['realizacion']))
                    <p class="error">{{ $errores['realizacion'] }}</p>
                @endif

                <label for="anotaciones">Anotaciones posteriores:</label>
                <textarea name="anotaciones" id="anotaciones" cols="30" rows="5"></textarea>
            </div>

            <!-- Botón de envío -->
            <input type="submit" value="Guardar">
        </form>
    </div>
    @endsection
</body>
</html>
