@extends ('helper/navegacion')

@section('titulo','Inicio')

@section('contenido')

    <img src="../inicio.jpg" width="100%" height="10%" alt="">

    <br><br><br>

  

    <center>
    <a class="btn btn-secondary btn-lg" type="submit" href="{{route('login_usuario')}}">usuario  </a>  
    
    <a class="btn btn-secondary btn-lg" type="submit" href="{{route('login_administrador')}}">administrador</a>
    </center>
    @endsection