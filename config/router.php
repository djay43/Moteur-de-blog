<?php

namespace App\config;

use App\src\controller\ErrorController;
use App\src\controller\FrontController;

class Router{

	private $errorController;
	private $frontController;

	public function __construct()
    {
        $this->frontController = new FrontController();
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

							require ('../templates/frontend/authentification.php');
						}

					/* --------Si action = authentificationFailed, onenvoi le message d'erreur et on redirige--------------*/

					if ($_GET['action']=='authentificationFailed'){
							$error="<strong> Identifiant ou mot de passe incorrect</strong>	";
							require ('../templates/frontend/authentification.php');
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


					/* --------gestion des erreurs afffichage vue par défaut--------------*/

			catch (Exception $e){
				$frontController = new FrontController();
				$all_posts=$frontController->home();
				require('../templates/frontend/home.php');
			}
	}
}