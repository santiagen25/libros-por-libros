<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;

class UsuarioController extends Controller
{
    function login(){
        if(session_status() == PHP_SESSION_NONE) session_start();
        if(isset($_SESSION["email"])){
            return view('inicio');
        }else {
            return view('login');
        }
    }

    function inicio(){
        if(session_status() == PHP_SESSION_NONE) session_start();
        if(isset($_SESSION["email"])){
            if(isset($_POST["biblioteca"])){
                return redirect('biblioteca');
            }
            $usuario = DB::table('usuario')->where('Email','=',$_SESSION["email"])->first();
            return view('/inicio',['usuario'=>$usuario]);
        }else{
            return view('login');
        }
    }

    function configuracion(){
        if(session_status() == PHP_SESSION_NONE) session_start();
        if(isset($_SESSION["email"])){
            $usuario = DB::table('usuario')->where('Email','=',$_SESSION["email"])->first();
            return view('/configuracion',['usuario'=>$usuario]);
        } else {
            return view('login');
        }
    }

    function biblioteca(){
        return view('biblioteca');
    }

    function resultados($numeroDeLibros){
        return view('resultados',['numeroDeLibros'=>$numeroDeLibros]);
    }

    function entrada($isbn){
        return view('entrada',['isbn'=>$isbn]);
    }
}
