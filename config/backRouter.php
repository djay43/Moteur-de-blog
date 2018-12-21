<?php 



namespace App\config;

use App\src\controller\FrontController;
use App\src\controller\BackController;
use App\src\controller\ErrorController;

class BackRouter{

	private $frontController;
	private $backController;
	private $errorController;



	public function __construct()
    {
        $this->frontController = new FrontController();
        $this->backController = new BackController();
        $this->errorController = new ErrorController();

    }
    
	public function runBack(){

/* --------Si action = authentification, on va vers la zone de connection--------------*/
					

		if(isset($_GET['action'])){
		 


			/* --------Si action = create, on redirige vers la vue de création--------------*/

			 if ($_GET['action']==="create"){
			 	$this->backController->addPost($_POST);
			 }



				/* --------Si action = delete, on recup tous les posts et on redirige vers la vue de suppression--------------*/

			if ($_GET['action']=="delete"){
					
					$this->backController->deleteList();
			}

				/* --------Si action = delete_post, on recup tous le ^post sélectionné de via checkbox on supprime et redirige--------------*/

				if ($_GET['action']=="delete_post"){
							
							$this->backController-> delete($_POST);
		
					}


				/* --------Si action = deleteComm, on recup le comm, le supprime et on redirige vers le post--------------*/

		if ($_GET['action']=="deleteComm" && !empty($_GET['comm_id']) && $_GET['comm_id']>0 && !empty($_GET['id']) && $_GET['id']>0){
					
					$this->backController->deleteComm($_GET['comm_id']);
					$this->backController->seePost($_GET['id']);
				
			}
					/* --------Si action = editPost, on édite et on redirige vers la vue du post--------------*/

		if ($_GET['action']=="update" && !empty($_GET['id']) && $_GET['id']>0){

						$this->backController->update($_GET['id'],$_POST);
					
				
			}

					/* --------Si action = edti_comment, on recup le comm et on redirige vers la vue du post--------------*/

		if ($_GET['action']=="edit_comment" && !empty($_GET['comm_id']) && $_GET['comm_id']>0){

						$this->backController->initSignal($_GET['comm_id']);
						$this->backController-> adminHome();
			}
				/* --------Si action = post_view, on récup le post et redirige--------------*/

			if ($_GET['action']=="post_view" && !empty($_GET['id']) && $_GET['id']>0){

				$this->backController->seePost($_GET['id']);				
			}

			
						
				/* --------Si action = default, on revient à la page d'accueil--------------*/


			 if ($_GET['action']=="default"){
				$all_posts=  $this->backController->adminHome();

			}

		}
		else{
				$all_posts=  $this->frontController->home();


		}
	}

}




 


	
