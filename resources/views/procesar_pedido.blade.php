@extends ('helper/navIngreso')
@section ('bootstrap')

@endsection
@section('titulo','Procesar')

@section('contenido')
<link rel="stylesheet" href="{{ asset('css/propios.css') }}" />
<br><br>

<form action="{{route('facturar')}}" method="POST">
                        {{ csrf_field() }}
    <div class="factura">            
    <div class="titulos">Facturación</div>
        <div class="container">
            <div class="form-group"> <!-- Full Name -->
                <label for="full_name_id" class="control-label">Nombre Completo</label>
                <input type="text" class="form-control" id="full_name_id" name="nombre" >
            </div> 
            <div class="form-group"> <!-- Full Name -->
                <label for="full_name_id" class="control-label">Direccion</label>
                <input type="text" class="form-control" id="full_name_id" name="direccion">
            </div> 
            <div class="row">
                <div class="col">
                    <div class="form-group"> <!-- Full Name -->
                        <label for="full_name_id" class="control-label">Nit</label>
                        <input type="text" class="form-control" id="nit" name="nit">
                    </div> 
                </div>
                <div class="col">
                    <div class="form-group"> <!-- Full Name -->
                        <label for="full_name_id" class="control-label">Codigo Postal</label>
                        <input type="text" class="form-control" id="cp" name="cp">
                    </div> 
                </div>
            </div>
        

        <div class="row">
            <div class="col">
            <label for="full_name_id" class="control-label">Tipo de pago</label>      
            <select  class="form-control" id="tarjeta" name="tipo_pago">
                <option value="1">Visa</option>
                <option value="2">Master Card</option>
                <option value="3">Payonner</option>
            </select>
            </div>
            <div class="table-cart">
            <div class="rol">
                            
            <strong>Total pedido:</strong><p style="text-align:right;"> {{$suma}} {{$cambio['nombre']}} </p>      
            <strong>Impuesto: </strong> <p style="text-align:right;">  {{$impuesto}} {{$cambio['nombre']}} </p>   
                <hr />
            <strong>Total final: </strong><p style="text-align:right;"> {{$total}} {{$cambio['nombre']}} </p>

            <input type="text" class="form-control" id="cp" name="pedido" hidden value="{{$suma}}">
            <input type="text" class="form-control" id="cp" name="impuesto" hidden hidden value="{{$impuesto}}">    
            <input type="text" class="form-control" id="cp" name="total" hidden hidden value="{{$total}}">   
            </div>
            </div>
        </div>


        </div>


        <div class="credit-card">
            <p>Tarjeta de Credito</p>
        <div class="row ">
                <div class="col-md-12">
                    <input type="text" class="form-control" placeholder="Numero de tarjeta" /> <br>
                </div>
            </div>
        <div class="row ">
                <div class="col-md-3 col-sm-3 col-xs-3">
                    
                    <input type="text" class="form-control" placeholder="MM" />
                </div>
            <div class="col-md-3 col-sm-3 col-xs-3">
                    
                    <input type="text" class="form-control" placeholder="YY" />
                </div>
            <div class="col-md-3 col-sm-3 col-xs-3">
                    
                    <input type="text" class="form-control" placeholder="CCV" />
                </div>
            <div class="col-md-3 col-sm-3 col-xs-3">

            </div>
            </div>
            <br>
        <div class="row ">
                <div class="col-md-12 pad-adjust">

                    <input type="text" class="form-control" placeholder="Nombre en la tarjeta" />
                </div>
            </div>
        </div> 
        <center><input type="submit" class="btn btn-success" value="Procesar Pedido" > </center>
        </div>  
</form>
@endsection