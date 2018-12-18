<?php


namespace App\src\controller;

class BackController
{

}
/* --------On charge les classes--------------*/
require ('./src/DAO/ArticleDAO.php');
require ('./src/DAO/CommentDAO.php');


/* --------Fonction ajout de post--------------*/

function add_post(){
$postManager= new \App\src\DAO\ArticleDAO;
$postManager->new_post($_POST['post_title'],$_POST['create_post'],$_POST['create_extract']);
}

/* --------Fonction récupération de tous les posts--------------*/

function get_all_posts(){
	 $postManager= new \App\src\DAO\ArticleDAO;
	 $posts=$postManager->getPosts();
	 return $posts;
}
/* --------Fonction récupération de tous les commentaires--------------*/

function get_all_comments(){
	 $commentManager= new \App\src\DAO\CommentDAO;
	 $comments=$commentManager->getComments();
	 return $comments;
}

/* --------Fonction affichage d'un post particulier et des ses commentaires--------------*/

function post($post_id)
{   

    $postManager = new \App\src\DAO\ArticleDAO();
    $commentManager = new \App\src\DAO\CommentDAO();

    $post = $postManager->get_post($post_id);
    $comments = $commentManager->get_comments($post_id);
    require ('./view/backend/admin_post.php');

}
/* --------Fonction récupération d'un seul commentaire--------------*/

function getComment ($post_id){
    $commentManager = new \App\src\DAO\CommentDAO();
	 $comment = $commentManager->get_comments($post_id);
	 return $comment;

}
/* --------Fonction recuperation d'un post particulier  -------------*/

function getPost($post_id)
{   

    $postManager = new \App\src\DAO\ArticleDAO();

    $post = $postManager->get_post($post_id);
    return $post;

}

/* --------Fonction suppression de post et commentaires--------------*/

function delete($checkId){
		$postManager= new \App\src\DAO\ArticleDAO;
		$commentManager= new \App\src\DAO\CommentDAO;
		$deletePost=$postManager-> delete_post($checkId);
		$deleteComm=$commentManager-> delete_all_comm($checkId);
	 	return $deletePost;
	 	return $deleteComm;

 }
/* --------Fonction suppression d'un commentaire--------------*/

 function deleteComm($checkId){

 	$commentManager= new \App\src\DAO\CommentDAO;
 	$deleteComm=$commentManager-> delete_comm($checkId);
	 return $deleteComm;

 }

/* --------Fonction edit d'un post--------------*/

function edit ($post_id, $title, $post_content, $extract){

	$postManager= new \App\src\DAO\ArticleDAO;
	$editPost = $postManager->edit_post($post_id, $title, $post_content, $extract);
	return $editPost;

}

/* --------Fonction edit d'un commentaire--------------*/

function editComment ($comment_id, $author, $comment){

	$commentManager= new \App\src\DAO\CommentDAO;
	$editComment = $commentManager->edit_comment($comment_id, $author, $comment);
	return $editComment;

}
/* --------Fonction enlever le signalement d'un commentaire--------------*/

function defaultAlert ($post_id){

    $commentManager=new \App\src\DAO\CommentDAO;
    $alertPost=$commentManager->default_alert($post_id);
    return $alertPost;
}


