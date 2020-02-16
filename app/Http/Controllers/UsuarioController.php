<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;

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
            $usuario = DB::table('usuario')->where('Email','=',$email)->first();
            return view('/inicio',['usuario'=>$usuario]);
        }else{
            return view('login');
        }
    }

    function configuracion(){
        return view('configuracion');
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
