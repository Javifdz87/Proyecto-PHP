<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lista de Tareas</title>

    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 100%;
            margin: 20px 0;
        }

        .tabla {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #dee2e6;
            white-space: nowrap;
        }

        .table-header {
            background-color: #007bff;
            color: #fff;
        }

        th {
            font-weight: bold;
        }

        tbody tr:hover {
            background-color: #f5f5f5;
        }

        .btn {
            padding: 8px 12px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
        }

        .btn:hover {
            background-color: #0056b3;
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
                        <th>Teléfono</th>
                        <th>Descripción</th>
                        <th>Email</th>
                        <th>Población</th>
                        <th>Código Postal</th>
                        <th>Provincia</th>
                        <th>Estado</th>
                        <th>Fecha Creación de Tarea</th>
                        <th>Operario</th>
                        <th>Fecha de Realización</th>
                        <th>Anotaciones Posteriores</th>
                        <th>Fichero Resumen de Tareas Realizadas</th>
                        <th>Fotos del Trabajo Realizado</th>
                        <th>Operaciones</th>
                    </tr>
                </thead>
                <tbody>
                    
                </tbody>
            </table>
        </div>
    </div>
    @endsection
</body>

</html>
