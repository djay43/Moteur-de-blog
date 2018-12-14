
<?php
 $title="Billet pour l'Alaska ".$post['title']; 
if (isset($success)){echo $success;}

ob_start(); ?>
       <section>
           <article id="main_post">
                <h2><?= $post['title'];?></h2>
               
                      
                        <?= $post['post_content']; ?>
                        <p>Posté le <?= $post['post_date_fr'];?></p> 
           </article>
           
           <aside id="comments">
                      <h2>Commentaires</h2>
                          <?php while ($comment=$comments->fetch()){ ?>

                      <h5> <strong><?= $comment['author'];?></strong></h5>
                      <p> <em><?= $comment['comment'];?></em></p>
                      <p> <?= $comment['comment_date_fr'];?></p>
                      <a href="./index.php?action=alert&id=<?= $comment['id'] ?>&post_id=<?= $comment['post_id'] ?>" onclick="return(confirm('Êtes-vous sûr de vouloir supprimer cette entrée?'));"> Signaler</a><br/>
                        <?php } ?>

                        
                        <form action="index.php?action=new_comment&amp;id=<?= $post['id'] ?>" method="post">
                          <div>
                              <br/><br/><label for="author"><strong>Auteur</strong></label><br />
                              <input type="text" id="author" name="author" required minlength="2" maxlength="19"/>
                          </div>
                          <div>
                             <br/><strong>Commentaire</strong><br /><span id="error"></span>
                              <textarea id="comment" name="comment" cols="20" rows="2" required minlength="2" maxlength="255"></textarea>
                          </div>
                          <div>
                                <input type="submit" class="btn btn-info" id="sendComment">
                          </div>
                      </form>
           </aside>
        </section>
      
           
          
<?php $content = ob_get_clean();
 require('post_template.php'); ?>