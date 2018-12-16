<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Jean forteroche blog</title>

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
   	    <link href="./public/css/style.css" rel="stylesheet" />


    </head>

    <header>
        <?php if (isset($success)){ echo $success;} ?>
        
        <span><img src="./public/img/logo.png" alt="logo"/></span>
        <h1>Jean Forteroche</h1>
            <nav>
                <a href="./index.php">Accueil</a>
                <a href="./index.php?action=authentification">S'identifier</a>
            </nav>

    </header>

    
    <body>
    <h1 id="subtitle">Billets simple pour l'Alaska   <i class="fas fa-pencil-alt"></i></h1>


                <div id="banner">
                        <img src="./public/img/banner.jpg" >                           
                        <article id="main_content" class="col sm-5">

                                <h3>Dernière publication:</h3>
               
                                
                                <h5><strong> <?=  $see_last_ep['title'];?> </strong></h5>
                                <p><?=  ($see_last_ep['extract']); ?></p>
                                <p>Posté le <?=  $see_last_ep['post_date_fr'];?></p>
                                <p><a href="index.php?action=post&id=<?php echo $see_last_ep['id']; ?>"><button type="button" class="btn btn-success">Lire plus</button></a></p>                        
                            </article>  
                       

                </div>

       <section id="lastPosts">
               
      
                <?php while ($get_all_posts=$all_posts->fetch()){?>

                <article class="last_posts">

                         <h5> <?=  $get_all_posts['title']; ?> </h5>
                         <p> <?= $get_all_posts['extract']; ?> </p>
                         <p> <?= $get_all_posts['post_date_fr']; ?> </p>
                        <p><a href="index.php?action=post&id=<?php echo $get_all_posts['id']; ?><!-- "><button type="button" class="btn btn-success">Lire plus</button></a></p>


                </article>


                
                <?php } 

                $perPage = 2;
                $totalPosts = $all_posts->rowCount();
                $pagesTotales = ceil($totalPosts/$perPage);
                $currentPage=1;
                $first = ($currentPage-1)*$perPage;

                echo $totalPosts;

                if(isset($_GET['page']) AND !empty($_GET['page']) AND $_GET['page'] > 0) {
                   $_GET['page'] = intval($_GET['page']);
                   $currentPage = $_GET['page'];
                } else {
                   $currentPage = 1;
                }

                    for($i=1;$i<=$pagesTotales;$i++) {
                       
                            echo '<a href="index.php?page='.$i.'&first='.$first.'">'.$i.'</a> ';
                         
                    }

                ?>



                
               
            
        </section>
        
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
    
<footer>
    
</footer>
</html>