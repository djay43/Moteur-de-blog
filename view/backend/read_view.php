<?php ob_start();
$title="Admin - lire article";

 ?>

<h2> Read </h2>
<?php 

            
			while ($all_posts = $posts->fetch()) {      
			?>
					<span id="read_view"><?= $all_posts['title'];?><br/>
					<?= $all_posts['post_content'];?> <br/>
					<a href="./admin_index.php?action=post_view&id=<?= $all_posts['id']?>"> Voir le post</a></span>
	<?php	} ?>
           
<?php
$admin_content = ob_get_clean();
require('admin_template.php');

?>