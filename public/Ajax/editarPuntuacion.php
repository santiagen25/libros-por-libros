<?php

use Illuminate\Support\Facades\DB;

if(isset($_POST["q"]) && isset($_POST["idLibro"])){
    if(session_status() == PHP_SESSION_NONE) session_start();
    $idUsuario = DB::table('usuario')->select("IDUsuario")->where('Email','=',$_SESSION["email"])->first()->IDUsuario;
    DB::table('valoracion')->select("Titulo")->where('IDLibroFK','=',$_POST["idLibro"])->where('IDUsuarioFK','=',$idUsuario)->update(['Puntuacion' => $_POST['q']]);
} else {
    header("Location: /configuracion");
    exit;
}
?>