<?php

use Illuminate\Support\Facades\DB;

if(isset($_POST["actualMeGusta"]) && isset($_POST["idvaloracion"])){
    if(session_status() == PHP_SESSION_NONE) session_start();
    DB::table('Usuario_Valoracion')->where('IDMezcla','=',$_SESSION["id"]."_".$_POST["idvaloracion"])->delete();
} else {
    header("Location: /inicio");
    exit;
}
?>