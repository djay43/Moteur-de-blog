<?php

namespace App\src\model;

/**
 * Class View
 * @package App\src\model
 */
class View
{
    private $file;
    private $title;

    /** ------------------------------------ GENERATION VUE FRONT ------------------------------------------------------
     * @param $template       Nom du fichier temp
     * @param array $data     variables à retourner
     -----------------------------------------------------------------------------------------------------------------*/
    public function render($template, $data = [])
    {
        $this->file = '../templates/frontend/'.$template.'.php';
        $content  = $this->renderFile($this->file, $data);
        $view = $this->renderFile('../templates/frontend/base.php', [
            'title' => $this->title,
            'content' => $content
        ]);
        echo $view;
    }

    /**------------------------------------ GENERATION VUE BACK ------------------------------------------------------
     * @param $template         nom du fichier tep
     * @param array $data       variables à retourner
     -----------------------------------------------------------------------------------------------------------------*/
    public function adminRender($template, $data = [])
    {
        $this->file = '../templates/backend/'.$template.'.php';
        $adminContent  = $this->renderFile($this->file, $data);
        $view = $this->renderFile('../templates/backend/baseAdmin.php', [
            'title' => $this->title,
            'adminContent' => $adminContent
        ]);
        echo $view;
    }

    /** ------------------------------------ RECUPERATION DU FICHIER----------------------------------------------------
     * @param $file              chemin du fichier
     * @param $data              données à extraire
     * @return false|string      on retourne fichier si il existe sinon erreur
     -----------------------------------------------------------------------------------------------------------------*/
    private function renderFile($file, $data)
    {
        if(file_exists($file)){
            extract($data);
            ob_start();
            require $file;
            return ob_get_clean();
        }
        else {
            
            echo 'Fichier inexistant';
        }
    }
}