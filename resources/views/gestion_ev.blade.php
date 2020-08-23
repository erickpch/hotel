@extends ('helper/navAdmin')

@section('titulo','Gestion de Habitacion')

@section('contenido')


   
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.js"></script> 
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.css" rel="stylesheet">   

<br>

<div class='container'>
<form class="form-horizontal" role="form" action="{{route('modificar_e')}}" method="POST">
            {{ csrf_field() }}
<div class="container text-center">
<center>
<div class="subtitulos"> modificar datos </div>
    <img src="{{asset($producto['link_imagen'])}}"alt="">

  
    
    <input type="text" name="imagen" value="{{$producto['link_imagen']}}" hidden>
    <input type="text" name="id" value="{{$producto['nro_salon']}}" hidden>
    <div class="input-group mb-2 mr-sm-2">
        <div class="input-group-prepend">
            <div class="input-group-text">Nombre</div>
            <input type="text" class="form-control" id="inlineFormInputGroupUsername2" name="nombre" value="{{$producto['nombre']}}"> 
        </div>
      <br>


    <div class="input-group mb-2 mr-sm-2">
        <div class="input-group-prepend">
            <div class="input-group-text">Precio</div>
            <input type="text" class="form-control" id="inlineFormInputGroupUsername2" name="precio" value="{{$producto['precio']}}"> 
        </div>
      <br>
   

    </div>
    <div class="input-group mb-2 mr-sm-2">
        <div class="input-group-prepend">
            <div class="input-group-text">descripcion</div>
            <input type="text" class="form-control" id="inlineFormInputGroupUsername2" name="descripcion" value="{{$producto['descripcion']}}">
        </div>
     <br>   
    </div>
</center>
</div>
<br>
<center><button type="submit"  class="btn btn-success btn-lg">Modificar</button></center>
</form>


<br>
<form class="form-horizontal" role="form" action="{{ route('reservar_e') }}" method="POST">
            {{ csrf_field() }}
<div class="container text-center">
     <div class="subtitulos"> Inhabilitar salon</div>
     <strong>fecha de inicio: </strong> <input type="text" id="datepicker" class="from-control" name="inicio">
     <strong>Fecha de salida: </strong> <input type="text" id="datepicker2" class="from-control" name="final">
     <input type="text" name="id" value="{{$producto['nro_salon']}}" hidden>
<br><br>
</div>  
<center><button type="submit"  class="btn btn-warning btn-lg">Inhabilitar</button></center>
</form>




<script type="text/javascript">
$(function () {
    $( "#datepicker" ).datepicker({
        minDate: 0,  
        inline: true,
        showOtherMonths: true,
        dayNamesMin: ['Dom', 'Lun', 'Mar', 'Mier', 'Juev', 'Viern', 'Sab'],
        monthNames: ['enero','febrero','marzo','abril','mayo','junio','julio','agosto','septiembre','noviembre','diciembre'],
        dateFormat: 'yy/mm/dd',

        onClose: function (selectedDate) {
        $("#datepicker2").datepicker("option", "minDate", selectedDate);
        }
        });
    $('#datepicker2').datepicker({
      minDate: 0,
      inline: true,
      showOtherMonths: true,
      dayNamesMin: ['Dom', 'Lun', 'Mar', 'Mier', 'Juev', 'Viern', 'Sab'],
      monthNames: ['enero','febrero','marzo','abril','mayo','junio','julio','agosto','septiembre','noviembre','diciembre'],
      dateFormat: 'yy/mm/dd',
      
    });
});


</script>
</script>


<br><br>
<center><a href="/menuAdministrador/gestion" type= 'button '><button type="button" class="btn btn-light">volver</button> </a></center>


@endsection