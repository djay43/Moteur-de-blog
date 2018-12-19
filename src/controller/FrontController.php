<?php

namespace App\src\controller;
use App\src\DAO\ArticleDAO;
use App\src\DAO\CommentDAO;
use App\src\model\View;


class FrontController{

       private $articleDAO;
       private $commentDAO;
       private $view;

       public function __construct(){
            $this->articleDAO = new ArticleDAO();
            $this->commentDAO = new CommentDAO();
            $this->view = new View();

        }
        /*----récupérer tous les posts------------*/
       public function home(){

            $see_last_ep = $this->articleDAO->get_last_post();
            $posts=$this->articleDAO->getPosts();
            $this->view->render('home', [
            'posts' => $posts,
            'see_last_ep' => $see_last_ep
        ]);

        }

 
        public function singlePost($postId)
        {   

            $post = $this->articleDAO->getPost($postId);
            $comments=$this->commentDAO->getComments();
            $this->view->render('singlePost', [
                      'post' => $post,
                      'comments' => $comments
                  ]);
        }


 /* --------Fonction nouveau commentaire--------------*/

       public function addComment($post_id,$author, $comment)

        {
            $this->commentDAO->post_comment($post_id, $author, $comment);



        }
        /* --------Fonction signalement d'un commentaire--------------*/

       public function alert ($post_id){

            $alertPost=$this->commentDAO->alert_comment($post_id);
            return $alertPost;
        }
      
}

        



        

       

        