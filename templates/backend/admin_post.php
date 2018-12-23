<?php


$this->title="Admin ".$posts->getTitle();
 
?>
  <h2> <?= $posts->getTitle(); ?> </h2>


  <p> <?= $posts->getContent(); ?> </p>	
  <h2> Extrait </h2>
  <p> <?= $posts-> getExtract(); ?> </p>
  <h2>Commentaires </h2>

<?php 

    if (isset($_SESSION['deleteComm'])){
      echo '<p class=success>'.$_SESSION['deleteComm'].'</p>';
      unset($_SESSION['deleteComm']);
    }
    if (isset($comments)){

      foreach($comments as $comment){ 
                
        if ($comment->getAlert()=="1"){?>
                          <form action="../public/index.php?ad&action=edit_comment&id=<?= $comment->getPostId();?>&comm_id=<?= $comment->getId(); ?>#adminContents" method=post>

                              <article id="adminComments"> 
                                <h5> <?= $comment->getAuthor();?></h5>
                                <p><?= $comment->getComment();?> </p>
                                <p> <?= $comment->getDateAdded();?></p>
                                <?= "<p id='alertComm'>Ce commentaire a été signalé!</p>";?>
                                <?= "<input type=\"submit\" class=\"btn btn-warning\" value=\"autoriser\">" ; ?>
                                <a href="../public/index.php?ad&action=deleteComm&id=<?= $comment-> getPostID();?>&comm_id=<?= $comment->getId();?>#adminComments" onclick="return(confirm('Etes-vous sûr de vouloir supprimer cette entrée?'));"> <i class="fas fa-trash-alt" id="deleteIcon"></i></a></span>
                              </article>
                          </form>
        <?php          
        }
      }

foreach($comments as $comment){ 

?>

                    <article id="adminComments"> 
                      <h5> <?= $comment->getAuthor();?></h5>
                      <p><?= $comment->getComment();?> </p>
                      <p> <?= $comment->getDateAdded();?></p>

                                         
                      <a href="../public/index.php?ad&action=deleteComm&id=<?= $comment-> getPostID();?>&comm_id=<?= $comment->getId();?>#adminComments" onclick="return(confirm('Etes-vous sûr de vouloir supprimer cette entrée?'));"> <i class="fas fa-trash-alt" id="deleteIcon"></i></a></span><br/>
                    </article>

<?php
  }   
} 
 

