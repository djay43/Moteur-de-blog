
<?php
 $title="Billet pour l'Alaska ".$post['title']; 
 

ob_start(); ?>
       <section>
           <article id="main_post">
                <h2><?= $post['title'];?></h2>
               
                      
                        <p><?= $post['post_content']; ?></p>
                        <p>Posté le <?= $post['post_date_fr'];?></p> 
           </article>
           
           <aside id="comments">
                      <h2>Commentaires</h2>
                          <?php while ($comment=$comments->fetch()){ ?>

                      <h5> <strong><?= $comment['author'];?></strong></h5>
                      <p> <em><?= $comment['comment'];?></em></p>
                      <p> <?= $comment['comment_date_fr'];?></p>
                      <a href="./index.php?action=alert&id=<?= $comment['id'] ?>&post_id=<?= $comment['post_id'] ?>"> Signaler</a><br/><br/><br/>
                        <?php } ?>

                        <form action="index.php?action=new_comment&amp;id=<?= $post['id'] ?>" method="post">
                          <div>
                              <label for="author"><strong>Auteur</strong></label><br />
                              <input type="text" id="author" name="author" />
                          </div>
                          <div>
                              <label for="comment"><strong>Commentaire</strong></label><br />
                              <textarea id="comment" name="comment"></textarea>
                          </div>
                          <div>
                              <input type="submit" />
                          </div>
                      </form>
           </aside>
        </section>
      
           
          
<?php $content = ob_get_clean();
 require('post_template.php'); ?>