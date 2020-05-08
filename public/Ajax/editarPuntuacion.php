<?php

use Illuminate\Support\Facades\DB;

if(session_status() == PHP_SESSION_NONE) session_start();
if(isset($_POST["q"]) && isset($_POST["idLibro"]) && isset($_SESSION["email"])){
    $idUsuario = DB::table('usuario')->select("IDUsuario")->where('Email','=',$_SESSION["email"])->first()->IDUsuario;
    DB::table('valoracion')->select("Titulo")->where('IDLibroFK','=',$_POST["idLibro"])->where('IDUsuarioFK','=',$idUsuario)->update(['Puntuacion' => $_POST['q'], 'created_at' => date('Y-m-d H:i:s')]);
} else {
    header("Location: /configuracion");
    exit;
}
?>