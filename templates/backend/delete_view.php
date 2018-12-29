<?php 
	$this->title="Admin - Supprimer article";
?>

<h2> Supprimer </h2>

<?php 
			// Message erreur ou succès à la suppression de message
	if (isset($_SESSION['delete'])){
					echo '<p class="success">'.$_SESSION['delete'].'<p>';
					unset($_SESSION['delete']);
				}
	if (isset($_SESSION['deleteFailed'])){
					echo '<p id="error">'.$_SESSION['deleteFailed'].'<p>';
					unset($_SESSION['deleteFailed']);
				}



	foreach ($posts as $post) {   
?>		  
		<form action="../public/index.php?ad&action=delete_post&id=<?= $post->getId();?>" method="post">

			<span id="delete_view">
				<input type="checkbox" name="postId[]" value="<?= $post->getId();?>">
				<h5><?= $post->getTitle();?></h5>
				<p><?= $post->getExtract();?></p>
				<a href="../public/index.php?ad&trash&action=delete_post&id=<?= $post-> getId();?>" onclick="return(confirm('Etes-vous sûr de vouloir supprimer cette entrée?'));">
					<i class="fas fa-trash-alt" id="deleteIcon"></i>
				</a>
			</span>
			
<?php	} ?>
     			
     		<input type="submit" value="supprimer" class="btn btn-danger" onclick="return(confirm('Êtes-vous sûr de vouloir supprimer cette entrée?'));">
		</form>

  