<?php

namespace App\src\controller;

use App\src\DAO\ArticleDAO;
use App\src\DAO\CommentDAO;
use App\src\DAO\Auth;
use App\src\model\View;


/**
 * Class BackController
 * @package App\src\controller
 */
class BackController
{
    private $articleDAO;
    private $commentDAO;
	private $view;
    private $auth;


    /** ------------------------------------ CONSTRUCTEUR NOUVEAUX OBJETS-----------------------------------------------
     * BackController constructor.
     -----------------------------------------------------------------------------------------------------------------*/
    public function __construct()
    {   
        $this->articleDAO = new ArticleDAO();
        $this->commentDAO = new CommentDAO();
        $this->view = new View();
        $this->auth = new Auth();

    }


    /** ------------------------AFFICHAGE LISTE POSTS ACCUEIL ADMIN ----------------------------------------------------
     *  Affichage vue par défault admin
     -----------------------------------------------------------------------------------------------------------------*/
    public function adminHome(){
            $posts=$this->articleDAO->getPosts();
            $comments=$this->commentDAO->getAllComments();

          $this->view->adminRender ('admin_default', [
                                    'posts' =>$posts,
                                    'comments' => $comments]);
    }

    /** ------------------------------- AFFICHAGE SUPPRIMER ------------------------------------------------------------
     *      Affichage vue de suppression 
    -----------------------------------------------------------------------------------------------------------------*/
    public function deleteList(){

            $posts=$this->articleDAO->getPosts();
            $this->view->adminRender ('delete_view', ['posts' =>$posts]);

    }

    /**------------------------------- SUPPRIME ARTICLE ET COMMENTAIRES ASSOCIÉS----------------------------------------
     * @param $checkId Suppression des articles sélectionnés via ID renvoyé par checkbox
     -----------------------------------------------------------------------------------------------------------------*/
    public function delete($checkId){
            
        extract ($checkId);
        if (isset($postId)){
            foreach($postId as $value){

            $this->articleDAO->erasePost($value);
            $this->commentDAO->eraseComments($value);

            $_SESSION['delete'] = 'Votre article a bien été supprimé';

            $posts=$this->articleDAO->getPosts();
            $this->view->adminRender ('delete_view', ['posts' =>$posts,]);
            }       
        }
        else if (!isset($postId) && isset($_GET['trash'])){
            $this->articleDAO->erasePost($_GET['id']);
            $this->commentDAO->eraseComments($_GET['id']);
            $_SESSION['delete'] = 'Votre article a bien été supprimé';
            $posts=$this->articleDAO->getPosts();
            $this->view->adminRender ('delete_view', ['posts' =>$posts,]);
        }

        
        else{
          $_SESSION['deleteFailed']="Veuillez sélectionner un article à supprimer";
            $posts=$this->articleDAO->getPosts();
            $this->view->adminRender ('delete_view', ['posts' =>$posts,]);

        
        }
    }
     




    /** ------------------------------- SUPPRIME UN COMMENTAIRE --------------------------------------------------------
     * @param $checkId Suppression d'un commentaire via son ID
     -----------------------------------------------------------------------------------------------------------------*/
    public function deleteComm($checkId){

        $this->commentDAO->eraseComment($checkId);
        $_SESSION ['deleteComm'] = 'Votre commentaire a bien été supprimé';

     }


    /** ------------------------------- NOUVEL ARTICLE -------------------------------------------------------------------
     * @param $post  $_POST passé en paramètre pour nouvel article
     -----------------------------------------------------------------------------------------------------------------*/
    public function addPost($post){

        if(isset($post['submit'])) {
            if ( strlen($post['title'])>2 && strlen($post['content'])>2 && strlen($post['extract'])>2){

            $this->articleDAO->addPost($post);

            $_SESSION['add_article'] = 'Le nouvel article a bien été ajouté';
            header('Location: ../public/index.php');
            }
            else  {
            $_SESSION['createFailed']="Veuillez remplir correctement les champs";
            }
        }
        $this->view->adminRender('create_view', []);
    }


    /** ------------------- AFFICHAGE UN ARTICLE ET COMMENTAIRE---------------------------------------------------------
     * @param $postId Affichage d'un post via son ID
     -----------------------------------------------------------------------------------------------------------------*/
    public function seePost($postId){

            $posts = $this->articleDAO->getPost($postId);
            $comments=$this->commentDAO->getComments($postId);

            $this->view->adminRender('admin_post',[
                                     'posts' => $posts,
                                     'comments' => $comments]);
        }



    /** ----------------------------------- EDITION ARTICLE ------------------------------------------------------------
     * @param $postId  ID de l'article qu'on veut éditer
     * @param $post    $_POST passé en paramètre
     -----------------------------------------------------------------------------------------------------------------*/
    public function update ($postId, $post){

        if (isset($post['submit'])){
            
            if(strlen($_POST['title'])>2 && strlen($_POST['postContent'])>2 && strlen($_POST['extract'])>2){
             $this->articleDAO->editPost($postId, $post);
             $_SESSION['update'] = 'Votre article a bien été mis à jour';
            }
            else{
                $_SESSION['updateFailed'] = "Veuillez remplir les champs correctement";


            }
        }

        $posts = $this->articleDAO->getPost($postId);
        $comments=$this->commentDAO->getComments($postId);
        $this->view->adminRender('update_view',[
                                 'posts' => $posts,
                                 'comments' => $comments]);   
        }


    /**------------------------------- AUTORISATION COMMENTAIRE -------------------------------------------------------
     * @param $postId   ID du commentaire à autoriser
     -----------------------------------------------------------------------------------------------------------------*/
    public function initSignal ($postId){

        $alertPost=$this->commentDAO->initAlert($postId);
        $_SESSION['removeSignal'] = 'Le commentaire a été autorisé';

    }


    /** ------------------------- RECUP LOGIN MDP / VERIF --------------------------------------------------------------
     * @param $post  $_POST du formulaire de connexion avec login et mdp
     -----------------------------------------------------------------------------------------------------------------*/
    public function isLogged($post){

        if (isset($_POST) && !empty ($_POST['login']) && !empty($_POST['password'])){

                extract ($post);
                $password=sha1($password); 
                $_SESSION ['auth'] = array(
                                    'login'=>$login,
                                    'password'=> $password);
                            
            }

        if ($this->auth->isLogged()){

                $posts=$this->articleDAO->getPosts();
                $comments=$this->commentDAO->getAllComments();

                $this->view->adminRender('admin_default', [
                                         'posts'=>$posts,
                                         'comments'=>$comments]);    
        }
        
        else {
                $_SESSION['authFailed'] = 'Identifiant ou mot de passe incorrect';
                $this->view->render('authentification',[]);           
        }
    } 
}


