<?php

require ('./model/PostManager.php');
require ('./model/CommentManager.php');



function add_post(){
$postManager= new PostManager;
$postManager->new_post($_POST['post_title'],$_POST['create_post'],$_POST['create_extract']);
}


function get_all_posts(){
	 $postManager= new PostManager;
	 $posts=$postManager->all_posts();
	 return $posts;
}

function get_all_comments(){
	 $commentManager= new CommentManager;
	 $comments=$commentManager->all_comments();
	 return $comments;
}


function post($post_id)
{   

    $postManager = new PostManager();
    $commentManager = new CommentManager();

    $post = $postManager->get_post($post_id);
    $comments = $commentManager->get_comments($post_id);
    require ('./view/backend/admin_post.php');

}
function getComment ($post_id){
    $commentManager = new CommentManager();
	 $comment = $commentManager->get_comments($post_id);
	 return $comment;

}
function getPost($post_id)
{   

    $postManager = new PostManager();

    $post = $postManager->get_post($post_id);
    return $post;

}
function delete($checkId){
		$postManager= new PostManager;
		$commentManager= new CommentManager;

		$deletePost=$postManager-> delete_post($checkId);
		$deleteComm=$commentManager-> delete_all_comm($checkId);
	 	return $deletePost;
	 	return $deleteComm;

 }

 function deleteComm($checkId){

 	$commentManager= new CommentManager;
 	$deleteComm=$commentManager-> delete_comm($checkId);
	 return $deleteComm;

 }

function edit ($post_id, $title, $post_content, $extract){

	$postManager= new PostManager;
	$editPost = $postManager->edit_post($post_id, $title, $post_content, $extract);
	return $editPost;

}
function editComment ($comment_id, $author, $comment){

	$commentManager= new CommentManager;
	$editComment = $commentManager->edit_comment($comment_id, $author, $comment);
	return $editComment;

}

function defaultAlert ($post_id){

    $commentManager=new CommentManager;
    $alertPost=$commentManager->default_alert($post_id);
    return $alertPost;
}


