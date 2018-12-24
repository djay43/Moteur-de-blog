<?php 

$this->title="Update ". $posts->getTitle();

if (isset ($_SESSION['update'])){

	echo '<p class="success">'. $_SESSION ['update'].'<p>';
	unset($_SESSION['update']);
}
if (isset ($_SESSION['updateFailed'])){

	echo '<p id="error">'. $_SESSION ['updateFailed'].'<p>';
	unset($_SESSION['updateFailed']);
}

 ?>
				<h2> Titre </h2>
			
				<form action="../public/index.php?ad&action=update&id=<?= $posts->getId();?>" method=post  onsubmit="return checkFormNewPost()">
					<input type="text" value="<?= $posts->getTitle();?>" name="title" id="myTitle"> </input><br/><br/>
					<h2>Contenu</h2>
					<textarea name="content" class="mceEditor" id="myPost"><?= strip_tags($posts->getContent());?></textarea> <br/><br/>
					<h2>Extrait</h2>
					<textarea name="extract" id="myExtract" onkeyup="javascript:checkTextArea();"><?= strip_tags($posts->getExtract());?></textarea> <br/>

					<input type="submit" name="submit" class="btn btn-success">
					<p id="error"></p>
				</form>

				
