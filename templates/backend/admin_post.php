<?php ob_start();
$title="Admin post ".$post['title'];
  if (isset($success)){
        echo $success;
  }
?>
  <h2> <?= $post['title']; ?> </h2>


  <p> <?= $post['post_content']; ?> </p>	
  <h2> Extrait </h2>
  <p> <?= $post['extract']; ?> </p>
  <h2>Commentaires </h2>

<?php while ($comment=$comments->fetch()){ ?>

				<form action="./admin_index.php?action=edit_comment&id=<?= $comment['post_id']?>&comm_id=<?= $comment['id'] ?>" method=post>
                    <article id="adminComments">
                      <h5> <?= $comment['author'];?></h5>
                      <p><?= $comment['comment'];?> </p>
                      <p> <?= $comment['comment_date_fr'];?></p>

                          <?php if ($comment['alert']=="1"){
                      	     echo "<p id='alertComm'>Ce commentaire a été signalé!</p>";
                             echo "<input type=\"submit\" class=\"btn btn-warning\" value=\"autoriser\">" ;                  	
                           }
                          ?>                  
                      <a href="./admin_index.php?action=deleteComm&id=<?= $comment['post_id']?>&comm_id=<?= $comment['id']?>" onclick="return(confirm('Etes-vous sûr de vouloir supprimer cette entrée?'));"> <i class="fas fa-trash-alt" id="deleteIcon"></i></a></span><br/>
                    </article>
        </form>

<?php
      } 
 
$admin_content = ob_get_clean();
require('admin_template.php');

