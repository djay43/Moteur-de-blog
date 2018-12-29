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

   
    public function run(){
 /**--------------------------------------DEFINITION DES ROUTES FRONT------------------------------------------------------
     *
    -----------------------------------------------------------------------------------------------------------------*/
			try {

				if (isset($_GET['action'])) {

					if ($_GET['action'] == 'post' && isset($_GET['id']) && $_GET['id'] > 0) {
			    		$this->frontController->singlePost($_GET['id']);							// Affichage d'un post
					}

				    if ($_GET['action'] == 'new_comment') {

				        if (isset($_GET['id']) && $_GET['id'] > 0) {
			            	if (strlen($_POST['author'])>2 && strlen($_POST['author'])<15 && strlen($_POST['comment'])>2 && strlen($_POST['comment'])<255) {

				                $this->frontController->addComment($_GET['id'], $_POST['author'], $_POST['comment']); 
				                $this->frontController->singlePost($_GET['id']);								//Nouveau commentaire et réaffichage du post

				            }
				            else {
				            	$_SESSION['commentFailed']="Veuillez remplir les champs correctement";
								$post = $this->frontController->singlePost($_GET['id']);				//Si champs mal remplis message d'erreur 
				            }
				        }
				       
				    } //fin nouveau commentaire

				    if ($_GET['action']=='authentification'){
								
				        $this->frontController->auth();						//affichage formulaire de connexion
				    }

					if ($_GET['action']=="alert"){
							$this->frontController->signal($_GET['id']);
							$post = $this->frontController->singlePost($_GET['post_id']);		// Signaler un commentaire, message succès et affichage de l'article
					}

				} // fin isset action

				else{

					$all_posts=$this->frontController->home(); // si pas action retour à l'accueil

				}

			} //fin try

			catch (Exception $e){
					echo "Une erreur a été détecté";
					$all_posts=$this->frontController->home();		// on récupère les erreurs, message d'erreur et redirection vers accueil

			}

			    /**--------------------------------------DEFINITION DES ROUTES BACK------------------------------------------------------
     
    			------------------------------------------------------------------------------------------------------------------------*/

    		try{

	    		if (isset($_GET['ad'])){
					if(isset($_GET['action'])){

						 if ($_GET['action']==="getAuth" && isset($_POST)){
						 	$this->backController->isLogged($_POST);         	// authentification
						 }

						 if ($_GET['action']==="create" && isset($_POST)){
						 	
						 	$this->backController->addPost($_POST);				//Nouvel article
						 }

						 if ($_GET['action']=="delete"){
								
						     $this->backController->deleteList();				// affichage vue de suppression
						 }

						 if ($_GET['action']=="delete_post" && isset($_POST)){

						     $this->backController-> delete($_POST);			// Suppression article et commentaires
						 }

						 if ($_GET['action']=="deleteComm" && !empty($_GET['comm_id']) && $_GET['comm_id']>0 && !empty($_GET['id']) && $_GET['id']>0){
								
						     $this->backController->deleteComm($_GET['comm_id']);
						     $this->backController->seePost($_GET['id']);			// Suppression d'un commentaire et réaffichage de l'article
							
						 }

					     if ($_GET['action']=="update" && !empty($_GET['id']) && $_GET['id']>0 && isset($_POST)){

					         $this->backController->update($_GET['id'],$_POST);		//Mise jour de l'article
									
					     }

					     if ($_GET['action']=="edit_comment" && !empty($_GET['comm_id']) && $_GET['comm_id']>0){

									$this->backController->initSignal($_GET['comm_id']);
									$this->backController-> adminHome();					//authorisation d'un commentaire
					     }

						  if ($_GET['action']=="post_view"){
						  	
						  	if(!empty($_GET['id']) && $_GET['id']>0){
								$this->backController->seePost($_GET['id']); // Affichage d'un article
							}

							else if (isset($_POST['select'])) {
									
								$this->backController->seePost($_POST['select']); //affichage article via liste déroulante

							}			
						  }
					
						  if ($_GET['action']=="default"){
							$all_posts=  $this->backController->adminHome();	//Vue par défaut -> liste des posts

						  }

					} // fin test action
					else{

					    $all_posts=  $this->frontController->home();		//Si action n'existe pas, retour au front
					}

				} // fin test action
				
			} //fin try
			catch (Exception $e){

				$all_posts=$frontController->home();				//  récupération erreur et retour au front

			}				
	} // fin function
} //fin classe