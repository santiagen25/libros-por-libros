<?php

use Illuminate\Support\Facades\DB;

if(isset($_POST["q"])){
    if(session_status() == PHP_SESSION_NONE) session_start();
    if(isset($_POST["id"])){
        if(DB::table('usuario')->where('Email','=',$_POST["q"])->first()==NULL || $_POST["q"]==DB::table('usuario')->where('IDUsuario','=',$_POST["id"])->first()->Email) echo 0;
        else echo 1;
    } else {
        //existe? 0=no 1=si
        if(DB::table('usuario')->where('Email','=',$_POST["q"])->first()==NULL || $_POST["q"]==$_SESSION["email"]) echo 0;
        else echo 1;
    }
} else {
    header("Location: /configuracion");
    exit;
}
?>