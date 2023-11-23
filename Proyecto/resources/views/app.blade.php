<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Mis tareas - Bunglebuild S.L.</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa; /* Un suave tono gris claro */
        }

        .color-container {
            width: 16px;
            height: 16px;
            display: inline-block;
            border-radius: 50%; /* Para hacer un círculo en lugar de un cuadrado */
            margin-right: 8px; /* Separación entre contenedores de color */
        }

        a {
            text-decoration: none;
            color: #007bff; /* Azul brillante para enlaces */
        }

        nav {
            background-color: #343a40; /* Un tono oscuro para el fondo del navbar */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Sutil sombra para un toque moderno */
        }

        .navbar-brand {
            color: #ffffff; /* Texto blanco para el nombre de la marca */
            font-weight: bold;
        }

        .navbar-toggler {
            border-color: #ffffff; /* Botón de alternancia en blanco */
        }

        .navbar-toggler-icon {
            background-color: #ffffff; /* Icono de alternancia en blanco */
        }

        .navbar-nav {
            margin-left: auto; /* Mueve los elementos del navbar a la derecha */
        }

        .nav-link {
            color: #ffffff; /* Texto blanco para los enlaces del navbar */
            margin-left: 20px; /* Espaciado entre elementos del navbar */
        }

        .nav-link:hover {
            color: #007bff; /* Cambia el color del texto al pasar el mouse sobre los enlaces */
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Bunglebuild S.L.</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#"><button>Nueva tarea</button></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Cerrar sesión</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    @yield('content')
</body>

</html>
