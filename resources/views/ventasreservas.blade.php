@extends ('helper/navIngreso')

@section('titulo','Reservas')

@section('contenido')
    <img src="{{asset('/res.jpg')}}" width="100%" height="5%" alt="">
    
    <br><br>
    <center>
    <a href="{{asset('/menu/reservas/habitaciones')}}"><img src="/reservas/hab.jpg" width="40%" height="10%" alt=""></a>
    <a href="{{asset('/menu/reservas/salones')}}"><img src="/reservas/salones.jpg" width="40%" height="10%" alt=""></a>
     </center>

     




<br><br>
     <center><a href="/menu" type= 'button '><button type="button" class="btn btn-light">volver</button> </a></center>
    
@endsection