<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Jean forteroche blog</title>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
   	    <link href="./public/css/style.css" rel="stylesheet" />


    </head>

    <header>
        <span><img src="./public/img/logo.png" alt="logo"/></span>
        <h1>Jean Forteroche</h1>
            <nav>
                <a href="./index.php">Accueil</a>
                <a href="./index.php?action=authentification">S'identifier</a>

            </nav>
             <h1 id="subtitle">Billets simple pour l'Alaska   <i class="fas fa-pencil-alt"></i></h1>

    </header>

    
    <body>


                <div id="banner" class="row">
                    <img src="./public/img/banner.jpg" />
                        <div id="opacity">
                            
                        </div>
                        <article id="main_content">

                                <h3>Dernière publication:</h3>
               
                                
                                <h5><strong> <?=  $see_last_ep['title'];?> </strong></h5>
                                <p><?=  ($see_last_ep['extract']); ?></p>
                                <p>Posté le <?=  $see_last_ep['post_date_fr'];?></p>
                                <p><a href="index.php?action=post&id=<?php echo $see_last_ep['id']; ?>"><button type="button" class="btn btn-success">Lire plus</button></a></p>                        
                            </article>  
                       

                </div>

       <section>
               
      
                <?php while ($get_all_posts=$all_posts->fetch()){?>

                <article class="last_posts">

                         <h5> <?=  $get_all_posts['title']; ?> </h5>
                         <p> <?= $get_all_posts['extract']; ?> </p>
                         <p> <?= $get_all_posts['post_date_fr']; ?> </p>
                        <p><a href="index.php?action=post&id=<?php echo $get_all_posts['id']; ?><!-- "><button type="button" class="btn btn-success">Lire plus</button></a></p>

                </article>


                
                <?php } 

                $videosParPage = 2;
                $videosTotales = $all_posts->rowCount();
                $pagesTotales = ceil($videosTotales/$videosParPage);

                if(isset($_GET['page']) AND !empty($_GET['page']) AND $_GET['page'] > 0) {
                   $_GET['page'] = intval($_GET['page']);
                   $pageCourante = $_GET['page'];
                } else {
                   $pageCourante = 1;
                }
                $depart = ($pageCourante-1)*$videosParPage;

                    for($i=1;$i<=$pagesTotales;$i++) {
                       
                            echo '<a href="index.php?page='.$i.'">'.$i.'</a> ';
                         
                    }

                ?>



                
               
            
        </section>

</body>
    
<footer>
    
</footer>
</html>