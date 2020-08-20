@extends ('helper/navegacion')

@section('titulo','SignUp')

@section('contenido')

        @if ($errors->any())
                        <div class="alert alert-danger">
                            <center><strong>Whoops!</strong> Verifica los datos.<br><br></center>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
         @endif



<br><br>
    <link href="../plugin/boostrap/css/createaccount.css" rel="stylesheet" >

    <div class="container" >
            <form class="form-horizontal" role="form" action="{{ route('registrar_usuario') }}" method="POST">
            {{ csrf_field() }}
                <h2>Crear Cuenta</h2>
                <div class="form-group">
                    <label for="firstName" class="col-sm-3 control-label">Nombre*</label>
                    <div class="col-sm-9">
                    <input type="text" name="nombre" value="">
                    </div>
                </div>
                <div class="form-group">
                    <label for="lastName" class="col-sm-3 control-label">email*</label>
                    <div class="col-sm-9">
                    <input type="text" name="email" value="">
                    </div>
                </div>
                <div class="form-group">
                    <label for="email" class="col-sm-3 control-label">CI *</label>
                    <div class="col-sm-9">
                    <input type="text" name="ci" value="">
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col-sm-3 control-label">Password*</label>
                    <div class="col-sm-9">
                    <input type="password" name="password" value="">
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col-sm-3 control-label">Confirm Password*</label>
                    <div class="col-sm-9">
                    <input type="password" name="password_confirm" value="">
                    </div>
                </div>

                <label for="state_id" class="control-label">Pais</label>
                <br>
    <select name="pais" class="form-control" id="state_id">
        <option value="1" selected>Bolivia</option>
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


                <br> <!-- /.form-group -->
                <div class="form-group">
                    <div class="col-sm-9 col-sm-offset-3">
                        <span class="help-block">*Required fields</span>
                    </div>
                </div>
               
                <button type="submit"  class="btn btn-primary btn-block">registrar</button>
            </form> <!-- /form -->
        </div> <!-- ./container -->


@endsection