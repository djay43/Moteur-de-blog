

<?php

if (isset($_SESSION['auth']))	{
	header('Location: ../public/index.php?action=default');
}

	

 $title="Identifiez-vous!"; 

 

 ?>

       <section id="auth">
         
       		<article id="connect">
                <form action="../public/index.php?action=authentification" method="post"><br/>
  				<label><strong>Pseudo</strong></label><br/>
  				<input type="text" name="login" /><br/><br/>
  				<label><strong>Mot de passe</strong></label><br/>
  				<input type="password" name="password" /><br/><br/>
  				<input type="submit" value="Connexion" class="btn btn-primary"/>
				</form>

            </article>
        </section>
      
           