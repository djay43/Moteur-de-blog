<?php


$title="Admin post ".$posts->getTitle();
  if (isset($success)){
        echo $success;
  }
?>
  <h2> <?= $posts->getTitle(); ?> </h2>


  <p> <?= $posts->getContent(); ?> </p>	
  <h2> Extrait </h2>
  <p> <?= $posts-> getExtract(); ?> </p>
  <h2>Commentaires </h2>

<?php 
if (isset($comments)){
foreach($comments as $comment){ ?>

				<form action="../public/index.php?action=edit_comment&id=<?= $comment->getPostId();?>&comm_id=<?= $comment->getId(); ?>" method=post>
                    <article id="adminComments"> 
                      <h5> <?= $comment->getAuthor();?></h5>
                      <p><?= $comment->getComment();?> </p>
                      <p> <?= $comment->getDateAdded();?></p>

                          <?php if ($comment->getAlert()=="1"){
                      	     echo "<p id='alertComm'>Ce commentaire a été signalé!</p>";
                             echo "<input type=\"submit\" class=\"btn btn-warning\" value=\"autoriser\">" ;                  	
                           }
                          ?>                  
                      <a href="../public/index.php?action=deleteComm&id=<?= $comment-> getPostID();?>&comm_id=<?= $comment->getId();?>" onclick="return(confirm('Etes-vous sûr de vouloir supprimer cette entrée?'));"> <i class="fas fa-trash-alt" id="deleteIcon"></i></a></span><br/>
                    </article>
        </form>

<?php
  }   
} 
 

