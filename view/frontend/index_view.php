<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Jean forteroche blog</title>
   	    <link href="./public/css/style.css" rel="stylesheet" />

    </head>

    <header>
        
        <h1>Billet simple pour l'Alaska</h1>
        <a href="./index.php">Accueil</a>
        <a href="./index.php?action=authentification">S'identifier</a>

        
        
    </header>
    
    <body>
    
       <section>
           <article id="main_content">
                <h3>Dernière publication:</h3>
               
                      
                        <h5> <?=  $see_last_ep['title'];?> </h5>
                        <p><?=  ($see_last_ep['post_content']); ?></p>
                        <p>Posté le <?=  $see_last_ep['post_date_fr'];?></p>
                        <p><a href="index.php?action=post&id=<?php echo $see_last_ep['id']; ?>">Lire plus</a></p>
           </article>      
        </section>
      
           
           <div id="last_episodes_content">
                <article class="last_post">
                    <div id="last_less1">
                            <h5> <?= $see_last_ep_less1['title'];?> </h5>
                            <p><?=  $see_last_ep_less1['extract']; ?></p>
                            <p>Posté le <?=  $see_last_ep_less1['post_date_fr'];?></p> 
                            <p><a href="index.php?action=post&id=<?php echo $see_last_ep_less1['id']; ?>">Lire plus</a></p>
                    </div>
               
                </article>
                <article class="last_post">
                    <div id="last_less2">
                            <h5> <?=  $see_last_ep_less2['title'];?> </h5>
                            <p><?=  $see_last_ep_less2['extract']; ?></p>
                            <p>Posté le <?=  $see_last_ep_less2['post_date_fr'];?></p>
                            <p><a href="index.php?action=post&id=<?php echo $see_last_ep_less2['id']; ?>">Lire plus</a></p>

                    </div>
               </article>
               <article class="last_post">
                    <div id="last_less3">
                            <h5> <?=  $see_last_ep_less3['title'];?> </h5>
                            <p><?=  $see_last_ep_less3['extract']; ?></p>
                            <p>Posté le <?=  $see_last_ep_less3['post_date_fr'];?></p> 
                            <p><a href="index.php?action=post&id=<?php echo $see_last_ep_less3['id']; ?>">Lire plus</a></p>

                    </div>
                </article>
            </div>
</body>
    
<footer>
    
</footer>
</html>