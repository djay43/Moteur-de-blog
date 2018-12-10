<?php ob_start();
$title="Admin - mettre à jour article"
 ?>

<h2> Update </h2>
			
				<form action="./admin_index.php?action=edit_post&id=<?= $post['id']?>" method=post>
					<input type="text" value="<?= $post['title'];?>" name="title"> </input><br/><br/>
					<textarea name="post_content" class="mceEditor"><?= strip_tags($post['post_content']);?></textarea> <br/><br/>
					<textarea name="extract" ><?= strip_tags($post['extract']);?></textarea> <br/>

					<input type="submit"></input>
				</form>

				
<?php $admin_content = ob_get_clean();
require('admin_template.php')?> 