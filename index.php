<?php

require('controller/front_control.php');

try {

if (isset($_GET['action'])) {

if ($_GET['action'] == 'post' && isset($_GET['id']) && $_GET['id'] > 0) {
    $post = post($_GET['id']);
     $title= $post['title'];
// On va voir le post

}


	   if ($_GET['action'] == 'new_comment') {
	        if (isset($_GET['id']) && $_GET['id'] > 0) {
	            if (!empty($_POST['author']) && !empty($_POST['comment'])) {
	                new_comment($_GET['id'], $_POST['author'], $_POST['comment']);// on ajoute un commentaire

	            }
	            else {
					post($_GET['id']);

	            }
	        }
	        else {
	            throw new Exception ('Erreur : aucun identifiant de billet envoyé');
	        }
	    }
	    		/* --------Si action = authentification, on va vers la zone de connection--------------*/

if ($_GET['action']=='authentification'){
	require ('view/frontend/authentification.php');
}

		/* --------Si action = authentificationFailed, onenvoi le message d'erreur et on redirige--------------*/

if ($_GET['action']=='authentificationFailed'){
	$error="<strong> Identifiant ou mot de passe incorrect</strong>	";
	require ('view/frontend/authentification.php');
}

		/* --------Si action = akert, on envoi le signalement et on revient au post--------------*/

if ($_GET['action']=="alert"){

				alert($_GET['id']);
			
				post($_GET['post_id']);

	}

}
else{
		/* --------Pouet le reste la vue par défault--------------*/

require('view/frontend/index_view.php');
}
}


		/* --------gestion des erreurs--------------*/

catch (Exception $e){
	echo 'Erreur :'.$e->getMessage();
	require ('error_view.php'); //On affiche l'erreur
}



