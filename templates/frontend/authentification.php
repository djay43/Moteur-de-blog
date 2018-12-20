

<?php
session_start();

	// if  (App\src\DAO\Auth::isLogged()===true){
	// 	header ('Location: ../public/index.php?action=getAuth');
	// }
	

	if (isset($_POST) && !empty ($_POST['login']) && !empty($_POST['password'])){
		extract ($_POST);
		$password=sha1($password);

	   	$_SESSION ['auth'] = array(
	   		'login'=>$login,
	   		'password'=> $password);
	
	   	}

	   	else{
	   		
	   		if (isset($error)){echo $error;}
	   	}

 $title="Identifiez-vous!"; 

 

 ?>

       <section id="auth">
         
       		<article id="connect">
                <form action="../public/index.php?action=getAuth" method="post"><br/>
  				<label><strong>Pseudo</strong></label><br/>
  				<input type="text" name="login" /><br/><br/>
  				<label><strong>Mot de passe</strong></label><br/>
  				<input type="password" name="password" /><br/><br/>
  				<input type="submit" value="Connexion" class="btn btn-primary"/>
				</form>

            </article>
        </section>
      
           