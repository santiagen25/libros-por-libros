<?php

use Illuminate\Support\Facades\DB;

if(isset($_POST["q"])){
    if(session_status() == PHP_SESSION_NONE) session_start();
    echo DB::table('usuario')->select("Password")->where('Email','=',$_SESSION["email"])->first()->Password;
} else {
    header("Location: /configuracion");
    exit;
}
?>