<?php ob_start();
$title="Admin - Supprimer article";
	if (isset($success)){echo $success;}
	if (isset($error)){echo $error;}

 ?>

<h2> Delete </h2>

	<?php 
    
		while ($all_posts = $posts->fetch()) {      
	?>		  

			<form action="./admin_index.php?action=delete_post&id=<?= $all_posts['id']?>" method="post">

			<span id="delete_view">
				<input type="checkbox" name="postId[]" value="<?= $all_posts['id']?>"> <h5><?= $all_posts['title'];?></h5><br/>

					<?= $all_posts['extract'];?> <br/></span>
	<?php	} ?>
             			
             	<input type="submit" value="supprimer" class="btn btn-danger" onclick="return(confirm('Êtes-vous sûr de vouloir supprimer cette entrée?'));">
 			</form>

  <?php

$admin_content = ob_get_clean();
require('admin_template.php');

?>