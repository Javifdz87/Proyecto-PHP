<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Mis tareas - Bunglebuild S.L.</title>
    <link rel="stylesheet" href="../css/nav.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg ">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{route('panelAdmin')}}">Bunglebuild S.L.</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">    
                <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{route('vistaPendientes')}}" ><button id="bRegistrar">Listar tareas pendientes</button></a>
                    </li>
                <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{route('mostrarRegistro')}}" ><button id="bRegistrar">Registrar Nuevo Operador</button></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{route('crearTareas')}}" ><button id="bNuevaT">Nueva tarea</button></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('login')}}"><button id="bCerrar">Cerrar sesión</button></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    @yield('content')
</body>

</html>
