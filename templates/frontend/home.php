
        <?php 
        $this->title = "Jean Forteroche - accueil";

        if (isset($success)){ echo $success;} 
        ?>
        
        


    

                <div id="banner">
                        <img src="../public/img/banner.jpg" >                           
                        <article id="main_content" class="col sm-5">

                                <h3>Dernière publication:</h3>
               
                                
                                <h5><strong> <?=  htmlspecialchars($see_last_ep['title']);?> </strong></h5>
                                <p><?=  htmlspecialchars($see_last_ep['extract']); ?></p>
                                <p>Posté le <?=  htmlspecialchars($see_last_ep['post_date_fr']);?></p>
                                <p><a href="index.php?action=post&id=<?= htmlspecialchars($see_last_ep['id']); ?>"><button type="button" class="btn btn-success">Lire plus</button></a></p>                        
                            </article>  
                       

                </div>

       <section id="lastPosts">
               
      <?php
                            foreach ($posts as $post){
?>

                <article class="last_posts">

                         <h5> <?=  htmlspecialchars($post->getTitle()); ?> </h5>
                         <p> <?= htmlspecialchars($post->getExtract()); ?> </p>
                         <p> <?= htmlspecialchars($post->getDateAdded()); ?> </p>
                        <p><a href="index.php?action=post&id=<?= htmlspecialchars($post->getId()); ?>"><button type="button" class="btn btn-success">Lire plus</button></a></p>


                </article>


                
                <?php } 

                if (!empty($_GET['page']) && $_GET['page']>0 && is_numeric($_GET['page'])){
                $page = ($_GET['page']);
                } 
                else {

                $page=1;
                    }         ?>


                <a href="?page=<?php echo $page - 1; ?>#lastPosts">Page précédente</a>
                —
                <a href="?page=<?php echo $page + 1; ?>#lastPosts">Page suivante</a>
                
               
            
        