<?php

namespace App\Http\Controllers;


use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


use Auth;
use App\Usuario;
use App\Servicio; 


class ServicioController extends Controller
{
    public function show (){

        $array= Servicio::get();        

        $id= Auth::guard('usuario')->user()->id;        
        $cambio= Usuario::join('Moneda','moneda.id','usuario.moneda')->where('usuario.id',$id)->select('moneda.cambio','moneda.nombre')->get();
        $cambio=$cambio[0];

        return view ('ventaservicios', compact('cambio','array'));

    }

    public function mostrar_servicio($id){
        $usuario= Auth::guard('usuario')->user()->id;      
        
        $cambio= Usuario::join('Moneda','moneda.id','usuario.moneda')->where('usuario.id',$usuario)->select('moneda.cambio','moneda.nombre')->get();
        $cambio=$cambio[0];
         
        $producto= Servicio::find($id)->where('id',$id)->get();
        $producto= $producto[0];
        
        
        
        return view('ventasservicios_unidad',compact('cambio','producto'));
    }
}
