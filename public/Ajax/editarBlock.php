<?php

use Illuminate\Support\Facades\DB;

if(session_status() == PHP_SESSION_NONE) session_start();
if(isset($_POST["id"]) && isset($_POST["admin"]) && isset($_SESSION["email"]) && isset($_SESSION["admin"])){
    DB::table('usuario')->where('IDUsuario','=',$_POST["id"])->update(['Bloqueado' => $_POST['admin']]);
} else {
    header("Location: /configuracion");
    exit;
}
?>