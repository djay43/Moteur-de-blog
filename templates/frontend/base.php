<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title><?=$title?></title>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link href="../public/css/style.css" rel="stylesheet" />
        <link href="../public/css/footer.css" rel="stylesheet" />
    </head>

    <header>
        <span><img src="../public/img/logo.png" alt="logo"/></span>
        <h1>Jean Forteroche</h1>
        <nav>
            <a href="../public/index.php">Accueil</a>
            <a href="../public/index.php?action=authentification">S'identifier</a>
        </nav>
        <h1 id="subtitle">Billets simple pour l'Alaska   <i class="fas fa-pencil-alt"></i></h1>
    </header>

    <body>

        <?= $content ?>
        
    </body>

  <footer class="footer-distributed">

            <div class="footer-left">

                <h3>Jean Forteroche</h3>

                <p class="footer-links">
                    <a href="../public/index.php">Accueil</a>
                    ·
                    <a href="../public/index.php?action=authentification">Connexion</a>
                    ·
                </p>

                <p class="footer-company-name">Jérémy Guillemot &copy; 2018</p>
            </div>

            <div class="footer-center">

                <div>
                    <i class="fa fa-map-marker"></i>
                    <p><span>Escluzels</span> 43580 Monistrol d'Allier, France</p>
                </div>

                <div>
                    <i class="fa fa-phone"></i>
                    <p>00 00 00 00 00</p>
                </div>

                <div>
                    <i class="fa fa-envelope"></i>
                    <p><a href="mailto:support@company.com">forteroche@gmail.com</a></p>
                </div>

            </div>

            <div class="footer-right">

                <p class="footer-company-about">
                    <span>Jean Forteroche, écrivain</span>
                    Suivez-moi sur les réseaux sociaux, et restez informés de mes dernières actualités!
                </p>

                <div class="footer-icons">

                    <a href="http://www.facebook.fr"><i class="fab fa-facebook"></i></a>
                    <a href="http://www.twitter.fr"><i class="fab fa-twitter"></i></a>
                    <a href="www.linkedin.fr"><i class="fab fa-linkedin"></i></a>

                </div>

            </div>

        </footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="../public/js/apps.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    
</html>