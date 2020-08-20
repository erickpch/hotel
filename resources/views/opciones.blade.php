@extends ('helper/navIngreso')

@section('titulo','Menu')

@section('contenido')

    <center><h1>Opciones de cuenta</h1></center><br><br>
    <div style="width:800px; margin:0 auto;" >
    <form  action="{{ route('cambiar_datos') }}" method="POST">
    {{ csrf_field() }}
        <input type="text" name="id" value="{{$datos['id']}}" hidden >
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Nombre</span>
            </div>
            <input type="text" class="form-control" placeholder="Username" name="nombre" aria-label="Username" aria-describedby="basic-addon1" value="{{$datos['nombre']}}">
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Cedula de identidad</span>
            </div>
            <input type="text" class="form-control" placeholder="Username" name="ci"  aria-label="Username" aria-describedby="basic-addon1" value="{{$datos['ci']}}">
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Telefono</span>
            </div>
            <input type="text" class="form-control" placeholder="Username" name="telefono" aria-label="Username" aria-describedby="basic-addon1" value="{{$datos['telefono']}}">
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Pais</span>
            </div>
            <select name="pais" class="form-control" id="state_id" name="pais"  value="{{$datos['pais']}}">
                <option value="{{$datos['id_pais']}}" selected> {{$datos['nombre_pais']}} </option>
                <option value="1">Bolivia</option>
                <option value="2">Alemania</option>
                <option value="3">Argentina</option>
                <option value="4">Australia</option>
                <option value="5">Belgica</option>
                <option value="6">Brasil</option>
                <option value="7">canada</option>
                <option value="8">chile</option>
                <option value="9">China</option>
                <option value="10">Ecuador</option>
                <option value="11">España</option>
                <option value="12">Estados Unidos</option>
                <option value="13">Francia</option>
                <option value="14">Honduras</option>
                <option value="15">Mexico</option>
                <option value="16">Paraguay</option>
                <option value="17">Peru</option>
                <option value="18">Uruguay</option>
                <option value="19">Venezuela</option>
                
            </select>      
            </div>
        
            <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Moneda</span>
            </div>
            <select name="moneda" class="form-control" id="state_id" name="moneda"  value="{{$datos['moneda_id']}}">
                <option value="{{$datos['moneda_id']}}" selected> {{$datos['nombre_moneda']}} </option>
                <option value="1">Dolares</option>
                <option value="2">Bolivianos</option>
                <option value="3">soles</option>
                <option value="4">Yuanes</option>
                <option value="5">Euros</option>
                <option value="6">Pesos Mexicanos</option>
                

            </select>      
            </div>
            <button type="submit"  class="btn btn-primary btn-block"> Cambiar</button>


    </form>
</div>


@endsection