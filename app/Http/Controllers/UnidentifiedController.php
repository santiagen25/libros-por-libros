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
                    $block = DB::table('usuario')->select('bloqueado')->where('Email','=',$_POST["email"])->first();
                    if($block->bloqueado == 0){
                        //todo bien, todo correcto
                        if(session_status() == PHP_SESSION_NONE) session_start();
                        $_SESSION["email"] = $_POST["email"];
                        return redirect()->route('inicio');
                    } return back()->withErrors(['block' => 'Tu usuario ha sido bloqueado por algún motivo. Por favor, contacta con un administrador.']);
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
            if($_POST["email"]!=""){
                if(strlen($_POST["email"]) < 100) { if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) $errores["email"] = "El email no tiene un formato válido"; }
                else $errores["email"] = "El email es demasiado largo";
            } else $errores["email"] = "Falta introducir el email";
            $emails = DB::table('usuario')->select('email')->get();
            foreach($emails as $email) if(strtolower($email->email) == strtolower($_POST["email"])) $errores["email"] = "Este email ya está registrado";

            if($_POST["nombre"]!="") { if(strlen($_POST["nombre"]) >= 50) $errores["nombre"] = "El nombre es demasiado largo"; }
            else $errores["nombre"] = "Falta introducir el nombre";

            if($_POST["password"]!=""){
                if(strlen($_POST["password"]) < 50){
                    if(!preg_match('/[A-Z]/', $_POST["password"])) $errores["password"] = "Falta añadir una letra mayuscula. ";
                    if(!preg_match('/[a-z]/', $_POST["password"])) $errores["password"] .= "Falta añadir una letra minuscula. ";
                    if(!preg_match('/[0-9]/', $_POST["password"])) $errores["password"] .= "Falta añadir un numero. ";
                    if(strlen($_POST["password"])<5) $errores["password"] .= "La contraseña ha de tener minimo 5 caracteres.";
                } else $errores["password"] = "La contraseña es demasiado larga";
            } else $errores["password"] = "Falta introducir la contraseña";

            if($_POST["repetirPassword"] != $_POST["password"]) $errores["repetirPassword"] = "La contraseña repetida no encaja con la primera contraseña. ¡Ha de ser la misma!";

            if(empty($_POST["nacimiento"])) $errores["nacimiento"] = "Falta introducir la fecha de nacimiento";

            if($errores!=[]) return back()->withErrors($errores);
            else {
                //todo ok
                DB::table('usuario')->insert(
                    ['esAdmin' => false, 'email' => $_POST["email"], 'nombre' => $_POST["nombre"], 'password' => $_POST["password"], 'nacimiento' => $_POST["nacimiento"].' 0:00:00', 'bloqueado' => false]
                );
                $reg["registroBien"] = "¡Te has registrado con éxito!";
                return back()->withErrors($reg);
                //return $_POST["nacimiento"];
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
