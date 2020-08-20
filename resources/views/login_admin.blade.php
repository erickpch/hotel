@extends ('helper/navegacion')

@section('titulo','Administrador')

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


    <link href="../plugin/boostrap/css/login.css" rel="stylesheet" >

<!------ Include the above in your HEAD tag ---------->

<div class="sidenav2">
         <div class="login-main-text2">
            <h1>Hotel Imperio<br><br></h2> <h3>Cuenta de Administrador</h2>
            
         </div>
      </div>
      <div class="main">
         <div class="col-md-6 col-sm-12">
            <div class="login-form">
               <form action="" method="POST">
               {{ csrf_field() }}
                  <div class="form-group">
                     <label>Correo</label>
                     <input type="text" class="form-control" name="email" placeholder="Ingrese correo aqui" value="">
                  </div>
                  <div class="form-group">
                     <label>Contraseña</label>
                     <input type="password" class="form-control" name="password" placeholder="ingrese contrasea aqui" value="">
                  </div>
                  <button type="submit" class="btn btn-black">Login</button>
                 
               </form>
            </div>
         </div>
      </div>
    

@endsection