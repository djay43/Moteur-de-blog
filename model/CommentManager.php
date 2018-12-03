<?php

require_once("Manager.php"); 


class CommentManager extends Manager{

    

 	public function get_comments($post_id){

 			$bdd=$this->base_connect();
            $sql=$bdd->prepare ('SELECT id,post_id, author,comment, DATE_FORMAT(comment_date,\'%d/%m/%Y à %Hh%i\') AS comment_date_fr FROM comments WHERE post_id=? ORDER BY comment_date DESC LIMIT 10');
            $sql->execute (array($post_id));
            return $sql;

     }
     



    public function post_comment($post_id, $author, $comment)

        {

        	$bdd=$this->base_connect();
            $sql = $bdd->prepare('INSERT INTO comments(post_id, author, comment, comment_date) VALUES(?, ?, ?, NOW())');
            $find_comments = $sql->execute(array($post_id, $author, $comment));
            return $find_comments;

        }



}