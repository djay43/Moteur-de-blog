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
	                throw new Exception ('Erreur : tous les champs ne sont pas remplis !');
	            }
	        }
	        else {
	            throw new Exception ('Erreur : aucun identifiant de billet envoyé');
	        }
	    }
if ($_GET['action']=='authentification'){
	require ('view/frontend/authentification.php');
}

if ($_GET['action']=="alert"){

				alert($_GET['id']);
			
				post($_GET['post_id']);

	}

}
else{

require('view/frontend/index_view.php');
}
}

catch (Exception $e){
	echo 'Erreur :'.$e->getMessage();
	require ('error_view.php'); //On affiche l'erreur
}



