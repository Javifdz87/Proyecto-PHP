<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lista de Tareas</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            margin-top: 50px;
        }

        .tabla {
            background-color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 15px 25px; /* Ajusta el padding para que las celdas sean más grandes */
            text-align: left;
            border-bottom: 1px solid #dee2e6;
        }

        th {
            background-color: #007bff;
            color: white;
        }

        tbody tr:hover {
            background-color: #f5f5f5;
        }

        .table-header {
            background-color: #007bff;
            color: white;
            font-size: 24px; /* Ajusta el font-size para que el encabezado sea más grande */
            font-weight: bold;
            text-align: center;
        }

        .table-header td {
            border: none;
            text-align: center;
        }

    
    </style>
</head>

<body>
    @extends('app')

    @section('content')
    <div class="container">
        <div class="tabla">
            <table class="table table-hover">
                <thead>
                    <tr class="table-header">
                        <td scope="col" colspan="18">Lista de tareas</td>
                    </tr>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">NIF</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellidos</th>
                        <th scope="col">Teléfono</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Email</th>
                        <th scope="col">Población</th>
                        <th scope="col">Código Postal</th>
                        <th scope="col">Provincia</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Fecha Creación de Tarea</th>
                        <th scope="col">Operario</th>
                        <th scope="col">Fecha de Realización</th>
                        <th scope="col">Anotaciones Posteriores</th>
                        <th scope="col">Fichero Resumen de Tareas Realizadas</th>
                        <th scope="col">Fotos del Trabajo Realizado</th>
                        <th scope="col">Operaciones</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Aquí puedes agregar tus filas de datos -->
                </tbody>
            </table>
        </div>
    </div>
    @endsection
</body>

</html>
