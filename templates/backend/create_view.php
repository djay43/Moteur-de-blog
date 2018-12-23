
<?php 
$this->title="Admin - nouvel article"
 ?>

<form action="../public/index.php?ad&action=create" method="post" onsubmit="return checkFormNewPost()">
<label><h2>Titre</h2><input type="text" name="title" id="myTitle"></label><br/>
<label id="post"><h2>Votre article</h2><textarea name="post" id="myPost" class="mceEditor" ></textarea></label><br />
<label id="Extract"><h2>Votre extrait</h2><textarea name="extract" id="myExtract" onkeyup="javascript:checkTextArea();" ></textarea></label><br/><br/>
<input name="submit" type="submit" value="Envoyer" onclick="return(confirm('Êtes-vous sûr de vouloir poster cette article?'));"  class="btn btn-success" /><br/>
<p id="error"></p>
</form>
