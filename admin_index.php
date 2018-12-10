<?php

session_start();
require ('model/Auth.php');
require ('controller/back_control.php');

/* ---------Si identifiant ou mot de passe mauvais, on redirige -------*/
if  (!Auth::isLogged()){
   
    header ('Location: ./index.php?action=authentificationFailed');
}


 
				// si titre, contenu de poste et extrait renseignés, alors on crée un nouveau poste et on redirige
	if ($_GET['action']=="new_post" && !empty($_POST['post_title']) && !empty($_POST['create_post']) && !empty ($_POST['create_extract'])){
			add_post();
			header ("Location: index.php");
	}
	/* --------Si action = create, on redirige vers la vue de création--------------*/

	 if ($_GET['action']=="create"){
	 		require ('view/backend/create_view.php');


	 }

	 	/* --------Si action = read, on récup tous les posts et on redirige vers la vue de lecture--------------*/

	if ($_GET['action']=="read"){
			$posts=get_all_posts();
			require('view/backend/read_view.php');
	}

		/* --------Si action = update, on recup le post et on redirige vers la vue de création--------------*/

		if ($_GET['action']=="update"){
			$post=getPost($_GET['id']);
			require('view/backend/update_view.php');
	}

		/* --------Si action = delete, on recup tous les posts et on redirige vers la vue de suppression--------------*/

	if ($_GET['action']=="delete"){
			$posts=get_all_posts();
					
			require('view/backend/delete_view.php');
	}

		/* --------Si action = delete_post, on recup tous le ^post sélectionné de via checkbox on supprime et redirige--------------*/

if ($_GET['action']=="delete_post"){
			$posts=get_all_posts();
		foreach ($_POST['postId'] as $valeur){ // on parcoure le tableau id sélectionné de checkbox
			 delete($valeur);
			}
			$posts=get_all_posts();

			require('view/backend/delete_view.php');
		
	}

		/* --------Si action = deleteComm, on recup le comm, le supprime et on redirige vers le post--------------*/

if ($_GET['action']=="deleteComm"){
			
			$delete=deleteComm($_GET['comm_id']);
			post($_GET['id']);
		
	}
			/* --------Si action = editPost, on édite et on redirige vers la vue du post--------------*/

if ($_GET['action']=="edit_post"){

				$edit=edit($_GET['id'],$_POST['title'],$_POST['post_content'],$_POST['extract']);
				$post=getPost($_GET['id']);

				require('view/backend/update_view.php');
		
	}

			/* --------Si action = edti_comment, on recup le comm et on redirige vers la vue du post--------------*/

if ($_GET['action']=="edit_comment"){

				$edit=editComment($_GET['comm_id'],$_POST['author'],$_POST['comment']);
				$default=defaultAlert($_GET['comm_id']);

				post($_GET['id']);

		
	}
		/* --------Si action = post_view, on récup le post et redirige--------------*/

	if ($_GET['action']=="post_view"){

				post($_GET['id']);
		
	}

	
				
		/* --------Si action = default, on revient à la page d'accueil--------------*/


	else if ($_GET['action']=="default"){
			$posts=get_all_posts();
			$comments=get_all_comments();

	 		require ('view/backend/admin_default.php');
	}