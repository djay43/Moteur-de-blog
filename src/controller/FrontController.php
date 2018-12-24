<?php

namespace App\src\controller;
use App\src\DAO\ArticleDAO;
use App\src\DAO\CommentDAO;
use App\src\model\View;


/**
 * Class FrontController
  @package App\src\controller
 */
class FrontController{


       private $articleDAO;
       private $commentDAO;
       private $view;


    /** ------------------------------------ CONSTRUCTEUR NOUVEAUX OBJETS-----------------------------------------------
     * BackController constructor.
    -----------------------------------------------------------------------------------------------------------------*/
    public function __construct(){
            $this->articleDAO = new ArticleDAO();
            $this->commentDAO = new CommentDAO();
            $this->view = new View();

        }


    /** -----------------------------------AFFICHAGE ACCUEIL FRONT------------------------------------------------------
     *
    -----------------------------------------------------------------------------------------------------------------*/
    public function home(){
            
            $lastEp = $this->articleDAO->getLastPost();
            $posts=$this->articleDAO->getPosts();

            $this->view->render('home',[
                                'posts' => $posts,
                                'lastEp' => $lastEp]);

        }


    /** -----------------------------------AFFICHAGE D'UN ARTICLE-------------------------------------------------------
     * @param $postId  ID de l'article à afficher
     -----------------------------------------------------------------------------------------------------------------*/
    public function singlePost($postId){

            $post = $this->articleDAO->getPost($postId);
            $comments=$this->commentDAO->getComments($postId);
            
            $this->view->render('singlePost',[
                                'post' => $post,
                                'comments' => $comments]);
        }


    /** -----------------------------------AFFICHAGE FORMULAIRE AUTHENTIFICATION----------------------------------------
     *
     -----------------------------------------------------------------------------------------------------------------*/
    public function auth(){
           
            $this->view->render('authentification', []);
        }



    /** ---------------------------------- NOUVEAU COMMENTAIRE----------------------------------------------------------
     * @param $postId  ID de l'article sur lequel le commentaire est associé
     * @param $author  $_POST de author
     * @param $comment $_POST de comment
     -----------------------------------------------------------------------------------------------------------------*/
    public function addComment($postId, $author, $comment){

            $this->commentDAO->newComment($postId, $author, $comment);
            $_SESSION['sendComment']='Votre commentaire a bien été envoyé';
            
        }

    /** -----------------------------------SIGNALEMENT D'UN COMMENTAIRE-------------------------------------------------
     * @param $postId  ID du commentaire à signaler
     -----------------------------------------------------------------------------------------------------------------*/
    public function signal ($commId){

            $this->commentDAO->alert($commId);
            $_SESSION['signal']='Le commentaire a bien été signalé';
        }
      
}

        



        

       

        