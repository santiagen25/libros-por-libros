<?php

use Illuminate\Support\Facades\DB;

if(session_status() == PHP_SESSION_NONE) session_start();
if(isset($_POST["q"]) && isset($_SESSION["email"])){
    echo DB::table('usuario')->select("Password")->where('Email','=',$_SESSION["email"])->update(['Password' => Hash::make($_POST["q"])]);
} else {
    header("Location: /configuracion");
    exit;
}
?>