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

    function test(){
        return "test";
    }
}
