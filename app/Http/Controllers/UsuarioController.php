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
        }
        return redirect()->route('login');
    }

    function inicio(){
        if(session_status() == PHP_SESSION_NONE) session_start();
        if(isset($_SESSION["email"])){
            if(isset($_POST["biblioteca"])){
                return redirect('biblioteca');
            }
            $usuario = DB::table('usuario')->where('Email','=',$_SESSION["email"])->first();
        return view('/inicio',['usuario'=>$usuario]);
        }
        return redirect()->route('login');
    }

    function configuracion(){
        if(session_status() == PHP_SESSION_NONE) session_start();
        if(isset($_SESSION["email"])){
            $usuario = DB::table('usuario')->where('Email','=',$_SESSION["email"])->first();
            return view('/configuracion',['usuario'=>$usuario]);
        }
        return redirect()->route('login');
    }

    function biblioteca(){
        if(session_status() == PHP_SESSION_NONE) session_start();
        if(isset($_SESSION["email"])){
            $usuario = DB::table('usuario')->where('Email','=',$_SESSION["email"])->first();
            return view('/biblioteca',['usuario'=>$usuario]);
        }
        return redirect()->route('login');
    }

    function resultados(){
        if(session_status() == PHP_SESSION_NONE) session_start();
        if(isset($_SESSION["email"])){
            $resultados = DB::table('libro')->where('Nombre','LIKE','%'.$_GET["buscador"].'%')->get();
            return view('resultados',['resultados'=>$resultados,'busqueda'=>$_GET["buscador"]]);
        }
        return redirect()->route('login');
    }

    function entrada($id){
        if(session_status() == PHP_SESSION_NONE) session_start();
        if(!isset($_SESSION["email"])) return redirect()->route('login');
        $libro = DB::table('libro')->where('IDLibro','=',$id)->first();
        $valoraciones = DB::table('valoracion')->where('IDLibroFK','=',$id)->get();
        return view('entrada',['libro' => $libro, 'valoraciones' => $valoraciones]);
    }

    function usuario($id){
        if(session_status() == PHP_SESSION_NONE) session_start();
        if(!isset($_SESSION["email"])) return redirect()->route('login');
        $usuario = DB::table('usuario')->where('IDUsuario','=',$id)->first();
        return view('usuario',['usuario' => $usuario]);
    }
}
