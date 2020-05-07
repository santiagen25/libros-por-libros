<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Usuario;
use Hash;

class UnidentifiedController extends Controller
{
    public function login(){
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
                $contraseña = DB::table('usuario')->where('Email','=',$_POST["email"])->first();
                if($contraseña=="") return back()->withErrors(['email' => 'Este email no está dado de alta']);
                if(Hash::check($_POST["password"],$contraseña->Password)){
                    $block = DB::table('usuario')->select('bloqueado')->where('Email','=',$_POST["email"])->first();
                    if($block->bloqueado == 0){
                        //todo bien, todo correcto
                        if(session_status() == PHP_SESSION_NONE) session_start();
                        $_SESSION["email"] = $_POST["email"];
                        $_SESSION["admin"] = $contraseña->esAdmin;
                        $_SESSION["id"] = $contraseña->IDUsuario;
                        return redirect()->route('inicio');
                    } return back()->withErrors(['block' => 'Tu usuario ha sido bloqueado por algún motivo. Por favor, contacta con un administrador.']);
                }
            } else if($_POST["email"]=="" || $_POST["password"]=="") return back()->withErrors(['email' => 'Te falta rellenar el campo del email o de la contraseña']);
            
            return back()->withErrors(['email' => 'La contraseña es incorrecta', 'emailCampo' => $_POST["email"]]);
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
                    $errores["password"] = "";
                    if(!preg_match('/[A-Z]/', $_POST["password"])) $errores["password"] = "Falta añadir una letra mayúscula. ";
                    if(!preg_match('/[a-z]/', $_POST["password"])) $errores["password"] .= "Falta añadir una letra minúscula. ";
                    if(!preg_match('/[0-9]/', $_POST["password"])) $errores["password"] .= "Falta añadir un numero. ";
                    if(strlen($_POST["password"])<5) $errores["password"] .= "La contraseña ha de tener minimo 5 caracteres.";
                    if($errores["password"] == "") unset($errores["password"]);
                } else $errores["password"] = "La contraseña es demasiado larga";
            } else $errores["password"] = "Falta introducir la contraseña";
            if($_POST["repetirPassword"] != $_POST["password"]) $errores["repetirPassword"] = "La contraseña repetida no encaja con la primera contraseña. ¡Ha de ser la misma!";
            if(empty($_POST["nacimiento"])) $errores["nacimiento"] = "Falta introducir la fecha de nacimiento";

            if($errores!=[]) {
                $errores["emailCampo"] = $_POST["email"];
                $errores["nombreCampo"] = $_POST["nombre"];
                $errores["nacimientoCampo"] = date_format(date_create($_POST["nacimiento"]),"Y-m-d");
                return back()->withErrors($errores);
            } else {
                //todo ok
                DB::table('usuario')->insert(
                    ['esAdmin' => false, 'email' => $_POST["email"], 'nombre' => $_POST["nombre"], 'password' => Hash::make($_POST["password"]), 'nacimiento' => $_POST["nacimiento"].' 0:00:00', 'bloqueado' => false,
                    'created_at' => date('Y-m-d H:i:s')]
                );
                $reg["registroBien"] = "¡El nuevo Usuario se ha registrado con éxito!";
                return back()->withErrors($reg);
            }
        }
        return view('registro');
    }

    public function newPassword(){
        if(session_status() == PHP_SESSION_NONE) session_start();
        if(isset($_SESSION["email"])){
            return redirect()->route('inicio');
        }else {
            if(isset($_POST["email"])){
                $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                $charactersLength = strlen($characters);
                $pswd = '';
                for ($i = 0; $i < 10; $i++) {
                    $pswd .= $characters[rand(0, $charactersLength - 1)];
                }

                $usuario = DB::table('usuario')->where('Email','=',$_POST["email"])->first();
                if($usuario==NULL) return back()->withErrors(['mal' => 'El email que has introducido no existe']);
                
                $to_email = $_POST["email"];
                $subject = "Recuperación de contraseña para Libros por Libros";
                $body = "Se ha generado una contraseña aleatoriamente para que puedas entrar en tu cuenta.\n\nEsta es tu nueva contraseña: ".$pswd."\n\nTe recomendamos que cambies esta contraseña la proxima vez que entres en tu cuenta.";
                $headers = "From: LibrosPorLibros";
                
                if (mail($to_email, $subject, $body, $headers)) {
                    DB::table('usuario')->where('Email','=',$_POST["email"])->update(['Password' => Hash::make($pswd)]);
                    return back()->withErrors(['bien' => 'Se ha enviado un email a tu cuenta de correo electronico con tu nueva contraseña. Si no ves el mail revisa la carpeta de spam']);
                } else {
                    return back()->withErrors(['bien' => 'Ha habido un error, no se ha podido cambiar tu contraseña, contacta con un Administrador.']);
                }
            }
            return view('newPassword');
        }
    }
}
