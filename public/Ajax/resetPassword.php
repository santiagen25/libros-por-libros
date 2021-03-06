<?php

use Illuminate\Support\Facades\DB;

if(session_status() == PHP_SESSION_NONE) session_start();
if(isset($_POST["id"]) && isset($_SESSION["admin"])){
    //por que hago dos ifs y no los junto en uno? porque si alguien me intenta entrar y no hay session, la pagina petará y mostrará error, en cambio asi redirigirá
    if($_SESSION["admin"]==1){
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $pswd = '';
        for ($i = 0; $i < 10; $i++) {
            $pswd .= $characters[rand(0, $charactersLength - 1)];
        }

        $usuario = DB::table('usuario')->where('IDUsuario','=',$_POST["id"])->first();

        $to_email = $usuario->Email;
        $subject = "Recuperación de contraseña para Libros por Libros";
        $body = "Se ha generado una contraseña aleatoriamente para que puedas entrar en tu cuenta.\n\nEsta es tu nueva contraseña: ".$pswd."\n\nTe recomendamos que cambies esta contraseña la proxima vez que entres en tu cuenta.";
        $headers = "From: LibrosPorLibros";
        
        if (mail($to_email, $subject, $body, $headers)) {
            echo 1;
            DB::table('usuario')->where('IDUsuario','=',$_POST["id"])->update(['Password' => Hash::make($pswd)]);
        } else {
            echo 0;
        }
    } else {
        header("Location: /inicio");
        exit;
    }
} else {
    header("Location: /inicio");
    exit;
}
?>