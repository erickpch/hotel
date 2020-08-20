<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InicioController extends Controller
{
    public function inicio(){
        return view ('inicio');
    }

    public function servicios(){
        return view ('servicios_preview');
    }

    public function cuartos(){
        return view ('cuartos_preview');
    }
}
