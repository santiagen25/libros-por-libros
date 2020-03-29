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
            if(isset($_POST["botonImagen"])){
                $errores = [];
                $target_dir = "../public/images/imagenesUsuarios/";
                $extension = strtolower(pathinfo(basename($_FILES["imagen"]["name"]),PATHINFO_EXTENSION));
                $target_file = $target_dir . basename("foto_".$usuario->IDUsuario.".".$extension);
                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                if($_FILES["imagen"]["name"] != ""){
                    $check = getimagesize($_FILES["imagen"]["tmp_name"]);
                    if($check !== false) {
                        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
                            $errores["errorImagen"] = "Solo se admiten los archivos JPG, JPEG, PNG & GIF";
                        } else {
                            if ($_FILES["imagen"]["size"] > 500000) $errores["errorImagen"] = "Tu archivo pesa demasiado";
                            else {
                                //esto borra el archivo de la foto para ese usuario si ya existia
                                if(file_exists("../public/images/imagenesusuarios/foto_".$usuario->IDUsuario.".jpg")) unlink("../public/images/imagenesusuarios/foto_".$usuario->IDUsuario.".jpg");
                                else if(file_exists("../public/images/imagenesusuarios/foto_".$usuario->IDUsuario.".jpeg")) unlink("../public/images/imagenesusuarios/foto_".$usuario->IDUsuario.".jpeg");
                                else if(file_exists("../public/images/imagenesusuarios/foto_".$usuario->IDUsuario.".png")) unlink("../public/images/imagenesusuarios/foto_".$usuario->IDUsuario.".png");
                                else if(file_exists("../public/images/imagenesusuarios/foto_".$usuario->IDUsuario.".gif")) unlink("../public/images/imagenesusuarios/foto_".$usuario->IDUsuario.".gif");
                                if (move_uploaded_file($_FILES["imagen"]["tmp_name"], $target_file)) return back(); //todo ok
                                else $errores["errorImagen"] =  "Ha habido un error al subir tu foto";
                            }
                        }
                    } else $errores["errorImagen"] = "El archivo no es una imagen";
                } else $errores["errorImagen"] = "Has de subir algun archivo";

                return back()->withErrors($errores);
            }
            if(isset($_POST["eliminarCuenta"])){
                DB::table('usuario')->where('Email','=',$_SESSION["email"])->delete();
                session_unset();
                return redirect()->route('login');
            }
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
        $usuario = DB::table('usuario')->where('Email','=',$_SESSION["email"])->first();

        if(isset($_POST["publicarValoracion"])){
            //Vamos a dejar un comentario
            $errores = [];
            if($_POST["titulo"]!=""){ if(strlen($_POST["titulo"]) >= 50) $errores["titulo"] = "El titulo de la valoración no puede tener mas de 50 caracteres"; }
            else $errores["titulo"] = "El titulo no puede estar vacio";

            if($_POST["puntuacion"]!=""){
                if(ctype_digit($_POST["puntuacion"])){
                    if(intval($_POST["puntuacion"])>10 || intval($_POST["puntuacion"])<0) $errores["puntuacion"] = "La puntuacion ha de ser del 0 al 10";
                } else $errores["puntuacion"] = "La puntuacion ha de ser un numero integer";
            } else $errores["puntuacion"] = "La puntuacion no puede estar vacia";

            if($_POST["comentario"]!=""){ if(strlen($_POST["comentario"]) >= 10000) $errores["comentario"] = "El comentario de la valoración no puede tener mas de 10.000 caracteres"; }
            else $errores["comentario"] = "El comentario no puede estar vacio";

            if($errores!=[]) return back()->withErrors($errores);
            else {
                //todo ok, insertamos el comentario
                DB::table('valoracion')->insert(
                    ['IDValoracion' => null,
                    'Titulo' => $_POST["titulo"],
                    'Comentario' => $_POST["comentario"],
                    'Puntuacion' => $_POST["puntuacion"],
                    'IDLibroFK' => $libro->IDLibro,
                    'IDUsuarioFK' => $usuario->IDUsuario]
                );
                return back();
            }
        }

        if(isset($_POST["eliminarValoracion"])) DB::table('valoracion')->where('IDUsuarioFK','=',$usuario->IDUsuario)->where('IDLibroFK','=',$libro->IDLibro)->delete();

        $valoraciones = DB::table('valoracion')->where('IDLibroFK','=',$id)->where('IDUsuarioFK','<>',$usuario->IDUsuario)->get();
        return view('entrada',['libro' => $libro, 'valoraciones' => $valoraciones, 'usuario' => $usuario]);
    }

    function usuario($id){
        if(session_status() == PHP_SESSION_NONE) session_start();
        if(!isset($_SESSION["email"])) return redirect()->route('login');
        $usuario = DB::table('usuario')->where('IDUsuario','=',$id)->first();
        return view('usuario',['usuario' => $usuario]);
    }

    function listado(){
        if(session_status() == PHP_SESSION_NONE) session_start();
        if(isset($_SESSION["email"])){
            $usuarios = DB::table('usuario')->get();
            //hay que mirar si es admin (está guardado en sessions)
            $admin = $_SESSION["admin"] == 1 ? 1 : 0;
            if($admin==1){
                //es admin y está logueado
                if(isset($_GET["buscador"])){
                    $usuarios = DB::table('usuario')->where('Nombre','LIKE','%'.$_GET["buscador"].'%')->get();
                    return view('listado',['usuarios'=>$usuarios]);
                }
                //if(isset($_POST["eliminarCuenta"]))
                return view('listado',['usuarios'=>$usuarios]);
            }
            return redirect()->route('inicio');
        }
        return redirect()->route('login');
    }

    function creacionUsuario(){
        if(session_status() == PHP_SESSION_NONE) session_start();
        if(isset($_SESSION["email"])){
            $usuarios = DB::table('usuario')->get();
            //hay que mirar si es admin (está guardado en sessions)
            $admin = $_SESSION["admin"] == 1 ? 1 : 0;
            if($admin==1){
                //es admin y está logueado
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
                            if(!preg_match('/[A-Z]/', $_POST["password"])) $errores["password"] = "Falta añadir una letra mayúscula. ";
                            if(!preg_match('/[a-z]/', $_POST["password"])) $errores["password"] .= "Falta añadir una letra minúscula. ";
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
                    }
                }
                /*if(isset($_POST[""])){

                }*/
                return view('crearCuenta');
            }
            return redirect()->route('inicio');
        }
        return redirect()->route('login');
    }

    function nuevoLibro(){
        if(session_status() == PHP_SESSION_NONE) session_start();
        if(isset($_SESSION["email"]) && $_SESSION["admin"]==1){
            return view('nuevoLibro');
        }
        return redirect()->route('login');
    }
}
