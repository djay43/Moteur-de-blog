
<?php ob_start();
$title="Admin - nouvel article"
 ?>

<form action="./admin_index.php?action=new_post" method="post">
<label><h2>Titre</h2><input type="text" name="post_title" required minlength="2" maxlength="100"></label><br/>
<label><h2>Votre post</h2><textarea name="create_post" id="myPost"></textarea></label><br />
<label><h2>Votre extrait</h2><textarea name="create_extract" id="myExtract"></textarea></label>
<input name="send" type="submit" value="Envoyer" onclick="javascript:checkTextArea();"/></form>
<?php

 $admin_content = ob_get_clean();
require('admin_template.php')?> 