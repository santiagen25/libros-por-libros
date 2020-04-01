<?php

use Illuminate\Support\Facades\DB;

if(session_status() == PHP_SESSION_NONE) session_start();
if(isset($_POST["id"]) && $_SESSION["admin"]==1){
    //vamos a hacer las cositas para enviar el mail
    require "../public/Mail/PHPMailer.php";
    require "../public/Mail/SMTP.php";
    $mail = new phpmailer();
    $mail->PluginDir = "includes/";
    $mail->Mailer = "smtp";
    $mail->Host = "LibrosPorLibros.es";
    $mail->SMTPAuth = true;
    $mail->Username = "santiago.torrabadella@hotmail.com";
    $mail->Password = "password";
    $mail->From = "santiago.torrabadella@hotmail.com";
    $mail->FromName = "Santiago Torrabadella";
    $mail->Timeout=30;
    $mail->AddAddress("direccion@destino.com");
    $mail->Subject = "Nueva contraseña de Libros por Libros";
    $mail->Body = "<p>Esta es tu nueva contraseña</p>";
    $mail->AltBody = "Esto es otro body";
    $exito = $mail->Send();
    $intentos = 1;
    while((!$exito) && ($intentos < 5)){
        sleep(5);
        $exito = $mail->Send();
        $intentos=$intentos+1;
    }
    if(!$exito){
        echo "Problemas enviando correo electronico";
    } else {
        echo "Mensaje enviado correctamente";
    }

    DB::table('usuario')->where('IDUsuario','=',$_POST["id"])->update(['Password' => "hello"]);
    mail("santi_torri97@hotmail.com","Nueva contraseña de Libros por Libros","Tu nueva contraseña es 'hello'",null,"From: santiago.torrabadella@hotmail.com\r\n");
} else {
    header("Location: /inicio");
    exit;
}
?>