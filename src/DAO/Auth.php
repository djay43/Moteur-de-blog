<?php
namespace App\src\DAO;
/* ----------Vérification de l'authentificaiton--------------*/

/**
 * Class Auth
 * @package App\src\DAO
 */
class Auth extends DAO{


    /**---------------------------- VERIFICATION LOGIN MDP ADMIN ----------------------------------------------
     * @return bool    True si connecté, false sinon
     ----------------------------------------------------------------------------------------------------------*/
    static function isLogged(){


			if (isset($_SESSION['auth']) && isset($_SESSION['auth']['login']) && isset($_SESSION['auth']['password'])) {
					
				extract ($_SESSION['auth']);
				$bdd=DAO::getConnection();
				$sql=$bdd-> query("SELECT id,login, password FROM users");
				$data=$sql->fetch();


						if ($_SESSION ['auth']['login']===($data['login']) && $_SESSION ['auth']['password']===($data['password'])){
							$_SESSION ['admin']="connected";
						return true;

						}
						else{
							
							return false;
						}
			}

			else{
				return false;
			}
		}

}