<?php

namespace App\src\controller;

class ErrorController
{
    public function unknown()
    {
        echo "Ce fichier est inconnu";
        header ('Location: ../../public/index.php');
    }

    public function error()
    {
        echo "Une erreur est survenue";
        header ('Location: ../../public/index.php');

    }
}