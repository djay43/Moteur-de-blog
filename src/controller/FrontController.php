<?php

namespace App\src\controller;
use App\src\DAO\ArticleDAO;
use App\src\DAO\CommentDAO;


class FrontController{

       private $articleDAO;
       private $commentDAO;

       public function __construct(){
            $this->articleDAO = new ArticleDAO();
            $this->commentDAO = new CommentDAO();
        }
        /*----récupérer tous les posts------------*/
       public function home(){

            $all_posts=$this->articleDAO->getPosts();
            $see_last_ep = $this->articleDAO->get_last_post();
            require('../templates/frontend/home.php');
        }

 
        public function singlePost($postId)
        {   

            $post = $this->articleDAO->getPost($postId);
            $comments=$this->commentDAO->getComments();
            require('../templates/frontend/singlePost.php');

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

        



        

       

        