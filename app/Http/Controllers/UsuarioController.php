<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    function login(){
        return view('login');
    }

    function inicio(){
        return view('inicio');
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
