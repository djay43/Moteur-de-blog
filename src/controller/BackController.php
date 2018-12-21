<?php

namespace App\src\controller;

use App\src\DAO\ArticleDAO;
use App\src\DAO\CommentDAO;
use App\src\DAO\Auth;
use App\src\model\View;

class BackController
{
    private $articleDAO;
    private $commentDAO;
	private $view;
    private $auth;

    public function __construct()
    {   
        $this->articleDAO = new ArticleDAO();
        $this->commentDAO = new CommentDAO();
        $this->view = new View();
        $this->auth = new Auth();

    }

    public function adminHome(){
            $posts=$this->articleDAO->getPosts();
            $comments=$this->commentDAO->getComments();

          $this->view->adminRender ('admin_default', [
            'posts' =>$posts,
            'comments' => $comments

          ]);
    }

    public function deleteList(){

            $posts=$this->articleDAO->getPosts();
            $this->view->adminRender ('delete_view', [
            'posts' =>$posts]);

    }
    /* --------Fonction suppression de post et commentaires--------------*/

    public function delete($checkId){
            
        extract ($checkId);

        foreach($postId as $value){
            $this->articleDAO->erasePost($value);
            $this->commentDAO->eraseComments($value);
            $posts=$this->articleDAO->getPosts();
            $this->view->adminRender ('delete_view', [
                    'posts' =>$posts,]);
                }          

     }
     
     /* --------Fonction suppression d'un commentaire--------------*/

     public function deleteComm($checkId){

        $this->commentDAO->eraseComment($checkId);

     }


    public function addPost($post)
    {
        if(isset($post['submit'])) {
            $articleDAO = new ArticleDAO();
            $articleDAO->addPost($post);
            session_start();
            $_SESSION['add_article'] = 'Le nouvel article a bien été ajouté';
            header('Location: ../public/index.php');
        }
        $this->view->adminRender('create_view', [
        ]);
    }

    public function seePost($postId)
        {   

            $posts = $this->articleDAO->getPost($postId);
            $comments=$this->commentDAO->getComment($postId);
            $this->view->adminRender('admin_post',[
                      'posts' => $posts,
                      'comments' => $comments
                  ]);
        }
    /* --------Fonction edit d'un post--------------*/

    public function update ($postId,$post){

        if (!empty($post)){
             $this->articleDAO->editPost($postId, $post);
        }

        $posts = $this->articleDAO->getPost($postId);
        $comments=$this->commentDAO->getComment($postId);
         $this->view->adminRender('update_view',[
                'posts' => $posts,
                'comments' => $comments ]);   
        }

    public function initSignal ($postId){

        $alertPost=$this->commentDAO->initAlert($postId);

    }

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
            $comments=$this->commentDAO->getComments();
           
             $this->view->adminRender('admin_default', [
            'posts'=>$posts,
            'comments'=>$comments]);    
        }
        
        else {
                $this->view->render('authentification',[
        ]);           }
    }
}


