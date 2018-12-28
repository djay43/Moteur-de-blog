

<?php

  $this->title = $post->getTitle()." - Billets simple pour l'Alaska";

?>
       <section>

           <article id="main_post">
                <h2><?= htmlspecialchars($post->getTitle());?></h2>                      
                <p><?= $post->getContent(); ?><p>
                <p>Posté le <?= $post->getDateAdded(); ?></p> 
           </article>
           
           <aside id="comments">
                <h2>Commentaires</h2>
                    <form action="index.php?action=new_comment&amp;id=<?= htmlspecialchars($post->getId()); ?>#comments" method="post" onsubmit="return checkFormComm()">

                              <br/><label for="author"><h5>Auteur</h5></label><br />
                              <input type="text" id="author" name="author" class="form-control" id="usr" required/><br/>

                              <h5>Commentaire</h5>
                              <textarea id="comment" name="comment" cols="20" rows="2" class="form-control"></textarea><br/><br/>

                                <input type="submit" class="btn btn-info" id="sendComment" >
                                <p id="error"></p>

                                
                                <?php
                                if (isset($_SESSION['commentFailed'])){ 
                                  echo '<p id="error">'.$_SESSION['commentFailed'].'</p>';
                                  unset($_SESSION['commentFailed']);
                                }

                                ?>

                          
                      </form>


                        <?php 
                        if (isset($_SESSION['sendComment'])){ 
                            echo '<p class="success">'.$_SESSION['sendComment'].'</p>';
                            unset($_SESSION['sendComment']);
                        }
                        if (isset($_SESSION['signal'])){ 
                            echo '<p class="success">'.$_SESSION['signal'].'</p>';
                            unset($_SESSION['signal']);
                        }


                        if (isset($comments)){
                                foreach ($comments as $comment){
                            ?>

                      <h5> <strong><?= htmlspecialchars($comment->getAuthor());?></strong></h5>
                      <p> <em><?= htmlspecialchars($comment->getComment());?></em></p>
                      <p> <?= htmlspecialchars($comment->getDateAdded());?></p>
                      <a href="./index.php?action=alert&id=<?= htmlspecialchars($comment->getId()); ?>&post_id=<?= htmlspecialchars($comment->getPostId()); ?> #comments" onclick="return(confirm('Êtes-vous sûr de vouloir signaler cette entrée?'));"> Signaler</a><br/>

                         <?php  }
                        } 
                        ?>

                        
 
           </aside>
           
        </section>
      

 
          
