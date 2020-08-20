<?php

namespace App\Http\Controllers;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Usuario;
use App\Habitacion;
use App\Moneda;
use App\Pais;
use App\Tipo_habitacion;
use App\Hab_fecha;
use Auth;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class VentasController extends Controller
{
    public function opciones(){
        $id= Auth::guard('usuario')->user()->id;
        
        $datos= Usuario::join('Moneda','moneda.id','usuario.moneda')->join('pais','pais.id','usuario.pais')->where('usuario.id',$id)->select('usuario.id','usuario.nombre','usuario.ci','usuario.telefono','usuario.pais','usuario.moneda','moneda.nombre as nombre_moneda','moneda.id as moneda_id','pais.nombre as nombre_pais','usuario.pais as id_pais')->get();      
        $datos=$datos[0];
        
        return view ('opciones',compact('datos'));
    }

    public function cambiar(Request $request){
        
        Usuario::find($request->id)->update(['nombre'=>$request->nombre, 'ci'=>$request->ci, 'telefono'=>$request->telefono, 'pais'=>$request->pais, 'moneda'=>$request->moneda]);
       
        return redirect('/opciones');
    }

    public function reservas(){
        
        return view ('ventasreservas');
    }
    

    public function show_habitaciones(){
       
        $array= Habitacion::join('Tipo_habitacion','tipo_habitacion.id','habitacion.tipo')->select('tipo_habitacion.nombre','habitacion.nro_habitacion','habitacion.precio','habitacion.link_imagen','habitacion.nro_habitacion')->get();
       


        $id= Auth::guard('usuario')->user()->id;        
        $cambio= Usuario::join('Moneda','moneda.id','usuario.moneda')->where('usuario.id',$id)->select('moneda.cambio','moneda.nombre')->get();
        $cambio=$cambio[0];
        
        
        return view ('ventashabitaciones', compact('array','cambio'));

    }


    public function mostrar_producto($id){
        $usuario= Auth::guard('usuario')->user()->id;      
        
        $cambio= Usuario::join('Moneda','moneda.id','usuario.moneda')->where('usuario.id',$usuario)->select('moneda.cambio','moneda.nombre')->get();
        $cambio=$cambio[0];
         
        $producto= Habitacion::join('Tipo_habitacion','tipo_habitacion.id','habitacion.tipo')->where ('habitacion.nro_habitacion',$id)->get();
        $producto= $producto[0];


        /*$fecha="";
        $espacio=", ";
        
        $f=Hab_fecha::select('fecha')->get();
            foreach ($f as $ff){
                    $fecha .=$ff->fecha;
                    $fecha .=$espacio; 
            }

        $fecha=substr($fecha, 0, -2);
        
        //$fecha= '2020-08-25';*/
        $fecha=[];

        $f=Hab_fecha::where('nro_hab',$id)->select('fecha')->get();
        foreach ($f as $ff){
                $fecha[]=$ff->fecha;
                
        }
    
        
    
        
        return view('ventasproducto',compact('cambio','producto','fecha'));
    }
}
