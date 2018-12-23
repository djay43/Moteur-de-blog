<?php

namespace App\config;
use App\src\controller\FrontController;
use App\src\controller\BackController;
use App\src\controller\ErrorController;

/**
 * Class Router
   @package App\config
 */
class Router{

	private $frontController;
	private $backController;
	private $errorController;


    /** -----------------------------------CONSTRUCTEUR-----------------------------------------------------------------
     * Router constructor.
    -----------------------------------------------------------------------------------------------------------------*/
    public function __construct()
    {
        $this->frontController = new FrontController();
        $this->backController = new BackController();
        $this->errorController = new ErrorController();

    }

    /**--------------------------------------DEFINITION DES ROUTES------------------------------------------------------
     *
    -----------------------------------------------------------------------------------------------------------------*/
    public function run(){

			try {

				if (isset($_GET['action'])) {

					if ($_GET['action'] == 'post' && isset($_GET['id']) && $_GET['id'] > 0) {
			    		$this->frontController->singlePost($_GET['id']);							// Affichage d'un post
					}

				    if ($_GET['action'] == 'new_comment') {
				        if (isset($_GET['id']) && $_GET['id'] > 0) {
			            if (strlen($_POST['author'])>2 && strlen($_POST['author'])<15 && strlen($_POST['comment'])>2 && strlen($_POST['comment'])<255) {

				                $this->frontController->addComment($_GET['id'], $_POST['author'], $_POST['comment']); 
				                $post = $this->frontController->singlePost($_GET['id']);								//Nouveau commentaire et réaffichage du post

				            }
				            else {
				            	$_SESSION['commentFailed']="Veuillez remplir les champs correctement";
								$post = $this->frontController->singlePost($_GET['id']);				//Si champs mal remplis message d'erreur 
				            }
				        }
				       
				    }

				    if ($_GET['action']=='authentification'){
								
				        $this->frontController->auth();						//affichage formulaire de connexion
				    }

			

					if ($_GET['action']=="alert"){
							$this->frontController->signal($_GET['id']);
							$post = $this->frontController->singlePost($_GET['post_id']);		// Signaler un commentaire, message succès et affichage de l'article

					}

				}

				else{

					$all_posts=$this->frontController->home(); // si pas action retour à l'accueil

				}

			}



			catch (Exception $e){
					echo "Une erreur a été détecté";
					$all_posts=$this->frontController->home();		// on récupère les erreurs, message d'erreur et redirection vers accueil

			}
					
	}
}