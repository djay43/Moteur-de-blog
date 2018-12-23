
        <?php 

        $this->title = "Jean Forteroche - accueil";

        ?>
        
    

                <div id="banner">
                        <img src="../public/img/banner.jpg" >                           
                        <article id="main_content" class="col sm-5">
                                <section id="lastPosts">
               
                      <?php
                      if(isset($_SESSION['add_article'])) {
                                echo '<p class="success">'.$_SESSION['add_article'].'</p>';
                                unset($_SESSION['add_article']);
                            } ?>

                                <h3>Dernière publication:</h3>
                                <h5><strong> <?=  htmlspecialchars($lastEp->getTitle());?> </strong></h5>
                                <p><?=  htmlspecialchars($lastEp->getExtract()); ?></p>
                                <p>Posté le <?=  htmlspecialchars($lastEp->getDateAdded());?></p>
                                <p><a href="index.php?action=post&id=<?= htmlspecialchars($lastEp->getId()); ?>"><button type="button" class="btn btn-success">Lire plus</button></a></p>                        
                        </article>  
                       

                </div>
                        <?php
                            foreach ($posts as $post){ 

                                ?>
                <section id="posts">

                    <article class="last_posts">

                             <h5> <?=  htmlspecialchars($post->getTitle()); ?> </h5>
                             <p> <?= htmlspecialchars($post->getExtract()); ?> </p>
                             <p> <?= htmlspecialchars($post->getDateAdded()); ?> </p>
                            <p><a href="index.php?action=post&id=<?= htmlspecialchars($post->getId()); ?>"><button type="button" class="btn btn-success">Lire plus</button></a></p>


                    </article>

                    <div id="pagination">

                    <?php } 
                            foreach($_SESSION['paginate'] as $row){
                                        echo $row;
                            }
                    ?>
                    </div>

                </section>
