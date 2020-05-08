<?php

use Illuminate\Support\Facades\DB;

if(session_status() == PHP_SESSION_NONE) session_start();
if(isset($_POST["actualMeGusta"]) && isset($_POST["idvaloracion"]) && isset($_SESSION["email"])){
    //si existe el megusta hacemos un drop para eliminarlo, si no existe hacemos un insert para crearlo
    if($_POST["actualMeGusta"]==1){
        //hay que eliminarlo, ya que existe el megusta
        DB::table('Usuario_Valoracion')->where('IDMezcla','=',$_SESSION["id"]."_".$_POST["idvaloracion"])->delete();
    } else {
        //hay que insertarlo, ya que no existe (osea que ha cambiado de opinion y si que le gusta)
        DB::table('Usuario_Valoracion')->insert(
            ['IDUsuarioFK4' => $_SESSION["id"], 'IDValoracionFK3' => $_POST["idvaloracion"], 'IDMezcla' => $_SESSION["id"]."_".$_POST["idvaloracion"], 
            'created_at' => date('Y-m-d H:i:s')]
        );
    }
} else {
    header("Location: /inicio");
    exit;
}
?>