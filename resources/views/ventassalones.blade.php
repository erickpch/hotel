@extends ('helper/navIngreso')

@section('titulo','Salones')

@section('contenido')


<div class="titulos">Reserva de Salones</div>
    <br><br>

<div class="container">
	<div class="row">
    @foreach ($array as $serv)
    <div class="col-xs-6 text-center">
    <div class="card" style="width: 30rem  ;">
            <img class="card-img-top" src="{{asset($serv['link_imagen'])}}" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">{{$serv['nombre']}}</h5>
                <p class="card-text">Precio: {{$serv['precio']*$cambio['cambio']}} {{$cambio['nombre']}}</p>            
                <a href="{{route('mostrar_salon',$serv['nro_salon'])}}" class="btn btn-primary">Inspeccionar</a>
            </div>
        </div>
</div> 
    @endforeach
    </div>
</div>

@endsection