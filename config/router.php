<?php

namespace App\config;

use App\src\controller\FrontController;
use App\src\controller\BackController;
use App\src\controller\ErrorController;

class Router{

	private $frontController;
	private $backController;
	private $errorController;



	public function __construct()
    {
        $this->frontController = new FrontController();
        $this->backController = new BackController();
        $this->errorController = new ErrorController();

    }

	public function run(){

			try {

				if (isset($_GET['action'])) {

							/*--------récupération et affichage d'un post -------------*/
					if ($_GET['action'] == 'post' && isset($_GET['id']) && $_GET['id'] > 0) {
			    		$this->frontController->singlePost($_GET['id']);
					}

				   if ($_GET['action'] == 'new_comment') {

				        if (isset($_GET['id']) && $_GET['id'] > 0) {
				            if (!empty($_POST['author']) && !empty($_POST['comment'])) {

				                $this->frontController->addComment($_GET['id'], $_POST['author'], $_POST['comment']);// on ajoute un commentaire
				                $post = $this->frontController->singlePost($_GET['id']);

				            }
				            else {
								$post = $this->frontController->singlePost($_GET['id']);
				            }
				        }
				       
				    }
				    		/* --------Si action = authentification, on va vers la zone de connection--------------*/

					if ($_GET['action']=='authentification'){

							$this->frontController->auth();
						}
						if ($_GET['action']=='getAuth'){
								if (isset($_POST) && !empty ($_POST['login']) && !empty($_POST['password'])){
		extract ($_POST);
		$password=sha1($password);

	   	$_SESSION ['auth'] = array(
	   		'login'=>$login,
	   		'password'=> $password);
	
	   	}

							$this->backController->isLogged();
						}

					/* --------Si action = authentificationFailed, onenvoi le message d'erreur et on redirige--------------*/

					if ($_GET['action']=='authentificationFailed'){
							$error="<strong> Identifiant ou mot de passe incorrect</strong>	";
							$this->frontController->auth();
					}

					/* --------Si action = alert, on envoi le signalement et on revient au post--------------*/

					if ($_GET['action']=="alert"){
							$this->frontController->alert($_GET['id']);
							$post = $this->frontController->singlePost($_GET['post_id']);

					}

				}

				else{
					/* --------sinon le reste la vue par défault--------------*/
					
					$frontController = new FrontController();
					$all_posts=  $frontController->home();
										}
			}

/*--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/

																//PARTIE ADMIN//

/*--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/


					/* --------gestion des erreurs afffichage vue par défaut--------------*/

			catch (Exception $e){
				$frontController = new FrontController();
				$all_posts=$frontController->home();
				require('../templates/frontend/home.php');
			}
					if(isset($_GET['action'])){
		 
						// si titre, contenu de poste et extrait renseignés, alors on crée un nouveau poste et on redirige

			if ($_GET['action']=="new_post" && !empty($_POST['post_title']) && !empty($_POST['create_post']) && !empty ($_POST['create_extract'])){
					add_post();
					$success="<span class=\"success\"> Félicitations! Votre nouvel article est maintenant en ligne </span>";
					header ("Location: index.php");
			}

			/* --------Si action = create, on redirige vers la vue de création--------------*/

			 if ($_GET['action']==="create"){
			 	$this->backController->addPost($_POST);
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
				$all_posts=  $this->frontController->adminHome();

			}

		}
		else{
				//$all_posts=  $this->frontController->adminHome();


		}
	}

}