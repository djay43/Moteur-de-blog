<?php 



namespace App\config;

use App\src\controller\FrontController;
use App\src\controller\BackController;
use App\src\controller\ErrorController;

/**
 * Class BackRouter
  @package App\config
 */
class BackRouter{

	private $frontController;
	private $backController;
	private $errorController;


    /** -----------------------------------CONSTRUCTEUR-----------------------------------------------------------------
     * BackRouter constructor.
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
    public function runBack(){
					
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

					  if ($_GET['action']=="post_view" && !empty($_GET['id']) && $_GET['id']>0){

						$this->backController->seePost($_GET['id']);					// Affichage d'un article			
					  }

					  if ($_GET['action']=="default"){
						$all_posts=  $this->backController->adminHome();				//Vue par défaut -> liste des posts

					  }

			}
			else{

			    $all_posts=  $this->frontController->home();		//Si action n'existe pas, retour au front
			}

			}
			
		}
			catch (Exception $e){

				$all_posts=$frontController->home();				//  récupération erreur et retour au front

			}
			
	}

}




 


	
