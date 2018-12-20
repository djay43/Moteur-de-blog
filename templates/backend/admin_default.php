<?php 
$title="Admin - liste des articles";
 ?>

<h2> Liste des posts </h2>


<?php	foreach ($comments as $comment){ 

	if ($comment->getAlert()==1){ ?>

		<span id="alert">

		<h2>Un commentaire a été signalé:</h2>

			<h5>
				<?php
					echo $comment->getComment();
				?>
			
			</h5>

			<a href="./admin_index.php?action=post_view&id=<?= $comment->getPostId() ?>" class="btn btn-warning" id="adminSignalBtn">Modérer le post</a>

		</span>

		<?php
	}
}





            
			foreach ($posts as $post) {      
		?>

					<div id="read_view"><h5 id="post_title"><?= strip_tags($post->getTitle());?></h5><br/>

					<p><?= strip_tags($post->getExtract());?></p> <br/>

						<span id="icons"><a href="./admin_index.php?action=post_view&id=<?= $post->getId();?>"><i class="far fa-eye"></i></a><br/>
						<a href="../public/index.php?action=update&id=<?= $post->getId();?>"> <i class="fas fa-pen"></i></a>
						<a href="../public/index.php?action=delete&id=<?= $post->getId();?>"> <i class="fas fa-trash-alt"></i></a></div><br/>

					</span>
	<?php	} ?>
           

