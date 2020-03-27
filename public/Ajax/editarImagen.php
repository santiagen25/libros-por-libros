<?php

use Illuminate\Support\Facades\DB;

if(isset($_POST["q"])){
    if(session_status() == PHP_SESSION_NONE) session_start();
    //recibimos un archivo q, hay que guardarlo en la carpeta images/imagenesUsuarios con el nombre foto_{id}.jpg
    
    $archivo = "public/images/imagenesUsuarios/".basename($_FILES["q"]["name"]);
    $imgTipo = strtolower(pathinfo($archivo,PATHINFO_EXTENSION));
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["q"]["tmp_name"]);
        if($check !== false) {
            echo "El archivo es una imagen - ".$check["mime"];
        } else {
            echo "El archivo no es una imagen";
        }
    }
    //$imagen = $_FILES["q"]["name"];
    //imagejpeg($imagen, "foto_1.jpg");
    //$id = DB::table('usuario')->where('Email','=',$_SESSION["email"])->first()->IDUsuario;
} else {
    header("Location: /configuracion");
    exit;
}
?>