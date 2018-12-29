

<?php
          // Si déjà connecté en tant qu'admin on redirige vers le back office
  if (isset($_SESSION['admin']))	{
  	header('Location: ../public/index.php?ad&action=default');
  }

  $title="Identifiez-vous!"; 

?>

    <section id="auth">

   		<article id="connect">
          <form action="../public/index.php?ad&action=getAuth" method="post"><br/>

        			<label> <strong>Pseudo</strong> <br/>
        			   <input type="text" name="login" />
               </label><br/><br/>

        			<label><strong>Mot de passe</strong><br/>
        			   <input type="password" name="password" />
               </label><br/><br/>

        			<input type="submit" value="Connexion" class="btn btn-primary"/>


              <?php 
                      // Si Identifiant ou mot de passe incorrect message erreur
                if (isset($_SESSION['authFailed'])){
                  echo '<p id="error">'.$_SESSION['authFailed'].'</p>';
                  unset($_SESSION['authFailed']);

                }
              ?>
    		  </form>

      </article>
    </section>
      
           