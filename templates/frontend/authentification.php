

<?php

if (isset($_SESSION['admin']))	{
	header('Location: ../public/index.php?ad&action=default');
}

	

 $title="Identifiez-vous!"; 

 

 ?>

       <section id="auth">

       		<article id="connect">
                <form action="../public/index.php?ad&action=getAuth" method="post"><br/>
  				<label><strong>Pseudo</strong></label><br/>
  				<input type="text" name="login" /><br/><br/>
  				<label><strong>Mot de passe</strong></label><br/>
  				<input type="password" name="password" /><br/><br/>
  				<input type="submit" value="Connexion" class="btn btn-primary"/>
          <?php 
            if (isset($_SESSION['authFailed'])){
              echo '<p id="error">'.$_SESSION['authFailed'].'</p>';
              unset($_SESSION['authFailed']);

            }
          ?>
				</form>

            </article>
        </section>
      
           