<?php
require_once("Manager.php"); 


/* défintion de la classe */
class PostManager extends Manager{

/* --------Fonction récup tous les posts--------------*/

    public function all_posts(){
            $limit=2;
            $bdd=$this->base_connect();
            $sql=$bdd->query('SELECT id,title, post_content, DATE_FORMAT(post_date,\'%d/%m/%Y à %Hh%i\') AS post_date_fr,extract FROM posts ORDER BY id DESC'); 
                    
            return $sql;

    }
      public function all_posts1(){
   
                $cnx=$this->base_connect();


                $page = $_GET['page'];
                $limite = 2;

                // Partie "Requête"
                /* On calcule donc le numéro du premier enregistrement */
                $debut = ($page-1) * $limite;
                /* On ajoute le marqueur pour spécifier le premier enregistrement */
                $query = 'SELECT id,title, post_content, DATE_FORMAT(post_date,\'%d/%m/%Y à %Hh%i\') AS post_date_fr,extract FROM `posts` ORDER BY id DESC LIMIT :limite OFFSET :debut';
                $query = $cnx->prepare($query);
                $query->bindValue('limite', $limite, PDO::PARAM_INT);
                /* On lie aussi la valeur */
                $query->bindValue('debut', $debut, PDO::PARAM_INT);
                $query->execute();
;      
                return $query;


        }


    /* --------Fonction recup d'un post--------------*/

    public function get_post($post_id){

            $bdd=$this->base_connect();
            $sql=$bdd->prepare('SELECT id,title, post_content, DATE_FORMAT(post_date,\'%d/%m/%Y à %Hh%i\') AS post_date_fr, extract FROM posts WHERE id=?');
            $sql->execute (array($post_id));
            $post=$sql->fetch();
            return $post;
     }
/* --------Fonction nouveau post--------------*/

    public function new_post ($post_title,$post_content,$post_extract){

            $bdd=$this->base_connect();
            $post = $bdd->prepare('INSERT INTO posts(title, post_content, post_date, extract) VALUES (?,?,NOW(),?)');
            $sql=$post->execute (array($post_title,$post_content,$post_extract));
            return $sql;
}
/* --------Fonction suppression d'un post--------------*/

    public function delete_post ($checkId){

            $bdd=$this->base_connect();
            $sql=$bdd->prepare('DELETE FROM `posts` WHERE id=?');
            $sql->execute (array($checkId));
            return $sql;
    }
/* --------Fonction edit d'un post--------------*/

    public function edit_post ($post_id, $title, $post_content, $extract){

        $bdd=$this->base_connect();
        $sql=$bdd->prepare('UPDATE posts SET title = ?, post_content = ?, extract = ? WHERE id = ?');
        $sql->execute (array($title, $post_content, $extract, $post_id));
    }

    public function get_last_post(){
        $bdd=$this->base_connect();
        $last_ep = $bdd->query('SELECT id, title, post_content, DATE_FORMAT(post_date, \'%d/%m/%Y à %Hh%i\') AS post_date_fr, extract FROM posts ORDER BY id DESC LIMIT 1 '); 
        $see_last_ep = $last_ep->fetch();
        return $see_last_ep;
    }
}	
    

		

