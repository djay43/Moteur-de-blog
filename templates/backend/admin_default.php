<?php 
$this->title="Admin - liste des articles";

 ?>

<h2> Liste des articles </h2>

		<form action="../public/index.php?ad&action=post_view" method="post">
			<select name="select" class="custom-select" id="inputGroupSelect01">
				<?php
					foreach($posts as $post){

							echo "<option value=".$post->getId().">".$post->getTitle()."</option>";


					}

				?>
			</select>	
			<input type="submit" class="btn btn-info" value="Aller">
		</form>
<?php	
	if (isset($_SESSION['removeSignal'])){
		echo '<p class="success">'. $_SESSION['removeSignal'].'</p>';
		unset($_SESSION['removeSignal']);
	}


foreach ($comments as $comment){ 

	if ($comment->getAlert()==1){ ?>

		<span id="alert">

		<h2>Un commentaire a été signalé:</h2>

			<h5>
				<?php
					echo $comment->getComment();
				?>
			
			</h5>

			<a href="../public/index.php?ad&action=post_view&id=<?= $comment->getPostId() ?>#adminComments" class="btn btn-warning" id="adminSignalBtn">Modérer le commentaire</a>

		</span>

		<?php
	}
}



			foreach ($posts as $post) {      
		?>


					<div id="read_view"><h5 id="post_title"><?= strip_tags($post->getTitle());?></h5><br/>

					<p><?= strip_tags($post->getExtract());?></p> <br/>

						<span id="icons"><a href="../public/index.php?ad&action=post_view&id=<?= $post->getId();?>"><i class="far fa-eye"></i></a><br/>
						<a href="../public/index.php?ad&action=update&id=<?= $post->getId();?>"> <i class="fas fa-pen"></i></a>
						<a href="../public/index.php?ad&action=delete&id=<?= $post->getId();?>"> <i class="fas fa-trash-alt"></i></a><br/>

					</div>
	<?php	} ?>
           

