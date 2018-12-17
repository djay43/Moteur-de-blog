<?php
/* --------On charge les classes--------------*/

require('./src/DAO/ArticleDAO.php');
require('./src/DAO/CommentDAO.php');
/*----récupérer tous les posts------------*/
function getAllPosts(){
     $postManager= new \App\src\DAO\ArticleDAO;
     $posts=$postManager->getPosts();
     return $posts;
}

/* --------Fonction recuperation  des commentaires--------------*/


function getAllComments(){
     $commentManager= new \App\src\DAO\CommentDAO;
     $comments=$commentManager->getComments();
     return $comments;
}



function getOnePost($postId)
{   

    $postManager = new \App\src\DAO\ArticleDAO();

    $post = $postManager->getPost($postId);
    return $post;

}


/* --------Fonction nouveau commentaire--------------*/

function new_comment($post_id,$author, $comment)

{
    $commentManager = new \App\src\DAO\CommentDAO();

    $find_comment= $commentManager->post_comment($post_id, $author, $comment);


    return $find_comment;


}
/* --------Fonction signalement d'un commentaire--------------*/

function alert ($post_id){

    $commentManager=new \App\src\DAO\CommentDAO;
    $alertPost=$commentManager->alert_comment($post_id);
    return $alertPost;
}

function getLastPost(){
    $postManager= new \App\src\DAO\ArticleDAO;
    $see_last_ep = $postManager->get_last_post();
    return $see_last_ep;
}