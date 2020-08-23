@extends ('helper/navIngreso')

@section('titulo','servicios')
@section('bootstrap')
        
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script> 

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.js"></script> 

        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">

        <link href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.css" rel="stylesheet">   

@endsection
@section('contenido')
<br>
@if ($errors->any())
                        <div class="alert alert-danger">
                            <center><strong>Whoops!</strong> Inserta una fecha valida<br><br></center>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
@endif
<div class='container'>
<center>
    <img src="{{asset($producto['link_imagen'])}}" alt="">
    <h1>{{$producto['nombre']}}</h1>
    <h4>Precio: {{$producto['precio']*$cambio['cambio']}} {{$cambio['nombre']}} /persona</h4>   
    <H4>{{$producto['descripcion']}}</H4>
</center>
</div>
<br>


<form class="form-horizontal" role="form" action="{{ route('carrito_serv') }}" method="POST">
            {{ csrf_field() }}
<div class="container text-center">
    <strong>Cantidad de personas: </strong><input type="number"  class="from-control" name="personas"><br><br>
     <h2>Seleccionar Fecha</h2>
     <input type="text" name="habitacion" value="{{$producto['id']}}" hidden >
     <input type="text" name="precio" value="{{$producto['precio']}}" hidden >
     <input type="text" name="nombre" value="{{$producto['nombre']}}" hidden >
     <input type="text" name="link" value="{{$producto['link_imagen']}}" hidden >
     <strong>fecha de inicio: </strong> <input type="text" id="datepicker" class="from-control" name="inicio">
     <strong>Fecha de salida: </strong> <input type="text" id="datepicker2" class="from-control" name="final"><br>

     
     <br>


</div>  
<center><button type="submit"  class="btn btn-primary btn-block">Agregar al carrito</button></center>

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
<center><a href="/menu/compra_servicios" type= 'button '><button type="button" class="btn btn-light">volver</button> </a></center>
@endsection