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
}
