

<?php
session_start();
require ('./model/Auth.php');
if  (Auth::isLogged()){
		header ('Location: ./admin_index.php?action=default');
}
if (isset($_POST) && !empty ($_POST['login']) && !empty($_POST['password'])){
	extract ($_POST);
	$password=sha1($password);

	   $_SESSION ['auth'] = array(
	   		'login'=>$login,
	   		'password'=> $password

	   );
	
	   		header ('Location: ./admin_index.php?action=default');
	   	}
	   	else{
	   		echo 'Identifiants ou mot de passe incorrect';
	   	}

 $title="Identifiez-vous!"; 

 

ob_start(); ?>

       <section>
         
       		<article id="main_content">
                <form action="" method="post">
  				<label>Pseudo</label>
  				<input type="text" name="login" />
  				<label>Mot de passe</label>
  				<input type="password" name="password" />
  				<input type="submit" value="Connexion" />
				</form>

            </article>
        </section>
      
           
          
<?php $content = ob_get_clean();
 require('post_template.php'); ?>