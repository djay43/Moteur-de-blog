<?php 
$title="Admin - Supprimer article";
	if (isset($success)){echo $success;}
	if (isset($error)){echo $error;}

 ?>

<h2> Delete </h2>

	<?php 
    
		foreach ($posts as $post) {      
	?>		  

			<form action="../public/index.php?action=delete_post&id=<?= $post->getId();?>" method="post">

			<span id="delete_view">
				<input type="checkbox" name="postId[]" value="<?= $post->getId();?>"> <h5><?= $post->getTitle();?></h5><br/>

					<?= $post->getExtract();?> <br/></span>
	<?php	} ?>
             			
             	<input type="submit" value="supprimer" class="btn btn-danger" onclick="return(confirm('Êtes-vous sûr de vouloir supprimer cette entrée?'));">
 			</form>

  