<?php

use Illuminate\Support\Facades\DB;

if(session_status() == PHP_SESSION_NONE) session_start();
if(isset($_POST["q"]) && isset($_SESSION["email"])){
    if(Hash::check($_POST["q"],DB::table('usuario')->select("Password")->where('Email','=',$_SESSION["email"])->first()->Password)) echo 1;
    else echo 0;
} else {
    header("Location: /configuracion");
    exit;
}
?>