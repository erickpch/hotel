@extends ('helper/navAdmin')

@section('titulo','Gestion de Servicio')

@section('contenido')

<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.css" rel="stylesheet">   
<br>
<div class='container'>
<form class="form-horizontal" role="form" action="{{route('modificar_s')}}" method="POST">
            {{ csrf_field() }}
<div class="container text-center">
<center>
    <div class="subtitulos"> modificar datos </div>


    <img src="{{$producto['link_imagen']}}" alt="">
    <input type="text" name="imagen" value="{{$producto['link_imagen']}}" hidden>
    <input type="text" name="id" value="{{$producto['id']}}" hidden>
<br><br>
    <div class="input-group mb-2 mr-sm-2">
        <div class="input-group-prepend">
            <div class="input-group-text">Nombre</div>
            <input type="text" class="form-control" id="inlineFormInputGroupUsername2" name="nombre" value="{{$producto['nombre']}}"> 
        </div>
</div>
<br>
    <div class="input-group mb-2 mr-sm-2">
        <div class="input-group-prepend">
            <div class="input-group-text">Precio</div>
            <input type="text" class="form-control" id="inlineFormInputGroupUsername2" name="precio" value="{{$producto['precio']}}"> 
        </div>
      </div>
<br>

    <div class="input-group mb-2 mr-sm-2">
        <div class="input-group-prepend">
            <div class="input-group-text">Capacidad</div>
            <input type="text" class="form-control" id="inlineFormInputGroupUsername2" name="capacidad" value="{{$producto['cap_maxima']}}"> 
        </div>
    </div>
<br>

   
    
    <div class="input-group mb-2 mr-sm-2">
        <div class="input-group-prepend">
            <div class="input-group-text">descripcion</div>
            <input type="text" class="form-control" id="inlineFormInputGroupUsername2" name="descripcion" value="{{$producto['descripcion']}}">
        </div>
    </div>
<br>
</center>
</div>
<br>
<center><button type="submit"  class="btn btn-success btn-lg">Modificar</button></center>
</form>
</div>

@endsection