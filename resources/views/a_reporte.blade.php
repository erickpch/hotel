@extends ('helper/navAdmin')

@section('titulo','Gestion')

@section('contenido')
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.js"></script> 
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.css" rel="stylesheet">  


    <div class="titulos">Reportes</div>



<br>


<form class="form-horizontal" role="form" action="{{ route('diario') }}" method="POST">
            {{ csrf_field() }}
<div class="container text-center">
     <div class="subtitulos"> Reporte diario</div>
     <strong>Dia: </strong> <input type="text" id="datepicker" class="from-control" name="fecha">
<br><br>
</div>  
<center><button type="submit"  class="btn btn-warning btn-lg">Ver Reporte</button></center>
</form>
</div>





<form class="form-horizontal" role="form" action="{{ route('mensual') }}" method="POST">
            {{ csrf_field() }}
<div class="container text-center">
     <div class="subtitulos"> Reporte Mensual</div>
     <strong>Mes </strong> <select name="mes" id="">
     <option value="1">enero</option>
     <option value="2">febrero</option>
     <option value="3">marzo</option>
     <option value="4">abril</option>
     <option value="5">mayo</option>
     <option value="6">junio</option>
     <option value="7">julio</option>
     <option value="8">agosto</option>
     <option value="9">septiembe</option>
     <option value="10">octubre</option>
     <option value="11">noviembre</option>
     <option value="12">diciembre</option>
     </select>

     <strong>Año </strong> <select name="año" id="">
     <option value="2020">2020</option>
     <option value="2021">2021</option>
     <option value="2022">2022</option>
     <option value="2023">2023</option>
     <option value="2024">2024</option>


     </select>
<br><br>
</div>  
<center><button type="submit"  class="btn btn-warning btn-lg">Ver Reporte</button></center>
</form>









    
<script type="text/javascript">
$(function () {
    $( "#datepicker" ).datepicker({
         
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
     
      inline: true,
      showOtherMonths: true,
      showOtherYears:true,
      monthNames: ['enero','febrero','marzo','abril','mayo','junio','julio','agosto','septiembre','noviembre','diciembre'],
      dateFormat: 'yy/mm',
      showButtonPanel: true,
    });
});



</script>


@endsection