<?php ob_start();
$title="Administration d'un post";

 ?>

<h2> <?= $post['title']; ?> </h2>


         
<p> <?= $post['post_content']; ?></p>	
<h2> Extrait </h2>

<p> <?= $post['extract']; ?></p>

<h2>Commentaires </h2>

<?php while ($comment=$comments->fetch()){ ?>
				<form action="./admin_index.php?action=edit_comment&id= <?= $comment['id'] ?>">
                     
                      <label> <input type="text" value ="<?= $comment['author'];?>"></label><br/><br/>
                      <label> <textarea><?= $comment['comment'];?> </textarea></label><br/>
                      <p> <?= $comment['comment_date_fr'];?></p>

                      <?php if ($comment['alert']=="1"){
                      	echo "ce commentaire a été signalé!!!!";                     	
                      }
                         ?>                  <br/><br/><input type="submit"><br/><br/><br/><br/>
					<?php
                        } 
                       ?>
                </form>



           
<?php 
$admin_content = ob_get_clean();
require('admin_template.php');

