<?php

require('./model/PostManager.php');
require('./model/CommentManager.php');


function post()
{   

    $postManager = new PostManager();
    $commentManager = new CommentManager();

    $post = $postManager->get_post($_GET['id']);
    $comments = $commentManager->get_comments($_GET['id']);
    require('./view/frontend/post_view.php');


}






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