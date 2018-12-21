<?php
namespace App\src\DAO;
use App\src\model\Article;




/* défintion de la classe */
class ArticleDAO extends DAO{

/* --------Fonction récup tous les posts--------------*/

    public function getPosts(){

            $sql = 'SELECT id,title, post_content, DATE_FORMAT(post_date,\'%d/%m/%Y à %Hh%i\') AS post_date_fr,extract FROM posts ORDER BY id DESC';
            $result = $this->sql($sql);
            $posts = [];
            foreach ($result as $row) {
                $postId = $row['id'];
                $posts[$postId] = $this->buildObject($row);
            }
        return $posts;
    }
     /* --------Fonction recup d'un post--------------*/

    public function getPost($postId){
        
            $sql = 'SELECT id,title, post_content, DATE_FORMAT(post_date,\'%d/%m/%Y à %Hh%i\') AS post_date_fr, extract FROM posts WHERE id=?';
            $result = $this->sql($sql,[$postId]);
            $row = $result->fetch();
            if($row) {
                 return $this->buildObject($row);
            } else {
                 return $this->buildObject($row);
            }
     }

     public function addPost($post)
    {
        //Permet de récupérer les variables $title, $content et $author
        extract($post);

        $sql = 'INSERT INTO posts (title, post_content, extract, post_date) VALUES (?, ?, ?, NOW())';
        $this->sql($sql, [$title, $post, $extract]);
    }

    private function buildObject(array $row){

        $article = new Article();
        $article->setId($row['id']);
        $article->setTitle($row['title']);
        $article->setContent($row['post_content']);
        $article->setExtract($row['extract']);
        $article->setDateAdded($row['post_date_fr']);
        return $article;
    }
    public function editPost ($postId, $post){
        extract ($post);
        $sql='UPDATE posts SET title = ?, post_content = ?, extract = ? WHERE id = ?';
        $this->sql($sql,[$title, $postContent,$extract, $postId]);
    }

     
/* --------Fonction suppression d'un post--------------*/

    public function erasePost ($checkId){

            $bdd=$this->getConnection();
            $sql=$bdd->prepare('DELETE FROM `posts` WHERE id=?');
            $sql->execute (array($checkId));
            return $sql;
    }
/* --------Fonction edit d'un post--------------*/

    

    public function get_last_post(){
        $bdd=$this->getConnection();
        $last_ep = $bdd->query('SELECT id, title, post_content, DATE_FORMAT(post_date, \'%d/%m/%Y à %Hh%i\') AS post_date_fr, extract FROM posts ORDER BY id DESC LIMIT 1 '); 
        $see_last_ep = $last_ep->fetch();
        return $see_last_ep;
    }
}	
    

		

?>