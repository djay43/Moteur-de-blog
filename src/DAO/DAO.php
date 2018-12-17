<?php 
namespace App\src\DAO;
use PDO;

class DAO {

    const DB_HOST = 'mysql:host=localhost;dbname=base_alaska;charset=utf8';
    const DB_USER = 'root';
    const DB_PASS = '';
	private $connection;



    private function checkConnection()
    {
        //Vérifie si la connexion est nulle et fait appel à getConnection()
        if($this->connection === null) {
            return $this->getConnection();
        }
        //Si la connexion existe, elle est renvoyée, inutile de refaire une connexion
        return $this->connection;
    }




    //Méthode de connexion à notre base de données
    public static function getConnection()
    {
        //Tentative de connexion à la base de données
        try{
            $connection = new PDO(self::DB_HOST, self::DB_USER, self::DB_PASS);
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //Renvoi de la connexion
            return $connection;
        }
            //On lève une erreur si la connexion échoue
        catch(Exception $errorConnection)
        {
            die ('Erreur de connexion :'.$errorConnection->getMessage());
        }
    }


    	//Méthode sql ---- Si il y a des paramètres, on appelle prepare, sinon requete query

     protected function sql($sql, $parameters = null)
    {
        if($parameters)
        {
            $result = $this->checkConnection()->prepare($sql);
            $result->execute($parameters);
            return $result;
        }
        else{
            $result = $this->checkConnection()->query($sql);
            return $result;
        }
    }
}