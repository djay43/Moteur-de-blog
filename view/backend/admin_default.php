<?php ob_start();
$title="Admin - lire article";

 ?>

<h2> Liste des posts </h2>


<?php	while ($all_comments=$comments->fetch()){ ?>
<?php
	if ($all_comments['alert']==1){?>
				<span id="alert">

		<h2>Un commentaire a été signalé</h2>
<?php
		echo $all_comments['author'];
		?><a href="./admin_index.php?action=post_view&id=<?= $all_comments['post_id']?>">Modérer le post</a>
		</span>

		<?php
	}
}

?>

<?php 

            
			while ($all_posts = $posts->fetch()) {      
			?>



					<span id="read_view"><?= $all_posts['title'];?><br/>
					<?= $all_posts['post_content'];?> <br/>
					<a href="./admin_index.php?action=post_view&id=<?= $all_posts['id']?>"> Voir l'article</a><br/>
					<a href="./admin_index.php?action=delete&id=<?= $all_posts['id']?>"> Supprimer l'article</a><br/>
					<a href="./admin_index.php?action=update&id=<?= $all_posts['id']?>"> Éditer l'article</a>

					</span>
	<?php	} ?>
           
<?php
$admin_content = ob_get_clean();
require('admin_template.php');

?>