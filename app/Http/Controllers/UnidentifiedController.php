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
        return view('login');
        if(isset($_POST["entrar"])){
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
        } return view('login');
    }
}
