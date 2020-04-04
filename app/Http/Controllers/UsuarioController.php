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
            $usuario = DB::table('usuario')->where('Email','=',$_SESSION["email"])->first();
            $valoraciones = DB::table('Valoracion')->where('IDUsuarioFK','=',$usuario->IDUsuario)->orderBy('Valoracion.created_at','desc')->get();
            //este doble inner join junta las tablas usuario_valoracion, valoracion y libro para poder encontrar que libro tiene el comentario que le ha gustado a un usuario en concreto (boom)
            $likesRecibidos = DB::table('Usuario_Valoracion')->join('Valoracion','Usuario_Valoracion.IDValoracionFK3','=','Valoracion.IDValoracion')->join('Libro','Valoracion.IDLibroFK','=','Libro.IDLibro')->where('Valoracion.IDUsuarioFK','=',$usuario->IDUsuario)->orderBy('Usuario_Valoracion.created_at','desc')->get();
            $likesDados = DB::table('Usuario_Valoracion')->join('Valoracion','Usuario_Valoracion.IDValoracionFK3','=','Valoracion.IDValoracion')->join('Libro','Valoracion.IDLibroFK','=','Libro.IDLibro')->where('Usuario_Valoracion.IDUsuarioFK4','=',$usuario->IDUsuario)->orderBy('Valoracion.created_at','desc')->get();
            $relaciones = DB::table('Libro')->join('Usuario_Libro','Libro.IDLibro','=','Usuario_Libro.IDLibroFK2')->where('IDUsuarioFK3','=',$_SESSION["id"])->orderBy('Usuario_Libro.created_at','desc')->get();

            return view('/inicio',['usuario'=>$usuario,'valoraciones'=>$valoraciones,'likesRecibidos'=>$likesRecibidos,'likesDados'=>$likesDados, 'relaciones'=>$relaciones]);
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
            } else if(isset($_POST["eliminarImagen"])){
                if(file_exists("../public/images/imagenesusuarios/foto_".$usuario->IDUsuario.".jpg")) unlink("../public/images/imagenesusuarios/foto_".$usuario->IDUsuario.".jpg");
                else if(file_exists("../public/images/imagenesusuarios/foto_".$usuario->IDUsuario.".jpeg")) unlink("../public/images/imagenesusuarios/foto_".$usuario->IDUsuario.".jpeg");
                else if(file_exists("../public/images/imagenesusuarios/foto_".$usuario->IDUsuario.".png")) unlink("../public/images/imagenesusuarios/foto_".$usuario->IDUsuario.".png");
                else if(file_exists("../public/images/imagenesusuarios/foto_".$usuario->IDUsuario.".gif")) unlink("../public/images/imagenesusuarios/foto_".$usuario->IDUsuario.".gif");
            } else if(isset($_POST["eliminarCuenta"])){
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
            $libros = DB::table('Libro')->join('Usuario_Libro','Libro.IDLibro','=','Usuario_Libro.IDLibroFK2')->where('IDUsuarioFK3','=',$_SESSION["id"])->orderBy('Libro.IDLibro','asc')->get();

            return view('/biblioteca',['usuario'=>$usuario,'libros'=>$libros]);
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

        if($libro==NULL) return response()->view('error',['error' => "404", 'mensaje' => "No hemos podido encontrar el Libro que buscabas"]);

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
                    'IDUsuarioFK' => $usuario->IDUsuario,
                    'created_at' => date('Y-m-d H:i:s')]
                );
                return back();
            }
        } else if(isset($_POST["botonRelacion"])){
            //vamos a crer la relacion (o actualizarla). Con esto sabemos si quieren leer un libro, si lo han leido, si esta fav...
            $relacion = DB::table('Usuario_Libro')->where('IDUsuarioFK3','=',$_SESSION["id"])->where('IDLibroFK2','=',$id)->first();
            $fav=0;
            if(isset($_POST["favorito"])) $fav=1;
            if($_POST["relacion"]=="Sin Relacion"){
                DB::table('Usuario_Libro')->where('IDUsuarioFK3','=',$_SESSION["id"])->where('IDLibroFK2','=',$id)->delete();
            } else if ($_POST["relacion"]=="Quiero Leerlo"){
                if($relacion!=NULL) DB::table('Usuario_Libro')->where('IDUsuarioFK3','=',$_SESSION["id"])->where('IDLibroFK2','=',$id)->update(['Relacion'=>1,'Favorito'=>$fav,'created_at'=>date('Y-m-d H:i:s')]);
                else DB::table('Usuario_Libro')->where('IDUsuarioFK3','=',$_SESSION["id"])->where('IDLibroFK2','=',$id)->insert(['IDLibroFK2'=>$id,'IDUsuarioFK3'=>$_SESSION["id"],'IDMezcla'=>$id."_".$_SESSION["id"],'Relacion'=>1,'Favorito'=>$fav,'created_at'=>date('Y-m-d H:i:s')]);
            } else if($_POST["relacion"]=="Leyendo"){
                if($relacion!=NULL) DB::table('Usuario_Libro')->where('IDUsuarioFK3','=',$_SESSION["id"])->where('IDLibroFK2','=',$id)->update(['Relacion'=>2,'Favorito'=>$fav,'created_at'=>date('Y-m-d H:i:s')]);
                else DB::table('Usuario_Libro')->where('IDUsuarioFK3','=',$_SESSION["id"])->where('IDLibroFK2','=',$id)->insert(['IDLibroFK2'=>$id,'IDUsuarioFK3'=>$_SESSION["id"],'IDMezcla'=>$id."_".$_SESSION["id"],'Relacion'=>2,'Favorito'=>$fav,'created_at'=>date('Y-m-d H:i:s')]);
            } else if($_POST["relacion"]=="Leido"){
                if($relacion!=NULL) DB::table('Usuario_Libro')->where('IDUsuarioFK3','=',$_SESSION["id"])->where('IDLibroFK2','=',$id)->update(['Relacion'=>3,'Favorito'=>$fav,'created_at'=>date('Y-m-d H:i:s')]);
                else DB::table('Usuario_Libro')->where('IDUsuarioFK3','=',$_SESSION["id"])->where('IDLibroFK2','=',$id)->insert(['IDLibroFK2'=>$id,'IDUsuarioFK3'=>$_SESSION["id"],'IDMezcla'=>$id."_".$_SESSION["id"],'Relacion'=>3,'Favorito'=>$fav,'created_at'=>date('Y-m-d H:i:s')]);
            }
        } else if (isset($_POST["eliminarComentario"]) && $_SESSION["admin"]=1) {
            //esto es para admin, por eso preguntamos $_SESSION
            DB::table('Valoracion')->where('IDValoracion','=',$_POST["id_valoracion"])->delete();
        }

        if(isset($_POST["eliminarValoracion"])) DB::table('valoracion')->where('IDUsuarioFK','=',$usuario->IDUsuario)->where('IDLibroFK','=',$libro->IDLibro)->delete();

        $valoraciones = DB::table('valoracion')->where('IDLibroFK','=',$id)->where('IDUsuarioFK','<>',$usuario->IDUsuario)->get();
        $relacion =  DB::table('Usuario_Libro')->where('IDUsuarioFK3','=',$_SESSION["id"])->where('IDLibroFK2','=',$id)->first();
        return view('entrada',['libro' => $libro, 'valoraciones' => $valoraciones, 'usuario' => $usuario, 'relacion' => $relacion]);
    }

    function usuario($id){
        if(session_status() == PHP_SESSION_NONE) session_start();
        if(!isset($_SESSION["email"])) return redirect()->route('login');
        $usuario = DB::table('usuario')->where('IDUsuario','=',$id)->first();
        if($usuario==NULL) return response()->view('error',['error' => "404", 'mensaje' => "No hemos podido encontrar el Usuario que buscabas"]);
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
                
                $errores = [];
                if(isset($_POST["botonImagen"])){
                    $usuario = DB::table('usuario')->where('IDUsuario','=',$_POST["id"])->first();
                    if($usuario!=NULL){
                        //este if para ver si existe el usuario
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
                    } else $errores["errorImagen"] = "Se ha producido un error en el servidor";

                    return back()->withErrors($errores);
                }

                if(isset($_POST["eliminarCuenta"])){
                    $usuario = DB::table('usuario')->where('IDUsuario','=',$_POST["id"])->first();
                    if($usuario!=NULL){
                        DB::table('usuario')->where('IDUsuario','=',$usuario->IDUsuario)->delete();
                        if($usuario->IDUsuario==$_SESSION["id"]){
                            session_unset();
                            return redirect()->route('login');
                        }
                        $errores["successEliminar"] = "La cuenta con id ".$usuario->IDUsuario."  se ha eliminado con éxito";
                        return back()->withErrors($errores);
                    } else $errores["errorImagen"] = "Se ha producido un error en el servidor"; 

                    return back()->withErrors($errores);
                }

                if(isset($_POST["eliminarImagen"])){
                    if(file_exists("../public/images/imagenesusuarios/foto_".$_POST["id"].".jpg")) unlink("../public/images/imagenesusuarios/foto_".$_POST["id"].".jpg");
                    else if(file_exists("../public/images/imagenesusuarios/foto_".$_POST["id"].".jpeg")) unlink("../public/images/imagenesusuarios/foto_".$_POST["id"].".jpeg");
                    else if(file_exists("../public/images/imagenesusuarios/foto_".$_POST["id"].".png")) unlink("../public/images/imagenesusuarios/foto_".$_POST["id"].".png");
                    else if(file_exists("../public/images/imagenesusuarios/foto_".$_POST["id"].".gif")) unlink("../public/images/imagenesusuarios/foto_".$_POST["id"].".gif");
                }

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
                    //vamos a registrar a alguien
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
        
                    if($errores!=[]) {
                        $errores["emailCampo"] = $_POST["email"];
                        $errores["nombreCampo"] = $_POST["nombre"];
                        $errores["nacimientoCampo"] = date_format(date_create($_POST["nacimiento"]),"Y-m-d");
                        return back()->withErrors($errores);
                    } else {
                        //todo ok
                        DB::table('usuario')->insert(
                            ['esAdmin' => false, 'email' => $_POST["email"], 'nombre' => $_POST["nombre"], 'password' => $_POST["password"], 'nacimiento' => $_POST["nacimiento"].' 0:00:00', 'bloqueado' => false, 
                            'created_at' => date('Y-m-d H:i:s')]
                        );
                        $reg["registroBien"] = "¡Te has registrado con éxito!";
                        return back()->withErrors($reg);
                    }
                }

                return view('crearCuenta');
            }
            return redirect()->route('inicio');
        }
        return redirect()->route('login');
    }

    function nuevoLibro(){
        if(session_status() == PHP_SESSION_NONE) session_start();
        if(isset($_SESSION["email"]) && $_SESSION["admin"]==1){
            if(isset($_POST["crearLibro"])){
                //vamos a crear el libro
                $imgExists = false;
                $errores = [];
                if($_POST["nombre"]!="") { if(strlen($_POST["nombre"]) >= 100) $errores["nombre"] = "El nombre es demasiado largo"; }
                else $errores["nombre"] = "Falta introducir el nombre";

                if($_POST["autor"]!="") { if(strlen($_POST["autor"]) >= 50) $errores["autor"] = "El nombre del autor es demasiado largo"; }
                else $errores["autor"] = "Falta introducir el autor";

                if($_POST["isbn"]!=""){
                    if(ctype_digit($_POST["isbn"])){
                        if(strlen($_POST["isbn"]) != 10 && strlen($_POST["isbn"]) != 13) {
                            $errores["isbn"] = "El ISBN ha de tener 10 o 13 dígitos";
                        } else {
                            //comprobamos que no existe un libro con su ISBN
                            $libro = DB::table('libro')->where('ISBN','=',$_POST["isbn"])->first();
                            if($libro!=NULL) $errores["isbn"] = "Ya existe un Libro con este ISBN en la base de datos. Ir al Libro: <a class='link2' href='".asset('/libro/'.$libro->IDLibro)."'>".$libro->Nombre."</a>";
                        }
                    } else $errores["isbn"] = "El ISBN ha de ser un numero integer";
                } else $errores["isbn"] = "Falta introducir el ISBN";

                if($_POST["genero"]!="") { if(strlen($_POST["genero"]) >= 20) $errores["genero"] = "El nombre del genero es demasiado largo"; }
                else $errores["genero"] = "Falta introducir el género";

                if($_FILES["imagen"]["name"] != "") $imgExists = true;

                if($_POST["descripcion"]!="") { if(strlen($_POST["descripcion"]) >= 10000) $errores["descripcion"] = "La descripción es demasiado larga"; }
                else $errores["descripcion"] = "Falta introducir la descripcion";

                if($errores!=[]) {
                    $errores["nombreCampo"] = $_POST["nombre"];
                    $errores["autorCampo"] = $_POST["autor"];
                    $errores["isbnCampo"] = $_POST["isbn"];
                    $errores["generoCampo"] = $_POST["genero"];
                    $errores["descripcionCampo"] = $_POST["descripcion"];
                    return back()->withErrors($errores);
                } else {
                    //todo ok
                    //creamos y luego, si hay imagen, guardamos la imagen con el id del libro nuevo
                    DB::table('libro')->insert(
                        ['Autor' => $_POST["autor"], 'Nombre' => $_POST["nombre"], 'ISBN' => $_POST["isbn"], 'Genero' => $_POST["genero"], 'Descripcion' =>$_POST["descripcion"], 
                        'created_at' => date('Y-m-d H:i:s')]
                    );
                    $libro = DB::table('libro')->where('ISBN','=',$_POST["isbn"])->first();

                    if($imgExists){
                        $target_dir = "../public/images/imagenesLibros/";
                        $extension = strtolower(pathinfo(basename($_FILES["imagen"]["name"]),PATHINFO_EXTENSION));
                        $target_file = $target_dir . basename("libro_".$libro->IDLibro.".".$extension);
                        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                        if($_FILES["imagen"]["name"] != ""){
                            $check = getimagesize($_FILES["imagen"]["tmp_name"]);
                            if($check !== false) {
                                if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
                                    $errores["imagen"] = "Solo se admiten los archivos JPG, JPEG, PNG & GIF";
                                } else {
                                    if ($_FILES["imagen"]["size"] > 500000) $errores["imagen"] = "Tu archivo pesa demasiado";
                                    else {
                                        //esto borra el archivo de la foto para ese usuario si ya existia
                                        if(file_exists("../public/images/imagenesLibros/libro_".$libro->IDLibro.".jpg")) unlink("../public/images/imagenesLibros/libro_".$libro->IDLibro.".jpg");
                                        else if(file_exists("../public/images/imagenesLibros/libro_".$libro->IDLibro.".jpeg")) unlink("../public/images/imagenesLibros/libro_".$libro->IDLibro.".jpeg");
                                        else if(file_exists("../public/images/imagenesLibros/libro_".$libro->IDLibro.".png")) unlink("../public/images/imagenesLibros/libro_".$libro->IDLibro.".png");
                                        else if(file_exists("../public/images/imagenesLibros/libro_".$libro->IDLibro.".gif")) unlink("../public/images/imagenesLibros/libro_".$libro->IDLibro.".gif");
                                        if (move_uploaded_file($_FILES["imagen"]["tmp_name"], $target_file)) return back(); //todo ok
                                        else $errores["imagen"] =  "No se ha podido subir tu foto";
                                    }
                                }
                            } else $errores["imagen"] = "El archivo no es una imagen";
                        } else $errores["imagen"] = "Has de subir algun archivo";
                    }

                    if(isset($errores["imagen"])) $errores["imagen"] = "Tu libro ha sido creado con éxito, pero ha habido un problema al guardar la foto: ".$errores["imagen"];

                    $errores["bien"] = "¡Has creado un nuevo Libro con éxito!";
                    return back()->withErrors($errores);
                }
            }
            return view('nuevoLibro');
        }
        return redirect()->route('login');
    }

    function editarLibro($id){
        if(session_status() == PHP_SESSION_NONE) session_start();
        if(isset($_SESSION["email"]) && $_SESSION["admin"]==1){
            $libro = DB::table('Libro')->where('IDLibro','=',$id)->first();
            if($libro==NULL) return response()->view('error',['error' => "404", 'mensaje' => "No hemos podido encontrar el Libro que buscabas"]);

            if(isset($_POST["editarLibro"])){
                //vamos a crear el libro
                $imgExists = false;
                $errores = [];
                if($_POST["nombre"]!="") { if(strlen($_POST["nombre"]) >= 100) $errores["nombre"] = "El nombre es demasiado largo"; }
                else $errores["nombre"] = "Falta introducir el nombre";

                if($_POST["autor"]!="") { if(strlen($_POST["autor"]) >= 50) $errores["autor"] = "El nombre del autor es demasiado largo"; }
                else $errores["autor"] = "Falta introducir el autor";

                if($_POST["isbn"]!=""){
                    if(ctype_digit($_POST["isbn"])){
                        if(strlen($_POST["isbn"]) != 10 && strlen($_POST["isbn"]) != 13) {
                            $errores["isbn"] = "El ISBN ha de tener 10 o 13 dígitos";
                        } else {
                            //comprobamos que no existe un libro con su ISBN
                            //con la doble query esta dejamos que el isbn propio exista, para que no pete al guardar el mismo isbn
                            $libro = DB::table('libro')->where('IDLibro','=',$id)->first();
                            $libros = DB::table('libro')->where('ISBN','=',$_POST["isbn"])->where('ISBN','<>',$libro->ISBN)->first();
                            if($libros!=NULL) $errores["isbn"] = "Ya existe un Libro con este ISBN en la base de datos. Ir al Libro: <a class='link2' href='".asset('/libro/'.$libros->IDLibro)."'>".$libros->Nombre."</a>";
                        }
                    } else $errores["isbn"] = "El ISBN ha de ser un numero integer";
                } else $errores["isbn"] = "Falta introducir el ISBN";

                if($_POST["genero"]!="") { if(strlen($_POST["genero"]) >= 20) $errores["genero"] = "El nombre del genero es demasiado largo"; }
                else $errores["genero"] = "Falta introducir el género";

                if($_FILES["imagen"]["name"] != "") $imgExists = true;

                if($_POST["descripcion"]!="") { if(strlen($_POST["descripcion"]) >= 10000) $errores["descripcion"] = "La descripción es demasiado larga"; }
                else $errores["descripcion"] = "Falta introducir la descripcion";

                if($errores!=[]) return back()->withErrors($errores);
                else {
                    //todo ok
                    //creamos y luego, si hay imagen, guardamos la imagen con el id del libro nuevo
                    DB::table('libro')->where('IDLibro','=',$id)->update(
                        ['Autor' => $_POST["autor"], 'Nombre' => $_POST["nombre"], 'ISBN' => $_POST["isbn"], 'Genero' => $_POST["genero"], 'Descripcion' =>$_POST["descripcion"]]
                    );
                    $libro = DB::table('libro')->where('ISBN','=',$_POST["isbn"])->first();

                    if($imgExists){
                        $target_dir = "../public/images/imagenesLibros/";
                        $extension = strtolower(pathinfo(basename($_FILES["imagen"]["name"]),PATHINFO_EXTENSION));
                        $target_file = $target_dir . basename("libro_".$libro->IDLibro.".".$extension);
                        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                        if($_FILES["imagen"]["name"] != ""){
                            $check = getimagesize($_FILES["imagen"]["tmp_name"]);
                            if($check !== false) {
                                if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
                                    $errores["imagen"] = "Solo se admiten los archivos JPG, JPEG, PNG & GIF";
                                } else {
                                    if ($_FILES["imagen"]["size"] > 500000) $errores["imagen"] = "Tu archivo pesa demasiado";
                                    else {
                                        //esto borra el archivo de la foto para ese libro si ya existia
                                        if(file_exists("../public/images/imagenesLibros/libro_".$libro->IDLibro.".jpg")) unlink("../public/images/imagenesLibros/libro_".$libro->IDLibro.".jpg");
                                        else if(file_exists("../public/images/imagenesLibros/libro_".$libro->IDLibro.".jpeg")) unlink("../public/images/imagenesLibros/libro_".$libro->IDLibro.".jpeg");
                                        else if(file_exists("../public/images/imagenesLibros/libro_".$libro->IDLibro.".png")) unlink("../public/images/imagenesLibros/libro_".$libro->IDLibro.".png");
                                        else if(file_exists("../public/images/imagenesLibros/libro_".$libro->IDLibro.".gif")) unlink("../public/images/imagenesLibros/libro_".$libro->IDLibro.".gif");
                                        if (!move_uploaded_file($_FILES["imagen"]["tmp_name"], $target_file)) $errores["imagen"] = "No se ha podido subir tu foto";
                                    }
                                }
                            } else $errores["imagen"] = "El archivo no es una imagen";
                        } else $errores["imagen"] = "Has de subir algun archivo";
                    }

                    if(isset($errores["imagen"])) $errores["imagen"] = "Tu libro ha sido editado con éxito, pero ha habido un problema al guardar la foto: ".$errores["imagen"];

                    $errores["bien"] = "¡Has editado este Libro!";
                    return back()->withErrors($errores);
                }
            } else if(isset($_POST["eliminarImagen"])){
                if(file_exists("../public/images/imagenesLibros/libro_".$libro->IDLibro.".jpg")) unlink("../public/images/imagenesLibros/libro_".$libro->IDLibro.".jpg");
                else if(file_exists("../public/images/imagenesLibros/libro_".$libro->IDLibro.".jpeg")) unlink("../public/images/imagenesLibros/libro_".$libro->IDLibro.".jpeg");
                else if(file_exists("../public/images/imagenesLibros/libro_".$libro->IDLibro.".png")) unlink("../public/images/imagenesLibros/libro_".$libro->IDLibro.".png");
                else if(file_exists("../public/images/imagenesLibros/libro_".$libro->IDLibro.".gif")) unlink("../public/images/imagenesLibros/libro_".$libro->IDLibro.".gif");
                else {
                    $errores["bien"] = "Este libro no tiene Imagen";
                    return view('nuevoLibro')->withErrors($errores);
                }
                $errores["bien"] = "¡Has eliminado la imagen del Libro con éxito!";
                return view('nuevoLibro')->withErrors($errores);
            } else if(isset($_POST["eliminarLibro"])){
                //eliminamos el libro
                DB::table('Libro')->where('IDLibro','=',$id)->delete();
                $errores["bien"] = "¡Has creado un nuevo Libro con éxito!";
                return view('nuevoLibro')->withErrors($errores);
            }

            return view('editarLibro',['libro'=>$libro]);
        }
        return redirect()->route('login');
    }
}
