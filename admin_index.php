<?php

session_start();
require ('model/Auth.php');
require ('controller/back_control.php');


if  (!Auth::isLogged()){
   

    header ('Location: ../../index.php?action=authentification');
}



				// si titre, contenu de poste et extrait renseignés, alors on crée un nouveau poste et on redirige
	if ($_GET['action']=="new_post" && !empty($_POST['post_title']) && !empty($_POST['create_post']) && !empty ($_POST['create_extract'])){
			add_post();
			header ("Location: index.php");
	}		
	 if ($_GET['action']=="create"){
	 		require ('view/backend/create_view.php');


	 }
	if ($_GET['action']=="read"){
			$posts=get_all_posts();
			require('view/backend/read_view.php');
	}
		if ($_GET['action']=="update"){
			$post=getPost($_GET['id']);
			require('view/backend/update_view.php');
	}
	if ($_GET['action']=="delete"){
			$posts=get_all_posts();
					
			require('view/backend/delete_view.php');
	}

if ($_GET['action']=="delete_post"){
			$posts=get_all_posts();
		foreach ($_POST['postId'] as $valeur){ // on parcoure le tableau id sélectionné de checkbox
			 delete($valeur);
			}
			$posts=get_all_posts();

			require('view/backend/delete_view.php');
		
	}
if ($_GET['action']=="edit_post"){

				$edit=edit($_GET['id'],$_POST['title'],$_POST['post_content'],$_POST['extract']);
				$post=getPost($_GET['id']);

				require('view/backend/update_view.php');
		
	}
if ($_GET['action']=="edit_comment"){

				$edit=editComment($_GET['comm_id'],$_POST['author'],$_POST['comment']);

				post($_GET['id']);

		
	}

	if ($_GET['action']=="post_view"){

				post($_GET['id']);
		
	}

	
				


	else if ($_GET['action']=="default"){
			$posts=get_all_posts();
			$comments=get_all_comments();

	 		require ('view/backend/admin_default.php');
	}