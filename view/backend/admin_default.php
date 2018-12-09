<?php ob_start();
$title="Admin - lire article";

 ?>

<h2> Liste des posts </h2>


<?php	while ($all_comments=$comments->fetch()){ ?>
<?php
	if ($all_comments['alert']==1){?>
		<span id="alert">

		<h2>Un commentaire a été signalé:</h2>
		<h5>
<?php
		
		echo $all_comments['comment'];
		?></h5><a href="./admin_index.php?action=post_view&id=<?= $all_comments['post_id']?>">    Modérer le post</a>
		</span>

		<?php
	}
}

?>

<?php 

            
			while ($all_posts = $posts->fetch()) {      
			?>



					<span id="read_view"><h5 id="post_title"><?= $all_posts['title'];?></h5><br/>

					<?= $all_posts['extract'];?><br/>

						<span id="icons"><a href="./admin_index.php?action=post_view&id=<?= $all_posts['id']?>"><i class="far fa-eye"></i></a><br/>
						<a href="./admin_index.php?action=delete&id=<?= $all_posts['id']?>"> <i class="fas fa-trash-alt"></i></a><br/>
						<a href="./admin_index.php?action=update&id=<?= $all_posts['id']?>"> <i class="fas fa-pen"></i></a></span>

					</span>
	<?php	} ?>
           
<?php
$admin_content = ob_get_clean();
require('admin_template.php');

?>