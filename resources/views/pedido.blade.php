@extends ('helper/navIngreso')
@section ('bootstrap')

@endsection
@section('titulo','Pedido')

@section('contenido')

<link rel="stylesheet" href="{{ asset('css/propios.css') }}" />
<br><br>

<div class="table-cart">
    
    <table class="table table-striped table-hover table-bordered">
        <thead>
            <tr>
            <th>Producto</th>
            <th>subtotal</th>
            </tr>
        </thead>
        
        <tbody>            
            @foreach($cart as $item)
                <tr>
                    <td>Habitacion {{$item[1]}} N°{{$item[0]}}</td>
                    <td>{{$item[3]*$item[2]*$cambio['cambio']}} {{$cambio['nombre']}}</td>
                   
                </tr>
            @endforeach
            @foreach($serv as $item)
                <tr>
                    <td>{{$item[1]}} </td>
                    <td>{{$item[3]*$item[2]*$cambio['cambio']*$item[7]}} {{$cambio['nombre']}}</td>
                </tr>
            @endforeach
            @foreach($sal as $item)
                <tr>
                    <td>{{$item[1]}} </td>
                    <td>{{$item[3]*$item[2]*$cambio['cambio']}} {{$cambio['nombre']}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="table-cart2">
    <table class="table table-striped table-hover table-bordered">
        <thead>
            <tr>
            <th>Total de la compra</th>
            <th>{{$suma * $cambio['cambio']}} {{$cambio['nombre']}} </th>
            </tr>
        </thead>
        
        <tbody>            
            <td>Impuesto 13%</td>
            <td>{{$impuesto *$cambio['cambio']}} {{$cambio['nombre']}}</td>
        </tbody>
        <tbody>            
            <td>Total a pagar</td>
            <td>{{$total *$cambio['cambio']}} {{$cambio['nombre']}}</td>
        </tbody>

    </table>
    <center>
        <form action="{{route('procesar')}}" method="POST">
                        {{ csrf_field() }}

            <input type="text" name="suma" value="{{$suma}}" hidden>
            <input type="text" name="impuesto" value="{{$impuesto}}" hidden>
            <input type="text" name="total" value="{{$total}}" hidden>
            <input type="submit" class="btn btn-success" value="Procesar Pedido" >    
        </form> 
    </center>
</div>

@endsection