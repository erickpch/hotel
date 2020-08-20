<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('titulo')</title>

   
    @yield('bootstrap')

</head>
<body style="background-color: #b0b0b0">
<link rel="stylesheet" href="{{ asset('css/propios.css') }}" />  
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <nav class="navbar navbar-dark bg-dark">
        <a class="navbar-brand" href="/menu">Inicio</a>
            
            
                <p class="text-right">   
                <a class="navbar-brand" href="/menu/reservas">Reservas</a>
                <a class="navbar-brand" href="/menu/compra_servicios">Servicios</a>
                <a class="navbar-brand" href="/opciones">Cuenta</a>         
                <a class="navbar-brand" href="/carrito">Carrito</a>      
        </p>
        <form action="{{route('logout_usuario')}}" method="POST">
                {{ csrf_field() }}
                <input type="submit" class="btn btn-light" value="logout">    
                </form>   
            
    </nav>

    @yield('contenido')
</body>
</html>