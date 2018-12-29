<?php

namespace App\src\DAO;
use App\src\model\Article;


/**
 * Class ArticleDAO
  @package App\src\DAO
 */
class ArticleDAO extends DAO{

    /**----------------------------CONSTRUCTEUR  ARTICLE---------------------------------------------------
     * @param array $row 
     * @return Article   
     -----------------------------------------------------------------------------------------------------*/
    private function buildObject(array $row){

            $article = new Article();
            $article->setId($row['id']);
            $article->setTitle($row['title']);
            $article->setContent($row['post_content']);
            $article->setExtract($row['extract']);
            $article->setDateAdded($row['post_date_fr']);
            return $article;
        }


    /**----------------------------RECUPERATION DES ARTICLES----------------------------------------------
     * @return array  Retourne un tableau avec tous les articles
    -----------------------------------------------------------------------------------------------------*/
    public function getPosts(){

            if (!isset($_GET['ad'])){
            $param= $this->paginate('posts');
            $currentPage=$param[0];
            $perPage=$param[1];

            $sql = 'SELECT id,title, post_content, DATE_FORMAT(post_date,\'%d/%m/%Y à %Hh%i\') AS post_date_fr,extract FROM posts ORDER BY id DESC LIMIT '.(($currentPage-1)*$perPage).','.$perPage.''; // Si on est pas sur la partie admin, alors pagination effective
            }

            else{

                $sql = 'SELECT id,title, post_content, DATE_FORMAT(post_date,\'%d/%m/%Y à %Hh%i\') AS post_date_fr,extract FROM posts ORDER BY id DESC';
            }
            $result = $this->sql($sql);
            $posts = [];

            foreach ($result as $row) {
                $postId = $row['id'];
                $posts[$postId] = $this->buildObject($row);
            }

            return $posts;
    }

    /**----------------------------RECUPERATION D'UN ARTICLE----------------------------------------------
     * @param $postId    
     * @return Article   // on crée l'objet et on retourne le post
     -----------------------------------------------------------------------------------------------------*/
    public function getPost($postId){
        
            $sql = 'SELECT id,title, post_content, DATE_FORMAT(post_date,\'%d/%m/%Y à %Hh%i\') AS post_date_fr, extract FROM posts WHERE id=?';
            $result = $this->sql($sql,[$postId]);
            $row = $result->fetch();

            if($row) {

                return $this->buildObject($row);
            } 

            else {

                return $this->buildObject($row);
            }
     }


    /** ----------------------------ADMIN // NOUVEL ARTICLE---------------------------------------------------
     * @param $post  $_POST contenant $title, $post et $extract
     --------------------------------------------------------------------------------------------------------*/
    public function addPost($post){

        extract($post);
        $sql = 'INSERT INTO posts (title, post_content, extract, post_date) VALUES (?, ?, ?, NOW())';
        $this->sql($sql, [$title, $post, $extract]);
    }


    /**----------------------------EDITION D'UN ARTICLE-----------------------------------------------------
     * @param $postId  ID de l'article à éditer
     * @param $post    $_POST contenant $title, $postContent,$extract, $postId
     ------------------------------------------------------------------------------------------------------*/
    public function editPost ($postId, $post){

        extract ($post);
        $sql='UPDATE posts SET title = ?, post_content = ?, extract = ? WHERE id = ?';
        $this->sql($sql,[$title, $postContent,$extract, $postId]);
    }

     
     

    /** ----------------------------SUPPRESSION POSTS ET COMMENTAIRES----------------------------------------------
     * @param $checkId ID du post sélectionné par checkbox
     --------------------------------------------------------------------------------------------------------------*/
    public function erasePost ($checkId){

            $sql='DELETE FROM `posts` WHERE id=?';
            $this->sql($sql,[$checkId]);
    }


    /**----------------------------RECUPERATION DU DERNIER COMMENTAIRE----------------------------------------------
     * @return Article 
     --------------------------------------------------------------------------------------------------------------*/
    public function getLastPost(){
        $sql='SELECT id, title, post_content, DATE_FORMAT(post_date, \'%d/%m/%Y à %Hh%i\') AS post_date_fr, extract FROM posts ORDER BY id DESC LIMIT 1 '; 
        $result=$this->sql($sql);
        $row = $result->fetch();

        if($row){
            
            return $this->buildObject($row);
        } 

        else {

            return $this->buildObject($row);
        }    
    }
}	
    

		

