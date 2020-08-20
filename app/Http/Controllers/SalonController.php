<?php
namespace App\Http\Controllers;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Usuario;
use App\Moneda;
use App\Evento;
use App\Evento_fecha;
use Auth;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class SalonController extends Controller
{
    public function show (){

        $array= Evento::get();        

        $id= Auth::guard('usuario')->user()->id;        
        $cambio= Usuario::join('Moneda','moneda.id','usuario.moneda')->where('usuario.id',$id)->select('moneda.cambio','moneda.nombre')->get();
        $cambio=$cambio[0];

        return view ('ventassalones', compact('cambio','array'));

    }

    public function mostrar_salon($id){
        $usuario= Auth::guard('usuario')->user()->id;      
        
        $cambio= Usuario::join('Moneda','moneda.id','usuario.moneda')->where('usuario.id',$usuario)->select('moneda.cambio','moneda.nombre')->get();
        $cambio=$cambio[0];
         
        $producto= Evento::find($id)->where('nro_salon',$id)->get();
        $producto= $producto[0];
        
        $fecha=[];

        $f=Evento_fecha::where('nro_evento',$id)->select('fecha')->get();
        foreach ($f as $ff){
                $fecha[]=$ff->fecha;
                
        }
    
        
        
        return view('vetassalon_unidad',compact('cambio','producto','fecha'));
    }
}
