
<?php
 $title="Billet pour l'Alaska ".$post['title']; 
 

ob_start(); ?>
       <section>
           <article id="main_content">
                <h3>Dernière publication:</h3>
               
                      
                        <h5> <?= $post['title'];?> </h5>
                        <p><?= $post['post_content']; ?></p>
                        <p>Posté le <?= $post['post_date_fr'];?></p> 
           </article>
           
           <aside id="comments">
                      <h3>Commentaires</h3>
                          <?php while ($comment=$comments->fetch()){ ?>

                      <h5> <?= $comment['author'];?></h5>
                      <p> <?= $comment['comment'];?></p>
                      <p> <?= $comment['comment_date_fr'];?></p>
                      <a href="./index.php?action=alert&id=<?= $comment['id'] ?>&post_id=<?= $comment['post_id'] ?>"> Signaler</a><br/><br/><br/>
                        <?php } ?>

                        <form action="index.php?action=new_comment&amp;id=<?= $post['id'] ?>" method="post">
                          <div>
                              <label for="author">Auteur</label><br />
                              <input type="text" id="author" name="author" />
                          </div>
                          <div>
                              <label for="comment">Commentaire</label><br />
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