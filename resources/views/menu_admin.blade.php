@extends ('helper/navAdmin')

@section('titulo','menu')

@section('contenido')
<div class="titulos">Bienvenido</div>


<center>
    <a href="/menuAdministrador/reportes"><img src="{{asset('/reportes.jpg')}}" width="40%" height="10%" alt=""></a>
    <a href="/menuAdministrador/gestion"><img src="{{asset('/gestion.jpg')}}" width="40%" height="10%" alt=""></a>
</center>
@endsection