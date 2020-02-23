<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Usuario;

class UnidentifiedController extends Controller
{
    public function login(Request $request){
        if(session_status() == PHP_SESSION_NONE) session_start();
        if(isset($_POST["cerrarSesion"])){
            session_unset();
        }
        if(isset($_SESSION["email"])){
            return redirect()->route('inicio');
        }
        if(isset($_POST["entrar"])){
            //vamos a logearnos
            if(isset($_POST["email"]) && $_POST["email"]!="" && isset($_POST["password"]) && $_POST["password"]!=""){
                $contraseña = DB::table('usuario')->select('password')->where('Email','=',$_POST["email"])->first();
                if($contraseña->password==$_POST["password"]){
                    //todo bien, todo correcto
                    $usuario = DB::table('usuario')->where('Email','=',$_POST["email"])->first();
                    if(session_status() == PHP_SESSION_NONE) session_start();
                    $_SESSION["email"] = $_POST["email"];
                    return redirect()->route('inicio');
                }
            } else if($_POST["email"]=="" || $_POST["password"]=="") return back()->withErrors(['email' => 'Te falta rellenar el campo del email o de la contraseña']);
            return back()->withErrors(['email' => 'Este email no está dado de alta o la contraseña es incorrecta']);
            /*if($_POST["password"]!="") return view('/inicio');
            return view('/inicio');*/
        }
        return view('login');
    }

    public function registro(){
        if(session_status() == PHP_SESSION_NONE) session_start();
        if(isset($_SESSION["email"])){
            return redirect()->route('inicio');
        }
        if(isset($_POST["registrarse"])){
            //vamos a registrarnos
            $errores = [];
            if($_POST["email"]=="") $errores["email"] = "Falta introducir el email";
            if($_POST["nombre"]=="") $errores["nombre"] = "Falta introducir el nombre";
            if($_POST["password"]=="") $errores["password"] = "Falta introducir la contraseña";
            if($_POST["repetirPassword"]=="") $errores["repetirPassword"] = "Falta introducir la contraseña repetida";
            if(empty($_POST["nacimiento"])) $errores["nacimiento"] = "Falta introducir la fecha de nacimiento";
            if($errores!=[]) return back()->withErrors($errores);
            else {
                //todos los campos llenos, hacer comprobaciones
                $maserrores = [];
                if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
                    $maserrores["email"] = "El email no tiene un formato válido";
                }
                //if()
            }
        }
        return view('registro');
    }

    public function gestion(){
        return "asldkfj";
        if(isset($_GET["registro"])){
            return "funcionaaaaaaa";
        }else {
            return "dlfñjasdñlkfj";
        }
    }
}
