<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;

class UnidentifiedController extends Controller
{
    public function index(){
        return view('login');
    }

    public function login(){
        $email = $_POST["email"];
        $password = $_POST["password"];
        $contraseña = DB::table('usuario')->select('password')->where('Email','=',$email)->first();
    
        if($contraseña->password==$password){
            $usuario = DB::table('usuario')->where('Email','=',$email)->first();
            session_start();
            if(isset($_SESSION["email"])) return "está seteada en el controller";
            $_SESSION["email"] = $email;
            return view('/inicio',['usuario'=>$usuario]);
        }else{
            return back()
            ->withErrors(['email' => trans('auth.failed')])
            ->withInput(request(['email']));
        }
    }
}
