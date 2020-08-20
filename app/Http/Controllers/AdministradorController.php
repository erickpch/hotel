<?php

namespace App\Http\Controllers;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Usuario;
use Auth;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdministradorController extends Controller
{
    public function __construct(){
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request){

        $credentials=$this->validate(request(),
        ['email'=>'email|required|string',
        'password'=>'required|string']);

        if (Auth::guard('administrador')->attempt($credentials)){ 
            return redirect()->intended('/menuAdministrador');
        }
        return back()
        ->withErrors(['email'=>'Estas credenciales no concuerdan con nuestros registros.'])
        ->withInput(request(['email']));
    }

    public function vistaLogin(){
        return view('login_admin');
    }
   
    public function logout(){
            Auth::guard('administrador')->logout();
            return redirect('/');
    }


}
