
<?php
 $title="Billet pour l'Alaska ".$post['title']; 
 

ob_start(); ?>
       <section>
           <article id="main_content">
                <h3>Dernière publication:</h3>
               
                      
           </article>
           
           <aside id="comments">
                      <h3>Commentaires</h3>
                          

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