
<?php ob_start();
$title="Admin - nouvel article"
 ?>

<form action="./admin_index.php?action=new_post" method="post" onsubmit="return checkFormNewPost()">
<label><h2>Titre</h2><input type="text" name="post_title" id="myTitle"></label><br/>
<label id="post"><h2>Votre post</h2><textarea name="create_post" id="myPost" class="mceEditor" ></textarea></label><br />
<label id="Extract"><h2>Votre extrait</h2><textarea name="create_extract" id="myExtract" onkeyup="javascript:checkTextArea();" ></textarea></label><br/><br/>
<input name="send" type="submit" value="Envoyer" onclick="return(confirm('Êtes-vous sûr de vouloir poster cette article?'));"  class="btn btn-success" /><br/>
<p id="error"></p>
</form>

<?php
 	$admin_content = ob_get_clean();
	require('admin_template.php')
?> 