<?php

namespace App\Http\Controllers;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Usuario;
use Auth;
class HotelController extends Controller
{
    public function __construct(){
        $this->middleware('auth:usuario');
    }

    public function getMenu(){

        $id= Auth::guard('usuario')->user()->id;
        
        $datos= Usuario::where('id',$id)->get();      
        $datos=$datos[0];

        return view('menu',compact('datos'));
    }
}
