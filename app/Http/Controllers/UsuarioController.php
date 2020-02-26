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

        if(isset($_POST["publicarValoracion"])){
            //Vamos a dejar un comentario
            $errores = [];
            if($_POST["titulo"]!=""){ if(strlen($_POST["titulo"]) >= 50) $errores["titulo"] = "El titulo de la valoración no puede tener mas de 50 caracteres"; }
            else $errores["titulo"] = "El titulo no puede estar vacio";

            if($_POST["puntuacion"]!=""){
                if(ctype_digit($_POST["puntuacion"])){
                    if(intval($_POST["puntuacion"])>10 || intval($_POST["puntuacion"])<0) $errores["La puntuacion ha de ser del 0 al 10"];
                } else $errores["puntuacion"] = "La puntuacion ha de ser un numero integer";
            } else $errores["puntuacion"] = "La puntuacion no puede estar vacia";

            if($_POST["comentario"]!=""){ if(strlen($_POST["comentario"]) >= 10000) $errores["comentario"] = "El comentario de la valoración no puede tener mas de 10.000 caracteres"; }
            else $errores["comentario"] = "El comentario no puede estar vacio";

            if($errores!=[]) return back()->withErrors($errores);
            else {
                //todo ok, insertamos el comentario
                return "todo ok, insertamos el comentario";
            }
        }

        $libro = DB::table('libro')->where('IDLibro','=',$id)->first();
        //buscamos el usuario
        $usuario = DB::table('usuario')->where('Email','=',$_SESSION["email"])->first();
        $valoraciones = DB::table('valoracion')->where('IDLibroFK','=',$id)->where('IDUsuarioFK','<>',$usuario->IDUsuario)->get();
        return view('entrada',['libro' => $libro, 'valoraciones' => $valoraciones]);
    }

    function usuario($id){
        if(session_status() == PHP_SESSION_NONE) session_start();
        if(!isset($_SESSION["email"])) return redirect()->route('login');
        $usuario = DB::table('usuario')->where('IDUsuario','=',$id)->first();
        return view('usuario',['usuario' => $usuario]);
    }
}
