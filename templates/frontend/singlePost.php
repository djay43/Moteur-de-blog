

<?php

if (isset($success)){echo $success;}

 while  ($myPost=$post->fetch()){
    $title="Billet pour l'Alaska ".$myPost['title']; 


ob_start(); ?>
       <section>

           <article id="main_post">
                <h2><?= htmlspecialchars($myPost['title']);?></h2>                      
                <p><?= $myPost['post_content']; ?><p>
                <p>Posté le <?= $myPost['post_date_fr'];?></p> 
           </article>
           
           <aside id="comments">
                      <h2>Commentaires</h2>

                          <?php while ($comment=$comments->fetch()){ ?>

                      <h5> <strong><?= htmlspecialchars($comment['author']);?></strong></h5>
                      <p> <em><?= htmlspecialchars($comment['comment']);?></em></p>
                      <p> <?= htmlspecialchars($comment['comment_date_fr']);?></p>
                      <a href="./index.php?action=alert&id=<?= $comment['id'] ?>&post_id=<?= htmlspecialchars($comment['post_id']) ?>" onclick="return(confirm('Êtes-vous sûr de vouloir signaler cette entrée?'));"> Signaler</a><br/>

                      <?php }?>
 

                        
                        <form action="index.php?action=new_comment&amp;id=<?= htmlspecialchars($myPost['id']) ?>" method="post" onsubmit="return checkFormComm()">

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
      
 
 
          
<?php }
$content = ob_get_clean();
 require('post_template.php'); ?>