<?php

use Illuminate\Support\Facades\DB;

if(isset($_POST["id"]) && isset($_POST["admin"])){
    if(session_status() == PHP_SESSION_NONE) session_start();
    DB::table('usuario')->where('IDUsuario','=',$_POST["id"])->update(['esAdmin' => $_POST['admin']]);
} else {
    header("Location: /configuracion");
    exit;
}
?>