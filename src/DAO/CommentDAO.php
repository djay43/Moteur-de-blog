<?php
namespace App\src\DAO;

require_once("DAO.php"); 


/*--------------------Défintion de la classe ----------------*/
class CommentDAO extends DAO{

 /* --------Fonction récupération des commentaires--------------*/

    public function getComments(){

            $sql = 'SELECT id, post_id, author, comment, DATE_FORMAT(comment_date,\'%d/%m/%Y à %Hh%i\') AS comment_date_fr, alert FROM comments ORDER BY id DESC';
            $result = $this->sql($sql);
            return $result;

            }
     

    /* --------Fonction récupération d'un commentaire--------------*/

 	public function get_comments($post_id){
        
 			$bdd=$this->getConnection();
            $sql=$bdd->prepare ('SELECT id,post_id, author,comment, DATE_FORMAT(comment_date,\'%d/%m/%Y à %Hh%i\') AS comment_date_fr, alert FROM comments WHERE post_id=? ORDER BY comment_date DESC LIMIT 10');
            $sql->execute (array($post_id));
            return $sql;
            

     }

   
/* --------Fonction ajout d'un commentaire--------------*/


    public function post_comment($post_id, $author, $comment)

        {

        	$bdd=$this->getConnection();
            $sql = $bdd->prepare('INSERT INTO comments(post_id, author, comment, comment_date) VALUES(?, ?, ?, NOW())');
            $find_comments = $sql->execute(array($post_id, $author, $comment));
            return $find_comments;

        }

/* --------Fonction edit d'un commentaire--------------*/

     public function edit_comment ($comment_id, $author, $comment){

        $bdd=$this->getConnection();
        $sql=$bdd->prepare('UPDATE comments SET author=?,comment=? WHERE id=? ');
        $sql->execute (array($author, $comment, $comment_id));
    }
/* --------Fonction suppression de tous les commentaires-------------*/

      public function delete_all_comm ($checkId){

            $bdd=$this->getConnection();
            $sql=$bdd->prepare('DELETE FROM `comments` WHERE post_id=?');
            $sql->execute (array($checkId));
            return $sql;
    }
/* --------Fonction suppression d'un commentaire--------------*/

    public function delete_comm ($checkId){

            $bdd=$this->getConnection();
            $sql=$bdd->prepare('DELETE FROM `comments` WHERE id=?');
            $sql->execute (array($checkId));
            return $sql;
    }
/* --------Fonction signalement d'un commentaire--------------*/

    public function alert_comment($post_id){

        $bdd=$this->getConnection();
        $sql=$bdd->prepare('UPDATE comments SET alert="1" WHERE id=?');
        $sql->execute (array($post_id));
    }
    /* --------Fonction pour enlever le signalement-------------*/

    public function default_alert($post_id){

        $bdd=$this->getConnection();
        $sql=$bdd->prepare('UPDATE comments SET alert="0" WHERE id=?');
        $sql->execute (array($post_id));
    }


}