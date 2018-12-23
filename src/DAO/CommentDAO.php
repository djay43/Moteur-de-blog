<?php
namespace App\src\DAO;
use App\src\model\Comment;



/**
 * Class CommentDAO
 * @package App\src\DAO
 */
class CommentDAO extends DAO{


    /** ---------------------------- SET CARACTERISTIQUES COMMENTAIRES--------------------------------------------------
     * @param array $row
     * @return Comment   
     -----------------------------------------------------------------------------------------------------------------*/
    private function buildObject(array $row){

            $comment = new Comment();
            $comment->setId($row['id']);
            $comment->setPostId($row['post_id']);
            $comment->setAuthor($row['author']);
            $comment->setComment($row['comment']);
            $comment->setAlert($row['alert']);
            $comment->setDateAdded($row['comment_date_fr']);
            return $comment;
    }


    
    /** ----------------------------RECUPERATION DES COMMENTAIRES POUR VERIF SIGNAL-------------------------------------
     * @param $postId  ID du
     * @return array
     -----------------------------------------------------------------------------------------------------------------*/
    public function getAllComments(){

            $sql = 'SELECT id, post_id, author, comment, DATE_FORMAT(comment_date,\'%d/%m/%Y à %Hh%i\') AS comment_date_fr, alert FROM comments ';
            $result = $this->sql($sql);
            $comments = [];
            foreach ($result as $row) {
                $commId = $row['id'];
                $comments[$commId] = $this->buildObject($row);
            }
            return $comments;
        }
    

    /** ----------------------------RECUPERATION DES COMMENTAIRES D'UN ARTICLE--------------------------------------------
     * @param $postId  ID du
     * @return array
     -----------------------------------------------------------------------------------------------------------------*/
    public function getComments($postId){
            
            $sql = 'SELECT id, post_id, author, comment, alert,DATE_FORMAT(comment_date,\'%d/%m/%Y à %Hh%i\') AS comment_date_fr FROM comments WHERE post_id=? ORDER BY id DESC ';
            
            $result = $this->sql($sql,[$postId]);
            $row = $result->fetch();
            $comments=[];

            if($row) {

                foreach ($result as $row) {
                $commentId = $row['id'];
                $comments[$commentId] = $this->buildObject($row);
            }

            return $comments;
        }
    }


    /**----------------------------- NOUVEAU COMMENTAIRE-----------------------------------------------------------------
     * @param $postId       ID de l'article associé au commentaire
     * @param $Author  ->   $_POST author
     * @param $comment ->   $_POST comment
     -----------------------------------------------------------------------------------------------------------------*/
    public function newComment($postId, $author, $comment){

            $sql='INSERT INTO comments(post_id, author, comment, comment_date) VALUES(?, ?, ?, NOW())';
            $this->sql($sql,[$postId,$author,$comment]);       
    }



    /**------------------------------SUPPRESSION D'UN COMMENTAIRE---------------------------------------------------------
     * @param $commId   ID du post associé
     -----------------------------------------------------------------------------------------------------------------*/
    public function eraseComment ($commId){

            $sql='DELETE FROM `comments` WHERE id=?';
            $this->sql ($sql,[$commId]);
    }



    /**------------------------------SUPPRESSION DE TOUS LES COMMENTAIRES-------------------------------------------------
     * @param $postId  ID de l'article associé aux commentaires 
     -----------------------------------------------------------------------------------------------------------------*/
    public function eraseComments ($postId){

            $sql='DELETE FROM `comments` WHERE post_id=?';
            $this->sql($sql,[$postId]);
    }



    /**-------------------------------- SIGNALEMENT D'UN COMMENTAIRE -------------------------------------------------------
     * @param $commId    Id du commentaire à signaler
     -----------------------------------------------------------------------------------------------------------------*/
    public function alert($commId){

            $sql='UPDATE comments SET alert="1" WHERE id=?';
            $this->sql ($sql,[$commId]);
    }
     

    /** -------------------------------- AUTORISER UN COMMENTAIRE ----------------------------------------------------------
     * @param $commId     Id du commentaire à autoriser
     -----------------------------------------------------------------------------------------------------------------*/
    public function initAlert($commId){

            $sql='UPDATE comments SET alert="0" WHERE id=?';
            $this->sql($sql,[$commId]);
    }

}