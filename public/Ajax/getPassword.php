<?php

use Illuminate\Support\Facades\DB;

if(isset($_POST["q"])){
    //echo $q;
    if(session_status() == PHP_SESSION_NONE) session_start();
    if(Hash::check($_POST["q"],DB::table('usuario')->select("Password")->where('Email','=',$_SESSION["email"])->first()->Password)) echo 1;
    else echo 0;
} else {
    header("Location: /configuracion");
    exit;
}
?>