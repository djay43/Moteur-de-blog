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
								

							$this->backController->isLogged($_POST);
						}

			
					/* --------Si action = alert, on envoi le signalement et on revient au post--------------*/

					if ($_GET['action']=="alert"){
							$this->frontController->signal($_GET['id']);
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


				$all_posts=$frontController->home();


			}
					
	}
}