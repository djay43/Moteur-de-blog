<?php

require('src/controller/front_control.php');

try {

	if (isset($_GET['action'])) {

				/*--------récupération et affichage d'un post -------------*/
		if ($_GET['action'] == 'post' && isset($_GET['id']) && $_GET['id'] > 0) {
    		$post = getOnePost($_GET['id']);
    		$comments=getAllComments();
     		require('./templates/frontend/singlePost.php');

		}


	   if ($_GET['action'] == 'new_comment') {

	        if (isset($_GET['id']) && $_GET['id'] > 0) {
	            if (!empty($_POST['author']) && !empty($_POST['comment'])) {

	                new_comment($_GET['id'], $_POST['author'], $_POST['comment']);// on ajoute un commentaire
	                $post = getOnePost($_GET['id']);
		    		$comments=get_all_comments();
		    		$success="<span class=\"success\"> Votre commentaire a bien été envoyé </span>";
		     		require('./templates/frontend/singlePost.php');
	            }
	            else {
					$post = getOnePost($_GET['id']);
		    		$comments=get_all_comments();
		     		require('./templates/frontend/singlePost.php');
	            }
	        }
	        else {
	            throw new Exception ('Erreur : aucun identifiant de billet envoyé');
	        }
	    }
	    		/* --------Si action = authentification, on va vers la zone de connection--------------*/

		if ($_GET['action']=='authentification'){

				require ('templates/frontend/authentification.php');
			}

		/* --------Si action = authentificationFailed, onenvoi le message d'erreur et on redirige--------------*/

		if ($_GET['action']=='authentificationFailed'){
				$error="<strong> Identifiant ou mot de passe incorrect</strong>	";
				require ('templates/frontend/authentification.php');
		}

		/* --------Si action = alert, on envoi le signalement et on revient au post--------------*/

		if ($_GET['action']=="alert"){
				alert($_GET['id']); // On signale l'article dans la partie admin
				$post = getOnePost($_GET['post_id']);
		    	$comments=get_all_comments();
		    	$success="<span class=\"success\"> Le commentaire a bien été signalé </span>";
		     	require('./templates/frontend/singlePost.php');

		}

	}

	else{
		/* --------sinon le reste la vue par défault--------------*/
				
	
		$all_posts=getAllPosts();
		$see_last_ep = getLastPost();

				
		require('templates/frontend/home.php');
	}
}


		/* --------gestion des erreurs afffichage vue par défaut--------------*/

catch (Exception $e){

	$all_posts=getAllPosts();
	require('templates/frontend/home.php');
}



