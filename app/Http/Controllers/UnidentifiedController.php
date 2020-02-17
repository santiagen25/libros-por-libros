<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Usuario;

class UnidentifiedController extends Controller
{
    public function login(){
        session_start();
        if(isset($_POST["entrar"])){
            $email = $_POST["email"];
            $password = $_POST["password"];
            $contraseña = DB::table('usuario')->select('password')->where('Email','=',$email)->first();
        
            if($contraseña->password==$password){
                $usuario = DB::table('usuario')->where('Email','=',$email)->first();
                if(session_status() == PHP_SESSION_NONE) session_start();
                $_SESSION["email"] = $email;
                return view('/inicio',['usuario'=>$usuario]);
            }else{
                return back()
                ->withErrors(['email' => trans('auth.failed')])
                ->withInput(request(['email']));
            }
        }
        if(isset($_POST["cerrarSesion"])){
            session_unset();
        }
        if(isset($_SESSION["email"])){
            return view('inicio');
        }
        return view('login');
    }

    public function registro(){
        return "solucionar esto, si estas logeado y pones registro se va al registro, no ha de ir";
        if(isset($_SESSION["email"])){
            return view('inicio');
        }
        return view('registro');
    }
}
