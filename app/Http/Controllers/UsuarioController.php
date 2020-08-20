<?php

namespace App\Http\Controllers;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Usuario;
use Auth;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UsuarioController extends Controller
{
    public function __construct(){
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request){

        $credentials=$this->validate(request(),
        ['email'=>'email|required|string',
        'password'=>'required|string']);

        if (Auth::guard('usuario')->attempt($credentials)){ 
            return redirect()->intended('/menu');
        }
        return back()
        ->withErrors(['email'=>'Estas credenciales no concuerdan con nuestros registros.'])
        ->withInput(request(['email']));


       
    }

    public function vistaLogin(){
        return view('login_usuario');
    }
    
    public function vistaSignup(){
        return view('signup_usuario');
    }

    public function signup(Request $request){

        //$this->validate();
       $validaitor = Validator::make($request->all(), [
            'ci'=>'required|max:10',
            'nombre' => 'required|min:3|max:50',
            'password' => 'min:8|required_with:password_confirm|same:password_confirm',
            'password_confirm'=> 'required|min:8',
            'email' => 'required|email',
            'pais' => 'required'
        ]);

        if ($validaitor->fails()) {
            return back()->withErrors($validaitor, 'signup');
        }

        $existe= Usuario::where('email',$request->email)->first();
        if(!is_null($existe)){
            return back()->withErrors('este email ya esta registrado');
        }

        $datos=[
            'ci'=>$request->ci,
            'nombre'=>$request->nombre,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'pais'=>$request->pais
        ];

        $usuario=Usuario::create($datos);
        Auth::guard('usuario')->attempt(['email'=>$request->email,'password'=>$request->password]);
        return redirect()->intended('/menu');    
    }

    public function logout(){
            Auth::guard('usuario')->logout();
            return redirect('/');
    }


    

}
