<?php

session_start();
require ('src/DAO/Auth.php');
require ('src/controller/BackController.php');

/* ---------Si identifiant ou mot de passe mauvais, on redirige -------*/
if  (!App\src\DAO\Auth::isLogged()){
   
    header ('Location: ./index.php?action=authentificationFailed');
}

if(isset($_GET['action'])){
 
				// si titre, contenu de poste et extrait renseignés, alors on crée un nouveau poste et on redirige

	if ($_GET['action']=="new_post" && !empty($_POST['post_title']) && !empty($_POST['create_post']) && !empty ($_POST['create_extract'])){
			add_post();
			$success="<span class=\"success\"> Félicitations! Votre nouvel article est maintenant en ligne </span>";
			header ("Location: index.php");
	}

	/* --------Si action = create, on redirige vers la vue de création--------------*/

	 if ($_GET['action']=="create"){
	 		require ('templates/backend/create_view.php');

	 }


		/* --------Si action = update, on recup le post et on redirige vers la vue de création--------------*/

		if ($_GET['action']=="update" && !empty($_GET['id']) && $_GET['id']>0){
			$post=getPost($_GET['id']);
			require('templates/backend/update_view.php');
	}

		/* --------Si action = delete, on recup tous les posts et on redirige vers la vue de suppression--------------*/

	if ($_GET['action']=="delete"){
			$posts=get_all_posts();
					
			require('templates/backend/delete_view.php');
	}

		/* --------Si action = delete_post, on recup tous le ^post sélectionné de via checkbox on supprime et redirige--------------*/

		if ($_GET['action']=="delete_post" && !empty($_POST['postId']) && $_POST['postId']>0){
					$posts=get_all_posts();
						foreach ($_POST['postId'] as $valeur){ // on parcoure le tableau id sélectionné de checkbox
					 		delete($valeur);
					}
					$posts=get_all_posts();
					$success="<span class=\"success\"> Votre article a bien été supprimé </span>";
					require('templates/backend/delete_view.php');
				
			}

		 if ($_GET['action']=="delete_post" && !isset($_POST['postId'])){
					
					$posts=get_all_posts();
					$error="<span id=\"error\"> Veuillez sélectionner votre article à supprimer </span>";
					require('templates/backend/delete_view.php');
				
			}


		/* --------Si action = deleteComm, on recup le comm, le supprime et on redirige vers le post--------------*/

if ($_GET['action']=="deleteComm" && !empty($_GET['comm_id']) && $_GET['comm_id']>0 && !empty($_GET['id']) && $_GET['id']>0){
			
			$delete=deleteComm($_GET['comm_id']);
			post($_GET['id']);
		
	}
			/* --------Si action = editPost, on édite et on redirige vers la vue du post--------------*/

if ($_GET['action']=="edit_post" && !empty($_GET['id']) && $_GET['id']>0){

				$edit=edit($_GET['id'],$_POST['title'],$_POST['post_content'],$_POST['extract']);
				$post=getPost($_GET['id']);
				$success="<span class=\"success\"> Votre article a bien été édité </span>";
				require('templates/backend/update_view.php');
		
	}

			/* --------Si action = edti_comment, on recup le comm et on redirige vers la vue du post--------------*/

if ($_GET['action']=="edit_comment" && !empty($_GET['comm_id']) && $_GET['comm_id']>0){

				$success="<span class=\"success\">Le commentaire a bien été autorisé</span>";
				$default=defaultAlert($_GET['comm_id']);
				$post=getPost($_GET['id']);
				$comments=get_all_comments();
				 require ('./templates/backend/admin_post.php');


		
	}
		/* --------Si action = post_view, on récup le post et redirige--------------*/

	if ($_GET['action']=="post_view" && !empty($_GET['id']) && $_GET['id']>0){

				post($_GET['id']);
		
	}

	
				
		/* --------Si action = default, on revient à la page d'accueil--------------*/


	else if ($_GET['action']=="default"){
			$posts=get_all_posts();
			$comments=get_all_comments();

	 		require ('templates/backend/admin_default.php');
	}

}
else{
				$posts=get_all_posts();
				$comments=get_all_comments();
		 		require ('templates/backend/admin_default.php');

}