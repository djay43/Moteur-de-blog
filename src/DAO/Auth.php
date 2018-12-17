<?php
namespace App\src\DAO;
require_once ('DAO.php');
/* ----------Vérification de l'authentificaiton--------------*/
class Auth extends DAO{


		static function isLogged(){


			if (isset($_SESSION['auth']) && isset($_SESSION['auth']['login']) && isset($_SESSION['auth']['password'])) {
					
				extract ($_SESSION['auth']);
				$bdd=DAO::getConnection();
				$sql=$bdd-> query("SELECT id,login, password FROM users");
				$data=$sql->fetch();


						if ($_SESSION ['auth']['login']===($data['login']) && $_SESSION ['auth']['password']===($data['password'])){
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