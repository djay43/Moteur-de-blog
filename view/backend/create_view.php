
<?php ob_start();
$title="Admin - nouvel article"
 ?>

<form action="./admin_index.php?action=new_post" method="post">
<label><h2>Titre</h2><input type="text" name="post_title"></label><br/>
<label><h2>Votre post</h2><textarea name="create_post"></textarea></label><br />
<label><h2>Votre extrait</h2><textarea name="create_extract"></textarea></label>
<input name="send" type="submit" value="Envoyer" /></form>
<?php

 $admin_content = ob_get_clean();
require('admin_template.php')?> 