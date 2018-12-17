<?php
namespace App\src\DAO;

require_once("DAO.php"); 



/* défintion de la classe */
class ArticleDAO extends DAO{

/* --------Fonction récup tous les posts--------------*/

    public function getPosts(){

            $sql = 'SELECT id,title, post_content, DATE_FORMAT(post_date,\'%d/%m/%Y à %Hh%i\') AS post_date_fr,extract FROM posts ORDER BY id DESC';
            $result = $this->sql($sql);
            return $result;

    }
     /* --------Fonction recup d'un post--------------*/

    public function getPost($postId){

        
            $sql = 'SELECT id,title, post_content, DATE_FORMAT(post_date,\'%d/%m/%Y à %Hh%i\') AS post_date_fr, extract FROM posts WHERE id=?';
            $result = $this->sql($sql,[$postId]);
            return $result;

     }

     /*----test  pagination -----*/
      public function all_posts1(){
   
                $cnx=$this->getConnection();

                if (!empty($_GET['page']) && $_GET['page']>0 && is_numeric($_GET['page'])){
                $page = ($_GET['page']);
                } 
                else {

                $page=1;
                }
                $limite = 2;

                // Partie "Requête"
                $debut = ($page - 1) * $limite;
                /* Ne pas oublier d'adapter notre requête */
                $query = 'SELECT SQL_CALC_FOUND_ROWS id,title, post_content, DATE_FORMAT(post_date,\'%d/%m/%Y à %Hh%i\') AS post_date_fr,extract  FROM `posts` ORDER BY id DESC LIMIT :limite OFFSET :debut';
                $query = $cnx->prepare($query);
                $query->bindValue('debut', $debut, PDO::PARAM_INT);
                $query->bindValue('limite', $limite, PDO::PARAM_INT);
                $query->execute();

                /* Ici on récupère le nombre d'éléments total. Comme c'est une requête, il ne
                 * faut pas oublier qu'on ne récupère pas directement le nombre.
                 * De plus, comme la requête ne contient aucune donnée client pour fonctionner,
                 * on peut l'exécuter ainsi directement */
                $resultFoundRows = $cnx->query('SELECT found_rows()');
                /* On doit extraire le nombre du jeu de résultat */
                $nombredElementsTotal = $resultFoundRows->fetchColumn();
                                
                                // Partie "Liens"
                /* On calcule le nombre de pages */
                $nombreDePages = ceil($nombredElementsTotal / $limite);

                /* Si on est sur la première page, on n'a pas besoin d'afficher de lien
                 * vers la précédente. On va donc l'afficher que si on est sur une autre
                 * page que la première */

                if ($page > 1):
                    ?><a href="?page=<?php echo $page - 1; ?>#lastPosts">Page précédente</a> — <?php
                endif;

                /* On va effectuer une boucle autant de fois que l'on a de pages */
                for ($i = 1; $i <= $nombreDePages; $i++):
                    ?><a href="?page=<?php echo $i; ?>#lastPosts"><?php echo $i; ?></a> <?php
                endfor;

                /* Avec le nombre total de pages, on peut aussi masquer le lien
                 * vers la page suivante quand on est sur la dernière */
                if ($page < $nombreDePages):
                    ?>— <a href="?page=<?php echo $page + 1; ?>#lastPosts">Page suivante</a><?php
                endif;
                return $query;


        }


   
/* --------Fonction nouveau post--------------*/

    public function new_post ($post_title,$post_content,$post_extract){

            $bdd=$this->getConnection();
            $post = $bdd->prepare('INSERT INTO posts(title, post_content, post_date, extract) VALUES (?,?,NOW(),?)');
            $sql=$post->execute (array($post_title,$post_content,$post_extract));
            return $sql;
}
/* --------Fonction suppression d'un post--------------*/

    public function delete_post ($checkId){

            $bdd=$this->getConnection();
            $sql=$bdd->prepare('DELETE FROM `posts` WHERE id=?');
            $sql->execute (array($checkId));
            return $sql;
    }
/* --------Fonction edit d'un post--------------*/

    public function edit_post ($post_id, $title, $post_content, $extract){

        $bdd=$this->getConnection();
        $sql=$bdd->prepare('UPDATE posts SET title = ?, post_content = ?, extract = ? WHERE id = ?');
        $sql->execute (array($title, $post_content, $extract, $post_id));
    }

    public function get_last_post(){
        $bdd=$this->getConnection();
        $last_ep = $bdd->query('SELECT id, title, post_content, DATE_FORMAT(post_date, \'%d/%m/%Y à %Hh%i\') AS post_date_fr, extract FROM posts ORDER BY id DESC LIMIT 1 '); 
        $see_last_ep = $last_ep->fetch();
        return $see_last_ep;
    }
}	
    

		

?>