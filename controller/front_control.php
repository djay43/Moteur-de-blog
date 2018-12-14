<?php
/* --------On charge les classes--------------*/

require('./model/PostManager.php');
require('./model/CommentManager.php');
/*----récupérer tous les posts------------*/
function get_all_posts(){
     $postManager= new PostManager;
     $posts=$postManager->all_posts();
     return $posts;
}

/* --------Fonction recuperation  post--------------*/

function post($post_id)
{   

    $postManager = new PostManager();
    $commentManager = new CommentManager();

    $post = $postManager->get_post($post_id);
    $comments = $commentManager->get_comments($post_id);

    require('./view/frontend/post_view.php');

}

function get_all_comments(){
     $commentManager= new CommentManager;
     $comments=$commentManager->all_comments();
     return $comments;
}

function getPost($post_id)
{   

    $postManager = new PostManager();

    $post = $postManager->get_post($post_id);
    return $post;

}


/* --------Fonction nouveau commentaire--------------*/

function new_comment($post_id,$author, $comment)

{
    $commentManager = new CommentManager();

    $find_comment= $commentManager->post_comment($post_id, $author, $comment);


    return $find_comment;


}
/* --------Fonction signalement d'un commentaire--------------*/

function alert ($post_id){

    $commentManager=new CommentManager;
    $alertPost=$commentManager->alert_comment($post_id);
    return $alertPost;
}

