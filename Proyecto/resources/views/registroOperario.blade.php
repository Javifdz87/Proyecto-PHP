<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registrar</title>
  <link rel="stylesheet" type="text/css" href="./css/registro.css" />


</head>

<body>
@extends('navAdmin')

@section('content')
  <form>
    <label for="usuario">Usuario</label>
    <input type="text" id="usuario" placeholder="Usuario">

    <label for="email">Email</label>
    <input type="text" id="email" placeholder="Email">

    <label for="password">Contraseña</label>
    <input type="password" id="password" placeholder="Contraseña">

    <label for="password">Confirmar contraseña</label>
    <input type="password" id="password" placeholder="Contraseña">

    <button type="button">Registrar Operario</button>
    <a href="index.html"">Volver</a>

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.4.min.js"></script> 
    <script type="text/javascript" src="scripts/register.js"></script>
  </form>
  @endsection

</body>

</html>
