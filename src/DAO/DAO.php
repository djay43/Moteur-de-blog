<?php 
namespace App\src\DAO;
use PDO;

/**
 * Class DAO
 * @package App\src\DAO
 */
class DAO {

    private $connection;


    /** ---------------------------- VERIFICATION SI CONNEXION EXISTANTE------------------------------------------------
     * @return PDO  Si connexion null, on appelle getConnection
     -----------------------------------------------------------------------------------------------------------------*/
    private function checkConnection()
    {
        
        if($this->connection === null) {
            return $this->getConnection();
        }
        return $this->connection;
    }





    /** ---------------------------- CONNEXION BASE DE DONNÉES ---------------------------------------------------------
     * @return PDO   
     ---------------------------------------------------------------------------------------------------------------- */
    public static function getConnection()
    {
        try{
            $connection = new PDO(DB_HOST, DB_USER, DB_PASS);
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $connection;
        }

        catch(Exception $errorConnection)
        {
            die ('Erreur de connexion :'.$errorConnection->getMessage());
        }
    }



    /** ------------- DEFINITION PREPARE OU QUERY SUIVANT PRESENCE PARAMETRE -------------------------------------------
     * @param $sql                             //requete sql
     * @param null $pg_parameter_status()      // parametres pour PREPARE
     * @return bool|false|\PDOStatement        // Si il y a des paramètres, on retourne PREPARE sinon QUERY
     -----------------------------------------------------------------------------------------------------------------*/
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
/** ----------------------------------- FONCTION PAGINATION ---------------------------------------------------------
     * @param $table              // table à paginer
     * @return array $param       // on retourne page courante et nbre posts par page dans un array
     -----------------------------------------------------------------------------------------------------------------*/
    protected function paginate($table){


            $sql='SELECT COUNT(id) as nbPosts FROM '.$table.' ';
            $req=$this->sql($sql);
            $data=$req->fetch();

            $nbPosts=$data['nbPosts']; 
            $perPage=2;
            $currentPage=1;
            $totalPages=ceil($nbPosts/$perPage);

            if(isset($_GET['page']) AND !empty($_GET['page']) AND $_GET['page'] > 0 AND $_GET['page'] <= $totalPages){
                     $_GET['page'] = intval($_GET['page']);
                            $currentPage = $_GET['page'];
                            } 
                            else {
                                $currentPage = 1;
                            }

            $_SESSION['paginate']=array();
            for($i=1;$i<=$totalPages;$i++) {
                   
                if($i==$currentPage){
                    $_SESSION['paginate'][$i]='<span  class="btn btn-light" id="off">'.$i.'</span>';
                }  
                else{
                    $_SESSION['paginate'][$i]='<a href="index.php?page='.$i.'#posts"><span class="btn btn-light">'.$i.'</span></a> ';
                }

            }

            $param=[$currentPage, $perPage];
            return $param;

    }
}