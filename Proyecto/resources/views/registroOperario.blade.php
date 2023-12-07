<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/registro.css">
  <title>Registro</title>
</head>

<body>
  @extends('navAdmin')

  @section('content')
  <div class="container">
    <form method="POST" action="{{ route('registroOperario') }}">
      @csrf
      <h1>Registrar Operario</h1>

      <label for="usuario">Operario</label>
      <input type="text" name="usuario" placeholder="Usuario">

      <label for="email">Email Operario</label>
      <input type="text" name="email" placeholder="Email">

      <label for="password">Contraseña</label>
      <input type="password" name="password" placeholder="Contraseña">

      <label for="password">Confirmar contraseña</label>
      <input type="password" name="repitPassword" placeholder="Contraseña">

      <button type="submit">Registrar Operario</button>

      <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
      <script type="text/javascript" src="scripts/register.js"></script>
    </form>
  </div>

  @endsection

</body>

</html>