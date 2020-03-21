<?php

use Illuminate\Support\Facades\DB;

if(isset($_POST["q"])){
    if(session_status() == PHP_SESSION_NONE) session_start();
    DB::table('usuario')->where('Email','=',$_SESSION["email"])->update(['Email' => $_POST['q']]);
    $_SESSION["email"] = $_POST["q"];
} else {
    header("Location: /configuracion");
    exit;
}
?>