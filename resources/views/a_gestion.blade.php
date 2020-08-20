@extends ('helper/navAdmin')

@section('titulo','Gestion')

@section('contenido')


<div class="titulos">Gestion de productos</div>
<div class="table-cart">
    <div class="table-responsive">
        <table class="table table-striped table-hover table-bordered">
            <thead>
                <tr>
                    <th>Habitaciones</th>
                    <th>imagen</th>
                    <th>Acciones</th>
                </tr>   
            </thead>
            <tbody>
                 @foreach ($hab as $item)
                    <tr>
                        <td>Habitacion {{$item['nombre']}} N°{{$item['nro_habitacion']}}</td>
                        <td style="width:30%"><img src="{{$item['link_imagen']}}" alt=""></td>
                        <td style="width:10%">
                            <form action="{{route('verificar_h')}}" method="POST">
                            {{ csrf_field() }}
                            <input type="text" name="id" value="{{$item['nro_habitacion']}}" hidden>
                            <input type="submit" class="btn btn-success" value="Editar" > 
                            </form> 

                            <form action="{{route('eliminar_h')}}" method="POST">
                            {{ csrf_field() }}
                            <input type="text" name="id" value="{{$item['nro_habitacion']}}" hidden>
                            <input type="submit" class="btn btn-danger" value="Eliminar" > 
                            </form>  
                        </td>  
                    </tr>
                @endforeach  
            </tbody>
        </table>

       
        <table class="table table-striped table-hover table-bordered">
            <thead>
                <tr >                
                    <th>Servicio</th>
                    <th>imagen</th>
                    <th>Acciones</th>
                </tr>   
            </thead>
            <tbody>
                 @foreach ($serv as $item)
                    <tr>
                        <td>{{$item['nombre']}}</td>
                        <td style="width:30%"><img src="{{$item['link_imagen']}}" alt=""></td>
                        <td style="width:10%">
                            <form action="{{route('verificar_s')}}" method="POST">
                            {{ csrf_field() }}
                            <input type="text" name="id" value="{{$item['id']}}" hidden>
                            <input type="submit" class="btn btn-success" value="Editar" > 
                            </form> 
                            <form action="{{route('eliminar_s')}}" method="POST">
                            {{ csrf_field() }}
                            <input type="text" name="id" value="{{$item['id']}}" hidden>
                            <input type="submit" class="btn btn-danger" value="Eliminar" > 
                            </form>  
                        </td>  
                    </tr>
                @endforeach  
            </tbody>
        </table>

        <table class="table table-striped table-hover table-bordered">
            <thead>
                <tr>
                    <th>Salon</th>
                    <th>imagen</th>
                    <th>Acciones</th>
                </tr>   
            </thead>
            <tbody>
                 @foreach ($evento as $item)
                    <tr>
                        <td>{{$item['nombre']}}</td>
                        <td style="width:30%"><img src="{{$item['link_imagen']}}" alt=""></td>
                        <td style="width:10%">
                            <form action="{{route('verificar_e')}}" method="POST">
                            {{ csrf_field() }}
                            <input type="text" name="id" value="{{$item['nro_salon']}}" hidden>
                            <input type="submit" class="btn btn-success" value="Editar" > 
                            </form> 
                            <form action="{{route('eliminar_s')}}" method="POST">
                            {{ csrf_field() }}
                            <input type="text" name="id" value="{{$item['nro_salon']}}" hidden>
                            <input type="submit" class="btn btn-danger" value="Eliminar" > 
                            </form>  
                        </td>  
                    </tr>
                @endforeach  
            </tbody>
        </table>

    </div>
</div>
@endsection