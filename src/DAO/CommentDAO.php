<?php
namespace App\src\DAO;
use App\src\model\Comment;


/*--------------------Défintion de la classe ----------------*/
class CommentDAO extends DAO{

 /* --------Fonction récupération des commentaires--------------*/

    public function getComments(){

            $sql = 'SELECT id, post_id, author, comment, DATE_FORMAT(comment_date,\'%d/%m/%Y à %Hh%i\') AS comment_date_fr, alert FROM comments ORDER BY id DESC';
            $result = $this->sql($sql);
            $comments=[];
            foreach ($result as $row) {
                $commentId = $row['id'];
                $comments[$commentId] = $this->buildObject($row);
            }
            return $comments;
        }
     
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
    /* --------Fonction récupération d'un commentaire--------------*/

 	public function getComment($postId){

             $sql = 'SELECT id, post_id, author, comment, DATE_FORMAT(comment_date,\'%d/%m/%Y à %Hh%i\') AS comment_date_fr, alert FROM comments WHERE post_id=? ORDER BY comment_date_fr DESC';
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

    public function newComment($postId, $author, $comment)

        {
            $sql='INSERT INTO comments(post_id, author, comment, comment_date) VALUES(?, ?, ?, NOW())';
            $this->sql($sql,[$postId,$author,$comment]);       
       }
    /* --------Fonction suppression d'un commentaire--------------*/

    public function eraseComment ($checkId){

            $sql='DELETE FROM `comments` WHERE id=?';
            $this->sql ($sql,[$checkId]);
    }
    /* --------Fonction suppression de tous les commentaires-------------*/

      public function eraseComments ($checkId){

            $sql='DELETE FROM `comments` WHERE post_id=?';
            $this->sql($sql,[$checkId]);
    }
    /* --------Fonction signalement d'un commentaire--------------*/

    public function alert($postId){

        $sql='UPDATE comments SET alert="1" WHERE id=?';
        $this->sql ($sql,[$postId]);
    }
     
    /* --------Fonction pour enlever le signalement-------------*/

    public function initAlert($postId){

        $sql='UPDATE comments SET alert="0" WHERE id=?';
        $this->sql($sql,[$postId]);
    }

    

}