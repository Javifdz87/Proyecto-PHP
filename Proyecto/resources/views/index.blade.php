<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="../css/login.css">
</head>
<body>
    <form method="POST" action="{{ route('login') }}" >
    @csrf
        <h1>Iniciar de sesion</h1>
        <label for="">Email</label>
        <input type="text" placeholder="Email" name="email"> <br>
        <label for="">Contraseña</label>
        <input type="password" placeholder="Contraseña" name="password"><br>
        <input type="submit" value="Iniciar sesion">
    </form>


</body>
</html>