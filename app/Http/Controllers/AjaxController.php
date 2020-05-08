<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function ajaxEditarNombre(){
        include "../public/Ajax/editarNombre.php";
    }

    public function ajaxEditarEmail(){
        include "../public/Ajax/editarEmail.php";
    }

    public function ajaxEditarNacimiento(){
        include "../public/Ajax/editarNacimiento.php";
    }

    public function ajaxGetPassword(){
        include "../public/Ajax/getPassword.php";
    }

    public function ajaxEditarPassword(){
        include "../public/Ajax/editarPassword.php";
    }
    
    public function ajaxEditarTitulo(){
        include "../public/Ajax/editarTitulo.php";
    }

    public function ajaxEditarPuntuacion(){
        include "../public/Ajax/editarPuntuacion.php";
    }

    public function ajaxEditarComentario(){
        include "../public/Ajax/editarComentario.php";
    }

    public function ajaxComprobarEmail(){
        include "../public/Ajax/comprobarEmail.php";
    }

    public function ajaxEditarAdmin(){
        include "../public/Ajax/editarAdmin.php";
    }

    public function ajaxeditarBlock(){
        include "../public/Ajax/editarBlock.php";
    }

    public function ajaxEditarMeGusta(){
        include "../public/Ajax/editarMeGusta.php";
    }

    public function ajaxResetPassword(){
        include "../public/Ajax/resetPassword.php";
    }
}
