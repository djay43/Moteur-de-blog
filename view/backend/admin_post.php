<?php ob_start();
$title="Administration d'un post";
?>

  <h2> <?= $post['title']; ?> </h2>


  <p> <?= $post['post_content']; ?> </p>	
  <h2> Extrait </h2>
  <p> <?= $post['extract']; ?> </p>
  <h2>Commentaires </h2>

<?php while ($comment=$comments->fetch()){ ?>

				<form action="./admin_index.php?action=edit_comment&id=<?= $comment['post_id']?>&comm_id=<?= $comment['id'] ?>" method=post>
                     
                      <label> <input type="text" required minlength="2" maxlength="19" name="author" value ="<?= $comment['author'];?>"></label><br/><br/>
                      <label> <textarea required minlength="2" maxlength="255" name="comment"><?= $comment['comment'];?> </textarea></label><br/>
                      <p> <?= $comment['comment_date_fr'];?></p>

                          <?php if ($comment['alert']=="1"){
                      	     echo "<span id='alertComm'>Ce commentaire a été signalé!</span>";                     	
                           }
                          ?>                  
                      <br/><input type="submit" class="btn btn-info"> <a href="./admin_index.php?action=deleteComm&id=<?= $comment['post_id']?>&comm_id=<?= $comment['id']?>" onclick="return(confirm('Etes-vous sûr de vouloir supprimer cette entrée?'));"> <i class="fas fa-trash-alt" id="delete"></i></a></span><br/>
<br/><br/><br/><br/>
        
        </form>

<?php
      } 
 
$admin_content = ob_get_clean();
require('admin_template.php');

