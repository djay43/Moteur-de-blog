

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
	   		'password'=> $password);
	

	   	header ('Location: ./admin_index.php?action=default');
	   	}

	   	else{
	   		
	   		if (isset($error)){echo $error;}
	   	}

 $title="Identifiez-vous!"; 

 

ob_start(); ?>

       <section id="auth">
         
       		<article id="connect">
                <form action="" method="post"><br/>
  				<label><strong>Pseudo</strong></label><br/>
  				<input type="text" name="login" /><br/><br/>
  				<label><strong>Mot de passe</strong></label><br/>
  				<input type="password" name="password" /><br/><br/>
  				<input type="submit" value="Connexion" class="btn btn-primary"/>
				</form>

            </article>
        </section>
      
           
          
<?php $content = ob_get_clean();
 require('post_template.php'); ?>