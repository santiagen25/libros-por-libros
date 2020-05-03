<?php

use Illuminate\Support\Facades\DB;

if(isset($_POST["q"]) && isset($_SESSION["email"])){
    if(session_status() == PHP_SESSION_NONE) session_start();
    if(isset($_POST["id"])){
        //se está cambiando un nombre de un usuario que no es el actual
        DB::table('usuario')->where('IDUsuario','=',$_POST["id"])->update(['Nombre' => $_POST['q']]);
    } else DB::table('usuario')->where('Email','=',$_SESSION["email"])->update(['Nombre' => $_POST['q']]);
} else {
    header("Location: /configuracion");
    exit;
}
?>