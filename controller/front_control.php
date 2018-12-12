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



/* --------Fonction nouveau commentaire--------------*/

function new_comment($post_id,$author, $comment)

{
    $commentManager = new CommentManager();

    $find_comment= $commentManager->post_comment($post_id, $author, $comment);


    if ($find_comment === false) {

        throw new Exception('Impossible d\'ajouter le commentaire !'); // va remonter jusqu'au routeur pour gérer l'erreur

    }

    else {

        header('Location: ./index.php?action=post&id=' . $post_id);

    }


}
/* --------Fonction signalement d'un commentaire--------------*/

function alert ($post_id){

    $commentManager=new CommentManager;
    $alertPost=$commentManager->alert_comment($post_id);
    return $alertPost;
}

