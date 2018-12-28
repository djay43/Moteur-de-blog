
<?php 
$this->title="Admin - nouvel article";

if (isset($_SESSION['createFailed'])){
	echo '<p id="error">'.$_SESSION['createFailed'].'</p>';
	unset($_SESSION['createFailed']);
}

 ?>

<form action="../public/index.php?ad&action=create" method="post" onsubmit="return checkFormNewPost()">
<label><h2>Titre</h2><input type="text" name="title" id="myTitle" class="form-control" id="usr"></label><br/>
<label id="post"><h2>Votre article</h2><textarea name="content" id="myPost" class="mceEditor" ></textarea></label><br />
<label id="Extract"><h2>Votre extrait</h2><textarea name="extract" class= "form-control" id="myExtract" onkeyup="javascript:checkTextArea();" ></textarea></label><br/><br/><br/><br/>
<input name="submit" type="submit" value="Envoyer" onclick="return(confirm('Êtes-vous sûr de vouloir poster cette article?'));"  class="btn btn-success" /><br/>
<p id="error"></p>
</form>
