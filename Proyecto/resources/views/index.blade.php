<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lista de Tareas</title>

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
            margin-top: 20px;
            background-color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
            
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #dee2e6;
            white-space: nowrap;

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
            font-size: 20px;
            font-weight: bold;
            text-align: center;
        }

        .table-header td {
            border: none;
            text-align: center;
        }

        .operations {
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
                        <th colspan="18">Lista de Tareas</th>
                    </tr>
                    <tr>
                        <th>ID</th>
                        <th>NIF</th>
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
                    <!-- Add your table rows here -->
                </tbody>
            </table>
        </div>
    </div>
    @endsection
</body>

</html>
