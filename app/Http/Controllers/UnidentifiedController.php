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
        if(session_status() == PHP_SESSION_NONE) session_start();
        if(isset($_SESSION["email"])){
            return view('inicio');
        }
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
        return view('login');
    }

    public function registro(){
        if(session_status() == PHP_SESSION_NONE) session_start();
        if(isset($_SESSION["email"])){
            return view('inicio');
        }
        return view('registro');
    }
}
