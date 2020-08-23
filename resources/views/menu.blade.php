@extends ('helper/navIngreso')

@section('titulo','Menu')

@section('contenido')



    <div class="titulos">Bienvenido {{$datos['nombre']}}</div>
    <br>
    <center>
    <a href="{{asset('/menu/reservas')}}"><img src="../habitaciones.jpg" width="40%" height="10%" alt=""></a>
    <a href="{{asset('/menu/compra_servicios')}}"><img src="../servicio.jpg" width="40%" height="10%" alt=""></a>
     </center>
     
<br>
    
    
@endsection