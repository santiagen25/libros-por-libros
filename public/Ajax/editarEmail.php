<?php

use Illuminate\Support\Facades\DB;

if(isset($_POST["q"])){
    if(session_status() == PHP_SESSION_NONE) session_start();
    if(isset($_POST["id"])){
        DB::table('usuario')->where('Email','=',DB::table('usuario')->where('IDUsuario','=',$_POST["id"])->first()->Email)->update(['Email' => $_POST['q']]);
    } else {
        DB::table('usuario')->where('Email','=',$_SESSION["email"])->update(['Email' => $_POST['q']]);
        $_SESSION["email"] = $_POST["q"];
    }
} else {
    header("Location: /configuracion");
    exit;
}
?>