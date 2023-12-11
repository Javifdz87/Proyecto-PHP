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
    <div>
        <div>
            <img src="../fotos/supernova.png" alt="hola">

        </div>
        <div>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <h1>Iniciar sesión</h1>
                <label for="email">Email</label>
                <input type="text" placeholder="Email" name="email"> <br>
                @if(isset($errores['email']))
                <p class="error">{{ $errores['email'] }}</p>
                @endif

                <label for="password">Contraseña</label>
                <input type="password" placeholder="Contraseña" name="password"><br>
                @if(isset($errores['password']))
                <p class="error">{{ $errores['password'] }}</p>
                @endif

                @if(isset($errores['noCoinciden']))
                <p class="error">{{ $errores['noCoinciden'] }}</p>
                @endif

                <input type="submit" value="Iniciar sesión">
            </form>
        </div>
    </div>


</body>

</html>