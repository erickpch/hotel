<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('titulo')</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

</head>
<body style="background-color: #b0b0b0">
    
    <nav class="navbar navbar-dark bg-dark">
        <a class="navbar-brand" href="/">Inicio</a>
        <p class="text-right">
            <a class="navbar-brand" href="/habitaciones">Habitaciones</a>
            <a class="navbar-brand" href="/servicios">Servicios</a>
            <a class="navbar-brand" href="/login">Login</a>
            </p>
    </nav>

    @yield('contenido')
</body>
</html>