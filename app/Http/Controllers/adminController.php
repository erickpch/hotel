<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Habitacion;
use App\Tipo_habitacion;
use App\Servicio;
use App\Evento;
use Carbon\Carbon;
use App\Hab_fecha;
use App\Evento_fecha;
use App\Serv_fecha;
use App\Pedido;
use App\Factura;
use App\Tipo_pago;

class adminController extends Controller
{
    public function getMenu(){
        return view('menu_admin');
    }

    public function show_reporte(){
        return view('a_reporte');
    }

    public function show_gestion(){

        $hab= Habitacion::join('Tipo_habitacion','tipo_habitacion.id','habitacion.tipo')->select('tipo_habitacion.nombre','habitacion.nro_habitacion','habitacion.precio','habitacion.link_imagen','habitacion.nro_habitacion')->get();
        $serv= Servicio::get();
        $evento= Evento::get();

        

        return view('a_gestion',compact('hab','serv','evento'));
    }
//----------------------------habitaciones----------------
    public function verificar_hab (Request $request){
        $hab= Habitacion::join('Tipo_habitacion','habitacion.tipo','tipo_habitacion.id')->where('habitacion.nro_habitacion',$request->id)->get();
        $producto=$hab[0];

        return view('gestion_hab',compact('producto'));
    }

    public function modificar_hab (Request $request){
        
        $cambio=['tipo'=>$request->tipo, 'precio'=> $request->precio, 'capacidad'=> $request->capacidad, 'dormitorios'=> $request->dormitorio,
        'baños'=> $request->baño, 'dimension'=> $request->dimension, 'descripcion'=>$request->descripcion, 'link_imagen'=>$request->imagen];
        Habitacion::find($request->id)->update($cambio);

        return redirect('/menuAdministrador/gestion');
    }

    public function reservar_hab (Request $request){
        

        $inicio=Carbon::parse($request->inicio);        
        $final=Carbon::parse($request->final);
        $pedido=0;
        while($inicio != $final){

            $insertar= ['nro_hab'=>$request->id, 'nro_pedido'=>$pedido, 'fecha'=>$inicio];
            
            Hab_fecha::create($insertar);
            $inicio->addDays(1);
        }        
     

        return redirect('/menuAdministrador/gestion');
    }
    public function eliminar_hab (Request $request){

        Habitacion::where('nro_habitacion',$request->id)->delete();
        
        return redirect('/menuAdministrador/gestion');
    }

//-------------------------------SERVICIO----------------------------------------

    public function verificar_serv (Request $request){
        $hab= Servicio::where('servicio.id',$request->id)->get();
        $producto=$hab[0];

        return view('gestion_serv',compact('producto'));
    }

    public function modificar_serv (Request $request){
        
        $cambio=['nombre'=>$request->nombre, 'precio'=>$request->precio, 'cap_maxima'=>$request->capacidad, 'descripcion'=>$request->descripcion, 'link_imagen'=>$request->imagen];
        
        Servicio::find($request->id)->update($cambio);

        return redirect('/menuAdministrador/gestion');
    }


    public function eliminar_serv (Request $request){

        Servicio::where('id',$request->id)->delete();
        
        return redirect('/menuAdministrador/gestion');
    }

    //---------------------------Eventos-----------------------

    public function verificar_ev (Request $request){

        
        $hab= Evento::where('nro_salon',$request->id)->get();
        $producto=$hab[0];
        
        return view('gestion_ev',compact('producto'));
    }

    public function modificar_ev (Request $request){
        
        $cambio=['nombre'=>$request->nombre, 'precio'=> $request->precio, 'descripcion'=>$request->descripcion, 'link_imagen'=>$request->imagen];
        Evento::find($request->id)->update($cambio);

        return redirect('/menuAdministrador/gestion');
    }

    public function reservar_ev (Request $request){
        

        $inicio=Carbon::parse($request->inicio);        
        $final=Carbon::parse($request->final);
        $pedido=0;
        while($inicio != $final){

            $insertar= ['nro_evento'=>$request->id, 'nro_pedido'=>$pedido, 'fecha'=>$inicio];
            
            Evento_fecha::create($insertar);
            $inicio->addDays(1);
        }        
     

        return redirect('/menuAdministrador/gestion');
    }
    public function eliminar_ev (Request $request){

        Evento::where('nro_habitacion',$request->id)->delete();
        
        return redirect('/menuAdministrador/gestion');
    }

    //---------------------------------REPORTE DIARIO------------------------------

    public function diario(Request $request){

        
        $pedidos= Pedido::where('created_at',$request->fecha)->count();
        $ganancias= Pedido::where('created_at',$request->fecha)->get()->sum('total');

        $hab_ocupadas= Hab_fecha::join('Pedido','pedido.id','hab_fecha.nro_pedido')->join('Usuario','usuario.id','pedido.usuario')->where('fecha',$request->fecha)->get();
        
        $ocupadas=[];
        foreach ($hab_ocupadas as $hab){
            $ocupadas[$hab['nro_hab']]=$hab['nro_hab'];
        }
;       $hab_libres= Habitacion::join('Tipo_habitacion','habitacion.tipo','tipo_habitacion.id')->whereNotIn('nro_habitacion', $ocupadas)->get();
        $hab_nolibres= Habitacion::join('Tipo_habitacion','habitacion.tipo','tipo_habitacion.id')->whereIn('nro_habitacion', $ocupadas)->get();

        $sal_ocupadas= Evento_fecha::join('Pedido','pedido.id','evento_fecha.nro_pedido')->join('Evento','evento.nro_salon','evento_fecha.nro_evento')
        ->join('Usuario','usuario.id','pedido.usuario')->where('fecha',$request->fecha)->select('evento.nombre as nombre_evento', 'usuario.nombre','evento.nro_salon','usuario.id')->get();
                
        
        
       
     $ss2=Serv_fecha::where('fecha',$request->fecha)->groupBy('nro_serv')
       ->selectRaw('sum(cantidad) as sum, nro_serv')
       ->pluck('nro_serv','sum');
       
       $ss3=Serv_fecha::where('fecha',$request->fecha)->groupBy('nro_serv')
       ->selectRaw('sum(cantidad) as sum, nro_serv')
       ->pluck('sum','nro_serv');
    $servicio=Servicio::get();

        return view('reporte_diario',compact('pedidos','ganancias','hab_ocupadas','hab_libres','sal_ocupadas','hab_nolibres','servicio','ss2','ss3'));
    }

    
    //---------------------------------REPORTE MENSUAL------------------------------


    public function mensual (Request $request){

        $pedidos= Pedido::whereMonth('created_at', $request->mes)->whereYear('created_at', $request->año)->count();

        $ganancias= Pedido::whereMonth('created_at', $request->mes)->whereYear('created_at', $request->año)->sum('total');

        $impuestos= Factura::whereMonth('created_at', $request->mes)->whereYear('created_at', $request->año)->sum('iva');

        $promedio= Pedido::whereMonth('created_at', $request->mes)->whereYear('created_at', $request->año)->avg('total');

        $detalle=Pedido::join('Usuario','usuario.id','pedido.usuario')->join('Pais','pais.id','usuario.pais')
        ->join('Tipo_pago','tipo_pago.id','pedido.tipo_pago')->whereMonth('pedido.created_at', $request->mes)->whereYear('pedido.created_at', $request->año)
        ->select('pedido.id as pedido_id','usuario.nombre as nombre_usuario','tipo_pago.nombre as tipo_pago','pais.nombre as pais','pedido.total as total')->get();



        return view ('reporte_mensual',compact('pedidos','ganancias','impuestos','promedio','detalle'));
    }
}
