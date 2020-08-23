@extends ('helper/navIngreso')
@section ('bootstrap')

@endsection
@section('titulo','Carrito')

@section('contenido')
<link rel="stylesheet" href="{{ asset('css/propios.css') }}" />
<center><div class="titulos"> Carrito de compras</center>

<div class="table-cart">
   <center> <a href="{{route('cart-trash')}}" class="btn btn-danger">
        vaciar carrito <i class="fa fa-trash"></i>
    </a>
    </center>
    <br>

    @if(!empty($cart))
<div class="table-responsive">
    <table class="table table-striped table-hover table-bordered">
        <thead>
            <tr>
                <th>Habitaciones</th>
                <th>Producto</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>subtotal</th>
                <th>Quitar</th>
            </tr>      
        </thead>

        <tbody>
            @foreach ($cart as $item)
                <tr>
                    <td><img src="{{asset($item[4])}}" alt=""></td>
                    <td>Habitacion {{$item[1]}} N°{{$item[0]}}</td>
                    <td>{{$item[3]*$cambio['cambio']}} {{$cambio['nombre']}} /dia</td>
                    <td>{{$item[2]}} dias</td>
                    <td>{{$item[3]*$item[2]*$cambio['cambio']}} {{$cambio['nombre']}}</td>
                    <td>
                        
                        <form action="{{route('cart-del')}}" method="POST">
                        {{ csrf_field() }}

                            <input type="text" name="id" value="{{$item[0]}}" hidden>
                            <input type="submit" class="btn btn-danger" value="Eliminar" >    
                        </form> 
                    </td>
                </tr>

            @endforeach
        </tbody>
    </table>
    @endif

    @if(!empty($serv))
    <table class="table table-striped table-hover table-bordered">
        <thead>
            <tr>
                <th>Servicios</th>
                <th>Producto</th>
                <th>Precio/dia</th>
                <th>Personas</th>
                <th>Dias</th>
                <th>subtotal</th>
                <th>Quitar</th>
            </tr>      
        </thead>

        <tbody>
            @foreach ($serv as $item)
                <tr>
                    <td><img src="{{asset($item[4])}}"alt=""></td>
                    <td>{{$item[1]}} </td>
                    <td>{{$item[3]*$cambio['cambio']}} {{$cambio['nombre']}} /dia</td>
                    <td>{{$item[7]}} personas</td>
                    <td>{{$item[2]}} dias</td>
                    <td>{{$item[3]*$item[2]*$cambio['cambio']*$item[7]}} {{$cambio['nombre']}}</td>
                    <td>
                        
                        <form action="{{route('del_serv')}}" method="POST">
                        {{ csrf_field() }}

                            <input type="text" name="id" value="{{$item[0]}}" hidden>
                            <input type="submit" class="btn btn-danger" value="Eliminar" >    
                        </form> 
                    </td>
                </tr>

            @endforeach
        </tbody>
    </table>

@endif

@if(!empty($sal))
    <table class="table table-striped table-hover table-bordered">
        <thead>
            <tr>
                <th>Servicios</th>
                <th>Producto</th>
                <th>Precio/dia</th>
                <th>Dias</th>
                <th>subtotal</th>
                <th>Quitar</th>
            </tr>      
        </thead>

        <tbody>
            @foreach ($sal as $item)
                <tr>
                    <td><img src="{{asset($item[4])}}" alt=""></td>
                    <td>{{$item[1]}} </td>
                    <td>{{$item[3]*$cambio['cambio']}} {{$cambio['nombre']}} /dia</td>                    
                    <td>{{$item[2]}} dias</td>
                    <td>{{$item[3]*$item[2]*$cambio['cambio']}} {{$cambio['nombre']}}</td>
                    <td>
                        
                        <form action="{{route('del_sal')}}" method="POST">
                        {{ csrf_field() }}

                            <input type="text" name="id" value="{{$item[0]}}" hidden>
                            <input type="submit" class="btn btn-danger" value="Eliminar" >    
                        </form> 
                    </td>
                </tr>

            @endforeach
        </tbody>
    </table>
   
</div>
@endif
@if((!empty($sal)) || (!empty($serv) )|| (!empty($cart)))
         <center><a class="btn btn-success btn-lg" href="{{route('pedido')}}"  >Procesar pedido</a></center>
    @endif


</div>
@endsection