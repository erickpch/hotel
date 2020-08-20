<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="#" />  
    <title>Reporte diario</title>
      
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../plugin/boostrap/css/bootstrap.min.css">
    <!-- CSS personalizado --> 
    <link rel="stylesheet" href="../css/propios.css">  
      
    <!--datables CSS básico-->
    <link rel="stylesheet" type="text/css" href="../datatables/datatables.min.css"/>
    <!--datables estilo bootstrap 4 CSS-->  
    <link rel="stylesheet"  type="text/css" href="../datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">
           
    <!--font awesome con CDN-->  
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">  
      
  </head>
    
  <body> 

  <body style="background-color: #b0b0b0">
<link rel="stylesheet" href="{{ asset('css/propios.css') }}" />  
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <nav class="navbar navbar-dark bg-dark">
        <a class="navbar-brand" href="/menuAdministrador">Inicio</a>
            
            <p class="text-right"> 
            <a class="navbar-brand" href="/menuAdministrador/reportes">Reportes</a></li>
            <a class="navbar-brand" href="/menuAdministrador/gestion">Gestion</a></li>
            </p>
                
            <form action="{{route('logout_admin')}}" method="POST">
                {{ csrf_field() }}
            <input type="submit" class="btn btn-light" value="logout">  
            </form>
            </nav>
            <header>
        <div class="titulos"> <h1 class="text-center text-dark">Reporte Diario</h1></div>
      
     </header>    
    <div style="height:50px"></div>

    <div class="container">
    <div class="subtitulos">Habitaciones reservadas</div>
        <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">        
                        <table  class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>N° de pedidos</th>
                                <th>Ganancias</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                      
                            <tr>                        
                            <td>{{$pedidos}}</td>
                            <td>{{$ganancias}} dolares</td>
                        
                            </tr>
                       
                        </tbody>     
                           
                       </table>                  
                    </div>
                </div>
        </div>  
    </div>    
     


   
     
    <!--Ejemplo tabla con DataTables-->
    <div class="container">
    <div class="subtitulos">Habitaciones reservadas</div>
        <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">        
                        <table id="reporte" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Nro habitacion</th>
                                <th>nro° pedido</th>
                                <th>Usuario</th>                               
                                <th>fecha de pedido</th>
                                
                            </tr>
                        </thead>
                        
                        <tbody>
                        @foreach ($hab_ocupadas as $item)
                            <tr>                        
                            <td>Habitacion N°{{$item['nro_hab']}}</td>
                            <td>Pedido N°{{$item['nro_pedido']}}</td>
                            <td>{{$item['nombre']}}</td>
                            <td>{{$item['created_at']}}</td>
                            </tr>
                        @endforeach  
                        </tbody>     
                           
                       </table>                  
                    </div>
                </div>
        </div>  
    </div>    
     

    <div class="container">
        <div class="row">
        <div class="subtitulos">estado de las habitaciones </div>
                <div class="col-lg-12">
                    <div class="table-responsive">        
                        <table id="reporte2" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Nro habitacion</th>
                                <th>tipo de habitacion</th>
                                <th>costo</th>                               
                                <th>estado</th>
                                
                            </tr>
                        </thead>
                        
                        <tbody>
                        @foreach ($hab_nolibres as $item)
                            <tr>                        
                            <td>Habitacion N°{{$item['nro_habitacion']}}</td>
                            <td>{{$item['nombre']}}</td>
                            <td>{{$item['precio']}}</td>
                            <td>ocupada</td>
                            </tr>
                        @endforeach 
                        @foreach ($hab_libres as $item)
                            <tr>                        
                            <td>Habitacion N°{{$item['nro_habitacion']}}</td>
                            <td>{{$item['nombre']}}</td>
                            <td>{{$item['precio']}}</td>
                            <td>desocupada</td>
                            </tr>
                        @endforeach  
                        </tbody>     
                           
                       </table>                  
                    </div>
                </div>
        </div>  
    </div> 


    <div class="container">
    <div class="subtitulos">Salones de eventos reservado</div>
        <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">        
                        <table id="reporte3" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Nro de salon</th>
                                <th>nombre del salon</th>
                                <th>id Usuario</th>                               
                                <th>nombre del usuario</th>
                                
                            </tr>
                        </thead>
                        
                        <tbody>
                        @foreach ($sal_ocupadas as $item)
                            <tr>                        
                            <td>Habitacion N°{{$item['nro_salon']}}</td>
                            <td>Pedido N°{{$item['nombre_evento']}}</td>
                            <td>{{$item['id']}}</td>
                            <td>{{$item['nombre']}}</td>
                            </tr>
                        @endforeach  
                        </tbody>     
                           
                       </table>                  
                    </div>
                </div>
        </div>  
    </div>    


    <!-- jQuery, Popper.js, Bootstrap JS -->
    <script src="../jquery/jquery-3.3.1.min.js"></script>
    <script src="../popper/popper.min.js"></script>
    <script src="../plugin/boostrap/js/bootstrap.min.js"></script>
      
    <!-- datatables JS -->
    <script type="text/javascript" src="datatables/datatables.min.js"></script>    
     
    <!-- para usar botones en datatables JS -->  
    <script src="../datatables/Buttons-1.5.6/js/dataTables.buttons.min.js"></script>  
    <script src="../datatables/JSZip-2.5.0/jszip.min.js"></script>    
    <script src="../datatables/pdfmake-0.1.36/pdfmake.min.js"></script>    
    <script src="../datatables/pdfmake-0.1.36/vfs_fonts.js"></script>
    <script src="../datatables/Buttons-1.5.6/js/buttons.html5.min.js"></script>
     
    <!-- código JS propìo-->    
    <script type="text/javascript" src="../jss/propio.js"></script>  
    
    
  </body>
</html>
