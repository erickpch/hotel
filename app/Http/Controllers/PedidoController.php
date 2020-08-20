<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Habitacion;
use App\Moneda;
use App\Usuario;
use App\Pedido;
use App\Factura;
use App\Hab_fecha;
use App\Serv_fecha;
use App\Evento_fecha;
use Illuminate\Support\Facades\Validator;


use Auth;


class PedidoController extends Controller
{
   public function show(){
        $cart = \Session::get('cart');
        $serv= \Session::get('cart_serv');
        $sal=\Session::get('cart_sal');
        $usuario= Auth::guard('usuario')->user()->id;      
        
        $cambio= Usuario::join('Moneda','moneda.id','usuario.moneda')->where('usuario.id',$usuario)->select('moneda.cambio','moneda.nombre')->get();
        $cambio=$cambio[0];
    
        $suma = 0;        
        
        foreach ($cart as $item)
            $suma= $suma+ $item[3]*$item[2];
        foreach ($serv as $item)
            $suma= $suma+ $item[3]*$item[2]*$item[7];
        foreach ($sal as $item)
            $suma=$suma + $item[3]*$item[2];


        $impuesto= $suma*0.13;
        $total= $suma+$impuesto;
        
    return view('pedido',compact('cart','serv','sal','cambio','suma','impuesto','total'));   
   }

   public function procesar(Request $request){
    $suma= $request->suma;
    $impuesto= $request->impuesto;
    $total= $request->total;

    $usuario= Auth::guard('usuario')->user()->id;      
        
    $cambio= Usuario::join('Moneda','moneda.id','usuario.moneda')->where('usuario.id',$usuario)->select('moneda.cambio','moneda.nombre')->get();
    $cambio=$cambio[0];
    return view('procesar_pedido',compact('cambio','suma','impuesto','total'));
   }


   public function facturar(Request $request){   
    

    $usuario= Auth::guard('usuario')->user()->id;   
    $cambio= Usuario::join('Moneda','moneda.id','usuario.moneda')->where('usuario.id',$usuario)->select('moneda.cambio','moneda.nombre','usuario.moneda')->get();
    $cambio=$cambio[0];
  
    $pedido= ['usuario'=>$usuario, 'moneda' => $cambio->moneda, 'tipo_pago'=>$request->tipo_pago, 'total'=> $request->pedido];
    Pedido::create($pedido);

    $nro=Pedido::select('id')->orderBy('id', 'desc')->get();
    $nro=$nro[0];
    
    $estado=1;
    $factura=['pedido'=>$nro->id, 'nombre'=>$request->nombre, 'nit'=>$request->nit, 'direccion'=>$request->direccion,'codigo_postal'=>$request->cp,'costo'=>$request->pedido,'iva'=>$request->impuesto,'total'=>$request->total,'estado'=>$estado];
    Factura::create($factura);

    $cart = \Session::get('cart');
    $serv= \Session::get('cart_serv');
    $sal=\Session::get('cart_sal');

    
    if (!empty($cart)) {
        foreach ($cart as $item){
            $inicio=$item[5];
            $inicio=Carbon::parse($inicio);
            $final= $item[6];
            $final=Carbon::parse($final);
            while($inicio != $final){

                $insertar= ['nro_hab'=>$item[0], 'nro_pedido'=>$nro->id, 'fecha'=>$inicio];
                Hab_fecha::create($insertar);
                $inicio->addDays(1);
            }        
        }  
    }
    
    if (!empty($serv)) {
        foreach ($serv as $item){
            $inicio=$item[5];
            $inicio=Carbon::parse($inicio);
            $final= $item[6];
            $final=Carbon::parse($final);
            while($inicio != $final){

                $insertar2= ['nro_serv'=>$item[0], 'nro_pedido'=>$nro->id, 'fecha'=>$inicio, 'cantidad'=>$item[7]];
                Serv_fecha::create($insertar2);
                $inicio->addDays(1);
            }        
        }
    } 

    if (!empty($sal)) {
        foreach ($sal as $item){
            $inicio=$item[5];
            $inicio=Carbon::parse($inicio);
            $final= $item[6];
            $final=Carbon::parse($final);
            while($inicio != $final){

                $insertar3= ['nro_evento'=>$item[0], 'nro_pedido'=>$nro->id, 'fecha'=>$inicio];
                Evento_fecha::create($insertar3);
                $inicio->addDays(1);
            }        
        }
    }

    \Session::forget('cart'); 
    \Session::forget('cart_serv'); 
    \Session::forget('cart_sal');    

    return redirect('menu/finalizado');
   }

   public function redireccionar(){
       return view ('finalizarpedido');
   }
}
