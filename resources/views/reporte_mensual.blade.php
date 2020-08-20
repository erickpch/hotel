<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="#" />  
    <title>Reporte Mensual</title>
      
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
        <div class="titulos"> <h1 class="text-center text-dark">Reporte Mensual</h1></div>
         
     </header>    
    <div style="height:50px"></div>
     
    <!--Ejemplo tabla con DataTables-->
    <div class="container">
        <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">        
                        <table id="reporte" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Consulta</th>
                                <th>Resultado</th>
                           
                            </tr>
                        </thead>
                        <tbody>
                        <tr>
                                <td>Cantidad de Pedidos</td>
                                <td>{{$pedidos}} pedidos en el mes</td>
                            </tr>

                            <tr>
                                <td>Ganancias totales</td>
                                <td>{{$ganancias}} dolares</td>
                            </tr>

                            <tr>
                                <td>Promedio por pedido</td>
                                <td>{{$promedio}} dolares por pedido</td>
                            </tr>

                            <tr>
                                <td>IVA mensual</td>
                                <td>{{$impuestos}} de retorno</td>
                            </tr>
                                                  
                        </tbody>        
                       </table>                  
                    </div>
                </div>
        </div>  
    </div>    


    <div class="titulos"> <h1 class="text-center text-dark">Detalle de pedidos</h1></div>
    <div class="container">
        <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">        
                        <table id="reporte2" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>numero de pedido</th>
                                <th>nombre de usuario</th>
                                <th>tipo de pago</th>
                                <th>pais de procedencia</th>
                                <th>total pagado</th>
                           
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($detalle as $item)
                            <tr>
                                <td>{{$item['pedido_id']}}</td>
                                <td>{{$item['nombre_usuario']}}</td>
                                <td>{{$item['tipo_pago']}}</td>
                                <td>{{$item['pais']}}</td>
                                <td>{{$item['total']}}</td>
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
