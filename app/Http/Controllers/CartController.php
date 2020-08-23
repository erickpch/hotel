<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Habitacion;
use Illuminate\Support\Facades\Validator;
use Auth;
use App\Usuario;

class CartController extends Controller
{
    public function __construct(){
        
        if(!\Session::has('cart')) \Session::put('cart',array());
        if(!\Session::has('cart_serv')) \Session::put('cart_serv',array());
        if(!\Session::has('cart_sal')) \Session::put('cart_sal',array());
    }

    //Show cart
    public function show(){
        $cart = \Session::get('cart');
        $serv= \Session::get('cart_serv');
        $sal=\Session::get('cart_sal');
        $usuario= Auth::guard('usuario')->user()->id;      
        
        $cambio= Usuario::join('moneda','moneda.id','usuario.moneda')->where('usuario.id',$usuario)->select('moneda.cambio','moneda.nombre')->get();
        $cambio=$cambio[0];
        
        return view('carrito',compact('cart','serv','sal','cambio'));
    }

    // Add item

    public function add(Request $request){

        
        $validaitor = Validator::make($request->all(), [            
            'inicio' => 'required',            
            'final' => 'required'
        ]);

        if ($validaitor->fails()) {
            return back()->withErrors($validaitor, 'signup');
        }
        
        $cart= \session::get('cart');

        $inicio= Carbon::createFromFormat('Y/m/d', $request->inicio)->format('Y-m-d');
        $final= Carbon::createFromFormat('Y/m/d', $request->final)->format('Y-m-d');
        $cinicio = Carbon::parse($inicio);
        $cfinal = Carbon::parse($final);
        $cantidad= $cfinal->diffInDays($cinicio); 
      
       

        $producto = [$request->habitacion, $request->nombre,$cantidad, $request->precio, $request->link, $request->inicio, $request->final];
                
        
        $cart[$request->habitacion]= $producto;

        \session::put('cart',$cart);

        return redirect()->route('cart-show');
    }
    

    public function add_serv(Request $request){
        $cart= \session::get('cart_serv');
        $validaitor = Validator::make($request->all(), [            
            'inicio' => 'required',            
            'final' => 'required',
            'personas' => 'required'   
        ]);

        if ($validaitor->fails()) {
            return back()->withErrors($validaitor, 'signup');
        }
        
          
        $inicio= Carbon::createFromFormat('Y/m/d', $request->inicio)->format('Y-m-d');
        $final= Carbon::createFromFormat('Y/m/d', $request->final)->format('Y-m-d');
        $cinicio = Carbon::parse($inicio);
        $cfinal = Carbon::parse($final);
        $cantidad= $cfinal->diffInDays($cinicio); 

        $producto = [
        $request->habitacion,
        $request->nombre,
        $cantidad,
        $request->precio,
        $request->link,
        $request->inicio,
        $request->final,
        $request->personas];
        
        $cart[$request->habitacion]= $producto;
        
        \session::put('cart_serv',$cart);

        return redirect()->route('cart-show');
    }


    public function add_sal(Request $request){
        $cart= \session::get('cart_sal');
        $validaitor = Validator::make($request->all(), [            
            'inicio' => 'required',            
            'final' => 'required',              
        ]);

        if ($validaitor->fails()) {
            return back()->withErrors($validaitor, 'signup');
        }
        
          
        $inicio= Carbon::createFromFormat('Y/m/d', $request->inicio)->format('Y-m-d');
        $final= Carbon::createFromFormat('Y/m/d', $request->final)->format('Y-m-d');
        $cinicio = Carbon::parse($inicio);
        $cfinal = Carbon::parse($final);
        $cantidad= $cfinal->diffInDays($cinicio); 

        $producto = [
        $request->habitacion,
        $request->nombre,
        $cantidad,
        $request->precio,
        $request->link,
        $request->inicio,
        $request->final,
        ];
        
        $cart[$request->habitacion]= $producto;
        
        \session::put('cart_sal',$cart);

        return redirect()->route('cart-show');
    }


    // Delete item


    public function delete(Request $request){
        $cart= \session::get('cart');  
        unset($cart[$request->id]);   

        \Session::put('cart',$cart);

        return redirect()->route('cart-show');
    }

    public function delete_serv(Request $request){
        $cart= \session::get('cart_serv');  
        unset($cart[$request->id]);   

        \Session::put('cart_serv',$cart);

        return redirect()->route('cart-show');
    }

    public function delete_sal(Request $request){
        $cart= \session::get('cart_sal');  
        unset($cart[$request->id]);   

        \Session::put('cart_sal',$cart);

        return redirect()->route('cart-show');
    }
    //Update item

    //tras cart

    public function trash(){
        \Session::forget('cart'); 
        \Session::forget('cart_serv'); 
        \Session::forget('cart_sal'); 
        return redirect()->route('cart-show');
    }

    //Total
}
