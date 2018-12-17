<?php ob_start();
$title="Update ". $post['title'];
	if (isset($success)){echo $success;}

 ?>

				<h2> Titre </h2>
			
				<form action="./admin_index.php?action=edit_post&id=<?= $post['id']?>" method=post  onsubmit="return checkFormNewPost()">
					<input type="text" value="<?= $post['title'];?>" name="title" id="myTitle"> </input><br/><br/>
					<h2>Contenu</h2>
					<textarea name="post_content" class="mceEditor" id="myPost"><?= strip_tags($post['post_content']);?></textarea> <br/><br/>
					<h2>Extrait</h2>
					<textarea name="extract" id="myExtract" onkeyup="javascript:checkTextArea();"><?= strip_tags($post['extract']);?></textarea> <br/>

					<input type="submit" class="btn btn-success">
					<p id="error"></p>
				</form>

				
<?php $admin_content = ob_get_clean();
require('admin_template.php')?> 