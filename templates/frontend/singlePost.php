

<?php

if (isset($success)){echo $success;}

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

                          <?php foreach($comments as $comment){ ?>

                      <h5> <strong><?= htmlspecialchars($comment->getAuthor());?></strong></h5>
                      <p> <em><?= htmlspecialchars($comment->getComment());?></em></p>
                      <p> <?= htmlspecialchars($comment->getDateAdded());?></p>
                      <a href="./index.php?action=alert&id=<?= htmlspecialchars($comment->getId()); ?>&post_id=<?= htmlspecialchars($comment->getPostId()); ?>" onclick="return(confirm('Êtes-vous sûr de vouloir signaler cette entrée?'));"> Signaler</a><br/>

                      <?php }?>
 

                        
                        <form action="index.php?action=new_comment&amp;id=<?= htmlspecialchars($comment->getPostId()); ?>" method="post" onsubmit="return checkFormComm()">

                          <div>
                              <br/><br/><label for="author"><strong>Auteur</strong></label><br />
                              <input type="text" id="author" name="author"  />
                          </div>

                          <div>
                             <br/><strong>Commentaire</strong><br />
                              <textarea id="comment" name="comment" cols="20" rows="2"></textarea><br/><br/>
                          </div>

                          <div>
                                <input type="submit" class="btn btn-info" id="sendComment" >
                                <p id="error"></p>
                          </div>
                          
                      </form>
           </aside>
        </section>
      
 
 
          
