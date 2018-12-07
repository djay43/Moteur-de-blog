<?php
require_once("Manager.php"); 

class PostManager extends Manager{


    public function all_posts(){

            $bdd=$this->base_connect();
            $sql=$bdd->query('SELECT id,title, post_content, DATE_FORMAT(post_date,\'%d/%m/%Y à %Hh%i\') AS post_date_fr,extract FROM posts ORDER BY id DESC');            
            
            return $sql;

    }
    public function get_post($post_id){

            $bdd=$this->base_connect();
            $sql=$bdd->prepare('SELECT id,title, post_content, DATE_FORMAT(post_date,\'%d/%m/%Y à %Hh%i\') AS post_date_fr, extract FROM posts WHERE id=?');
            $sql->execute (array($post_id));
            $post=$sql->fetch();
            return $post;
     }

    public function new_post ($post_title,$post_content,$post_extract){

            $bdd=$this->base_connect();
            $post = $bdd->prepare('INSERT INTO posts(title, post_content, post_date, extract) VALUES (?,?,NOW(),?)');
            $sql=$post->execute (array($post_title,$post_content,$post_extract));
            return $sql;
}

    public function delete_post ($checkId){

            $bdd=$this->base_connect();
            $sql=$bdd->prepare('DELETE FROM `posts` WHERE id=?');
            $sql->execute (array($checkId));
            return $sql;
    }

    public function edit_post ($post_id, $title, $post_content, $extract){

        $bdd=$this->base_connect();
        $sql=$bdd->prepare('UPDATE posts SET title = ?, post_content = ?, extract = ? WHERE id = ?');
        $sql->execute (array($title, $post_content, $extract, $post_id));
    }

}	




		$postmanage= new PostManager;
 		$bdd=$postmanage->base_connect();

        $last_ep = $bdd->query('SELECT id, title, post_content, DATE_FORMAT(post_date, \'%d/%m/%Y à %Hh%i\') AS post_date_fr, extract FROM posts ORDER BY id DESC LIMIT 1 ');       
        $see_last_ep = $last_ep->fetch();


        $last_ep_less1 = $bdd->query(' SELECT id, title, post_content, DATE_FORMAT(post_date, \'%d/%m/%Y à %Hh%i\') AS post_date_fr, extract  FROM posts ORDER BY id DESC LIMIT 1,1');       
        $see_last_ep_less1 = $last_ep_less1->fetch();

        $last_ep_less2 = $bdd->query(' SELECT id, title, post_content, DATE_FORMAT(post_date, \'%d/%m/%Y à %Hh%i\') AS post_date_fr, extract  FROM posts ORDER BY id DESC LIMIT 2,2');       
        $see_last_ep_less2 = $last_ep_less2->fetch();

        $last_ep_less3 = $bdd->query(' SELECT id, title, post_content, DATE_FORMAT(post_date, \'%d/%m/%Y à %Hh%i\') AS post_date_fr, extract  FROM posts ORDER BY id DESC LIMIT 3,3');       
        $see_last_ep_less3 = $last_ep_less3->fetch();
